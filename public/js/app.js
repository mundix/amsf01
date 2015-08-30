var itbis = 0.00;
var ncf = "";
$(function(){
    $.ajax({
        url: 'get_config',
    }).done(function( data ) {
        itbis = parseFloat(data.itbis_generals[0].value)/100;
        ncf = data.ncf[0].ncf.prefix + data.ncf[0].sequency;
    });
});