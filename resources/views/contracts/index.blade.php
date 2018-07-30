@extends('layouts.layout')
@section('title', 'Contracts')
@section('content')
  <div class="container-fluid">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center"><h4>Contratos</h4></div>
          <div class="card-body">
            <div class="col-12 d-flex justify-content-end">
              <div class="card-title"><h4>Lista de Contratos</h4></div><hr>
              <div><a type="button" href="{{ url('contracts/create') }}" class="btn btn-info "><span class="fa fa-user-plus"></span> Agregar Contrato</a></div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-md" width="100%" id="contracts">
                <thead>
                  <tr>
                    <th>Código del contrato</th>
                    <th>Proveedor</th>
                    <th>Monto</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Final</th>
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

    $('#contracts').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/contracts/get',
        columns: [
            { data: 'contract_number', name: 'contract_number' },
            { data: 'provider_id', name: 'provider_id' },
            { data: 'contract_price', name: 'contract_price' },
            { data: 'start_date', name: 'start_date' },
            { data: 'finish_date', name: 'finish_date' },
            { data: 'action', name: 'action', orderable: false, searchable: true },
        ]
    });

  </script>
@endsection
