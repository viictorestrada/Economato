@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center"><h4>Presupuesto</h4></div>
          <div class="card-body">
            <div class="col-12 d-flex justify-content-end">
              <div class="card-title"><h4>Presupuestos</h4></div><hr>
              <div>
                <a type="button" onclick="aditionalBudget()" class="btn btn-info text-light"><span class="fa fa-plus-circle"></span> Adicionar Presupuesto</a>
                <a type="button" href="{{ url('budgets/create') }}" class="btn btn-info "><span class="fa fa-plus-circle"></span> Registrar Nuevo</a>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-md" width="100%" id="budgets">
                <thead>
                  <tr>
                    <th>Presupuesto</th>
                    <th>Código</th>
                    <th>Fecha Inicial</th>
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

  @include('budget.addbudget')

@endsection

@section('script')
  <script>
        $('#budgets').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/budgets/get',
        columns: [
            { data: 'budget', name: 'budget' },
            { data: 'budget_code', name: 'budget_code' },
            { data: 'budget_begin_date', name: 'budget_begin_date' },
            { data: 'budget_finish_date', name: 'budget_finish_date' },
            { data: 'action', name: 'action', orderable: false, searchable: true },
        ]
    });

    function aditionalBudget()
    {
      save_method = "add";
      $('input[name=_method]').val('POST');
      $('#addBudget-form form')[0].reset();
      $('#addBudget-form').modal('show');
    }

    $(function(){
      $('#addBudget-form form').on('submit' , function(e){
        if (!e.isDefaultPrevented()){
          var id = $('#id').val();
          if (save_method == 'add') {
            url = "{{ url('addbudget') }}";
          }
          else {
            url = "{{ url('roles'). '/'}}" + id;
          }
          $.ajax({
            url: url,
            type: "POST",
            data: $('#addBudget-form form').serialize(),
            success: function(response) {
              $('#addBudget-form').modal('hide');
              tableRoles.ajax.reload();
              if (save_method == 'add') {
                toastr.options = {
                  "positionClass": "toast-bottom-right"
                }
                toastr.success('Elemento agregado exitosamente!');
              }
              else {
                toastr.options = {
                  "positionClass": "toast-bottom-right"
                }
                toastr.success('Elemento editado exitosamente!');
              }
            },
            error: function(){
              toastr.options = {
                "positionClass": "toast-bottom-right"
              }
              toastr.error('Oops!, Se ha generado un error!');
              tableLearningResults.ajax.reload();
            }
          });
          return false;
        }
      });
    });
  </script>
@endsection
