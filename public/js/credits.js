'use strict';

$(function()
{
    $( ".datepicker" ).datepicker({
        //defaultDate: +7,
        showOtherMonths:true,
        autoSize: true,
        appendText: '<span class="help-block">(dd/mm/aaaa)</span>',
        dateFormat: 'dd/mm/yy',
        monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
        dayNames: [ "Dominto", "Lunes", "Martes", "Miéoles", "Jueves", "Viernes", "Sáado" ],
        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ]
    });

    $('.inlinepicker').datepicker({
        inline: true,
        showOtherMonths:true
    });

    /**
     * If input qty changes, recalculate the total
     * */
    $(document).on("change","input[type=number]",function()
    {
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
    /**
     * Boton para agregar mas metodos de pagos.
     * */
    var divClone = new $("#payments").parent().find(".payments");

    $("#add_payments").click(function(e)
    {
        e.preventDefault();
        var new_div_cloned;
        $("#payments").append(

            new_div_cloned = $(divClone).clone(true).append(
                $("<a>").attr("href","#").addClass("removePayment").html(" Remover")
            )
        );
        new_div_cloned.find("input").val(0);
        new_div_cloned.find("input").prop("disabled",true);
        console.log($(divClone).find("input").val());
    });
    $(document).on("click",".removePayment",
        function(e){
            e.preventDefault();
            $(this).parent().remove();
        }
    );
    /**
     * Client Selector, si el cliente es N/A entonces debe poder agregar un cliente nuevo.
     * */
    $("#client_id").change(function(e)
    {
        e.preventDefault();
        if($(this).val() > -1)
        {
            //$(".client_info").hide();
            $("input[name=client_name] ").val($(this).find("option:selected").text());
            $("input[name=rnc] ").val($(this).find("option:selected").attr("data-rnc-value"));

            $("input[name=client_name]").prop("disabled",true);
            $("input[name=rnc]").prop("disabled",true);
        }else{
            $("input[name=client_name]").prop("disabled",false);
            $("input[name=rnc]").prop("disabled",false);

            $("input[name=client_name]").val("");
            $("input[name=rnc]").val("");
            //$(".client_info").show();
        }
        //console.log($(this).val());
    });


    /**
     * Submit Form
     * */
    $("form#operation_form input[type=submit]").click(function(e)
    {
        e.preventDefault();
        var form  = $("form#operation_form");
        total_payments = 0;
        $("#payments .payments").each(function()
        {
            total_payments += parseFloat($(this).find("input").val());
        });

        /**
         * Si no esta a credito
         * */
        if(!$("#to_credit").is(":checked"))
        {
            if (total_payments < numeral(total_neto).format('0,0.00'))
            {
                bootbox.dialog({
                    message: "El pago está incompleto, favor de completarlo.",
                    title: "Pago incompleto",
                    buttons: {
                        danger: {
                            label: "Entendido",
                            className: "btn-danger"
                        }
                    }
                });
                return false;
            }
        }
        form.submit();
    });

    //$("#payments .payments input").focusout(function()
    //{
    //    total_payments = 0;
    //    $("#payments .payments").each(function()
    //    {
    //        total_payments += parseFloat($(this).find("input").val());
    //    });
    //    console.log(total_payments);
    //    var total =   total_payments - total_neto;
    //    $("#refound span").html(numeral(total).format('0,0.00'));
    //});

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
var total_payments  = 0;
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





    /**
     * Black Display
     * */
    //var string = numeral(total).format('0,0.00');
    //$("#cashier").val("RD$ "+(string));

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