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
        bootbox.confirm("Hello world!",function(result)
        {
            if(result)
                location.href = route;
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