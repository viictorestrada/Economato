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

            <form action="{{ url('users') }}" method="POST" class="forms">

              @csrf
              <div class="row">
                @include('users.form')
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
