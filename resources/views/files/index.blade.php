@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center"><h4>Fichas</h4></div>
          <div class="card-body">
            <div class="col-12 d-flex justify-content-end">
              <div class="card-title"><h4>Lista de Fichas</h4></div><hr>
              <div><a type="button" href="{{ url('files/create') }}" class="btn btn-info "><span class="fa fa-user-plus"></span> Agregar Ficha</a></div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-md" width="100%" id="files">
                <thead>
                  <tr>
                    <th>Programa</th>
                    <th>Caracterización</th>
                    <th>Número de Ficha</th>
                    <th>Ruta</th>
                    <th>Aprendices</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
