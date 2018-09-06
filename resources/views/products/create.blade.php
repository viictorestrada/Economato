@extends('layouts.layout')
@section('title', 'Create Product')
@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center"><h4>Gestión de Productos</h4></div>
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="">
                <h4>Registro de Productos</h4>
              </div>
              <div class="">
                <a href="{{ url('products') }}" class="btn btn-outline-info"><i class="fa fa-eye"></i> Mostrar todos</a>
              </div>
            </div><hr>

            {{ Form::open(['url' => 'products', 'class' => 'forms', 'id' => 'createProduct']) }}

              @csrf
              <div class="row">
                @include('products.form')
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
    $( document ).ready( () => {
    $("#createProduct").validate({
      rules: {
      product_code: {
        required: true,
        integer: true,
        minlength: 1
      },
      id_product_type: {
        required: true
      },
      product_name: {
        required: true,
        maxlength: 100
      },
      presentation_id: {
        required: true
      },
      id_measure_unit: {
        required: true
      }
    },
    messages: {
      product_code: {
        required: "El campo Código Producto es obligatorio",
        integer: "El campo Código Producto debe ser un número entero positivo",
        minlength: "El campo Código Producto debe contener mínimo 1 carácter"
      },
      id_product_type: {
        required: "El campo Tipo Producto es obligatorio"
      },
      product_name: {
        required: "El campo Nombre Producto es obligatorio",
        maxlength: "El campo Nombre Producto debe contener máximo 100 caracteres"
      },
      presentation_id: {
        required: "El campo Presentación es obligatorio"
      },
      id_measure_unit: {
        required: "El campo Unidad de Medida es obligatorio"
      }
    }
    });

    $('#base_price').change(function(){
      var base_price = $('#base_price').val();
      var tax = $('#tax option:selected').text();
      var final_price = (base_price)-(-base_price*(tax/100));
      $('#final_price').val(final_price);
    });

    $('#tax').change(function(){
      var base_price = $('#base_price').val();
      var tax = $('#tax option:selected').text();
      var final_price = (base_price)-(-base_price*(tax/100));
      $('#final_price').val(final_price);
    });

  });
  </script>
@endsection
