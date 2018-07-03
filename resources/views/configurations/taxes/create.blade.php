<!-- Modal para agregar IVA -->
<div class="modal fade" id="taxes-form" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info text-light">
          <h5 class="modal-title" id="exampleModalLabel">Registrar IVA</h5>
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
                    <form method="post">
                      @csrf {{ method_field('POST') }}
                      <input type="hidden" name="id" id="id">
                      <div class="form-group">
                        <label><i class="fa fa-edit"></i>Porcentaje de IVA <strong class="text-danger" style="font-size: 23px">*</strong></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                          </div>
                          <input id="tax" class="form-control {{$errors->has('tax') ? 'is-invalid' : '' }}" name="tax" value="{{ old('tax') }}" required autocomplete="off" maxlength="255">
                          <strong class="invalid-feedback">{{$errors->first('tax')}}</strong>
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
