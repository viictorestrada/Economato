@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center"><h4>Confirmación de Pedidos</h4></div>
          <div class="card-body">
            <div class="col-12 d-flex justify-content-end">
              <div class="card-title"><h4>Lista de Pedidos</h4></div><hr>
              {{-- <div><a type="button" href="{{ url('users/create') }}" class="btn btn-info "><span class="fa fa-user-plus"></span> Agregar Usuario</a></div> --}}
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-md" width="100%" id="users">
                <thead>
                  <tr>
                    <th>Resultado de aprendizaje</th>
                    <th>Instructor</th>
                    <th>Correo</th>
                    <th>Ficha</th>
                    <th>Fecha de Pedido</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr id="1"  style="">
                    <td>Cocinar</td>
                    <td>Julián</td>
                    <td>Jaflorez64@misena.edu.co</td>
                    <td>1355170</td>
                    <td>2018-06-24</td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" onclick="confirmedOrder('1')"  data-toggle="tooltip"  title="Aceptar Pedido" >
                            <label class="custom-control-label" for="customCheck1"></label>
                          </div>
                    </td>
                    <td>
                      <button onclick="detailsOrder()" id="fila1" class="btn btn-social-icon  btn-light"  data-toggle="tooltip"  title="Detalle Pedido" ><i class="fa fa-eye fa-lg" ></i></button>
                    </td>
                  </tr>
                    <tr id="2" style="">
                    <td>Cocinar</td>
                    <td>Camilo</td>
                    <td>ctabares06@misena.edu.co</td>
                    <td>1355169</td>
                    <td>2018-06-22</td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck" onclick="confirmedOrder('2')"  data-toggle="tooltip"  title="Aceptar Pedido" >
                            <label class="custom-control-label" for="customCheck"></label>
                          </div>
                    </td>
                    <td>
                      <button onclick="detailsOrder()" id="fila2" class="btn btn-social-icon  btn-light"  data-toggle="tooltip"  title="Detalle Pedido" ><i class="fa fa-eye fa-lg" ></i></button>
                    </td>
                  </tr>
                  <tr id="3" style="">
                      <td>Cocinar</td>
                      <td>Sergio</td>
                      <td>sergio54@misena.edu.co</td>
                      <td>1355169</td>
                      <td>2018-06-23</td>
                      <td>
                          <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="customCheck" onclick="confirmedOrder('2')"  data-toggle="tooltip"  title="Aceptar Pedido" >
                              <label class="custom-control-label" for="customCheck"></label>
                            </div>
                      </td>
                      <td>
                        <button onclick="detailsOrder()" id="fila2" class="btn btn-social-icon  btn-light"  data-toggle="tooltip"  title="Detalle Pedido" ><i class="fa fa-eye fa-lg" ></i></button>
                      </td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalOrderDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <h3 style="text:align:center">Detalle de la receta</h3>

              <br>
              <h4>arroz con pollo</h4>
              <br>
              <table width="100%">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Presentación</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Arroz</td>
                    <td>1</td>
                    <td>Bolsa</td>
                  </tr>
                  <tr>
                    <td>Pollo</td>
                    <td>1</td>
                    <td>Libra</td>
                  </tr>
                  <tr>
                    <td>Aceite</td>
                    <td>1</td>
                    <td>Litro</td>
                  </tr>
                </tbody>
              </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('script')
<script>
function detailsOrder(){
  $("#modalOrderDetails").modal();
}

function  confirmedOrder(id) {
  toastr.options = {
    "positionClass": "toast-bottom-right"
  }

  toastr.success("Pedido Aprobado");
$("#"+id).css("display", "none");
}

</script>
@endsection
