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
                  <div class="col">
                    <a href="{{ url('users/create') }}" class="text-secondary text-center" style="text-decoration: none;">
                      <h1 class="display-1 text-center"><i class="fa fa-users"></i></h1>
                      <p class="text-center">Usuarios</p></a>
                    </div>
                    <div class="col">
                      <a href="{{ url('products') }}" class="text-secondary text-center" style="text-decoration: none;">
                        <h1 class="display-1 text-center"><i class="fa fa-shopping-cart"></i></h1>
                        <p class="text-center">Productos</p></a>
                      </div>
                      <div class="col">
                        <a href="#" class="text-secondary text-center" style="text-decoration: none;">
                          <h1 class="display-1 text-center"><i class="fa fa-file"></i></h1>
                          <p class="text-center">Facturas</p></a>
                        </div>
                        <div class="col">
                          <a href="{{ url('reports') }}" class="text-secondary text-center" style="text-decoration: none;">
                            <h1 class="display-1 text-center"><i class="fa fa-chart-line"></i></i></h1>
                            <p class="text-center">Informes</p></a>
                          </div>
                          <!--Final de fila-->
                        </div>
                        <!--Inicio de segunda fila-->
                        <div class="row">

                          <div class="col">
                            <a href="#" class="text-secondary text-center" style="text-decoration: none;">
                              <h1 class="display-1 text-center"><i class="fa fa-book"></i></h1>
                              <p class="text-center">Contratos</p></a>
                            </div>
                            <div class="col">
                              <a href="#" class="text-secondary text-center" style="text-decoration: none;">
                                <h1 class="display-1 text-center"><i class="fab fa-bitcoin"></i></h1>
                                <p class="text-center">Prestamos</p></a>
                              </div>
                              <div class="col">
                                <a href="{{ url('files/create') }}" class="text-secondary text-center" style="text-decoration: none;">
                                  <h1 class="display-1 text-center"><i class="fa fa-globe"></i></h1>
                                  <p class="text-center">Fichas</p></a>
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
                              <!--Vista HTML Diseñada por Porras para el manejo de las solicitudes-->
                              <!--Entrada de Busqueda de Regional para editar:-->
                              <div class="row">
                                <div class="col-3 align-self-end">
                                  <label class="sr-only" for="inlineFormInputGroup">Búsqueda</label>
                                  <div class="input-group mb-2 mb-sm-0">
                                    <div class="input-group-addon bg-secondary"><span class="oi oi-magnifying-glass text-light"></span></div>
                                    <input type="text" class="form-control border-secondary" id="buscar" placeholder="Buscar">
                                  </div>
                                </div>

                                <div class="col-9">
                                  <div class="card border-success">
                                    <div class="card-body">
                                      <h4 class="card-title text-center">Información importante</h4>
                                      <hr class="bg-success">
                                      <section id="tbl_prog">
                                        With supporting text below as a natural lead-in to additional content
                                      </section>
                                      <!--a href="#" class="btn btn-primary">Agregar Programa</a-->
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <br>
                              <div class="tabla_datos" id="resultado">

                              </div>
                              <hr class="bg-success">

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
                        </div>
                        <!--Fin del contenido-->

                      </div>
                    </section>

                  </div>
                </section>
              @endsection
