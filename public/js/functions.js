//Función para que solo reciba numeros
function onlyNumbers() {
    if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
}


//Función para actualizar los estados de la solicitud
function managmentOrder(id,status)
{
  if(status==2){
  swal({
    title: "Confirmar Solicitud.",
    text: "¿Está seguro de realizar el pedido?",
    type: "info",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Confirmar.",
    cancelButtonText: "Cancelar.",
    closeOnConfirm: false,
    closeOnCancel: false
  }).then((result) => {
    if (result.value) {
        $.get(`/orders/updateStatus/${id}/${status}`, function(data){
          if(data.status==="updateTrue")
           swal('Pedido Realizado','El taller ha sido solicitado.','success').then(function (){
            location.reload();
           })
          else if(data.status==="updateFalse") {
            swal('Modifique la solicitud','Por favor modifique la solicitud para conocer el número de paquetes por receta.','error')
            // .then(function (){
              // location.reload();
            //  })
          }
        });
      }
    })
}else if(status==0){
  swal({
    title: "Rechazar Solicitud.",
    text: "¿Está seguro de rechazar la solicitud?",
    type: "error",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Confirmar.",
    cancelButtonText: "Cancelar.",
    closeOnConfirm: false,
    closeOnCancel: false
  }).then((result) => {
    if (result.value) {
        $.get(`/orders/updateStatus/${id}/${status}`, function(data){
           swal('Pedido Rechazado','El taller ha sido rechazado.','success').then(function (){
            location.reload();
           });
        });
      } else {
        swal("Solicitud Cancelada", "La solicitud fue cancelada.", "error");
      }
    })
  }
}

function checkOrder()
{

  swal({
    title: "Consultando el valor a facturar.",
    text: "¿Esta seguro de solicitar el valor a facturar de estas ordenes?",
    type: "info",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Confirmar.",
    cancelButtonText: "Cancelar.",
    closeOnConfirm: false,
    closeOnCancel: false
  }).then((result) => {
    if (result.value) {

      swal('Consultando valor','En la ventana de entregas encontrará el valor a facturar.','info').
      then(function () {
        document.formCheck.submit();
      });
    }else{
      // var items=$('.factura');
      // console.log(items)
    }
    })
    return false;
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
      console.log($(".precio_unitario").val());
      if ($(".producto" ).val() == '' || $(".cantidad").val() == '' || $(".precio_unitario").val() == '') {
        toastr.warning('El contrato debe tener productos asociados');
      }
      else{
      $('#tableContracts').append(
        `<tr>
                  <td><input type="hidden" name="products_id[]" class="form-control" value="`+$(".producto" ).val()+`" readonly>
                  <input type="text" name="" class="form-control" value="`+$(".producto option:selected" ).text()+`" readonly>
                </td>
                  <td><input type="text" name="measure_unit[]" class="form-control" value="`+$(".unidad").val()+`" readonly></td>

                  <td><input type="text" name="quantity[]" onkeypress="onlyNumbers()" value="`+$(".cantidad").val()+`" class="form-control" placeholder="Cantidad"  onchange="calculations(this)" readonly></td>

                  <td><input type="number" name="unit_price[]" class="form-control "onchange="calculations(this)" value="`+$(".precio_unitario").val()+`" onkeypress="onlyNumbers()" readonly></td>

                  <td><input type="number" name="total_with_tax[]" class="form-control" value="`+$(".subtotal").val()+`" readonly></td>

                  <td><input type="hidden" name="taxes_id[]" class="form-control" value="`+$(".tax" ).val()+`" readonly>
                  <input type="text" name="" class="form-control" value="`+$(".tax option:selected" ).text ()+`" readonly></td>

                  <td><input type="number" name="tax_value[]" class="form-control" value="`+$(".valor_iva").val()+`" readonly></td>

                  <td><input type="number" name="total[]" class="form-control" value="`+$(".total").val()+`" readonly></td>

                  </tr>`
                );
                $(".unidad").val('');
                $(".cantidad").val('');
                $(".precio_unitario").val('');
                $(".subtotal").val('');
                $(".valor_iva").val('');
                $(".total").val('');
               }
    });
});

function confirmOrder()
{
  swal({
    title: "Confirmando solicitud",
    text: "¿Está seguro?",
    type: "info",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Confirmar.",
    cancelButtonText: "Cancelar.",
    closeOnConfirm: false,
    closeOnCancel: false
  }).then((result) => {
    if (result.value) {
        document.formulario1.submit()
  } else {
    swal("Solicitud Cancelada", "La solicitud fue cancelada.", "error");
  }
  })
  return false;
}

function chargeCharacterization(id){
$.get(`/order/${event.target.value}`,function(data){
  $('.characterization').val(data);
});
}

function changeStatusProductionOrder(id,status)
{
  if(status==3){
  swal({
    title: "Confirmar Solicitud.",
    text: "¿Está seguro de realizar el pedido al proveedor?",
    type: "info",
    showCancelButton: true,
    confirmButtonClass: "btn-outline-danger",
    confirmButtonText: "Confirmar.",
    cancelButtonText: "Cancelar.",
    closeOnConfirm: false,
    closeOnCancel: false
  }).then((result) => {
    if (result.value) {
        $.get(`/ProductionOrders/update/${id}/${status}`, function(data){
          if(data){
           swal('Pedido Realizado','El pedido ha sido solicitado al porveedor.','success').then(function (){
            location.reload();
           })
          }
          else{
            swal('Pedido Fallido','No se pudo realizar el pedido al proveedor.','error');
          }
        });
      }
      else{
        swal('Pedido Fallido','No se pudo realizar el pedido al proveedor.','error');
      }
    })
}else if(status==0){
  swal({
    title: "Rechazar Solicitud.",
    text: "¿Está seguro de rechazar la solicitud?",
    type: "error",
    showCancelButton: true,
    confirmButtonClass: "btn-outline-danger",
    confirmButtonText: "Confirmar.",
    cancelButtonText: "Cancelar.",
    closeOnConfirm: false,
    closeOnCancel: false
  }).then((result) => {
    if (result.value) {
        $.get(`/ProductionOrders/update/${id}/${status}`, function(data){
          if (data) {
            swal('Pedido Rechazado','El taller ha sido rechazado.','success').then(function (){
              location.reload();
             });
          }
          else {
            swal('Solicitud Fallida','No se pudo cambiar el estado.','error');
          }
           
        });
      } else {
        swal("Solicitud Cancelada", "La solicitud fue cancelada.", "success");
      }
    })
  }
  if(status==4){
    swal({
      title: "Confirmar Solicitud.",
      text: "¿El proveedor entregó el pedido?",
      type: "info",
      showCancelButton: true,
      confirmButtonClass: "btn-outline-success",
      confirmButtonText: "Confirmar.",
      cancelButtonText: "Cancelar.",
      closeOnConfirm: false,
      closeOnCancel: false
    }).then((result) => {
      if (result.value) {
          $.get(`/ProductionOrders/update/${id}/${status}`, function(data){
            if(data){
             swal('Pedido Realizado','El pedido ha sido entregado.','success').then(function (){
              location.reload();
             })
            }else
            {
              swal('Solicitud fallida','No se pudo realizar la solicitud.','error')
        }
      })
    }
        else{
          swal('Pedido Fallido','Aún no se ha entregado el pedido.','error')
        }
      })
  
        
  }
}



