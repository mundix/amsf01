var itbis_general = 0.00;
var ncf = "";
var base_url = "";
$(function(){
    base_url = $("#base_url").val()+"/";
    $.ajax({
        url: 'get_config',
    }).done(function( data ) {
        itbis_general = parseFloat(data.itbis_generals[0].value)/100;
        //ncf = data.ncf[0].ncf.prefix + data.ncf[0].sequency;
    });


    /**
     * Delete Functions for everything
     * */
    $(document).on('click','.delete_entity',function(e)
    {
        e.preventDefault();
        var route = $(this).attr('data-entity-route');
        bootbox.confirm("Desea eleiminar este registro ?",function(result)
        {
            if(result)
                location.href = route;
        });

    });
    /**
     * Reset Functions for everything
     * */
    $(document).on('click','.reset_entity_password',function(e)
    {
        e.preventDefault();
        var route = $(this).attr('data-entity-route');
        bootbox.dialog({
            message: "Desea resetar su cuenta?",
            title: "Restaurar cuenta",
            buttons: {
                main: {
                    label: "Aceptar",
                    className: "btn-primary",
                    callback: function() {
                        //location.href = route;
                        //console.log(route);
                        $.ajax({
                            url:route,
                            type:"GET",
                            dataType:"json",
                            success:function(data)
                            {
                                if(data.success)
                                {
                                    bootbox.dialog({
                                        message: "El usuario fue restablecido.",
                                        title: "Retablecimiento de usuario.",
                                        buttons: {
                                            danger: {
                                                label: "Entendido",
                                                className: "btn-success"
                                            }
                                        }
                                    });
                                }else
                                {
                                    bootbox.dialog({
                                        message: "No se pudo restablecer su usuario.",
                                        title: "Restauración de usario.",
                                        buttons: {
                                            danger: {
                                                label: "Entendido",
                                                className: "btn-danger"
                                            }
                                        }
                                    });
                                }

                            },
                            error:function(data)
                            {
                                console.log("Error:",data);
                            }
                        })
                    }
                }
            }
        });
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
        //console.log($(divClone).find("input").val());
    });
    $(document).on("click",".removePayment",
        function(e){
            e.preventDefault();
            $(this).parent().remove();
        }
    );

    /**
     * Modal
     * */
    $(document).on("click",".open-modal",function(e)
    {
        e.preventDefault();
        $(".modal-container").css("display","block");
    });

    $(document).on("click",".btn-close-modal",function(e)
    {
        $(".modal-container").css("display","none");
    });

    /**
     * Making Payments to order
     * */
    $(document).on("click",".btn-make-payments",function(e)
    {
        e.preventDefault();
        var total = 0;
        $("#payments input[type=number]").each(function()
        {
            if(!$(this).is(":disabled") && $(this).val()>0)
            {
                total += parseFloat($(this).val());
            }
        });
        if(!(total>0))
        {
            bootbox.dialog({
                message: "La suma de los pagos debe ser mayor a RD$ 0.00",
                title: "Procesando pago.",
                buttons: {
                    danger: {
                        label: "Entendido",
                        className: "btn-danger"
                    }
                }
            });
            return;
        }
        //$("#payment-modal").submit();
        $.ajax({
            url:base_url+"received.payments",
            type:"POST",
            dataType:"json",
            data:$("#payment-modal").serialize(),
            beforeSend:function()
            {
                $("#custom-loading").css("display","block");

            },
            success:function(data)
            {
                console.log("Success",data);

                if(data.success)
                {
                    $(".modal-container").css("display","none");
                    $("#custom-loading").css("display","none");
                    clearPaymentsModal();

                    bootbox.dialog({
                        message: "Su pago fue generado exitosamente.",
                        title: "Procesando pago.",
                        buttons: {
                            success: {
                                label: "Entendido",
                                className: "btn-success",
                                callback: function()
                                {
                                    location.reload();
                                }
                            }
                        }
                    });
                }else
                {
                    $("#custom-loading").css("display","none");
                    bootbox.dialog({
                        message: "Hubo un error en el pago.",
                        title: "Procesando pago.",
                        buttons: {
                            danger: {
                                label: "Entendido",
                                className: "btn-danger"
                            }
                        }
                    });
                }
            },
            error:function(data)
            {
                $(".modal-container").css("display","none");
                $("#custom-loading").css("display","none");
                clearPaymentsModal();
                bootbox.dialog({
                    message: "Hubo un error en el proceso de pago interno.",
                    title: "Procesando pago.",
                    buttons: {
                        danger: {
                            label: "Entendido",
                            className: "btn-danger"
                        }
                    }
                });
                console.log(data)
            }
        });
    });


});


function array_is_same_values(arr)
{
    var first = arr[0];
    for(var i=0; i< arr.length;i++)
    {
        if(first[1]!=arr[i][1])
            return false;
    }
    return true;
}

function globalCharts()
{
    anualSales();
}

function anualSales()
{

        // Sample Data
        var d1 = [[1262304000000, 0], [1264982400000, 500], [1267401600000, 700], [1270080000000, 1300], [1272672000000, 2600], [1275350400000, 1300], [1277942400000, 1700], [1280620800000, 1300], [1283299200000, 1500], [1285891200000, 2000], [1288569600000, 1500], [1291161600000, 1200]];
        var data1 = [
            { label: "Total clicks", data: d1, color: App.getLayoutColorCode('blue') }
        ];

        $.plot("#chart_filled_blue", data1, $.extend(true, {}, Plugins.getFlotDefaults(), {
            xaxis: {
                min: (new Date(2009, 12, 1)).getTime(),
                max: (new Date(2010, 11, 2)).getTime(),
                mode: "time",
                tickSize: [1, "month"],
                monthNames: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                tickLength: 0
            },
            series: {
                lines: {
                    fill: true,
                    lineWidth: 1.5
                },
                points: {
                    show: true,
                    radius: 2.5,
                    lineWidth: 1.1
                },
                grow: { active: true, growings:[ { stepMode: "maximum" } ] }
            },
            grid: {
                hoverable: true,
                clickable: true
            },
            tooltip: true,
            tooltipOpts: {
                content: '%s: %y'
            }
        }));


}

/**
 * Clear Payments
 * */
function clearPaymentsModal()
{
    $(".removePayment").each(function(){
       $(this).parent().remove();
    });
}