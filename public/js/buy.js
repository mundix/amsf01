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
    $(document).on("click","#resultlist tr",function(e)
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
                    //$("<td>").text(obj.category.name),
                    //$("<td>").text(numeral(obj.price).format('0,0.00')),
                    $("<td>").append($("<input>").attr('id', "list_price-" + obj.id)
                        .attr("type", 'number').attr("min", 1).attr("value", obj.price_list)
                        .attr("name","list_price[]")
                        .attr("id","list_price-"+obj.id)
                    ),
                    $("<td>").text(function()
                    {
                        itbis_array.push([parseInt(obj.id),parseFloat(obj.itbis.value)]);
                        if(parseInt(obj.itbis_apply))
                            return numeral(obj.itbis.value*100).format('0,0.00');
                        return numeral(itbis_general*100).format('0,0.00');
                    }),
                    $("<td>").attr("id",'itbis-'+obj.id).text(function()
                    {
                        $(document).on("change","#list_price-"+obj.id,function()
                        {
                            var value = parseFloat($(this).val());
                            var obj = JSON.parse($(this).parent().parent().attr("data-product"));

                            if(parseInt(obj.itbis_apply))
                                $("#itbis-"+obj.id).html( numeral((obj.itbis.value*parseFloat($(this).val()))).format('0,0.00'));
                            $("#itbis-"+obj.id).html(numeral((itbis_general*parseFloat($(this).val()))).format('0,0.00'));

                        });
                        if(parseInt(obj.itbis_apply))
                            return numeral((obj.itbis.value*obj.price_list)).format('0,0.00');
                        return numeral((itbis_general*obj.price_list)).format('0,0.00');

                    }),
                    $("<td>").append($("<input>").attr('id', "qty-" + obj.id)
                        .attr("type", 'number').attr("min", 0).attr("value", 1)
                        .attr("name","qty[]")
                        .attr("class","form-control is_qty")
                        .attr("data-original-title","")
                        .attr("data-content","")
                        .attr("data-trigger","hover")),
                    $("<td>").append($("<a>").append($("<i>").attr("class"," icon-remove")))
                ));
        }else{
                var qty = ($("#qty-"+id).val());
                qty ++;
                $("#obj-"+id).find("input.is_qty").val(qty);
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
     * If click Apply NCF can add RNC input field
     * */
    $("#apply_rnc").click(function()
    {
        if($(this).is(":checked"))
        {
            $("#ncf_group").show();
            $("#ncf_group input[name=ncf]").val(ncf);
        }else
            $("#ncf_group").hide();
    });

    /**
     * Apply if cand select NCF Type
     * */
    $("#ncf_type_id").prop('disabled',true);
    $(".ncf_type_id").hide();
    $("#apply_ncf").click(function()
    {
        if($(this).is(":checked"))
        {
            $("#ncf_type_id").prop('disabled',false);
            $(".ncf_type_id").show();
        }else
        {
            $("#ncf_type_id").prop('disabled',true);
            $(".ncf_type_id").hide();
        }

    });

    /**
     * Check if the qty is less has on the inventory
     * */
    $(document).on("change",".is_qty",function()
    {
        var obj = JSON.parse($(this).parent().parent().attr("data-product"));
        var stock = obj.stock;

        $(this).removeClass("bs-popover");
        $(this).removeAttr("data-original-title");
        $(this).removeAttr("data-content");

        //console.log("Estamos en algo");
        //getTotal();
    });

    /**
     * Removes the tr from the result table
     * */
    $(document).on("click","#products-list tbody tr td a",function(e)
    {
        e.preventDefault();
        var item  = JSON.parse($(this).parent().parent().attr("data-product"));

        for(var i=0;i<itbis_array.length;i++)
        {
            if(item.id == itbis_array[i][0])
            {
                itbis_array.splice(i,1);
                break;
            }
        }

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
           console.log("discount_na");

       }else
       {
            $(".is_percent").val(0);
            $(".is_percent").prop("disabled", true);
            $("#discount_div").show();
            var label = $("#discount_div label").html();
            if($(this).attr("id") == "discount_percent")
            {
               label = "Valor % ";
                $("#discount_total").prop("disabled", false);
            }else{
               label = "Valor RD$ ";
                if(array_is_same_values(itbis_array))
                {
                    $("#discount_total").prop("disabled", false);
                }else
                    $("#discount_total").prop("disabled", true);
            }

            $("#discount_div label").html(label);
            $("#discount_total").val("0.00");
       }
        getTotal();


    });

    /**
     * Hide the Search Table
     * */
    $('#search-table').hide();
    $(".radio_discount").click(function()
    {
       getTotal();
    });


    /**
     * Activando el campo del pago , segun el metodo de pago seleccionado
     * */
    $(document).on("change",'select.payments_methods',function()
    {
        if($(this).val()!=-1)
        {
            $(this).parent().find("input").prop('disabled',false);
        }else{
            $(this).parent().find("input").prop('disabled',true);
        }
    });


});

/**
 * ***********************
 * My Vars
 * ***********************
 * */
var discount        = 0;
var total           = 0;
var total_neto      = 0;
var total_itbis     = 0;
var total_discount  = 0;
var discount        = 0;
var value           = 0;
var same_discount   = false;
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
var itbis_array     = [];
/**
 * Display Total
 * Black Display
 * */
function getTotal()
{
    total                   = 0;
    total_neto              = 0;
    total_itbis             = 0;
    total_discount          = 0;
    same_discount           = false;

    $("#products-list tbody tr").each(function( key, value )
    {

        var item                    = JSON.parse($(value).attr("data-product"));
        var item_qty                = parseInt($("#qty-"+item.id).val());
        var item_price              = parseFloat($("#list_price-"+item.id).val());
        var item_total              = item_qty * item_price;
        var item_discount           = 0;
        var item_discount_percent   = 0;
        var itbis                   = parseFloat(item.itbis.value);
        var item_itbis              = 0;

        total               += item_qty * item_price;

        /**
         * Estos son los descuentos, primero debe tomar en cuenta
         * los descuentos que vienen del Input
         * */
        //if($("input.radio_discount:checked").val() == -1)
        //{
        //    /**
        //     * Si el input es diferente de CERO, entonces debe hacer el descuento
        //     * */
        //    if(parseFloat($("#discount-"+item.id).val()) > 0)
        //    {
        //        item_discount_percent   = parseFloat($("#discount-"+item.id).val());
        //        item_discount           = item_total * (item_discount_percent/100);
        //        item_total              = item_total - item_discount;
        //
        //    }else{
        //        /**
        //         * Descuento de la DB
        //         * */
        //        if(parseInt(item.discount_apply))
        //        {
        //            item_discount_percent   = parseFloat(item.discount);
        //            item_discount           = item_total * (item_discount_percent/100);
        //            item_total              = item_total - item_discount;
        //        }
        //    }
        //    total_discount  += item_discount;
        //}else{
        //    /**
        //     * Aqui es cuando se le aplica un descuento GRUPAL
        //     * */
        //    /**
        //     * Descuento por Porciento
        //     * */
        //    if($("input.radio_discount:checked").val() == 1)
        //    {
        //        item_discount_percent   = parseFloat($("#discount_total").val());
        //        item_discount           = item_total * (item_discount_percent/100);
        //        item_total              = item_total - item_discount;
        //        total_discount          += item_discount;
        //    }
        //}

        if($("#apply_itbis").is(":checked"))
        {
            item_itbis          = item_total * itbis/100;
            item_total          = item_total + item_itbis;
            total_itbis         += item_itbis;
        }

        total_neto          += item_total;

    });

    /**
     * Este caso es cuando el descuento es por monto
     * fijo.
     * */
    //if($("input.radio_discount:checked").val() == 2 )
    //{
    //    if(array_is_same_values(itbis_array))
    //    {
    //        $("#discount_total").prop('disabled',false);
    //        total_neto = total_neto - parseFloat($("#discount_total").val());
    //    }
    //    else
    //    {
    //        $("#discount_total").prop('disabled',true);
    //    }
    //}

    /**
     * Black Display
     * */
    var string = numeral(total).format('0,0.00');
    $("#cashier").val("RD$ "+(string));

    /**
     * Yellow
     * */
    getTotalWTaxes();

    if(total_neto > 0)
        $("input[type=submit]").prop("disabled", false);
    else
        $("input[type=submit]").prop("disabled", true);
}

/**
 * Display Tota w/ Taxes
 * Yellow Display
 * */
function getTotalWTaxes()
{
    var string = numeral(total_neto).format('0,0.00');
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