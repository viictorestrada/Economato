@extends('layouts.layout')
@section('title', 'Edit Provider')
@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center"><h4>Gestión de Proveedores</h4></div>
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="">
                <h4>Editar Proveedor</h4>
              </div>
              <div class="">
                <a href="{{ url('providers') }}" class="btn btn-info"><i class="fa fa-eye"></i> Mostrar todos</a>
              </div>
            </div><hr>

            {{ Form::model($provider, ['url' => ['providers', $provider->id], 'class' => 'forms', 'method' => 'PATCH']) }}

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
