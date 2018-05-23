@extends('layouts/layout')
@section('content')
  {{-- Navegación lateral --}}
  <section class="container-fluid mt-1">
    <div class="row">
      <section class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-around mt-2">

        <ul class="nav nav-pills nav-fill bg-secondary conf" id="v-pills-tab" role="tablist" aria-orientation="vertical">

          <li class="nav-item">
            <a class="nav-link active" id="v-pills-region-tab" data-toggle="pill" href="#v-pills-region" role="tab" aria-controls="v-pills-moda" aria-selected="true" style="color: #fff">Regional y Centros de Formación</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-moda" role="tab" aria-controls="v-pills-moda" aria-selected="true" style="color: #fff">Programas y presentación</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-compete" role="tab" aria-controls="v-pills-compete" aria-selected="false" style="color: #fff">Competencias y Resultados de Aprendizaje</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-tipous" role="tab" aria-controls="v-pills-tipous" aria-selected="false" style="color: #fff">Roles y Tipo de Documento</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-producto" role="tab" aria-controls="v-pills-producto" aria-selected="false" style="color: #fff">Tipo de Productos y Unidades de Medida</a>
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
              <h4 class="card-header bg-secondary text-light">Regional y Centro de Formación</h4>
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
                        <a href="#modregional"  data-toggle="modal" data-target="#modregional" class="btn btn-info">Agregar Regional</a>
                      </div>
                    </div>
                  </div>


                  <div class="col-sm-6">
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
                                  <th>Programa de formación</th>
                                  <th>Estado</th>
                                  <th>Acciones</th>
                                </tr>
                              </thead>
                            </table>
                          </div>
                        </section>
                        <hr class="bg-info">
                        <a href="#modcentro"  data-toggle="modal" data-target="#modcentro" class="btn btn-info">Agregar Centro</a>

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
              <h4 class="card-header bg-secondary text-light">Programas de formación</h4>
              <div class="card-body">

                <!--Formularios de Programa de formación  -->
                <div class="row">
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

                          <a href="#modmodal"  data-toggle="modal" data-target="#modmodal" class="btn btn-info">Agregar Programa</a>

                        </div>
                      </div>
                    </div>
                  </div>

                  <!--Formularios de Programa de Presentaciones  -->
                  <div class="col-sm-5">
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
                        <a href="#modpresen"  data-toggle="modal" data-target="#modpresen" class="btn btn-info">Agregar Presentación</a>
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
                        <a href="#modcompete"  data-toggle="modal" data-target="#modcompete" class="btn btn-info">Agregar Competencia</a>

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
                        <a href="#modresul"  data-toggle="modal" data-target="#modresul" class="btn btn-info">Agregar Resultado</a>
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
            <!--Panel de sección Roles y documento-->
            <div class="card border-secondary text-center">
              <h4 class="card-header bg-secondary text-light">Roles y Tipos de Documento</h4>
              <div class="card-body">
                <div class="row">
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
                        <a href="#modtipous"  data-toggle="modal" data-target="#modtipous" class="btn btn-info">Agregar Roles</a>
                      </div>
                    </div>
                  </div>


                  <div class="col-sm-6">
                    <div class="card border-info">
                      <div class="card-body">
                        <h4 class="card-title text-center">Tipos de Documentos</h4>
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
                        <a href="#modtipodoc"  data-toggle="modal" data-target="#modtipodoc" class="btn btn-info">Agregar Tipo de Documento</a>
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
           <h4 class="card-header bg-secondary text-light">Tipos de Productos y Unidades de Medida</h4>
           <div class="card-body">

             <div class="row">
               <div class="col-sm-6">
                 <div class="card border-info">
                   <div class="card-body">
                     <h4 class="card-title text-center">Tipos de Productos</h4>
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
                     <a href="#modtipoprod" data-toggle="modal" data-target="#modtipoprod" class="btn btn-info">Agregar Tipo de Producto</a>
                   </div>
                 </div>
               </div>

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
                     <a href="#modunidmed" data-toggle="modal" data-target="#modunidmed" class="btn btn-info">Agregar Unidad de Medida</a>
                   </div>
                 </div>
               </div>
             </div>

           </div>
         </div>
          <!--Fin del contenido-->
        </section>
      </div>
    </section>

    <!--CREACIÓN DE VENTANAS MODALES-->

    <!-- Modal para agregar Regional -->

    <div class="modal fade" id="modregional" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-info text-light">
            <h5 class="modal-title" id="exampleModalLabel">Registrar Regional</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="card border-secondary">
                    <div class="card-body">
                      <form action="{{ url('regions') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label><i class="fa fa-edit"></i> Nombre de la Regional <strong class="text-danger" style="font-size: 23px">*</strong></label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                            </div>
                            <input id="nombreRegional" class="form-control {{$errors->has('region_name') ? 'is-invalid' : ''}}" name="region_name" value="{{ old('region_name') }}" required autocomplete="off" maxlength="255">
                            <strong class="invalid-feedback">{{$errors->first('region_name')}}</strong>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-block">Agregar</button>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal para agregar Centro de formación -->
    <div class="modal fade" data-backdrop="static" id="modcentro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-info text-light">
            <h5 class="modal-title" id="exampleModalLabel">Registrar Centro de formación</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="card border-secondary">
                    <div class="card-body">
                      <form action={{ url('locations') }} method="post">
                        @csrf
                        <div class="form-group">
                          <label><i class="fa fa-mouse-pointer"></i> Seleccionar Regional <strong class="text-danger" style="font-size: 23px">*</strong></label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                            </div>
                            <select class="form-control {{$errors->has('regional') ? 'is-invalid' : ''}}" name="regional" required autofocus>
                              <option hidden value="{{old('regional')}}">Seleccione la Regional</option>
                              @foreach ($region as $regional)
                                <option value="{{ $regional->id }}">{{ $regional->region_name }}</option>
                              @endforeach
                            </select>
                            <strong class="invalid-feedback">{{$errors->first('regional')}}</strong>
                          </div>
                        </div>

                        <div class="form-group">
                          <label><i class="fa fa-edit"></i> Nombre centro de formación <strong class="text-danger" style="font-size: 23px">*</strong></label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                            </div>
                            <input class="form-control {{$errors->has('location_name') ? 'is-invalid' : ''}}" name="location_name" value="{{ old('location_name') }}" required autocomplete="off" maxlength="255">
                            <strong class="invalid-feedback">{{$errors->first('location_name')}}</strong>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-block">Agregar</button>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal para agregar Programas de Formación -->
    <div class="modal fade" data-backdrop="static" id="modmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-info text-light">
            <h5 class="modal-title" id="exampleModalLabel">Registrar Programas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="card border-secondary">
                    <div class="card-body">
                      <form action="{{ url('programs') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label><i class="fa fa-edit"></i> Nombre Programa <strong class="text-danger" style="font-size: 23px">*</strong></label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                            </div>
                            <input class="form-control {{$errors->has('program_name') ? 'is-invalid' : ''}}" name="program_name" value="{{old('program_name')}}" required autocomplete="off" autofocus>
                            <strong class="invalid-feedback">{{$errors->first('program_name')}}</strong>
                          </div>
                        </div>
                        <div class="form-group">
                          <label><i class="fa fa-edit"></i> Versión del programa <strong class="text-danger" style="font-size: 23px">*</strong></label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                            </div>
                            <input class="form-control {{$errors->has('program_version') ? 'is-invalid' : ''}}" name="program_version" value="{{old('program_version')}}" required autocomplete="off">
                            <strong class="invalid-feedback">{{$errors->first('program_version')}}</strong>
                          </div>
                        </div>

                        <div class="form-group">
                          <label><i class="fa fa-pencil-alt"></i> Descripción del programa <strong class="text-danger" style="font-size: 23px">*</strong></label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-plus-circle"></i></span>
                            </div>
                            <textarea class="form-control {{$errors->has('program_description') ? 'is-invalid' : ''}}" name="program_description" value="{{old('descripcionModalidad')}}" rows="1" required></textarea>
                            <strong class="invalid-feedback">{{$errors->first('program_description')}}</strong>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-block">Agregar</button>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal para agregar Regional -->

    <div class="modal fade" id="modpresen" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-info text-light">
            <h5 class="modal-title" id="exampleModalLabel">Registrar Presentación</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="card border-secondary">
                    <div class="card-body">
                      <form action="{{ url('presentations') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label><i class="fa fa-edit"></i> Nombre de la Presentación <strong class="text-danger" style="font-size: 23px">*</strong></label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                            </div>
                            <input id="nombreRegional" class="form-control {{$errors->has('presentation') ? 'is-invalid' : ''}}" name="presentation" value="{{ old('presentation') }}" required autocomplete="off" maxlength="255">
                            <strong class="invalid-feedback">{{$errors->first('presentation')}}</strong>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-block">Agregar</button>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Modal para agregar Competencias -->
    <div class="modal fade" data-backdrop="static" id="modcompete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-info text-light">
            <h5 class="modal-title" id="exampleModalLabel">Registrar Competencias</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="card border-secondary">
                    <div class="card-body">
                      <form action="{{ url('competences') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label><i class="fa fa-mouse-pointer"></i> Seleccionar programa <strong class="text-danger" style="font-size: 23px">*</strong></label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-plus-circle"></i></span>
                            </div>
                            <select class="form-control {{$errors->has('program_name') ? 'is-invalid' : ''}}" name="program_name" required>
                              <option hidden value="{{old('program_name')}}">Seleccione el Programa</option>
                              @foreach ($program as $programs)
                                <option value="{{ $programs->id }}">{{ $programs->program_name }}</option>
                              @endforeach
                            </select>
                            <strong class="invalid-feedback">{{$errors->first('program_name')}}</strong>
                          </div>
                        </div>

                        <div class="form-group">
                          <label><i class="fa fa-edit"></i> Nombre de la competencia <strong class="text-danger" style="font-size: 23px">*</strong></label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                            </div>
                            <input class="form-control {{$errors->has('competence_name') ? 'is-invalid' : ''}}" name="competence_name" value="{{old('competence_name')}}" required autocomplete="off">
                            <strong class="invalid-feedback">{{$errors->first('competence_name')}}</strong>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-block">Agregar</button>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Modal para agregar Resultados de aprendizaje -->

    <div class="modal fade" data-backdrop="static" id="modresul" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-info text-light">
            <h5 class="modal-title">Resultados de aprendizaje</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="card border-secondary">
                    <div class="card-body">

                      <form action="{{ url('learning_results') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label><i class="fa fa-mouse-pointer"></i> Seleccionar Competencia <strong class="text-danger" style="font-size: 23px">*</strong></label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-plus-circle"></i></span>
                            </div>
                            <select class="form-control {{$errors->has('competence_name') ? 'is-invalid' : ''}}" name="competence_name" required>
                              <option hidden value="{{old('competence_name')}}">Seleccione Competencia</option>
                              @foreach ($competence as $competences)
                                <option value="{{ $competences->id }}">{{ $competences->competence_name }}</option>
                              @endforeach
                            </select>
                            <strong class="invalid-feedback">{{$errors->first('competence_name')}}</strong>
                          </div>
                        </div>

                        <div class="form-group">
                          <label><i class="fa fa-pencil-alt"></i> Resultado de aprendizaje<strong class="text-danger" style="font-size: 23px">*</strong></label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-plus-circle"></i></span>
                            </div>
                            <textarea class="form-control {{$errors->has('learning_result') ? 'is-invalid' : ''}}" name="learning_result" value="{{old('learning_result')}}" rows="1" required></textarea>
                            <strong class="invalid-feedback">{{$errors->first('learning_result')}}</strong>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-block">Agregar</button>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Modal para agregar Roles -->

    <div class="modal fade" data-backdrop="static" id="modtipous" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-info text-light">
            <h5 class="modal-title" id="exampleModalLabel">Registrar Roles</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="card border-secondary">
                    <div class="card-body">
                      <form action="{{ url('roles') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label><i class="fa fa-edit"></i> Registrar Rol <strong class="text-danger" style="font-size: 23px">*</strong></label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                            </div>
                            <input id="" class="form-control {{$errors->has('role') ? 'is-invalid' : ''}}" name="role" value="{{ old('role') }}" required autocomplete="off" maxlength="255">
                            <strong class="invalid-feedback">{{$errors->first('role')}}</strong>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-block">Agregar</button>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Modal para agregar Tipos de Documentos -->

    <div class="modal fade" data-backdrop="static" id="modtipodoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-info text-light">
            <h5 class="modal-title" id="exampleModalLabel">Registrar Tipos de documentos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="card border-secondary">
                    <div class="card-body">
                      <form action="{{ url('document_types') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label><i class="fa fa-edit"></i> Tipo de documento <strong class="text-danger" style="font-size: 23px">*</strong></label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                            </div>
                            <input id="" class="form-control {{$errors->has('type_document') ? 'is-invalid' : ''}}" name="type_document" value="{{ old('type_document') }}" required autocomplete="off" maxlength="255">
                            <strong class="invalid-feedback">{{$errors->first('type_document')}}</strong>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-block">Agregar</button>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal para agregar Tipos de Productos  -->
    <div class="modal fade" data-backdrop="static" id="modtipoprod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-info text-light">
            <h5 class="modal-title" id="exampleModalLabel">Registrar Tipos de Productos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="card border-secondary">
                    <div class="card-body">
                      <form action="{{ url('product_types') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label><i class="fa fa-edit"></i> Nombre tipo de producto <strong class="text-danger" style="font-size: 23px">*</strong></label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                            </div>
                            <input id="" class="form-control {{$errors->has('product_type_name') ? 'is-invalid' : ''}}" name="product_type_name" value="{{ old('product_type_name') }}" required autocomplete="off" maxlength="255">
                            <strong class="invalid-feedback">{{$errors->first('product_type_name')}}</strong>
                          </div>
                        </div>

                        <label><i class="fa fa-edit"></i> Descripción tipo de producto <strong class="text-danger" style="font-size: 23px">*</strong></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                          </div>
                          <input id="" class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" name="description" value="{{ old('description') }}" required autocomplete="off" maxlength="255">
                          <strong class="invalid-feedback">{{$errors->first('description')}}</strong>
                        </div>

                        <button type="submit" class="btn btn-info btn-block">Agregar tipo de producto</button>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal para agregar Unidades de medida  -->
    <div class="modal fade" data-backdrop="static" id="modunidmed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-info text-light">
            <h5 class="modal-title" id="exampleModalLabel">Registrar Unidad de medida</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="card border-secondary">
                    <div class="card-body">
                      <form action="{{ url('measures') }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label><i class="fa fa-edit"></i> Nombre Unidad de medida <strong class="text-danger" style="font-size: 23px">*</strong></label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                            </div>
                            <input id="" class="form-control {{$errors->has('measure_name') ? 'is-invalid' : ''}}" name="measure_name" value="{{ old('measure_name') }}" required autocomplete="off" maxlength="255">
                            <strong class="invalid-feedback">{{$errors->first('measure_name')}}</strong>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-block">Agregar</button>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--FINAL DE LAS VENTANAS MODALES-->
  @stop

  @section('script')
      <script src="{{ asset('DataTables/appDatatables.js') }}"></script>
  @endsection
