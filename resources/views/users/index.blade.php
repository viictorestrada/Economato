@extends('layouts.layout')
@section('title', 'Users')
@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center"><h4>Gestión de Usuarios</h4></div>
          <div class="card-body">
            <div class="col-12 d-flex justify-content-end">
              <div class="card-title"><h4>Lista de Usuarios</h4></div><hr>
              <div><a type="button" href="{{ url('users/create') }}" class="btn btn-info "><span class="fa fa-user-plus"></span> Agregar Usuario</a></div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-md" width="100%" id="users">
                <thead>
                  <tr>
                    <th>Rol</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
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
        $('#users').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/users/get',
        columns: [
            { data: 'role', name: 'rol_id' },
            { data: 'name', name: 'name' },
            { data: 'last_name', name: 'last_name' },
            { data: 'email', name: 'email' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: true },
        ]
    });
  </script>
@endsection
