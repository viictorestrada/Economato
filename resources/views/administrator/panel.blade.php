@extends('layouts.layout')
@section('content')
  <section class="container-fluid mt-1">

    <div class="row">

      <section class="col-12 mb-5">

        <ul class="nav d-flex justify-content-between nav-pills nav-fill bg-secondary admin" id="v-pills-tab" role="tablist" aria-orientation="horizontal">

          <li class="nav-item">
            <a class="nav-link active" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general" aria-selected="true" style="color: #fff">General</a>
          </li>

          <li class="nav-item" style="background-color: none;">
            <a class="nav-link" id="v-pills-solicitudes-tab" data-toggle="pill" href="#v-pills-solicitudes" role="tab" aria-controls="v-pills-solicitudes" aria-selected="false" style="color: #fff">Solicitudes</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false" style="color: #fff">Entregas</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" id="v-pills-bodegas-tab" data-toggle="pill" href="#v-pills-bodegas" role="tab" aria-controls="v-pills-bodegas" aria-selected="false" style="color: #fff">Bodegas</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" id="v-pills-recetas-tab" data-toggle="pill" href="#v-pills-recetas" role="tab" aria-controls="v-pills-recetas" aria-selected="false" style="color: #fff">Recetas</a>
          </li>

        </ul>

  </section>

  <section class="container">

    <div class="tab-content" id="v-pills-tabContent">

      <!--Contenido de General!-->
      <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
        <div class="card border-secondary">
          <h4 class="card-header bg-secondary text-light text-center">Gestión</h4>
          <div class="card-body">
            <div class="row">
              <!--Categorias de la seccion de usuarios-->
              @if(Auth::user()->rol_id == 2)
              <div class="col">
                <a href="{{ url('users/create') }}" class="text-secondary text-center" style="text-decoration: none;">
                  <h1 class="display-1 text-center"><i class="fa fa-users"></i></h1>
                  <p class="text-center">Usuarios</p>
                </a>
              </div>
              @endif

              <div class="col">
                <a href="{{ url('products/create') }}" class="text-secondary text-center" style="text-decoration: none;">
                  <h1 class="display-1 text-center"><i class="fa fa-shopping-cart"></i></h1>
                  <p class="text-center">Productos</p>
                </a>
              </div>

              <div class="col">
                <a href="{{ url('providers/create') }}" class="text-secondary text-center" style="text-decoration: none;">
                  <h1 class="display-1 text-center"><i class="fa fa-user-lock"></i></h1>
                  <p class="text-center">Proveedores</p>
                </a>
              </div>

              <div class="col">
                <a href="{{ url('reports') }}" class="text-secondary text-center" style="text-decoration: none;">
                  <h1 class="display-1 text-center"><i class="fa fa-chart-line"></i></i></h1>
                  <p class="text-center">Informes</p>
                </a>
              </div>
              <!--Final de fila-->
            </div>

            <!--Inicio de segunda fila-->
            <div class="row">

              <div class="col">
                <a href="{{ url('contracts/create') }}" class="text-secondary text-center" style="text-decoration: none;">
                  <h1 class="display-1 text-center"><i class="fa fa-book"></i></h1>
                  <p class="text-center">Contratos</p>
                </a>
              </div>

              @if (Auth::user()->rol_id == 2)
              <div class="col">
                <a href="{{ url('budgets/create') }}" class="text-secondary text-center" style="text-decoration: none;">
                  <h1 class="display-1 text-center"><i class="fab fa-bitcoin"></i></h1>
                  <p class="text-center">Presupuesto</p>
                </a>
              </div>
              @endif

              <div class="col">
                <a href="{{ url('files/create') }}" class="text-secondary text-center" style="text-decoration: none;">
                   <h1 class="display-1 text-center"><i class="fa fa-globe"></i></h1>
                   <p class="text-center">Fichas</p>
                  </a>
                </div>
              </div>
              <!--Final de fila-->
            </div>
          </div>
        </div>

        <!--Contenido de Solicitudes-->
        <div class="tab-pane fade" id="v-pills-solicitudes" role="tabpanel" aria-labelledby="v-pills-solicitudes-tab">
          <div class="card border-secondary">
            <h4 class="card-header bg-secondary text-light">Solicitudes</h4>
            <div class="card-body">
              <!--Entrada de Busqueda de Regional para editar:-->
              <div class="row">
                <div class="col-3 align-self-end">
                  <label class="sr-only" for="inlineFormInputGroup">Búsqueda</label>
                  <div class="input-group mb-2 mb-sm-0">
                    <div class="input-group-addon bg-secondary">
                      <span class="oi oi-magnifying-glass text-light"></span>
                    </div>
                    <input type="text" class="form-control border-secondary" id="buscar" placeholder="Buscar">
                  </div>
                </div>

                <div class="col-9">
                  <div class="card border-success">
                    <div class="card-body">
                      <h4 class="card-title text-center">Información importante</h4><hr class="bg-success">
                      <section id="tbl_prog">
                        With supporting text below as a natural lead-in to additional content
                      </section>
                      <!--a href="#" class="btn btn-primary">Agregar Programa</a-->
                    </div>
                  </div>
                </div>
              </div><br>
              <div class="tabla_datos" id="resultado"></div><hr class="bg-success">
              <a href="#" class="btn btn-primary">Solicitud a proveedores</a>
            </div>
          </div>
        </div>

        <!--Contenido de Entregas-->
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

          <div class="card border-secondary">
            <h4 class="card-header bg-secondary text-light">Entregas</h4>
            <div class="card-body">
              <h4 class="card-title">Special title treatment</h4>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
           </div>
          </div>

          <!--Contenido de Bodegas-->
          <div class="tab-pane fade" id="v-pills-bodegas" role="tabpanel" aria-labelledby="v-pills-bodegas-tab">
            <div class="card border-secondary">
              <h4 class="card-header bg-secondary text-light text-center">Bodegas</h4>
              <div class="card-body">

                <div class="col-12 d-flex justify-content-end">
                  <div class="card-title"><h4>Bodegas</h4></div>
                  <hr>
                  <div><a onclick="addStorage()" class="btn btn-info text-light"><i class="fa fa-plus-circle"></i> Agregar Bodega</a></div>
                </div>

                <div class="table-responsive">
                  <table class="table table-bordered table-md" width="100%" id="storages">
                    <thead>
                      <tr>
                        <th>Nombre Bodega</th>
                        <th>Ubicación</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                  </table>
                </div>

              </div>
            </div>
          </div>
          <!--Fin del contenido-->

          <!--Contenido de Recetas-->
          <div class="tab-pane fade" id="v-pills-recetas" role="tabpanel" aria-labelledby="v-pills-recetas-tab">
            <div class="card border-secondary">
              <h4 class="card-header bg-secondary text-light text-center">Recetas</h4>
              <div class="card-body">
                <div class="col-12 d-flex justify-content-end">
                  <div class="card-title"><h4>Lista de Recetas</h4></div>
                  <hr>
                  <div><a onclick="addRecipe()" class="btn btn-info text-light"><span class="fa fa-utensils"></span> Agregar Receta</a></div>
                </div>
                  <div class="table-responsive">
                    <table class="table table-bordered table-md" width="100%" id="recipes">
                      <thead>
                        <tr>
                          <th>Nombre receta</th>
                          <th>Estado</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          <!--Fin del contenido-->
        @include('storages.storages')
        @include('recipes.create')
      </section>
    </div>
  </section>
@endsection

@section('script')
    <script>
      var table = $('#recipes').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/recipes/get',
        columns: [
          { data: 'recipe_name', name: 'recipe_name' },
          { data: 'status', name: 'status' },
          { data: 'action', name: 'action', orderable: false, searchable: true },
        ]
    });

    function addRecipe() {
      save_method = "add";
      $('input[name=_method]').val('POST');
      $("#recipes-form form")[0].reset();
      $('#recipes-form').modal('show');
    }

    $(function() {
      $('#recipes-form form').on('submit', function(e){
        if(!e.isDefaultPrevented()){
          var id = $('#id').val();
          if (save_method == 'add') {
            url = "{{ url('recipes') }}";
          }
          else{
            url = "{{ url('recipes'). '/'}}" + id;
          }
          $.ajax({
            url: url,
            type: "POST",
            data: $('#recipes-form form').serialize(),
            success: function(data) {
              if(save_method == 'add'){
                toastr.options = {
                  'positionClass': 'toast-bottom-right'
                }
                toastr.success('Se ha agredado un nuevo registro!');
              }
              else{
                toastr.options = {
                  'positionClass': 'toast-bottom-right'
                }
                toastr.success('El registro se ha actualizado con éxito!');
              }
              $('#recipes-form').modal('hide');
              table.ajax.reload();
            },
            error: function(){
              toastr.error('Oops!, Se ha generado un error!');
            }
          });
          return false;
        }
      });
    });

    function editRecipe(id) {
      save_method = "edit";
      $('input[name=_method]').val('PATCH');
      $("#recipes-form form")[0].reset();
      $.ajax({
        url: "{{ url('recipes') }}" + '/' + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          $('#recipes-form').modal('show');

          $('#id').val(data.id);
          $('#recipe_name').val(data.recipe_name);
        },
        error: function() {
          toastr.warning('No hay datos!');
        }
      });
    }

//Datatable para Bodegas
    var storageTable = $('#storages').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/storages/get',
        columns: [
          { data: 'storage_name', name: 'storage_name' },
          { data: 'storage_location', name: 'storage_location' },
          { data: 'action', name: 'action', orderable: false, searchable: true },
        ]
    });

// función para guardar
    function addStorage() {
      save_method = "add";
      $('input[name=_method]').val('POST');
      $("#storages-form form")[0].reset();
      $('#storages-form').modal('show');
    }

//funcion para determinar si guarda o edita
    $(function() {
      $('#storages-form form').on('submit', function(e){
        if(!e.isDefaultPrevented()){
          var id = $('#id').val();
          if (save_method == 'add') {
            url = "{{ url('storages') }}";
          }
          else{
            url = "{{ url('storages'). '/'}}" + id;
          }
          $.ajax({
            url: url,
            type: "POST",
            data: $('#storages-form form').serialize(),
            success: function(response) {
              if(save_method == 'add'){
                toastr.options = {
                  'positionClass': 'toast-bottom-right'
                }
                toastr.success('Se ha agredado un nuevo registro!');
              }
              else{
                toastr.options = {
                  'positionClass': 'toast-bottom-right'
                }
                toastr.success('El registro se ha actualizado con éxito!');
              }
              $('#storages-form').modal('hide');
              storageTable.ajax.reload();
            },
            error: function(){
              toastr.error('Oops!, Se ha generado un error');
            }
          });
          return false;
        }
      });
    });

//funcion para editar
    function editStorage(id) {
      save_method = "edit";
      $('input[name=_method]').val('PATCH');
      $("#storages-form form")[0].reset();
      $.ajax({
        url: "{{ url('storages') }}" + '/' + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          $('#storages-form').modal('show');

          $('#id').val(data.id);
          $('#storage_name').val(data.storage_name);
          $('#storage_location').val(data.storage_location);
        },
        error: function() {
          alert('Nothing Data');
        }
      });
    }
    </script>
@endsection
