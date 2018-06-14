<!-- Modal para agregar Centro de formación -->
<div class="modal fade" data-backdrop="static" id="locations-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info text-light">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Centro de formación</h5>
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
                  <form action={{ url('locations') }} method="post">
                    @csrf {{ method_field('POST') }}
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                      <label><i class="fa fa-mouse-pointer"></i> Seleccionar Complejo <strong class="text-danger" style="font-size: 23px">*</strong></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                        </div>
                        <select class="form-control {{$errors->has('id_complex') ? 'is-invalid' : ''}}" name="id_complex" id="id_complex" required autofocus>
                          <option hidden value="{{old('id_complex')}}"> -- Seleccione el Complejo -- </option>
                          @foreach ($complex as $complex)
                            <option value="{{ $complex->id }}">{{ $complex->complex_name }}</option>
                          @endforeach
                        </select>
                        <strong class="invalid-feedback">{{$errors->first('id_complex')}}</strong>
                      </div>
                    </div>

                    <div class="form-group">
                      <label><i class="fa fa-edit"></i> Nombre centro de formación <strong class="text-danger" style="font-size: 23px">*</strong></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                        </div>
                        <input class="form-control {{$errors->has('location_name') ? 'is-invalid' : ''}}" name="location_name" id="location_name" value="{{ old('location_name') }}" required autocomplete="off" maxlength="255">
                        <strong class="invalid-feedback">{{$errors->first('location_name')}}</strong>
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
