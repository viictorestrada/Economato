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

            {{ Form::open(['url' => 'contracts', 'class' => 'forms']) }}

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
