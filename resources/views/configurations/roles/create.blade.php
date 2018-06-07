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
