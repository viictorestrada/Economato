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
                  <div class="card border-secondary">
                      <div class="card-body">
                          <div class="form-group">
                            <div class="table-responsive">
                              {{Form::open(['url' => 'productionHasProducts', 'class' => 'form'])}}
                              {{Form::hidden('center_production_orders_id', null, ['id' => 'idProduction'])}}
                              <table class="table table-bordered">
                                <thead>
                                  <th>Insumos</th>
                                  <th>Unidad de medida</th>
                                  <th>Cantidad</th>
                                  <th><button type="button" class="btn btn-outline-info" id="addColumns"><i class="fa fa-plus-circle"></i></button></th>
                                </thead>
                                <tbody id="fillProductionOrder">
                                  
                                </tbody>
                              </table>
                            </div>
                            <div class="form-group">
                                {{Form::label('files_id', 'Ficha asociada')}}
                                {{ Form::select('files_id', $file, null, ['class' => 'form-control'])}}
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