@extends('layouts.layout')
@section('title', 'Create Budget')
@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center"><h4>Gestión de Presupuestos</h4></div>
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="">
                <h4>Registro de Presupuesto</h4>
              </div>
              <div class="">
                <a href="{{ url('budgets') }}" class="btn btn-info"><i class="fa fa-eye fa-lg"></i> Mostrar todos</a>
              </div>
            </div><hr>

            {{ Form::open(['url' => 'budgets', 'class' => 'forms']) }}

              @csrf
              <div class="row">
                @include('budget.form')
              </div>

            {{ Form::close() }}

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
