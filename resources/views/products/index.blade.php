@extends('layouts.layout')
@section('title', 'Products')
@section('content')
  <div class="container">
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

@section('script')
    <script>
    $('#products').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/products/get',
        columns: [
            { data: 'product_code', name: 'product_code' },
            { data: 'product_type_name', name: 'id_product_type' },
            { data: 'product_name', name: 'product_name' },
            { data: 'measure_name', name: 'id_measure_unit' },
            { data: 'presentation', name: 'presentation_id' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: true },
        ]
    });</script>
@endsection
