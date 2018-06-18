@extends('layouts/layout')
@section('content')
  {{-- Navegación lateral --}}
<section class="container-fluid mt-1">
  <div class="row">
    <section class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-around mt-2">

      <ul class="nav nav-pills nav-fill bg-secondary conf" id="v-pills-tab" role="tablist" aria-orientation="vertical">

        <li class="nav-item">
          <a class="nav-link active" id="v-pills-region-tab" data-toggle="pill" href="#v-pills-region" role="tab" aria-controls="v-pills-moda" aria-selected="true" style="color: #fff">Regional y Complejo</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-moda" role="tab" aria-controls="v-pills-moda" aria-selected="true" style="color: #fff">Centros y Programas de formación</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-compete" role="tab" aria-controls="v-pills-compete" aria-selected="false" style="color: #fff">Competencias y Resultados de Aprendizaje</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-tipous" role="tab" aria-controls="v-pills-tipous" aria-selected="false" style="color: #fff">Tipo de producto y Presentación</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-producto" role="tab" aria-controls="v-pills-producto" aria-selected="false" style="color: #fff">Unidad de medida y Tipo documento</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="v-pills-charact-tab" data-toggle="pill" href="#v-pills-charact" role="tab" aria-controls="v-pills-charact" aria-selected="false" style="color: #fff">Caracterización y Roles</a>
        </li>

      </ul>
    </section>

      <!--Formularios de contenidos-->
    <section class="container-fluid mt-2 mb-5 col-12">
      <div class="tab-content" id="v-pills-tabContent">
        <!--Formularios de Regional y Centro de Formación-->
        <div class="tab-pane fade show active" id="v-pills-region" role="tabpanel" aria-labelledby="v-pills-home-tab">

            <!--Panel de sección-->
          <div class="card border-secondary text-center">
            <h4 class="card-header bg-secondary text-light">Regional y Complejos</h4>
            <div class="card-body">
              <div class="row">

                <div class="col-sm-6">
                  <div class="card border-info">
                    <div class="card-body">
                      <h4 class="card-title text-center">Regional</h4>
                      <hr  class="bg-info">
                        <!--Resultados de la consulta a la tabla con las regionales-->
                      <section id="tbl_reg">
                        <!--Impresion de los resultados de las Regionales agregadas en la base de datos-->
                        <div class="table-responsive">
                          <table class="table table table-bordered table-sm" width="100%" id="regions">
                            <thead class="bg-secondary text-light">
                              <tr>
                                <th>Nombre Regional</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </section>
                      <hr class="bg-info">
                      <a onclick="addRegion()" class="btn btn-info text-light"><i class="fa fa-plus-circle fa-lg"></i> Agregar Regional</a>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="card border-info">
                    <div class="card-body">
                      <h4 class="card-title text-center">Complejos</h4>
                      <hr class="bg-info">
                      <!--Resultados de la consulta a la tabla con las Complejos-->
                      <section id="tbl_cen">
                        <!--Impresion de los resultados de los complejos-->
                        <div class="table-responsive">
                          <table class="table table table-bordered table-sm" width="100%" id="complex">
                            <thead class="bg-secondary text-light">
                              <tr>
                                <th>Regional</th>
                                <th>Complejo</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </section>
                      <hr class="bg-info">
                      <a onclick="addComplex()" class="btn btn-info text-light"><i class="fa fa-plus-circle fa-lg"></i> Agregar Complejo</a>
                    </div>
                  </div>
                </div>
              </div>
              <!--Fin de los formularios-->
            </div>
          </div>
        </div>


        <!--Formularios de Programas de formación-->
        <div class="tab-pane fade show" id="v-pills-moda" role="tabpanel" aria-labelledby="v-pills-home-tab">
          <!--Panel de sección Programa de formación-->
          <div class="card border-secondary text-center">
            <h4 class="card-header bg-secondary text-light">Centros y Programas de formación</h4>
            <div class="card-body">

              <!--Formularios de Programa de formación  -->
              <div class="row">
                <div class="col-sm-5">
                  <div class="card border-info">
                    <div class="card-body">
                      <h4 class="card-title text-center">Centro de Formación</h4>
                      <hr class="bg-info">
                      <!--Resultados de la consulta a la tabla con las regionales-->
                      <section id="tbl_cen">
                        <!--Impresion de los resultados de los centros de formación-->
                        <div class="table-responsive">
                          <table class="table table table-bordered table-sm" width="100%" id="locations">
                            <thead class="bg-secondary text-light">
                              <tr>
                                <th>Complejo</th>
                                <th>Centro de formación</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </section>
                      <hr class="bg-info">
                      <a onclick="addLocation()" class="btn btn-info text-light"><i class="fa fa-plus-circle fa-lg"></i> Agregar Centro de formación</a>
                    </div>
                  </div>
                </div>

                <div class="col-sm-7">
                  <div class="card border-info">
                    <div class="card-body">
                      <h4 class="card-title text-center">Programas de formación</h4>
                      <hr  class="bg-info">
                      <section id="tbl_mod">
                        <div class="table-responsive" style="width:100%">
                          <table class="table table-bordered table-sm table-md" style="width:100%" id="programs">
                            <thead class="bg-secondary text-light">
                              <tr>
                                <th>Centro de formación</th>
                                <th>Programa de formación</th>
                                <th>Versión</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </section>
                      <div>
                        <hr class="bg-info">
                      <a onclick="addProgram()" class="btn btn-info text-light"><i class="fa fa-plus-circle fa-lg"></i> Agregar Programa de formación</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--Fin de los formularios-->
            </div>
          </div>
        </div>

        <div class="tab-pane fade show" id="v-pills-compete" role="tabpanel" aria-labelledby="v-pills-home-tab">
          <!--Panel de sección Competencias y Resultado de Aprendizaje-->
          <div class="card border-secondary text-center">
            <h4 class="card-header bg-secondary text-light">Competencias y Resultados de Aprendizaje</h4>
            <div class="card-body">
              <!--Formularios de Modalidad y Programa-->
              <div class="row">
                <div class="col-sm-6">
                  <div class="card border-info">
                    <div class="card-body">
                      <h4 class="card-title text-center">Competencias</h4>
                      <hr class="bg-info">
                      <section id="tbl_compete">
                        <div class="table-responsive">
                          <table class="table table table-bordered table-sm" width="100%" id="competences">
                            <thead class="bg-secondary text-light">
                              <tr>
                                <th>Programa</th>
                                <th>Competencia</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </section>
                      <hr  class="bg-info">
                      <a onclick="addCompetence()" class="btn btn-info text-light"><i class="fa fa-plus-circle fa-lg"></i> Agregar Competencia</a>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="card border-info">
                    <div class="card-body">
                      <h4 class="card-title text-center">Resultados de Aprendizaje</h4>
                      <hr class="bg-info">
                      <section id="tbl_resul">
                        <div class="table-responsive">
                          <table class="table table table-bordered table-sm" width="100%" id="learning_results">
                            <thead class="bg-secondary text-light">
                              <tr>
                                <th>Competencia</th>
                                <th>Resultado de aprendizaje</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </section>
                      <hr class="bg-info">
                      <a onclick="addLearningResult()" class="btn btn-info text-light"><i class="fa fa-plus-circle fa-lg"></i> Agregar Competencia</a>
                    </div>
                  </div>
                </div>
              </div>
              <!--Fin de los formularios-->
            </div>
          </div>
        </div>

        <!--Contenido de Roles y documentos de identidad-->
        <div class="tab-pane fade" id="v-pills-tipous" role="tabpanel" aria-labelledby="v-pills-profile-tab">
          <!--Panel de sección Tipo de producto-->
          <div class="card border-secondary text-center">
            <h4 class="card-header bg-secondary text-light">Tipo de producto y presentación</h4>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="card border-info">
                    <div class="card-body">
                      <h4 class="card-title text-center">Tipo de Producto</h4>
                      <hr  class="bg-info">
                      <section id="tbl_tipoprod">
                        <div class="table-responsive">
                          <table class="table table table-bordered table-sm" width="100%" id="product_types">
                            <thead class="bg-secondary text-light">
                              <tr>
                                <th>Tipo de producto</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </section>
                      <hr class="bg-info">
                      <a onclick="addProductType()" class="btn btn-info text-light"><i class="fa fa-plus-circle fa-lg"></i>Agregar Tipo de Producto</a>
                    </div>
                  </div>
                </div>

                <!--Formularios de Programa de Presentaciones  -->
                <div class="col-sm-6">
                  <div class="card border-info">
                    <div class="card-body">
                      <h4 class="card-title text-center">Presentaciones</h4>
                      <hr class="bg-info">
                      <section id="tbl_resul">
                        <div class="table-responsive">
                          <table class="table table table-bordered table-sm" width="100%" id="presentations">
                            <thead class="bg-secondary text-light">
                              <tr>
                                <th>Presentación</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </section>
                      <hr class="bg-info">
                      <a onclick="addPresentation()" class="btn btn-info text-light"><i class="fa fa-plus-circle fa-lg"></i>Agregar Presentación</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--Contenido de Tipos de Producto y unidades de medida-->
        <div class="tab-pane fade" id="v-pills-producto" role="tabpanel" aria-labelledby="v-pills-settings-tab">
          <div class="card border-secondary text-center">
            <h4 class="card-header bg-secondary text-light">Unidades de Medida y Tipo Documento</h4>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="card border-info">
                    <div class="card-body">
                      <h4 class="card-title text-center">Unidades de Medida</h4>
                      <hr class="bg-info">
                      <!--Entrada de Busqueda de Unidad de Medida para editar:-->
                      <section id="tbl_unimedi">
                        <div class="table-responsive">
                          <table class="table table table-bordered table-sm" width="100%" id="measures">
                            <thead class="bg-secondary text-light">
                              <tr>
                                <th>Unidad de medida</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </section>
                      <hr class="bg-info">
                      <a onclick="addMeasure()" class="btn btn-info text-light"><i class="fa fa-plus-circle fa-lg"></i>Agregar Unidad de Medida</a>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="card border-info">
                    <div class="card-body">
                      <h4 class="card-title text-center">Tipo de Documento</h4>
                      <hr class="bg-info">
                      <section id="tbl_tipodocu">
                        <div class="table-responsive">
                          <table class="table table table-bordered table-sm" width="100%" id="document_types">
                            <thead class="bg-secondary text-light">
                              <tr>
                                <th>Tipo de documento</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </section>
                      <hr class="bg-info">
                      <a onclick="addDocumentType()" class="btn btn-info text-light"><i class="fa fa-plus-circle fa-lg"></i>Agregar Tipo de Documento</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--Contenido caracterización y roles-->
        <div class="tab-pane fade" id="v-pills-charact" role="tabpanel" aria-labelledby="v-pills-settings-tab">
          <div class="card border-secondary text-center">
            <h4 class="card-header bg-secondary text-light">Caracterización y Roles</h4>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="card border-info">
                    <div class="card-body">
                      <h4 class="card-title text-center">Caracterización</h4>
                      <hr  class="bg-info">
                      <section id="tbl_tipoprod">
                        <div class="table-responsive">
                          <table class="table table table-bordered table-sm" width="100%" id="characterizations">
                            <thead class="bg-secondary text-light">
                              <tr>
                                <th>Caracterización</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </section>
                      <hr class="bg-info">
                      <a onclick="addCharacterization()" class="btn btn-info text-light"><i class="fa fa-plus-circle fa-lg"></i>Agregar Caracterización</a>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="card border-info">
                    <div class="card-body">
                      <h4 class="card-title text-center">Roles</h4>
                      <hr  class="bg-info">
                      <section id="tbl_tipousua">
                        <div class="table-responsive">
                          <table class="table table table-bordered table-sm" width="100%" id="roles">
                            <thead class="bg-secondary text-light">
                              <tr>
                                <th>Rol</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </section>
                      <hr class="bg-info">
                      <a onclick="addRole()" class="btn btn-info text-light"><i class="fa fa-plus-circle fa-lg"></i>Agregar Roles</a>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            <!--Fin del contenido-->
          </section>



          <!--CREACIÓN DE VENTANAS MODALES-->


          @include('configurations.regions.create')
          @include('configurations.locations.create')
          @include('configurations.competences.create')
          @include('configurations.presentations.create')
          @include('configurations.programs.create')
          @include('configurations.learning_results.create')
          @include('configurations.roles.create')
          @include('configurations.document_types.create')
          @include('configurations.product_types.create')
          @include('configurations.measures.create')
          @include('configurations.complexes.create')
          @include('configurations.characterizations.create')



          <!--FINAL DE LAS VENTANAS MODALES-->


        @stop

@section('script')
<script type="text/javascript">

//Tabla para mostrar las Regionales
var tableRegion = $('#regions').DataTable({
  destroy: true,
  responsive: true,
  processing: true,
  serverSide: true,
  language: {
    "url": '/DataTables/datatables-spanish.json'
  },
  ajax: '/regions/get',
  columns: [
    { data: 'region_name', name: 'region_name' },
    { data: 'action', name: 'action', orderable: false, searchable: true },
  ]
});

//Funciones para agregar y editar Regionales
function addRegion() {
  save_method = "add";
  $('input[name=_method]').val('POST');
  $('#region-form form')[0].reset();
  $('#region-form').modal('show');
  }

  $(function() {
    $('#region-form form').on('submit' , function(e){
      if (!e.isDefaultPrevented()){
        var id = $('#id').val();
        if (save_method == 'add') {
          url = "{{ url('regions') }}";
        }
        else {
          url = "{{ url('regions'). '/'}}" + id;
        }
        $.ajax({
          url: url,
          type: "POST",
          data: $('#region-form form').serialize(),
          success: function(response) {
            $('#region-form').modal('hide');
            tableRegion.ajax.reload();
            if (save_method == 'add') {
              toastr.options = {
                "positionClass": "toast-bottom-right"
              }
              toastr.success('Elemento agregado exitosamente!');
            } else {
              toastr.options = {
                "positionClass": "toast-bottom-right"
              }
              toastr.success('Elemento editado exitosamente!');
            }
          },
          error: function(){
            $('#region-form').modal('hide');
            tableRegion.ajax.reload();
          }
        });
        return false;
      }
    });
  });

  function editRegion(id) {
    save_method = "edit";
    $('input[name=_method]').val('PATCH');
    $("#region-form form")[0].reset();
    $.ajax({
      url: "{{ url('regions') }}" + '/' + id + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        $('#region-form').modal('show');
        $('#id').val(data.id);
        $('#region_name').val(data.region_name);
      },
      error : function() {
        alert("No hay datos");
      }
    });
  }
  // Fin Seccion Regionales



  //Tabla para mostrar los complejos
  var tableComplex = $('#complex').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            "url": '/DataTables/datatables-spanish.json'
        },
        ajax: '/complex/get',
        columns: [
            { data: 'region_name', name: 'id_region' },
            { data: 'complex_name', name: 'complex_name' },
            { data: 'action', name: 'action', orderable: false, searchable: true },
        ]
    });

  //Funciones para agregar y editar Complejos
function addComplex() {
  save_method = "add";
  $('input[name=_method]').val('POST');
  $('#complexes-form form')[0].reset();
  $('#complexes-form').modal('show');
  }

  $(function() {
    $('#complexes-form form').on('submit' , function(e){
      if (!e.isDefaultPrevented()){
        var id = $('#id').val();
        if (save_method == 'add') {
          url = "{{ url('complex') }}";
        }
        else {
          url = "{{ url('complex'). '/'}}" + id;
        }
        $.ajax({
          url: url,
          type: "POST",
          data: $('#complexes-form form').serialize(),
          success: function(response) {
            $('#complexes-form').modal('hide');
            tableComplex.ajax.reload();
            if (save_method == 'add') {
              toastr.options = {
                "positionClass": "toast-bottom-right"
              }
              toastr.success('Elemento agregado exitosamente!');
            } else {
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
          }
        });
        return false;
      }
    });
  });

  function editComplex(id) {
    save_method = "edit";
    $('input[name=_method]').val('PATCH');
    $("#complexes-form form")[0].reset();
    $.ajax({
      url: "{{ url('complex') }}" + '/' + id + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        $('#complexes-form').modal('show');
        $('#id').val(data.id);
        $('#id_region').val(data.id_region);
        $('#complex_name').val(data.complex_name);
      },
      error : function() {
        alert("No hay datos");
      }
    });
  }

   // Fin seccion Complejos

   // Tabla para mostrar centros de formación

   var tableLocations = $('#locations').DataTable({
           destroy: true,
           responsive: true,
           processing: true,
           serverSide: true,
           language: {
               "url": '/DataTables/datatables-spanish.json'
           },
           ajax: '/locations/get',
           columns: [
               { data: 'complex_name', name: 'id_complex' },
               { data: 'location_name', name: 'location_name' },
               { data: 'status', name: 'status' },
               { data: 'action', name: 'action', orderable: false, searchable: true },
           ]
       });

       //Funciones para agregar y editar Centros de formación
       function addLocation() {
       save_method = "add";
       $('input[name=_method]').val('POST');
       $('#locations-form form')[0].reset();
       $('#locations-form').modal('show');
       }

       $(function() {
         $('#locations-form form').on('submit' , function(e){
           if (!e.isDefaultPrevented()){
             var id = $('#id').val();
             if (save_method == 'add') {
               url = "{{ url('locations') }}";
             }
             else {
               url = "{{ url('locations'). '/'}}" + id;
             }
             $.ajax({
               url: url,
               type: "POST",
               data: $('#locations-form form').serialize(),
               success: function(response) {
                 $('#locations-form').modal('hide');
                 tableLocations.ajax.reload();
                 if (save_method == 'add') {
                   toastr.options = {
                     "positionClass": "toast-bottom-right"
                   }
                   toastr.success('Elemento agregado exitosamente!');
                 } else {
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
               }
             });
             return false;
           }
         });
       });

       function editLocation(id) {
         save_method = "edit";
         $('input[name=_method]').val('PATCH');
         $("#locations-form form")[0].reset();
         $.ajax({
           url: "{{ url('locations') }}" + '/' + id + "/edit",
           type: "GET",
           dataType: "JSON",
           success: function(data) {
             $('#locations-form').modal('show');
             $('#id').val(data.id);
             $('#id_complex').val(data.id_complex);
             $('#location_name').val(data.location_name);
           },
           error : function() {
             alert("No hay datos");
           }
         });
       }

        // Fin seccion Centros de formación

        // Tabla para mostrar programas de formación

        var tablePrograms = $('#programs').DataTable({
              destroy: true,
              responsive: true,
              processing: true,
              serverSide: true,
              language: {
                  "url": '/DataTables/datatables-spanish.json'
              },
              ajax: '/programs/get',
              columns: [
                  { data: 'location_name', name: 'location_id' },
                  { data: 'program_name', name: 'program_name' },
                  { data: 'program_version', name: 'program_version' },
                  { data: 'program_description', name: 'program_description' },
                  { data: 'status', name: 'status' },
                  { data: 'action', name: 'action', orderable: false, searchable: true },
              ]
            });

            //Funciones para agregar y editar Programas de formación
            function addProgram() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $('#programs-form form')[0].reset();
            $('#programs-form').modal('show');
            }

            $(function() {
              $('#programs-form form').on('submit' , function(e){
                if (!e.isDefaultPrevented()){
                  var id = $('#id').val();
                  if (save_method == 'add') {
                    url = "{{ url('programs') }}";
                  }
                  else {
                    url = "{{ url('programs'). '/'}}" + id;
                  }
                  $.ajax({
                    url: url,
                    type: "POST",
                    data: $('#programs-form form').serialize(),
                    success: function(response) {
                      $('#programs-form').modal('hide');
                      tablePrograms.ajax.reload();
                      if (save_method == 'add') {
                        toastr.options = {
                          "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento agregado exitosamente!');
                      } else {
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
                    }
                  });
                  return false;
                }
              });
            });

            function editProgram(id) {
              save_method = "edit";
              $('input[name=_method]').val('PATCH');
              $("#programs-form form")[0].reset();
              $.ajax({
                url: "{{ url('programs') }}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                  $('#programs-form').modal('show');
                  $('#id').val(data.id);
                  $('#location_id').val(data.location_id);
                  $('#program_name').val(data.program_name);
                  $('#program_version').val(data.program_version);
                  $('#program_description').val(data.program_description);
                },
                error : function() {
                  alert("No hay datos");
                }
              });
            }

             // Fin seccion Programas de formación

             // Tabla para mostrar Competencias

             var tableCompetences = $('#competences').DataTable({
                     destroy: true,
                     responsive: true,
                     processing: true,
                     serverSide: true,
                     language: {
                         "url": '/DataTables/datatables-spanish.json'
                     },
                     ajax: '/competences/get',
                     columns: [
                         { data: 'program_name', name: 'id_program' },
                         { data: 'competence_name', name: 'competence_name' },
                         { data: 'action', name: 'action', orderable: false, searchable: true },
                     ]
                 });

                 //Funciones para agregar y editar Competencias
                 function addCompetence() {
                 save_method = "add";
                 $('input[name=_method]').val('POST');
                 $('#competences-form form')[0].reset();
                 $('#competences-form').modal('show');
                 }

                 $(function() {
                   $('#competences-form form').on('submit' , function(e){
                     if (!e.isDefaultPrevented()){
                       var id = $('#id').val();
                       if (save_method == 'add') {
                         url = "{{ url('competences') }}";
                       }
                       else {
                         url = "{{ url('competences'). '/'}}" + id;
                       }
                       $.ajax({
                         url: url,
                         type: "POST",
                         data: $('#competences-form form').serialize(),
                         success: function(response) {
                           $('#competences-form').modal('hide');
                           tableCompetences.ajax.reload();
                           if (save_method == 'add') {
                             toastr.options = {
                               "positionClass": "toast-bottom-right"
                             }
                             toastr.success('Elemento agregado exitosamente!');
                           } else {
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
                         }
                       });
                       return false;
                     }
                   });
                 });

                 function editCompetence(id) {
                   save_method = "edit";
                   $('input[name=_method]').val('PATCH');
                   $("#competences-form form")[0].reset();
                   $.ajax({
                     url: "{{ url('competences') }}" + '/' + id + "/edit",
                     type: "GET",
                     dataType: "JSON",
                     success: function(data) {
                       $('#competences-form').modal('show');
                       $('#id').val(data.id);
                       $('#id_program').val(data.id_program);
                       $('#competence_name').val(data.competence_name);
                     },
                     error : function() {
                       alert("No hay datos");
                     }
                   });
                 }

                  // Fin seccion Competencias

          // Tabla para mostrar Resultados de aprendizaje

          var tableLearningResults = $('#learning_results').DataTable({
              destroy: true,
              responsive: true,
              processing: true,
              serverSide: true,
              language: {
                  "url": '/DataTables/datatables-spanish.json'
              },
              ajax: '/learning_results/get',
              columns: [
                  { data: 'competence_name', name: 'id_competence' },
                  { data: 'learning_result', name: 'learning_result' },
                  { data: 'action', name: 'action', orderable: false, searchable: true },
              ]
          });


              //Funciones para agregar y editar Tipos de producto
              function addLearningResult() {
              save_method = "add";
              $('input[name=_method]').val('POST');
              $('#learningResult-form form')[0].reset();
              $('#learningResult-form').modal('show');
              }

              $(function() {
                $('#learningResult-form form').on('submit' , function(e){
                  if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if (save_method == 'add') {
                      url = "{{ url('learning_results') }}";
                    }
                    else {
                      url = "{{ url('learning_results'). '/'}}" + id;
                    }
                    $.ajax({
                      url: url,
                      type: "POST",
                      data: $('#learningResult-form form').serialize(),
                      success: function(response) {
                        $('#learningResult-form').modal('hide');
                        tableLearningResults.ajax.reload();
                        if (save_method == 'add') {
                          toastr.options = {
                            "positionClass": "toast-bottom-right"
                          }
                          toastr.success('Elemento agregado exitosamente!');
                        } else {
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

              function editLearningResult(id) {
                save_method = "edit";
                $('input[name=_method]').val('PATCH');
                $("#learningResult-form form")[0].reset();
                $.ajax({
                  url: "{{ url('learning_results') }}" + '/' + id + "/edit",
                  type: "GET",
                  dataType: "JSON",
                  success: function(data) {
                    $('#learningResult-form').modal('show');
                    $('#id').val(data.id);
                    $('#id_competence').val(data.id_competence);
                    $('#learning_result').val(data.learning_result);
                  },
                  error : function() {
                    alert("No hay datos");
                  }
                });
              }

               // Fin seccion Resultados de aprendizaje



               // Tabla para mostrar Tipo de productos


               var tableProductTypes = $('#product_types').DataTable({
                       destroy: true,
                       responsive: true,
                       processing: true,
                       serverSide: true,
                       language: {
                           "url": '/DataTables/datatables-spanish.json'
                       },
                       ajax: '/product_types/get',
                       columns: [
                           { data: 'product_type_name', name: 'product_type_name' },
                           { data: 'description', name: 'description' },
                           { data: 'action', name: 'action', orderable: false, searchable: true },
                       ]
                   });

                   //Funciones para agregar y editar Resultados de aprendizaje
                   function addProductType() {
                   save_method = "add";
                   $('input[name=_method]').val('POST');
                   $('#productType-form form')[0].reset();
                   $('#productType-form').modal('show');
                   }

                   $(function() {
                     $('#productType-form form').on('submit' , function(e){
                       if (!e.isDefaultPrevented()){
                         var id = $('#id').val();
                         if (save_method == 'add') {
                           url = "{{ url('product_types') }}";
                         }
                         else {
                           url = "{{ url('product_types'). '/'}}" + id;
                         }
                         $.ajax({
                           url: url,
                           type: "POST",
                           data: $('#productType-form form').serialize(),
                           success: function(response) {
                             $('#productType-form').modal('hide');
                             tableProductTypes.ajax.reload();
                             if (save_method == 'add') {
                               toastr.options = {
                                 "positionClass": "toast-bottom-right"
                               }
                               toastr.success('Elemento agregado exitosamente!');
                             } else {
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

                   function editProductType(id) {
                     save_method = "edit";
                     $('input[name=_method]').val('PATCH');
                     $("#productType-form form")[0].reset();
                     $.ajax({
                       url: "{{ url('product_types') }}" + '/' + id + "/edit",
                       type: "GET",
                       dataType: "JSON",
                       success: function(data) {
                         $('#productType-form').modal('show');
                         $('#id').val(data.id);
                         $('#product_type_name').val(data.product_type_name);
                         $('#description').val(data.description);
                       },
                       error : function() {
                         alert("No hay datos");
                       }
                     });
                   }

                    // Fin seccion Tipo de producto


                    // Tabla para mostrar Presentaciones


            var tablePresentations = $('#presentations').DataTable({
                    destroy: true,
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    language: {
                        "url": '/DataTables/datatables-spanish.json'
                    },
                    ajax: '/presentations/get',
                    columns: [
                        { data: 'presentation', name: 'presentation' },
                        { data: 'action', name: 'action', orderable: false, searchable: true },
                    ]
                });

                //Funciones para agregar y editar Presentaciones
                function addPresentation() {
                save_method = "add";
                $('input[name=_method]').val('POST');
                $('#presentation-form form')[0].reset();
                $('#presentation-form').modal('show');
                }

                $(function() {
                  $('#presentation-form form').on('submit' , function(e){
                    if (!e.isDefaultPrevented()){
                      var id = $('#id').val();
                      if (save_method == 'add') {
                        url = "{{ url('presentations') }}";
                      }
                      else {
                        url = "{{ url('presentations'). '/'}}" + id;
                      }
                      $.ajax({
                        url: url,
                        type: "POST",
                        data: $('#presentation-form form').serialize(),
                        success: function(response) {
                          $('#presentation-form').modal('hide');
                          tablePresentations.ajax.reload();
                          if (save_method == 'add') {
                            toastr.options = {
                              "positionClass": "toast-bottom-right"
                            }
                            toastr.success('Elemento agregado exitosamente!');
                          } else {
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

                function editPresentation(id) {
                  save_method = "edit";
                  $('input[name=_method]').val('PATCH');
                  $("#presentation-form form")[0].reset();
                  $.ajax({
                    url: "{{ url('presentations') }}" + '/' + id + "/edit",
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                      $('#presentation-form').modal('show');
                      $('#id').val(data.id);
                      $('#presentation').val(data.presentation);
                    },
                    error : function() {
                      alert("No hay datos");
                    }
                  });
                }

                 // Fin seccion Presentaciones



                // Tabla para mostrar Presentaciones

                 var tableMeasures = $('#measures').DataTable({
                     destroy: true,
                     responsive: true,
                     processing: true,
                     serverSide: true,
                     language: {
                         "url": '/DataTables/datatables-spanish.json'
                     },
                     ajax: '/measures/get',
                     columns: [
                         { data: 'measure_name', name: 'measure_name' },
                         { data: 'action', name: 'action', orderable: false, searchable: true },
                     ]
                 });

                 //Funciones para agregar y editar Unidades de medida
                 function addMeasure() {
                 save_method = "add";
                 $('input[name=_method]').val('POST');
                 $('#measure-form form')[0].reset();
                 $('#measure-form').modal('show');
                 }

                 $(function() {
                   $('#measure-form form').on('submit' , function(e){
                     if (!e.isDefaultPrevented()){
                       var id = $('#id').val();
                       if (save_method == 'add') {
                         url = "{{ url('measures') }}";
                       }
                       else {
                         url = "{{ url('measures'). '/'}}" + id;
                       }
                       $.ajax({
                         url: url,
                         type: "POST",
                         data: $('#measure-form form').serialize(),
                         success: function(response) {
                           $('#measure-form').modal('hide');
                           tableMeasures.ajax.reload();
                           if (save_method == 'add') {
                             toastr.options = {
                               "positionClass": "toast-bottom-right"
                             }
                             toastr.success('Elemento agregado exitosamente!');
                           } else {
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

                 function editMeasure(id) {
                   save_method = "edit";
                   $('input[name=_method]').val('PATCH');
                   $("#measure-form form")[0].reset();
                   $.ajax({
                     url: "{{ url('measures') }}" + '/' + id + "/edit",
                     type: "GET",
                     dataType: "JSON",
                     success: function(data) {
                       $('#measure-form').modal('show');
                       $('#id').val(data.id);
                       $('#measure_name').val(data.measure_name);
                     },
                     error : function() {
                       alert("No hay datos");
                     }
                   });
                 }

                  // Fin seccion Unidad de medida


                  // Tabla para mostrar Tipo de documento

                  var tableDocumentType = $('#document_types').DataTable({
                      destroy: true,
                      responsive: true,
                      processing: true,
                      serverSide: true,
                      language: {
                          "url": '/DataTables/datatables-spanish.json'
                      },
                      ajax: '/document_types/get',
                      columns: [
                          { data: 'type_document', name: 'type_document' },
                          { data: 'action', name: 'action', orderable: false, searchable: true },
                      ]
                  });

                  //Funciones para agregar y editar Tipo de documento
                  function addDocumentType() {
                  save_method = "add";
                  $('input[name=_method]').val('POST');
                  $('#documentType-form form')[0].reset();
                  $('#documentType-form').modal('show');
                  }

                  $(function() {
                    $('#documentType-form form').on('submit' , function(e){
                      if (!e.isDefaultPrevented()){
                        var id = $('#id').val();
                        if (save_method == 'add') {
                          url = "{{ url('document_types') }}";
                        }
                        else {
                          url = "{{ url('document_types'). '/'}}" + id;
                        }
                        $.ajax({
                          url: url,
                          type: "POST",
                          data: $('#documentType-form form').serialize(),
                          success: function(response) {
                            $('#documentType-form').modal('hide');
                            tableDocumentType.ajax.reload();
                            if (save_method == 'add') {
                              toastr.options = {
                                "positionClass": "toast-bottom-right"
                              }
                              toastr.success('Elemento agregado exitosamente!');
                            } else {
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

                  function editDocumentType(id) {
                    save_method = "edit";
                    $('input[name=_method]').val('PATCH');
                    $("#documentType-form form")[0].reset();
                    $.ajax({
                      url: "{{ url('document_types') }}" + '/' + id + "/edit",
                      type: "GET",
                      dataType: "JSON",
                      success: function(data) {
                        $('#documentType-form').modal('show');
                        $('#id').val(data.id);
                        $('#type_document').val(data.type_document);
                      },
                      error : function() {
                        alert("No hay datos");
                      }
                    });
                  }

                   // Fin seccion Tipo de Documento


                   // Tabla para mostrar Caracterización

                   var tableCharacterizacions = $('#characterizations').DataTable({
                       destroy: true,
                       responsive: true,
                       processing: true,
                       serverSide: true,
                       language: {
                           "url": '/DataTables/datatables-spanish.json'
                       },
                       ajax: '/characterizations/get',
                       columns: [
                           { data: 'characterization_name', name: 'characterization_name' },
                           { data: 'status', name: 'status' },
                           { data: 'action', name: 'action', orderable: false, searchable: true },
                       ]
                   });


                   //Funciones para agregar y editar Caracterizaciones
                   function addCharacterization() {
                   save_method = "add";
                   $('input[name=_method]').val('POST');
                   $('#characterization-form form')[0].reset();
                   $('#characterization-form').modal('show');
                   }

                   $(function() {
                     $('#characterization-form form').on('submit' , function(e){
                       if (!e.isDefaultPrevented()){
                         var id = $('#id').val();
                         if (save_method == 'add') {
                           url = "{{ url('characterizations') }}";
                         }
                         else {
                           url = "{{ url('characterizations'). '/'}}" + id;
                         }
                         $.ajax({
                           url: url,
                           type: "POST",
                           data: $('#characterization-form form').serialize(),
                           success: function(response) {
                             $('#characterization-form').modal('hide');
                             tableCharacterizacions.ajax.reload();
                             if (save_method == 'add') {
                               toastr.options = {
                                 "positionClass": "toast-bottom-right"
                               }
                               toastr.success('Elemento agregado exitosamente!');
                             } else {
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

                   function editCharacterization(id) {
                     save_method = "edit";
                     $('input[name=_method]').val('PATCH');
                     $("#characterization-form form")[0].reset();
                     $.ajax({
                       url: "{{ url('characterizations') }}" + '/' + id + "/edit",
                       type: "GET",
                       dataType: "JSON",
                       success: function(data) {
                         $('#characterization-form').modal('show');
                         $('#id').val(data.id);
                         $('#characterization_name').val(data.characterization_name);
                       },
                       error : function() {
                         alert("No hay datos");
                       }
                     });
                   }

                    // Fin seccion Caracterización


                    // Tabla para mostrar Roles

                   var tableRoles = $('#roles').DataTable({
                        destroy: true,
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        language: {
                            "url": '/DataTables/datatables-spanish.json'
                        },
                        ajax: '/roles/get',
                        columns: [
                            { data: 'role', name: 'role' },
                            { data: 'action', name: 'action', orderable: false, searchable: true },
                        ]
                    });

                    //Funciones para agregar y editar Caracterizaciones
                    function addRole() {
                    save_method = "add";
                    $('input[name=_method]').val('POST');
                    $('#role-form form')[0].reset();
                    $('#role-form').modal('show');
                    }

                    $(function() {
                      $('#role-form form').on('submit' , function(e){
                        if (!e.isDefaultPrevented()){
                          var id = $('#id').val();
                          if (save_method == 'add') {
                            url = "{{ url('roles') }}";
                          }
                          else {
                            url = "{{ url('roles'). '/'}}" + id;
                          }
                          $.ajax({
                            url: url,
                            type: "POST",
                            data: $('#role-form form').serialize(),
                            success: function(response) {
                              $('#role-form').modal('hide');
                              tableRoles.ajax.reload();
                              if (save_method == 'add') {
                                toastr.options = {
                                  "positionClass": "toast-bottom-right"
                                }
                                toastr.success('Elemento agregado exitosamente!');
                              } else {
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

                    function editRole(id) {
                      save_method = "edit";
                      $('input[name=_method]').val('PATCH');
                      $("#role-form form")[0].reset();
                      $.ajax({
                        url: "{{ url('roles') }}" + '/' + id + "/edit",
                        type: "GET",
                        dataType: "JSON",
                        success: function(data) {
                          $('#role-form').modal('show');
                          $('#id').val(data.id);
                          $('#role').val(data.role);
                        },
                        error : function() {
                          alert("No hay datos");
                        }
                      });
                    }

                     // Fin seccion Roles



</script>

<script src="{{ asset('DataTables/appDatatables.js') }}"></script>
@endsection
