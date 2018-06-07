<!--Modal para agregar Resultados de aprendizaje -->

<div class="modal fade" data-backdrop="static" id="modresul" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info text-light">
        <h5 class="modal-title">Resultados de aprendizaje</h5>
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

                  <form action="{{ url('learning_results') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label><i class="fa fa-mouse-pointer"></i> Seleccionar Competencia <strong class="text-danger" style="font-size: 23px">*</strong></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-plus-circle"></i></span>
                        </div>
                        <select class="form-control {{$errors->has('id_competence') ? 'is-invalid' : ''}}" name="id_competence" required>
                          <option hidden value="{{old('id_competence')}}">Seleccione Competencia</option>
                          @foreach ($competence as $competences)
                            <option value="{{ $competences->id }}">{{ $competences->competence_name }}</option>
                          @endforeach
                        </select>
                        <strong class="invalid-feedback">{{$errors->first('id_competence')}}</strong>
                      </div>
                    </div>

                    <div class="form-group">
                      <label><i class="fa fa-pencil-alt"></i> Resultado de aprendizaje<strong class="text-danger" style="font-size: 23px">*</strong></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-plus-circle"></i></span>
                        </div>
                        <textarea class="form-control {{$errors->has('learning_result') ? 'is-invalid' : ''}}" name="learning_result" value="{{old('learning_result')}}" rows="1" required></textarea>
                        <strong class="invalid-feedback">{{$errors->first('learning_result')}}</strong>
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
