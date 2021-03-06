@extends('layouts.layout')
@section('title', 'Edit File')
@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center"><h4>Fichas</h4></div>
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="">
                <h4>Editar Ficha</h4>
              </div>
              <div class="">
                <a href="{{ url('files') }}" class="btn btn-outline-info"><i class="fa fa-eye fa-lg"></i> Mostrar Fichas</a>
              </div>
            </div><hr>

            {{ Form::model($file, ['url' => ['files', $file->id], 'class' => 'forms', 'method' => 'PATCH', 'id' => 'editFiles']) }}

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
      $.validator.addMethod('fecha_actual', function (value, element) {
        return this.optional(element) || moment(moment()).isBefore(value);
      });
      $('#editFiles').validate({
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
          start_date:{
            required: true,
            date: true
          },
          finish_date:{
            required: true,
            date: true,
            fecha_actual: true
          }
        },
        messages: {
          program_id: {
            required: "Debes elegir un Programa de Formación.",
          },
          characterization_id: {
            required: "Debes elegir una Caracterización.",
          },
          file_number: {
            required: "El campo Número de Ficha es obligatorio.",
            digits: "El campo Número de Ficha debe ser de tipo numérico.",
            maxlength: "El campo Número de Ficha debe contener máximo 25 caracteres."
          },
          file_route: {
            required: "El campo Ruta de Aprendizaje es obligatorio.",
            maxlength: "El campo Ruta de Aprendizaje debe contener máximo 30 caracteres."
          },
          apprentices: {
            required: "El campo Aprendices es obligatorio.",
            digits: "El campo Aprendices debe ser de tipo numérico.",
            maxlength: "El campo Aprendices debe contener máximo 25 caracteres."
          },
          start_date:{
            required: "El campo fecha de inicio es obligatorio",
            date: "Ingrese una fecha valida"
          },
          finish_date:{
            required: "El campo fecha final es obligatorio",
            date: "ingrese una fecha valida",
            fecha_actual: "La fecha final es menor a la fecha actual"
          }
        }
      });
    });
  </script>
@endsection
