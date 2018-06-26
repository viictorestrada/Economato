@extends('layouts.layout')
@section('content')
  <div class="container">
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

            @csrf
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
            digits: true,
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
            required: "El campo Monto es obligatorio.",
            digits: "El campo Monto debe ser numerico.",
            maxlength: "El campo Monto debe contener máximo 25 caracteres."
          },
          contract_date: {
            required: "El campo Fecha es obligatorio.",
            date: "El campo debe ser una fecha válida."
          },
        }
      });
    });
  </script>
@endsection
