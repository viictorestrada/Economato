//Función para que solo reciba numeros
function onlyNumbers() {
    if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
}

// function chargeMeasureUnit(id) {
//     $.get(`/contract/measure_unit/${event.target.value}`, function(element) {
//         $(id).parent().parent().children('.tdUnit').children('.unidad').val(element[0]);
//     });
// }

function chargeMeasureUnit(id) {
  $.get(`/contract/measure_unit/${event.target.value}`, function(element) {
    $('.unidad').val(element[0])
  });
}
$(document).ready(function () {
    $(document).on('click', '.add', function(){
      $('#tableContracts').append(
        `<tr>
                  <td><input type="hidden" name="products_id[]" class="form-control" value="`+$(".producto" ).val()+`">
                  <input type="text" name="" class="form-control" value="`+$(".producto option:selected" ).text()+`">
                </td>
                  <td><input type="text" name="measure_unit[]" class="form-control" value="`+$(".unidad").val()+`" readonly></td>

                  <td><input type="text" name="quantity[]" onkeypress="onlyNumbers()" value="`+$(".cantidad").val()+`" class="form-control" placeholder="Cantidad"  onchange="calculations(this)"></td>

                  <td><input type="number" name="unit_price[]" class="form-control "onchange="calculations(this)" value="`+$(".precio_unitario").val()+`" onkeypress="onlyNumbers()"></td>

                  <td><input type="number" name="total_with_tax[]" class="form-control" value="`+$(".subtotal").val()+`" readonly></td>

                  <td><input type="hidden" name="taxes_id[]" class="form-control" value="`+$(".tax" ).val()+`">
                  <input type="text" name="" class="form-control" value="`+$(".tax option:selected" ).text ()+`"></td>

                  <td><input type="number" name="tax_value[]" class="form-control" value="`+$(".valor_iva").val()+`" readonly></td>

                  <td><input type="number" name="total[]" class="form-control" value="`+$(".total").val()+`" readonly></td>

                  </tr>`
                );
    });
});

