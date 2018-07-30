@extends('layouts.layout')
@section('title', 'Panel')
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
            <a class="nav-link" id="v-pills-recetas-tab" data-toggle="pill" href="#v-pills-recetas" role="tab" aria-controls="v-pills-recetas" aria-selected="false" style="color: #fff">Recetas</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" id="v-pills-recetaFichaTecnica-tab" data-toggle="pill" href="#v-pills-recetaFichaTecnica" role="tab" aria-controls="v-pills-recetaFichaTecnica" aria-selected="false" style="color: #fff">Ficha tecnica receta</a>
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
              @if(Auth::user()->rol_id == 1)
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

              @if (Auth::user()->rol_id == 1)
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

            <div class="tab-pane fade" id="v-pills-recetaFichaTecnica" role="tabpanel" aria-labelledby="v-pills-recetaFichaTecnica-tab">
                <div class="card border-secondary">
                    <h4 class="card-header bg-secondary text-light text-center">Ficha tecnica recetas</h4>
                    <div class="card-body">
                    <form action="{{ url('RecipeHasProducts')}}" method="post" class="forms">
                      @csrf
                    {{-- {{ Form::model($product, ['url' => ['RecipeHasProducts', $product->id], 'class' => 'forms', 'method' => 'POST']) }} --}}
                        <div class="form-group col-md-6 col-lg-6">
                          <label><i class="fa fa-mouse-pointer"></i> Seleccionar receta <strong class="text-danger">*</strong></label>
                            <select class="form-control {{$errors->has('recipe_id') ? 'is-invalid' : ''}}" name="recipe_id" id="recipe_id" onchange="loadRecipeProducts(this.value)" required autofocus>
                              <option hidden value="{{old('recipe_id')}}"> -- Seleccione una receta -- </option>
                              @foreach ($recipe as $recipes)
                              <option value="{{$recipes->id}}">{{$recipes->recipe_name}}</option>
                                @endforeach
                            </select>
                            <strong class="invalid-feedback">{{$errors->first('recipe_id')}}</strong>
                        </div>

                        <div class="form-group col-md-6 col-lg-6">
                            <label style="font-size: 18px"><i class="fas fa-list-ul"></i> Materiales</label>
                      </div>
                      <hr>
                      <div class="table-responsive">

                        <table class="table table-bordered table-sm">

                            <thead>
                                <tr class="text-center">
                                  <th>Insumo</th>
                                  <th>Unidad de medida</th>
                                  <th>Cantidad</th>
                                  <th><button type="button" class="btn btn-info addProducts"><i class="fa fa-plus-circle"></i></button></th>
                                </tr>
                            </thead>

                            <tbody id="fillRecipeDetails">
                              <tr>
                                <td>
                                  {{ Form::select('product_id[]', $product, null, ['class' => 'form-control', 'onchange="getMeasure(this)"', 'placeholder' => '-- Seleccionar Producto --']) }}
                                </td>
                                <td class="tdUnit">
                                  {{ Form::text('id_measure_unit', null, ['class' => 'form-control unidad', 'readonly']) }}
                                </td>
                                <td>
                                  {{ Form::number('quantity[]', null, ['class' => 'form-control']) }}
                                </td>
                              </tr>
                            </tbody>
                          </table>
                      </div>
                      </div>
                      <div class="d-flex justify-content-end col-md-12 col-lg-12">
                          <button type="submit" class="btn btn-info"><i class="fa fa-save fa-lg"></i> Guardar</button>
                      </div>
                      <hr>
                      </form>
                    </div>
                  </div>
            </div>
          <!--Fin del contenido-->
        @include('recipes.create')
        @include('recipes.index')
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

    function addFormRecipe() {
      $('input[name=_method]').val('POST');
      $("#recipes-info-form form")[0].reset();
      $('#recipes-info-form').modal('show');
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

    function showDetails(id) {
      $.ajax({
        url: "{{ url('RecipeHasProduct') }}" + '/' + id + "/show",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
          if (data.length != 0) {
          console.log(data);
          $('#fillDetails').empty();
          var product_id;
          var measure;
          var quantity;
          var recipe_cost;
          $.each(data, function(i,a) {
            $.each(a, function(j,k) {
              product_id = data[i].product_name;
              measure = data[i].measure_name;
              quantity = data[i].quantity;
              recipe_cost = data[i].recipe_cost;
            })
            $('#fillDetails').append(
              `<tr>
                <td>`+product_id+`</td>
                <td>`+measure+`</td>
                <td>`+quantity+`</td>
                <td>`+recipe_cost+`</td>
                </tr>`
            );

          })
          $('#show-details').modal('show');
        } else {
          toastr.options={
            "positionClass": "toast-bottom-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "progressBar": true
          };
          toastr.info('Aun no existen productos asignados a la receta');
        }
        },
        error: function() {
          toastr.warning('No hay datos!');
        }
      });

    }

    function loadRecipeProducts(id) {
      $.ajax({
        url: "{{ url('RecipeHasProduct') }}" + '/' + id + "/show",
        type: 'get',
        datatype: "json",
        success: function(data) {
          $('#fillRecipeDetails').empty();
          console.log(data.length);
          if (data.length == 0) {
            $('#fillRecipeDetails').append(
              `<tr>
                <td>{{ Form::select('product_id[]', $product, null, ['class' => 'form-control', 'onchange="getMeasure(this)"', 'placeholder' => '-- Seleccionar Producto --']) }}</td>
                <td class="tdUnit">{{ Form::text('id_measure_unit', null, ['class' => 'form-control unidad', 'readonly']) }}</td>
                <td>{{ Form::number('quantity[]', null, ['class' => 'form-control',]) }}</td>
              </tr>`
            );
          }
          else {
          console.log(data);
          var product_id;
          var measure;
          var quantity;
          $.each(data, function(a, b) {
            $.each(b, function(c, d) {
              product_name = data[a].product_name;
              product_id = data[a].product_id;
              measure = data[a].measure_name;
              quantity = data[a].quantity;
            })
            if (a == 0) {
              $('#fillRecipeDetails').append(
              `<tr>
                <td>{{ Form::select('product_id[]', $product, null, ['class' => 'form-control', 'id' => 'setSelect`+a+`', 'onchange="getMeasure(this)"', 'placeholder' => '-- Seleccionar Producto --']) }}</td>
                <td class="tdUnit">{{ Form::text('id_measure_unit', '`+measure+`', ['class' => 'form-control unidad', 'readonly']) }}</td>
                <td>{{ Form::number('quantity[]', '`+quantity+`', ['class' => 'form-control',]) }}</td>
              </tr>`
            );
            // $("#setSelect"+a+" option[value="+product_id+"]").prop('selected', true);
            $("#setSelect"+a).val(product_id);
            }
            else{
            $('#fillRecipeDetails').append(
            `<tr>
              <td>{{ Form::select('product_id[]', $product, null, ['class' => 'form-control', 'onchange="getMeasure(this)"','id' => 'setSelect`+a+`', 'placeholder' => '-- Seleccionar Producto --']) }}</td>
              <td class="tdUnit">{{ Form::text('id_measure_unit', '`+measure+`', ['class' => 'form-control unidad', 'readonly']) }}</td>
              <td>{{ Form::number('quantity[]', '`+quantity+`', ['class' => 'form-control',]) }}</td>
              <td><button type="button" name="remove" class="btn btn-danger remove"><i class="fa fa-times-circle"></i></button></td>
            </tr>`
            );
            // $("#setSelect"+a+" option[value="+product_id+"]").prop('selected', true);
            $("#setSelect"+a).val(product_id);
            }
          })
        }
        },
        error: function() {

        }
      })
    }
    </script>

    <script>
    $(document).ready(function(){
    $(document).on('click', '.addProducts', function(){
      var html = `<tr>
          <td>{{ Form::select('product_id[]', $product, null, ['class' => 'form-control', 'onchange="getMeasure(this)"', 'placeholder' => '-- Seleccionar Producto --']) }}</td>
          <td class="tdUnit">{{ Form::text('id_measure_unit', null, ['class' => 'form-control unidad', 'readonly']) }}</td>
          <td>{{ Form::number('quantity[]', null, ['class' => 'form-control']) }}</td>
        <td><button type="button" name="remove" class="btn btn-danger remove"><i class="fa fa-times-circle"></i></button></td>
      </tr>`;
      $('tbody').append(html);
    });

    $(document).on('click', '.remove', function(){
      $(this).closest('tr').remove();
    });
  });

  function getMeasure(id) {
    $.get(`/panel/getMeasure/${event.target.value}`, function(element) {
        $(id).parent().parent().children('.tdUnit').children('.unidad').val(element[0]);
    });
}
  </script>
@endsection
