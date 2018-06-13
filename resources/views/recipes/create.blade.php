<div class="modal fade" id="recipes-form" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info text-light">
          <h5 class="modal-title" id="exampleModalLabel">Registrar Receta</h5>
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
                    <form method="post" data-toggle="validator">
                      @csrf {{ method_field('POST') }}
                      <input type="hidden" id="id" name="id">
                      <div class="form-group">
                        <label><i class="fa fa-edit"></i> Nombre de la Receta <strong class="text-danger" style="font-size: 23px">*</strong></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                          </div>
                          <input id="recipe_name" class="form-control {{$errors->has('recipe_name') ? 'is-invalid' : ''}}" name="recipe_name" value="{{ old('recipe_name') }}" required autocomplete="off" maxlength="255">
                          <strong class="invalid-feedback">{{$errors->first('recipe_name')}}</strong>
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
