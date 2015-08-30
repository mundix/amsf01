'use strict';

//Iniciando mi app
var AmSisFactura = angular.module('AmSisFactura',[]);

//Un controlador con una function
//Ya esto es codigo de angular.
AmSisFactura.controller('SearchCtrl',function($scope,$http)
{
    //Vamos a escribir un peq codigo que nos definira la buscqueda  y nos devuelva,
    //ademas se comunique con laravel.

    //El scope se permite comunicarse con la vista.
    //Es lo que permite al controlador comunicarse con la vista, es el modelo que permite
    //la comunicacion con javascrip y el modelo de la vista.
    $scope.search = function()
    {
        $('#search-table').show();
        //Este es un servicio de angular, para hacer las peticione de ajax.
        $http.get('products.search',
            {
            params: {search:$scope.searchInput}
        }).success(function(data)
        {
            $scope.products = data;
        })
    };
});

$(function()
{
    //bootbox.alert("Hello world!");
    $("#cashier").val("RD$ 0.00");
    $("#subtotal").val("RD$ 0.00");

    /**
     * Add products to the result table table
     * */
    $(document).on("click","#resultlist a",function(e)
    {
        total_neto = 0;
        e.preventDefault();
        $('#search-table').hide();
        var id          = $(this).attr("data-product-id");
        var aObj        = $(this).attr("data-product");
        var obj         = JSON.parse($(this).attr("data-product"));
        var tbody       = $("#products-list tbody");

        var isIdExist   = true;

        $("#products-list tbody tr").each(function( key, value )
        {
            var obj = JSON.parse($(value).attr("data-product"));
            if(obj.id == id)
                isIdExist = false;
        });

        if(isIdExist )
        {
            $("#products-list tbody")
                .append($("<tr>").attr("id", "obj-" + obj.id).attr('data-product', aObj)
                    .append(
                    $("<td>").text(obj.id).append($("<input>").attr("type","hidden").attr("value",obj.id).attr("name","product_id[]")),
                    $("<td>").text(obj.name),
                    $("<td>").text(obj.category.name),
                    $("<td>").text(numeral(obj.price).format('0,0.00')),
                    $("<td>").text(function()
                    {
                        console.log(parseInt(obj.id));
                        itbis_array[parseInt(obj.id)] = parseFloat(obj.itbis.value);
                        if(parseFloat(obj.fix_itbis) > 0.00)
                            return numeral((obj.fix_itbis*obj.price)/100).format('0,0.00');
                        return numeral((obj.itbis.value*obj.price)/100).format('0,0.00');
                    }),
                    $("<td>").append($("<input>").attr('id', "discount-" + obj.id).attr("type", 'number').attr("min", 0).attr("value", 0.00).attr("class","form-control is_percent")),
                    $("<td>").text(obj.stock),
                    $("<td>").append($("<input>").attr('id', "qty-" + obj.id)
                        .attr("type", 'number').attr("min", 1).attr("value", 1)
                        .attr("class","form-control is_qty")
                        .attr("data-original-title","")
                        .attr("data-content","")
                        .attr("data-trigger","hover")),
                    $("<td>").append($("<a>").append($("<i>").attr("class"," icon-remove")))
                ));
        }else{
                var qty = ($("#qty-"+id).val());
                qty ++;
                $("#obj-"+id).find("input").val(qty);
        }

        /**
         * Prevent Apply or not a discount input field
         * */
        if( $("input[name=discount]:checked").attr("id") == "discount_na")
        {
            $(".is_percent").prop("disabled", false);
        }else{
            $(".is_percent").prop("disabled", true);
        }

        /**
         * Display total on the black input
         * */
        getTotal();
        $("#search_input").val("");
    });

    /**
     * If input qty changes, recalculate the total
     * */
    $(document).on("change","input[type=number]",function()
    {
        getTotal();
    });

    /**
     * Check if the qty is less has on the inventory
     * */
    $(document).on("change",".is_qty",function()
    {
        var obj = JSON.parse($(this).parent().parent().attr("data-product"));
        var stock = obj.stock;
        if($(this).val() > stock)
        {
            $(this).addClass("bs-popover");
            $(this).attr("data-original-title","Error");
            $(this).attr("data-content","La cantidad elegida, es mayor a la existente.");
            $('.bs-popover').popover();
            $(this).parent().parent().attr("style","background:#f2dede");
            //bootbox.alert("La cantidad elegida, es mayor a la existente.");
        }else{
            $(this).removeClass("bs-popover");
            $(this).removeAttr("data-original-title");
            $(this).removeAttr("data-content");
        }

        //console.log("Estamos en algo");
        //getTotal();
    });

    /**
     * Removes the tr from the result table
     * */
    $(document).on("click","#products-list tbody tr td a",function(e)
    {
        e.preventDefault();
        $(this).parent().parent().remove();
        getTotal();
    });

    /**
     * Click on a checkbox if apply itbis is checked or not
     * */
    $("#apply_itbis").click(function()
    {
        getTotal();
    });

    /**
     * Discount Radio Select
     * */
    $("input[type=radio]").click(function(e)
    {
       if($(this).attr("id") == "discount_na")
       {
           $("#discount_div label").html("Valor");
           $("#discount_total").prop("disabled", true);
           $(".is_percent").val(0);
           $(".is_percent").prop("disabled", false);
           $("#discount_div").hide();
           getTotal();

       }else
       {
            $(".is_percent").val(0);
            $(".is_percent").prop("disabled", true);
            $("#discount_div").show();
            var label = $("#discount_div label").html();
            if($(this).attr("id") == "discount_percent")
            {
               label = "Valor % ";
            }else{
               label = "Valor RD$ ";
            }

            $("#discount_div label").html(label);

            $("#discount_total").val("0.00");
            $("#discount_total").prop("disabled", false);
       }
    });

    /**
     * Hide the Search Table
     * */
    $('#search-table').hide();

});

/**
 * ***********************
 * My Vars
 * ***********************
 * */
var discount = 0;
var total_neto = 0;
var total_itbis = 0;
var total_discount = 0;
var discount = 0;
var value = 0;
var same_discount = false;
/**
 * Types By Cases
 * #1 Same Taxes, apply discount to the main amount.
 * #2 Same Taxes, apply discont on each products.
 * #3 Differents Taxes, apply percent discount on each products.
 * #4 Different Taxes, can't apply discount to the main amount.
 *
 * if taxes_type == 0 don't apply discount
 *
 * */
var taxes_type = 0;
var itbis_array = [];
/**
 * Display Total
 * Black Display
 * */
function getTotal()
{
    total_neto  = 0;
    total_itbis = 0;
    total_discount = 0;
    same_discount = false;

    $("#products-list tbody tr").each(function( key, value )
    {

        var obj     = JSON.parse($(value).attr("data-product"));
        var qty     = parseInt($("#qty-"+obj.id).val());
        var price   = parseFloat(obj.price);
        var itbis   = parseFloat(obj.itbis.value);

        //itbis_array.push(itbis);

        if(parseFloat(obj.fix_itbis) > 0.00)
        {
            itbis = parseFloat(obj.fix_itbis);
        }

        var discount = parseFloat(obj.discount); //Discount fron DB
        var discount_apply = obj.discount_apply; //if apply discount

        total_neto  += qty * price;

        /**
         * Discount by DB Field discount_apply and discount
         * only if the field discount_apply is 1
         * */
        if(parseInt(discount_apply) == 1)
        {
            price = price * (1 - (discount/100));
        }

        /**
         *
         * Discount by INPUT id="discount-(item.id)"
         * only apply if more than 0
         * */
        var discount = parseFloat($("#discount-"+obj.id).val());
        if(discount>0.00)
        {
            price = price * (1 - (discount/100));
        }

        /**
         * Main Global Discount % or Amount Field
         * */
        if($("input.radio_discount:checked").val() == 1)
        {
            //console.log("Estamos haciendo el calclulo");
            discount = getDiscountValue(1);
            price = price - price * discount;
        }else{

        }

        total_discount  += qty*price;
        total_itbis += qty*price*itbis/100;

    });

    if($("input.radio_discount:checked").val() == 2)
    {
        var valor = null;
        var same = true;
        $.each(itbis_array,function(index,value)
        {
            if(value != undefined)
            {
                if(valor != value && valor == null)
                    valor = value;
                if(valor != value && valor != null)
                    same = false;
                //console.log(index,value);
            }
        });
        //console.log(same);
        if(same)
        {
            same_discount = true;
            total_discount = total_neto - parseFloat($("#discount_total").val());
            total_itbis = total_discount *itbis;
        }
    }

    getTotalWTaxes();
    var string = numeral(total_neto).format('0,0.00');
    $("#cashier").val("RD$ "+(string));

    if(total_neto > 0)
        $("input[type=submit]").prop("disabled", false);
    else
        $("input[type=submit]").prop("disabled", true);
}

/**
 *
 * Display Tota w/ Taxes
 * Yellow Display
 *
 * */
function getTotalWTaxes()
{
    var total = 0;
    if($("#apply_itbis").is(":checked"))
    {
        //console.log("total_discount:",total_discount);
        if($("input.radio_discount:checked").val() == 1 || $("input.radio_discount:checked").val() == 2 || same_discount)
        {
            total = total_discount  + total_itbis ;
        }else
            total = total_neto + total_itbis;
    }else{
        if($("input.radio_discount:checked").val() == 1 || $("input.radio_discount:checked").val() == 2 || same_discount)
        {
            total = total_discount ;
        }else
            total = total_neto ;
    }

    var string = numeral(total).format('0,0.00');
    $("#subtotal").val("RD$ "+(string));
}

/**
 * Returns the Value to discount
 *
 * @param type = 1 Percentual
 * @param type = 2 Direct Amount
 *
 * */
function getDiscountValue(type)
{
    /**
     * 1 - Percent
     * 2 - Amount
     * */
    var value = parseFloat($("#discount_total").val());
    var discount = 0;
    if( type == 1 )
    {
        discount = value /100;
    }else
    {
        discount = value;
    }
    return discount;
}