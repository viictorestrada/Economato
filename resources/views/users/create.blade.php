@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center"><h4>Gestión de Usuarios</h4></div>
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="">
                <h4>Registro de Usuarios</h4>
              </div>
              <div class="">
                <a href="{{ url('users') }}" class="btn btn-info"><i class="fa fa-eye fa-lg"></i> Mostrar todos</a>
              </div>
            </div><hr>

            {{ Form::open(['url' => 'users', 'class' => 'forms', 'id' => 'createUser']) }}

              @csrf
              <div class="row">
                @include('users.form')
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
      $('#createUser').validate({
        rules: {
          rol_id: {
            required: true
          },
          name: {
            required: true,
            maxlength: 45
          },
          last_name: {
            required: true,
            maxlength: 45
          },
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 6,
            maxlength: 16
          },
          password_confirmation: {
            equalTo: "#password"
          }
        },
        messages: {
          name: {
            required: "El campo Nombres es obligatorio.",
            maxlength: "El campo Nombres debe contener máximo 45 caracteres."
          },
          last_name: {
            required: "El campo Apellidos es obligatorio.",
            maxlength: "El campo Apellidos debe contener máximo 45 caracteres."
          },
          email: {
            required: "El campo Correo Electrónico es obligatorio.",
            email: "Debe ingresar una dirección de correo valida."
          },
          password: {
            required: "El campo Nombres es obligatorio.",
            minlength: "El campo Contraseña debe contener mínimo 6 caracteres.",
            maxlength: "El campo Contraseña debe contener máximo 16 caracteres."
          },
          password_confirmation: {
            equalTo: "Confirmar contraseña"
          }
        }
      });
    });
  </script>
@endsection
