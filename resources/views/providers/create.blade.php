@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center"><h4>Gestión de Proveedores</h4></div>
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="">
                <h4>Registro de Proveedores</h4>
              </div>
              <div class="">
                <a href="{{ url('providers') }}" class="btn btn-info"><i class="fa fa-eye"></i> Mostrar todos</a>
              </div>
            </div><hr>

            {{ Form::open(['url' => 'providers', 'class' => 'forms', 'id' => 'createProviders']) }}

              @csrf
              <div class="row">
                @include('providers.form')
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
      $('#createProviders').validate({
        rules: {
          provider_name: {
            string: true,
            required: true,
            maxlength: 30
          },
          nit: {
            required: true,
            digits: true,
            maxlength: 25
          },
          phone: {
            required: true,
            digits: true,
            maxlength: 25
          },
          address: {
            required: true,
            maxlength: 25
          },
          contact_name: {
            required: true,
            maxlength: 25
          },
          contact_last_name: {
            required: true,
            maxlength: 25
          },
        },
        messages: {
          provider_name: {
            string: "El campo Nombre Proveedor debe contener solamente caracteres alfabeticos.",
            required: "El campo Nombre Proveedor debe existir.",
            maxlength: "El campo Nombre Proveedor deber contener máximo 30 caracteres."
          },
          nit: {
            required: "El campo NIT debe existir.",
            digits: "El campo NIT debe ser numérico.",
            maxlength: "El campo NIT debe contener máximo 25 caracteres."
          },
          phone: {
            required: "El campo Teléfono debe existir.",
            digits: "El campo Teléfono debe ser numérico.",
            maxlength: "El campo Teléfono debe contener máximo 25 caracteres."
          },
          address: {
            required: "El campo Dirección debe existir."
          },
          contact_name: {
            required: "El campo Nombre de contacto debe existir.",
            maxlength: "El campo Nombre de Contacto debe contener máximo 25 caracteres"
          },
          contact_last_name: {
            required: "El campo Apellido de Contacto debe existir.",
            maxlength: "El campo Apellido de Contacto debe existir."
          }
        }
      });
    });
  </script>
@endsection
