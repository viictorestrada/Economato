<!-- Modal para agregar Programas de Formación -->
<div class="modal fade" data-backdrop="static" id="modmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info text-light">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Programas</h5>
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
                  <form action="{{ url('programs') }}" method="post">
                    @csrf

                    <div class="form-group">
                      <label><i class="fa fa-mouse-pointer"></i> Seleccionar Centro de Formación <strong class="text-danger" style="font-size: 23px">*</strong></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                        </div>
                        <select class="form-control {{$errors->has('locations_id') ? 'is-invalid' : ''}}" name="locations_id" required autofocus>
                          <option hidden value="{{old('locations_id')}}"> -- Seleccione el Complejo -- </option>
                          @foreach ($location as $locations)
                            <option value="{{ $locations->id }}">{{ $locations->location_name }}</option>
                          @endforeach
                        </select>
                        <strong class="invalid-feedback">{{$errors->first('locations_id')}}</strong>
                      </div>
                    </div>


                    <div class="form-group">
                      <label><i class="fa fa-edit"></i> Nombre Programa <strong class="text-danger" style="font-size: 23px">*</strong></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                        </div>
                        <input class="form-control {{$errors->has('program_name') ? 'is-invalid' : ''}}" name="program_name" value="{{old('program_name')}}" required autocomplete="off" autofocus>
                        <strong class="invalid-feedback">{{$errors->first('program_name')}}</strong>
                      </div>
                    </div>

                    <div class="form-group">
                      <label><i class="fa fa-edit"></i> Versión del programa <strong class="text-danger" style="font-size: 23px">*</strong></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                        </div>
                        <input class="form-control {{$errors->has('program_version') ? 'is-invalid' : ''}}" name="program_version" value="{{old('program_version')}}" required autocomplete="off">
                        <strong class="invalid-feedback">{{$errors->first('program_version')}}</strong>
                      </div>
                    </div>

                    <div class="form-group">
                      <label><i class="fa fa-pencil-alt"></i> Descripción del programa <strong class="text-danger" style="font-size: 23px">*</strong></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-plus-circle"></i></span>
                        </div>
                        <textarea class="form-control {{$errors->has('program_description') ? 'is-invalid' : ''}}" name="program_description" value="{{old('descripcionModalidad')}}" rows="1" required></textarea>
                        <strong class="invalid-feedback">{{$errors->first('program_description')}}</strong>
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
