var itbis = 0.00;
$(function(){
    $.ajax({
        url: 'get_config',
    }).done(function( data ) {
        itbis = parseFloat(data.itbis_generals[0].value)/100;
    });
});