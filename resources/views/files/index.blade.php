@extends('layouts.layout')
@section('title', 'Files')
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
                    <th>Fecha de Inicio</th>
                    <th>Fecha Final</th>
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

    $('#files').DataTable({
        destroy: true,
        scrollX: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/files/get',
        columns: [
            { data: 'program_name', name: 'program_id' },
            { data: 'characterization_name', name: 'characterization_id' },
            { data: 'file_number', name: 'file_number' },
            { data: 'file_route', name: 'file_route' },
            { data: 'apprentices', name: 'apprentices' },
            { data: 'start_date', name: 'start_date' },
            { data: 'finish_date', name: 'finish_date' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: true },
        ]
    });

  </script>
@endsection
