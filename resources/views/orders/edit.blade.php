<div class="modal fade bd-example-modal-lg" id="edit-order" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info text-light">
          <h5 class="modal-title" id="exampleModalLabel">Productos de la receta</h5>
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
                      <input type="hidden" id="id" name="id">

                      <div class="form-group" id="append">
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <th>Insumos</th>
                              <th>Unidad de medida</th>
                              <th>Cantidad</th>
                              <th><button type="button" class="btn btn-info addProduct"><i class="fa fa-plus-circle"></i></button></th>
                            </thead>
                            <tbody id="orderEditDetails">

                            </tbody>
                          </table>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-info">Modificar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
