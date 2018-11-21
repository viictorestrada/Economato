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

            {{ Form::open(['url' => 'contracts', 'class' => 'forms', 'id' => 'createContracts', 'enctype'=>'multipart/form-data']) }}


            <div class="row">
              @include('contracts.form')
            </div>

            {{ Form::close() }}

          </div>
        </div>
      </div>
    </div>
  </div>
  {{ Form::open(['url' => 'contractsImport', 'class' => 'forms', 'enctype'=>'multipart/form-data' ,'id' => 'createProduct']) }}
          <div class="form-group col-lg-4 col-md-4">

            {{ Form::file('contractsImportName') ,['class'=>'custom-file-input form-control', 'id'=>'customFileLang' ] }}
        </div>
            <div class="d-flex justify-content-end form-group col-md-12 col-lg-12">
      <button type="submit" class="btn btn-outline-info"><i class="fa fa-save fa-lg"></i> Guardar</button>
    </div>

        {{ Form::close() }}
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
            digits:true,
            maxlength: 25
          },
          start_date: {
            required: true,
            date: true
          },
          finish_date: {
            required: true,
            date: true,
            fechas: true
          },
           unitVal: {

            min: 1
          },
          quantity: {

            min: 1
          }
        },
        messages: {
          provider_id: {
            required: "Debes seleccionar un proveedor."
          },
          contract_number: {
            required: "El campo Número de contrato es obligatorio.",
            digits: "El campo Número de contrato debe ser numérico.",
            maxlength: "El campo Número de Contrato debe contener máximo 25 caracteres."
          },
          contract_price: {
            digits: "El valor del contrato deber ser numérico.",
            required: "El campo Valor Contrato es obligatorio.",
            maxlength: "El campo Valor contrato debe contener máximo 25 caracteres."
          },
          start_date: {
            required: "El campo Fecha inicial es obligatorio.",
            date: "El campo debe ser una fecha válida."
          },
          finish_date: {
            required: "El campo fecha final es obligatorio.",
            date: "El campo debe ser una fecha válida.",
            fechas: "La fecha inicial es mayor o igual a la final."
          },
          unitVal: {
            number: "El valor unitario deber ser numérico.",
            min: "El valor unitario debe ser mayor a 0"
          },
          quantity: {
            number: "El cantidad deber ser numérico.",
            min: "La cantida debe ser mayor a 0"
          }
        }
      });
    });

  function calculations(id)
  {
    var quantity = $('.cantidad').val();
    var unit_price = $('.precio_unitario').val();
    var measure_unit=$('.unidad').val();
    var total_without_tax = (quantity)*unit_price;
    $('.subtotal').val(total_without_tax);
    var tax = $(".tax option:selected").text();
    var iva_value=((tax*total_without_tax)/100);
    $('.valor_iva').val(iva_value);
    var total=iva_value+total_without_tax;
    $('.total').val(total);
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
