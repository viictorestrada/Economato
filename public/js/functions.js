//Función para que solo reciba numeros
function onlyNumbers() {
    if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
}

function chargeMeasureUnit(id) {
    $.get(`measure_unit/${event.target.value}`, function(element) {
        $(id).parent().parent().children('.tdUnit').children('.unidad').val(element[1]);
    });
}