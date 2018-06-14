<!-- Modal para agregar Tipos de Productos  -->
<div class="modal fade" data-backdrop="static" id="productType-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info text-light">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Tipos de Productos</h5>
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
                  <form action="{{ url('product_types') }}" method="post">
                    @csrf {{ method_field('POST') }}
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                      <label><i class="fa fa-edit"></i> Nombre tipo de producto <strong class="text-danger" style="font-size: 23px">*</strong></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                        </div>
                        <input class="form-control {{$errors->has('product_type_name') ? 'is-invalid' : ''}}" name="product_type_name" id="product_type_name" value="{{ old('product_type_name') }}" required autocomplete="off" maxlength="255">
                        <strong class="invalid-feedback">{{$errors->first('product_type_name')}}</strong>
                      </div>
                    </div>

                    <div class="form-group">
                      <label><i class="fa fa-edit"></i> Descripción tipo de producto <strong class="text-danger" style="font-size: 23px">*</strong></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                        </div>
                        <input class="form-control {{$errors->has('description') ? 'is-invalid' : ''}}" name="description" id="description" value="{{ old('description') }}" required autocomplete="off" maxlength="255">
                        <strong class="invalid-feedback">{{$errors->first('description')}}</strong>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-info btn-block">Agregar tipo de producto</button>

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
