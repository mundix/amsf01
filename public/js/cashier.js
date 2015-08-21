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
        //Este es un servicio de angular, para hacer las peticione de ajax.
        $http.get('products.search',{
            params: {search:$scope.searchInput}
        }).success(function(data){
            $scope.products = data;
        })
    };
});
var total = 0;
var itbis = 18/100;
var total_itbis = 0;
var sub_total = 0;
var value = 0;

$(function()
{
    $("#cashier").val("RD$ 0.00");
    $("#subtotal").val("RD$ 0.00");
    $(document).on("click","#resultlist a",function(e)
    {
        total = 0;
        e.preventDefault();

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
                    $("<td>").text(obj.stock),
                    $("<td>").append($("<input>").attr('id', "qty-" + obj.id).attr("type", 'number').attr("min", 1).attr("value", 1)),
                    $("<td>").append($("<a>").append($("<i>").attr("class"," icon-remove")))
                )
            );
        }else{
                var qty = ($("#qty-"+id).val());
                qty ++;
                $("#obj-"+id).find("input").val(qty);
        }
        getTotal();
       //console.log(obj.name);
    });

    $(document).on("change","input[type=number]",function(e)
    {
        getTotal();
    });

    $(document).on("click","#products-list tbody tr td a",function(e)
    {
        e.preventDefault();
        $(this).parent().parent().remove();
        getTotal();
    });

    /**
     * Click on a checkbox if apply itbis is checked or not
     * */
    $("#apply_itbis").click(function(){
        if($(this).is(":checked"))
        {
            console.log("aplicaste itbis");
        }else{
            console.log("No aplica itbis");
        }
        getTotal();

    });

    /**
     * Discount Radio Select
     * */
    $("input[type=radio]").click(function(e)
    {
       if($(this).attr("id") == "discount_na")
       {
        //$("#discount_amount").attr("disabled","disabled");
           $("#discount_total").prop("disabled", true);
           $("#discount_div").hide();

       }else
       {
        //console.log($(this).attr("id"));
           $("#discount_div").show();
           $("#discount_total").val("");
            $("#discount_total").prop("disabled", false);
       }
    });



});
/**
 * Display Total
 * */
function getTotal()
{
    total = 0;
    $("#products-list tbody tr").each(function( key, value )
    {
        var obj = JSON.parse($(value).attr("data-product"));
        var qty = parseInt($("#qty-"+obj.id).val());
        total  += obj.price*qty;
    });
    getTotalWTaxes();
    var string = numeral(total).format('0,0.00');
    $("#cashier").val("RD$ "+(string));
}
/**
 * Display Tota w/ Taxes
 * */
function getTotalWTaxes()
{
    total_itbis = 0;
    $("#products-list tbody tr").each(function( key, value )
    {
        var obj = JSON.parse($(value).attr("data-product"));
        var qty = parseInt($("#qty-"+obj.id).val());
        total_itbis  += obj.price*qty;
    });
    if($("#apply_itbis").is(":checked"))
    {
        total_itbis = total_itbis+total_itbis*itbis;
    }
    var string = numeral(total_itbis).format('0,0.00');
    $("#subtotal").val("RD$ "+(string));

}