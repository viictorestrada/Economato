@extends('layouts.layout')
@section('title', 'Providers')
@section('content')
  <div class="container-fluid">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center"><h4>Gestión de Proveedores</h4></div>
          <div class="card-body">
            <div class="col-12 d-flex justify-content-end">
              <div class="card-title"><h4>Lista de Proveedores</h4></div><hr>
              <div><a type="button" href="{{ url('providers/create') }}" class="btn btn-info "><span class="fa fa-user-plus"></span> Agregar Proveedor</a></div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-md" width="100%" id="providers">
                <thead>
                  <tr>
                    <th>Nombre Proveedor</th>
                    <th>Nit</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Nombre Contacto</th>
                    <th>Apellido Contacto</th>
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
    $('#providers').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/providers/get',
        columns: [
            { data: 'provider_name', name: 'provider_name' },
            { data: 'nit', name: 'nit' },
            { data: 'phone', name: 'phone' },
            { data: 'address', name: 'address' },
            { data: 'contact_name', name: 'contact_name' },
            { data: 'contact_last_name', name: 'contact_last_name' },
            { data: 'action', name: 'action', orderable: false, searchable: true },
        ]
    });</script>
@endsection
