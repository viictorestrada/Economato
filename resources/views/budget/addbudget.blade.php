<!--Modal para Addicionar Presupuesto -->
<div class="modal fade" data-backdrop="static" id="addBudget-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info text-light">
          <h5 class="modal-title" id="exampleModalLabel">Adicionar Presupuesto</h5>
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
                        <label><i class="fa fa-mouse-pointer"></i> Seleccionar Código <strong class="text-danger" style="font-size: 23px">*</strong></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-plus-circle"></i></span>
                          </div>
                          <select class="form-control {{$errors->has('budget_id') ? 'is-invalid' : ''}}" name="budget_id" id="budget_id" required>
                            <option hidden value="{{old('budget_id')}}"> -- Seleccione el Código -- </option>
                            @foreach ($budget as $budgets)
                              <option value="{{ $budgets->id }}">{{ $budgets->budget_code }}</option>
                            @endforeach
                          </select>
                          <strong class="invalid-feedback">{{$errors->first('budget_id')}}</strong>
                        </div>
                      </div>

                      <div class="form-group">
                        <label><i class="fa fa-edit"></i> Valor presupuesto adicional <strong class="text-danger" style="font-size: 23px">*</strong></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                          </div>
                          <input class="form-control {{$errors->has('aditional_budget') ? 'is-invalid' : ''}}" name="aditional_budget" id="aditional_budget" value="{{old('aditional_budget')}}" required autocomplete="off">
                          <strong class="invalid-feedback">{{$errors->first('aditional_budget')}}</strong>
                        </div>
                      </div>

                      <div class="form-group">
                          <label><i class="fa fa-edit"></i> Código <strong class="text-danger" style="font-size: 23px">*</strong></label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-barcode fa-plus-circle"></i></span>
                            </div>
                            <input class="form-control {{$errors->has('aditional_budget_code') ? 'is-invalid' : ''}}" name="aditional_budget_code" id="code" value="{{old('aditional_budget_code')}}" required autocomplete="off">
                            <strong class="invalid-feedback">{{$errors->first('aditional_budget_code')}}</strong>
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
