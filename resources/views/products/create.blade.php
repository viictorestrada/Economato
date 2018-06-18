@extends('layouts.layout')
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
                <a href="{{ url('products') }}" class="btn btn-info"><i class="fa fa-eye"></i> Mostrar todos</a>
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
      },
      quantity: {
        required: true,
        integer: true,
        minlength: 1
      },
      due_date: {
        required: true
      },
      unit_price: {
        integer: true,
        minlength: 1
      },
      stock: {
        required: true,
        integer: true,
        minlength: 0
      }
    },
    messages: {
      product_code: {
        required: "El campo Código Producto es obligatorio",
        integer: "El campo Código Producto debe ser un número entero positivo",
        minlength: "El campo Código Producto debe ser mínimo 1"
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
      },
      quantity: {
        required: "El campo Cantidad es obligatorio.",
        integer: "El campo Cantidad debe ser un número entero positivo.",
        minlength: "El campo Cantidad debe ser mínimo 1."
      },
      due_date: {
        required: "El campo Fecha de Vencimiento es obligatorio"
      },
      unit_price: {
        integer: "El campo Precio Unitario deber un número entero positivo",
        minlength: "El valor debe ser mínimo 1."
      },
      stock: {
        required: "El campo Stock es obligatorio",
        integer: "El campo Stock debe ser un número entero positivo",
        minlength: "El valor del campo Stock debe ser 0 o superior"
      }
    }
    });
  });
  </script>
@endsection
