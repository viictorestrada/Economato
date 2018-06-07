<!-- Modal para agregar Caracterización  -->
<div class="modal fade" data-backdrop="static" id="modcaract" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info text-light">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Caracterización</h5>
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
                  <form action="{{ url('characterizations') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label><i class="fa fa-edit"></i> Nombre de la caracterización <strong class="text-danger" style="font-size: 23px">*</strong></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                        </div>
                        <input id="" class="form-control {{$errors->has('characterization_name') ? 'is-invalid' : ''}}" name="characterization_name" value="{{ old('characterization_name') }}" required autocomplete="off" maxlength="255">
                        <strong class="invalid-feedback">{{$errors->first('characterization_name')}}</strong>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-info btn-block">Agregar Caracterización</button>

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
