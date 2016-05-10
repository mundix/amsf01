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

});