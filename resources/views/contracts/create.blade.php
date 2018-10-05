@extends('layouts.layout')
@section('title', 'Create Contract')
@section('content')
  <div class="container-fluid">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center"><h4>Contratos</h4></div>
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="">
                <h4>Registro de Contrato</h4>
              </div>
              <div class="">
                <a href="{{ url('contracts') }}" class="btn btn-outline-info"><i class="fa fa-eye fa-lg"></i> Mostrar Contratos</a>
              </div>
            </div><hr>

            {{ Form::open(['url' => 'contracts', 'class' => 'forms', 'id' => 'createContracts']) }}


            <div class="row">
              @include('contracts.form')
            </div>

            {{ Form::close() }}

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('script')
  <script>

    function validationBudget(value){
      $.ajax({
        url: "{{ url('validation'). '/' }}"+value,
        type: 'get',
        dataType : 'JSON'
      }).done(function(data){
        console.log(data)
        if (data.length!==0){
          var budget=number_format(data[0].data);
         if(data[0].status==="false"){
          swal('Presupuesto actual: '+ budget+ '' ,'El valor del contrato sobrepasa el presupuesto.','error');
          $( "#createContract" ).prop( "disabled", true );
          }else if(data[0].status==="null"){
          swal('Registre un presupuesto','No se encuentra un presupuesto registrado.','error');
          $( "#createContract" ).prop( "disabled", true );
        }else{
          $( "#createContract" ).prop( "disabled", false );
        }
        }else{
          $( "#createContract" ).prop( "disabled", false );
        }

      }).fail(function(data) {
        console.log("fail ")
      })
  }
  function number_format(amount,decimals) {
    amount += '';
    amount = parseFloat(amount.replace(/[^0-9\.]/g, ''));
    if (isNaN(amount) || amount === 0)
        return parseFloat(0).toFixed(decimals);
    amount = '' + amount.toFixed(decimals);
    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;
    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');
    return amount_parts.join('.');
}

    var initial_date = 0
    var final_date = 0
    $('#start_date').change(function(){
         initial_date = $('#start_date').val();
    });

    $('#final_date').change(function(){
         final_date = $('#final_date').val();

    });

    $(() => {
      $.validator.addMethod('fechas', function (value, element) {
        return this.optional(element) || moment(initial_date).isBefore(final_date);
      });
      $('#createContracts').validate({
        rules: {
          provider_id: {
            required: true
          },
          contract_number: {
            required: true,
            digits: true,
            maxlength: 25
          },
          contract_price: {
            required: true,
            number: true,
            maxlength: 25
          },
          start_date: {
            required: true,
            date: true,
          },
          finish_date: {
            required: true,
            date: true,
            fechas: true
          },
        },
        messages: {
          provider_id: {
            required: "Debes seleccionar un proveedor."
          },
          contract_number: {
            required: "El campo Número de Contrato es obligatorio.",
            digits: "El campo Número de Contrato debe ser numerico.",
            maxlength: "El campo Número de Contrato debe contener máximo 25 caracteres."
          },
          contract_price: {
            required: "El campo Valor Contrato es obligatorio.",
            digits: "El campo Valor Contrato debe ser numerico.",
            maxlength: "El campo Valor Contrato debe contener máximo 25 caracteres."
          },
          start_date: {
            required: "El campo Fecha inicial es obligatorio.",
            date: "El campo debe ser una fecha válida.",
          },
          finish_date: {
            required: "El campo Fecha final es obligatorio.",
            date: "El campo debe ser una fecha válida.",
            fechas: "La fecha inicial es mayor o igual a la final."
          }
        }
      });
    });

function calculations(id)
{
  console.log(id)
  var quantity = $('.cantidad').val();
  var unit_price = $('.precio_unitario').val();
  var measure_unit=$('.unidad').val();
  var total_without_tax = (quantity)*unit_price;
  console.log(total_without_tax);
  $('.subtotal').val(total_without_tax);
  var tax = $(".tax option:selected").text();
  var iva_value=((tax*total_without_tax)/100);
  $('.valor_iva').val(iva_value);
  var total=iva_value+total_without_tax;
  $('.total').val(total);
  console.log(tax);
  var tax_value = unit_price*(tax/100);
  var total = (unit_price + tax_value)*quantity;
}
  </script>

<script>

      {{ Form::select('product_id[]', $products, null, ['class' => 'form-control', 'placeholder' => '-- Seleccione Producto --', 'onchange="chargeMeasureUnit(this)"']) }}
      {{ Form::select('taxes_id', $taxes, null, ['class' => 'form-control tax', 'onchange' => "calculations(this)", 'placeholder' => 'IVA' ]) }}


  $(document).ready(function(){
      {{ Form::select('product_id', $products, null, ['class' => 'form-control', 'onchange="(chargeMeasureUnit(this))"', 'placeholder' => '-- Seleccione Producto --']) }}
      {{ Form::select('taxes_id', $taxes, null, ['class' => 'form-control','onchange' => "calculations(this)", 'placeholder' => 'IVA']) }}
      $(document).on('click', '.remove', function(){
      $(this).closest('tr').remove();
    });

  });
</script>

@endsection
