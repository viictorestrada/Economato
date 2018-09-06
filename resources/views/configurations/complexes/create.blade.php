<!--Modal para agregar Complejos -->

<div class="modal fade" data-backdrop="static" id="complexes-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info text-light">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Complejo</h5>
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
                      <label><i class="fa fa-mouse-pointer"></i> Seleccionar Regional <strong class="text-danger" style="font-size: 23px">*</strong></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-plus-circle"></i></span>
                        </div>
                        <select class="form-control {{$errors->has('id_region') ? 'is-invalid' : ''}}" name="id_region" id="id_region" required>
                          <option hidden value="{{old('id_region')}}">Seleccione la Regional </option>
                          @foreach ($region as $regions)
                            <option value="{{ $regions->id }}">{{ $regions->region_name }}</option>
                          @endforeach
                        </select>
                        <strong class="invalid-feedback">{{$errors->first('id_region')}}</strong>
                      </div>
                    </div>

                    <div class="form-group">
                      <label><i class="fa fa-edit"></i> Nombre del Complejo <strong class="text-danger" style="font-size: 23px">*</strong></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                        </div>
                        <input class="form-control {{$errors->has('complex_name') ? 'is-invalid' : ''}}" name="complex_name" id="complex_name" value="{{old('complex_name')}}" required autocomplete="off">
                        <strong class="invalid-feedback">{{$errors->first('complex_name')}}</strong>
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
