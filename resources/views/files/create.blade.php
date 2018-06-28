@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center"><h4>Fichas</h4></div>
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="">
                <h4>Registro de Fichas</h4>
              </div>
              <div class="">
                <a href="{{ url('files') }}" class="btn btn-info"><i class="fa fa-eye fa-lg"></i> Mostrar Fichas</a>
              </div>
            </div><hr>

            {{ Form::open(['url' => 'files', 'class' => 'forms', 'id' => 'createFiles']) }}

            @csrf
            <div class="row">
              @include('files.form')
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
      $('#createFiles').validate({
        rules: {
          program_id: {
            required: true
          },
          characterization_id: {
            required: true
          },
          file_number: {
            required: true,
            digits: true,
            maxlength: 25
          },
          file_route: {
            required: true,
            maxlength: 30
          },
          apprentices: {
            required: true,
            digits: true,
            maxlength: 25
          },
        },
        messages: {
          program_id: {
            required: "Debes elegir un Programa de Formación.",
          },
          characterization_id: {
            required: "Debes elegir una Caracterización.",
          },
          file_number: {
            required: "El campo Número de Ficha debe existir.",
            digits: "El campo Número de Ficha debe ser numérico.",
            maxlength: "El campo Número de Ficha debe contener máximo 25 caracteres."
          },
          file_route: {
            required: "El campo Ruta de Aprendizaje debe existir.",
            maxlength: "El campo Ruta de Aprendizaje debe contener máximo 30 caracteres."
          },
          apprentices: {
            required: "El campo Aprendices debe existir.",
            digits: "El campo Aprendices debe ser numérico.",
            maxlength: "El campo Aprendices debe contener máximo 25 caracteres."
          },
        }
      });
    });
  </script>
@endsection
