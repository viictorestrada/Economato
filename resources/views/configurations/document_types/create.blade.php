<!--Modal para agregar Tipos de Documentos -->

<div class="modal fade" data-backdrop="static" id="documentType-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    @csrf {{ method_field('POST') }}
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                      <label><i class="fa fa-edit"></i> Tipo de documento <strong class="text-danger" style="font-size: 23px">*</strong></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                        </div>
                        <input id="type_document" class="form-control {{$errors->has('type_document') ? 'is-invalid' : ''}}" name="type_document" value="{{ old('type_document') }}" required autocomplete="off" maxlength="255">
                        <strong class="invalid-feedback">{{$errors->first('type_document')}}</strong>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-outline-info btn-block">Agregar</button>

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
