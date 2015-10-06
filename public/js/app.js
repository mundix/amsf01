var itbis_general = 0.00;
var ncf = "";

$(function(){
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
                        location.href = route;
                    }
                }
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