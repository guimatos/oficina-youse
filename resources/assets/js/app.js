window.$ = window.jQuery = require('jquery');
require('materialize-css/dist/js/materialize');
require('jquery-mask-plugin/dist/jquery.mask');

$(document).ready(function(){
    $('.sidenav').sidenav();

    let SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };


    $('#vehicle_plate').mask('SSS-0000');
    $('#office_telephone').mask(SPMaskBehavior, spOptions);
    $('#office_document').keydown(function(){
        try {
            $("#office_document").unmask();
        } catch (e) {}

        var size = $("#office_document").val().length;

        if(size < 11){
            $("#office_document").mask("999.999.999-99");
        } else if(size >= 11){
            $("#office_document").mask("99.999.999/9999-99");
        }

        // ajustando foco
        var elem = this;
        setTimeout(function(){
            // mudo a posição do seletor
            elem.selectionStart = elem.selectionEnd = 10000;
        }, 0);
        // reaplico o valor para mudar o foco
        var currentValue = $(this).val();
        $(this).val('');
        $(this).val(currentValue);
    });

    $('.close').on('click', function(){
        $(this).parent().parent().remove();
    });
});