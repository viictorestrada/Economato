{{-- <div class="form-group col-lg-6 col-md-6">
  <label for="program_id">Programa de Formación <strong class="text-danger">*</strong></label>
  <select class="form-control {{ $errors->has('program_id') ? 'is-invalid' : '' }}" name="program_id">
    <option hidden value="">--Seleccionar Programa--</option>
    @foreach ($programs as $programa)
      <option value="{{ $programa->id }}">{{ $programa->program_name or old('program_id') }}</option>
    @endforeach
  </select>
  <strong class="invalid-feedback">{{ $errors->first('program_id') }}</strong>
</div> --}}

<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('program_id', 'Programa de Formación') }}
  {{ Form::select('program_id', $programs, null, ['class' => 'form-control']) }}
</div>

{{-- <div class="form-group col-lg-6 col-md-6">
  <label for="program_id">Caracterización <strong class="text-danger">*</strong></label>
  <select class="form-control {{ $errors->has('characterization_id') ? 'is-invalid' : '' }}" name="characterization_id">
    <option hidden value="{{ $file->characterization_id or old('characterization_id') }}">--Seleccionar Caracterización--</option>
    @foreach ($characterizations as $caracterizacion)
      <option value="{{ $caracterizacion->id }}">{{ $caracterizacion->characterization_name }}</option>
    @endforeach
  </select>
  <strong class="invalid-feedback">{{ $errors->first('characterization_id') }}</strong>
</div> --}}

<div class="form-group col-lg-6 col-md-6">
    {{ Form::label('characterization_id', 'Caracterización') }}
    {{ Form::select('characterization_id', $characterizations, null, ['class' => 'form-control']) }}
  </div>

{{-- <div class="form-group col-lg-4 col-md-4">
  <label for="file_number">Número de Ficha <strong class="text-danger">*</strong></label>
  <input type="number" name="file_number" class="form-control {{ $errors->has('file_number') ? 'is-invalid' : '' }}" value="{{ $file->file_number or old('file_number') }}">
  <strong class="invalid-feedback">{{ $errors->first('file_number') }}</strong>
</div> --}}

<div class="form-group col-lg-4 col-md-6">
  {{ Form::label('file_number', 'Número de Ficha') }}
  {{ Form::number('file_number', null, ['class' => 'form-control']) }}
</div>

{{-- <div class="form-group col-lg-4 col-md-4">
  <label for="file_route">Ruta <strong class="text-danger">*</strong></label>
  <input name="file_route" class="form-control {{ $errors->has('file_route') ? 'is-invalid' : '' }}" maxlength="45" value="{{ $file->file_route or old('file_route') }}">
  <strong class="invalid-feedback">{{ $errors->first('file_route') }}</strong>
</div> --}}

<div class="form-group col-lg-4 col-md-6">
    {{ Form::label('file_route', 'Ruta de aprendizaje') }}
    {{ Form::text('file_route', null, ['class' => 'form-control']) }}
  </div>

{{-- <div class="form-group col-lg-4 col-md-4">
  <label for="apprentices">Número de Aprendices <strong class="text-danger">*</strong></label>
  <input type="number" name="apprentices" class="form-control {{ $errors->has('apprentices') ? 'is-invalid' : '' }}" value="{{ $file->apprentices or old('apprentices') }}">
  <strong class="invalid-feedback">{{ $errors->first('apprentices') }}</strong>
</div> --}}

<div class="form-group col-lg-4 col-md-6">
    {{ Form::label('apprentices', 'Número de Aprendices') }}
    {{ Form::number('apprentices', null, ['class' => 'form-control']) }}
  </div>

<div class="d-flex justify-content-end form-group col-lg-12 col-md-12">
  <button type="submit" class="btn btn-info"><i class="fa fa-save fa-lg"></i> Guardar</button>
</div>
