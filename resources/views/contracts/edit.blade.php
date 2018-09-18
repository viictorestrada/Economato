@extends('layouts.layout')
@section('title', 'Edit Contract')
@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center"><h4>Contratos</h4></div>
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="">
                <h4>Editar Contrato</h4>
              </div>
              <div class="">
                <a href="{{ url('files') }}" class="btn btn-outline-info"><i class="fa fa-eye fa-lg"></i> Mostrar Contrato</a>
              </div>
            </div><hr>

            {{ Form::model($contract, ['url' => ['contracts', $contract->id], 'class' => 'forms', 'method' => '
            ']) }}

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
