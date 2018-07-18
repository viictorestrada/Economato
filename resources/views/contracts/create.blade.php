@extends('layouts.layout')
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
                <a href="{{ url('contracts') }}" class="btn btn-info"><i class="fa fa-eye fa-lg"></i> Mostrar Contratos</a>
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
    $(() => {
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
          contract_date: {
            required: true,
            date: true
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
          contract_date: {
            required: "El campo Fecha es obligatorio.",
            date: "El campo debe ser una fecha válida."
          },
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

//  <tr>
//         <td>{{ Form::select('product_id[]', $products, null, ['class' => 'form-control', 'placeholder' => '-- Seleccione Producto --', 'onchange="chargeMeasureUnit(this)"']) }}</td>
//         <td class="tdUnit"><input type="text" class="form-control unidad" readonly></td>
//         <td><input type="text" name="quantity[]" onkeypress="onlyNumbers()" class="form-control cantidad" placeholder="Cantidad" onchange="calculations(this)"></td>
//         <td><input type="number" name="unit_price[]" class="form-control precio_unitario" onkeypress="onlyNumbers()" onchange="calculations(this)"></td>
//         <td><input type="number" name="total_with_tax[]" class="form-control subtotal" readonly></td>
//         <td>{{ Form::select('taxes_id', $taxes, null, ['class' => 'form-control tax', 'onchange' => "calculations(this)", 'placeholder' => 'IVA' ]) }}</td>
//         <td><input type="number" name="tax_value[]" class="form-control valor_iva" readonly></td>
//         <td><input type="number" name="total[]" class="form-control total" readonly></td>
//       </tr>


  $(document).ready(function(){
    // $(document).on('click', '.add', function(){
    //   var html = `<tr>
    //     <td>{{ Form::select('product_id', $products, null, ['class' => 'form-control', 'onchange="(chargeMeasureUnit(this))"', 'placeholder' => '-- Seleccione Producto --']) }}</td>
    //     <td class="tdUnit"><input type="text" name="quantity[]" onkeypress="onlyNumbers()" class="form-control unidad" readonly></td>
    //     <td><input type="text" name="cantidad[]" onkeypress="onlyNumbers()" class="form-control cantidad"  placeholder="Cantidad" onchange="calculations(this)"></td>
    //     <td class="tdprecio"><input type="number" name="ValoPres[]" class="form-control precio_unitario" onchange="calculations(this)"></td>
    //     <td class="tdprecio"><input type="number" name="ValoPres[]" class="form-control" readonly></td>
    //     <td>{{ Form::select('taxes_id', $taxes, null, ['class' => 'form-control','onchange' => "calculations(this)", 'placeholder' => 'IVA']) }}</td>
    //     <td class="tdprecio"><input type="number" name="ValoPres[]" class="form-control valor_iva" readonly></td>
    //     <td class="tdprecio"><input type="number" name="ValoPres[]" class="form-control total" readonly></td>
    //     <td><button type="button" name="remove" class="btn btn-danger remove"><i class="fa fa-times-circle"></i></button></td>
    //   </tr>`;
    //   $('tbody').append(html);
    // });
    $(document).on('click', '.remove', function(){
      $(this).closest('tr').remove();
    });

  });
</script>

@endsection
