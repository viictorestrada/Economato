@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center"><h4>Gestión de Productos</h4></div>
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="">
                <h4>Registro de Productos</h4>
              </div>
              <div class="">
                <a href="{{ url('products') }}" class="btn btn-info"><i class="fa fa-eye"></i> Mostrar todos</a>
              </div>
            </div><hr>

            <form action="{{ url('products') }}" method="POST" class="forms">

              @csrf
              <div class="row">
                @include('products.form')
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
