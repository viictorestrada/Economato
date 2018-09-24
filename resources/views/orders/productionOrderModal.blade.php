<div class="modal fade bd-example-modal-lg" id="productionOrderModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info text-light">
          <h5 class="modal-title" id="exampleModalLabel">Productos del pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-12">
                  {{Form::open(['url' => 'productionHasProducts', 'class' => 'form'])}}
                  <div class="card border-secondary">
                      <div class="card-body">
                          <div class="form-group">
                            {{-- <div class="table-responsive"> --}}
                              {{-- <input type="hidden" name="center_production_orders_id" value="" id="idProduction"> --}}
                              {{Form::hidden('center_production_orders_id', null, ['id' => 'idProduction'])}}
                              <h3>Productos</h3>
                              <table class="table table-bordered table-responsive">
                                <thead>
                                  <th>Insumos</th>
                                  <th>Unidad de medida</th>
                                  <th>Cantidad</th>
                                  <th><button type="button" class="btn btn-outline-info" id="addColumns"><i class="fa fa-plus-circle"></i></button></th>
                                </thead>
                                <tbody id="fillProductionOrder">
                                  
                                </tbody>
                              </table>
                            <hr>
                            <h3>Fichas</h3>
                            <div class="input-group mb-3">
                            {{ Form::select('files_id[]', $file, null, ['class' => 'form-control', 'aria-describedby'=>"dependence"])}}
                            <div class="input-group-append">
                              <button type="button" class="btn btn-outline-info" id="dependence"><i class="fa fa-plus-circle"></i></button>
                          </div>
                          </div>
                            <div class="form-group" id="fill_me">

                            </div>
                          </div> 
                      </div>
                      <div class="modal-footer">
                          <input type="submit" class="btn btn-outline-info" value="Modificar">
                          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                        {{ Form::close()}}
                    </div>
                  </div>       
            </div>
          </div>
          
      </div>
    </div>
  </div>