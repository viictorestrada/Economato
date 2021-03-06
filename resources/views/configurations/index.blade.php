@extends('layouts/layout')
@section('title', 'Configurations')
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
        <li class="nav-item">
            <a class="nav-link" id="v-pills-iva-tab" data-toggle="pill" href="#v-pills-iva" role="tab" aria-controls="v-pills-iva" aria-selected="false" style="color: #fff">IVA</a>
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
                      <button onclick="addRegion()" class="btn btn-outline-info"><i class="fa fa-plus-circle fa-lg"></i> Agregar Regional</button>
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
                      <button onclick="addComplex()" class="btn btn-outline-info"><i class="fa fa-plus-circle fa-lg"></i> Agregar Complejo</button>
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
                      <button onclick="addLocation()" class="btn btn-outline-info"><i class="fa fa-plus-circle fa-lg"></i> Agregar Centro de formación</button>
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
                      <button onclick="addProgram()" class="btn btn-outline-info"><i class="fa fa-plus-circle fa-lg"></i> Agregar Programa de formación</button>
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
                      <button onclick="addCompetence()" class="btn btn-outline-info"><i class="fa fa-plus-circle fa-lg"></i> Agregar Competencia</button>
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
                      <button onclick="addLearningResult()" class="btn btn-outline-info"><i class="fa fa-plus-circle fa-lg"></i> Agregar Competencia</button>
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
                      <button onclick="addProductType()" class="btn btn-outline-info "><i class="fa fa-plus-circle fa-lg"></i> Agregar Tipo de Producto</button>
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
                      <button onclick="addPresentation()" class="btn btn-outline-info "><i class="fa fa-plus-circle fa-lg"></i> Agregar Presentación</button>
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
                      <button onclick="addMeasure()" class="btn btn-outline-info"><i class="fa fa-plus-circle fa-lg"></i> Agregar Unidad de Medida</button>
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
                      <button onclick="addDocumentType()" class="btn btn-outline-info"><i class="fa fa-plus-circle fa-lg"></i> Agregar Tipo de Documento</button>
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
                      <button onclick="addCharacterization()" class="btn btn-outline-info"><i class="fa fa-plus-circle fa-lg"></i> Agregar Caracterización</button>
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
                      <button onclick="addRole()" class="btn btn-outline-info"><i class="fa fa-plus-circle fa-lg"></i> Agregar Roles</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Contenido IVA-->
        <div class="tab-pane fade" id="v-pills-iva" role="tabpanel" aria-labelledby="v-pills-settings-tab">
            <div class="card border-secondary text-center">
              <h4 class="card-header bg-secondary text-light">IVA</h4>
              <div class="card-body">
                <div class="row d-flex justify-content-center">
                  <div class="col-md-7">
                    <div class="card border-info">
                      <div class="card-body">
                        <h4 class="card-title text-center">IVA</h4>
                        <hr  class="bg-info">
                        <section id="tbl_tipoprod">
                          <div class="table-responsive">
                            <table class="table table table-bordered table-sm" width="100%" id="taxesTable">
                              <thead class="bg-secondary text-light">
                                <tr>
                                  <th>IVA</th>
                                  <th>Acciones</th>
                                </tr>
                              </thead>
                            </table>
                          </div>
                        </section>
                        <hr class="bg-info">
                        <button onclick="addTaxes()" class="btn btn-outline-info"><i class="fa fa-plus-circle fa-lg"></i> Agregar IVA</button>
                      </div>
                    </div>
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
          @include('configurations.taxes.create')



          <!--FINAL DE LAS VENTANAS MODALES-->


        @stop

@section('script')
<script src="{{ asset('DataTables/configurationsFunctions.js') }}"></script>
<script src="{{ asset('js/modalsValidation.js') }}"></script>
@endsection
