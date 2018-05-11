@extends('layouts.layout')
@section('content')
  <div class="container-fluid">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center"><h4>Gestión de Productos</h4></div>
          <div class="card-body">
            <div class="col-12 d-flex justify-content-end">
              <div class="card-title"><h4>Lista de Productos</h4></div><hr>
              <div><a type="button" href="{{ url('products/create') }}" class="btn btn-info "><span class="fa fa-user-plus"></span> Agregar Producto</a></div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-md" width="100%" id="products">
                <thead>
                  <tr>
                    <th>Código Producto</th>
                    <th>Tipo producto</th>
                    <th>Nombre</th>
                    <th>Unidad de Medida</th>
                    <th>Presentación</th>
                    <th>Cantidad</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Precio Unitario</th>
                    <th>Stock</th>
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
