<!--Modal para agregar Competencias -->
<div class="modal fade" data-backdrop="static" id="competences-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info text-light">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Competencias</h5>
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
                  <form action="{{ url('competences') }}" method="post">
                    @csrf {{ method_field('POST') }}
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                      <label><i class="fa fa-mouse-pointer"></i> Seleccionar programa <strong class="text-danger" style="font-size: 23px">*</strong></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-plus-circle"></i></span>
                        </div>
                        <select class="form-control {{$errors->has('id_program') ? 'is-invalid' : ''}}" name="id_program" id="id_program" required>
                          <option hidden value="{{old('id_program')}}"> -- Seleccione el Programa -- </option>
                          @foreach ($program as $programs)
                            <option value="{{ $programs->id }}">{{ $programs->program_name }}</option>
                          @endforeach
                        </select>
                        <strong class="invalid-feedback">{{$errors->first('id_program')}}</strong>
                      </div>
                    </div>

                    <div class="form-group">
                      <label><i class="fa fa-edit"></i> Nombre de la competencia <strong class="text-danger" style="font-size: 23px">*</strong></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                        </div>
                        <input class="form-control {{$errors->has('competence_name') ? 'is-invalid' : ''}}" name="competence_name" id="competence_name" value="{{old('competence_name')}}" required autocomplete="off">
                        <strong class="invalid-feedback">{{$errors->first('competence_name')}}</strong>
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
