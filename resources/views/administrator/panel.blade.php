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
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" style="color: #fff">Bodegas</a>
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
          <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
            <div class="card border-secondary">
              <h4 class="card-header bg-secondary text-light">Bodegas</h4>
              <div class="card-body">
                <h4 class="card-title">Special title treatment</h4>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
            <!--Fin del contenido-->
          </div>

          <!--Contenido de Recetas-->
          <div class="tab-pane fade" id="v-pills-recetas" role="tabpanel" aria-labelledby="v-pills-recetas-tab">
            <div class="card border-secondary">
              <h4 class="card-header bg-secondary text-light text-center">Recetas</h4>
              <div class="card-body">
                <div class="col-12 d-flex justify-content-end">
                  <div class="card-title"><h4>Lista de Recetas</h4></div><hr>
                    <div><a onclick="addForm()" class="btn btn-info text-light"><span class="fa fa-user-plus"></span> Agregar Receta</a>
                    </div>
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
            <!--Fin del contenido-->
          </div>
        </div>
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

    function addForm() {
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
            success: function(response) {
              $('#recipes-form').modal('hide');
              table.ajax.reload();
            },
            error: function(){
              $('#recipes-form').modal('hide');
              table.ajax.reload();
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
          alert('Nothing Data');
        }
      });
    }
    </script>
@endsection
