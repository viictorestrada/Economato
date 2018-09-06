<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('program_id', 'Programa de Formación') }}
  {{ Form::select('program_id', $programs, null, ['class' => 'form-control', 'placeholder' => '-- Seleccionar programa --']) }}
</div>

<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('characterization_id', 'Caracterización') }}
  {{ Form::select('characterization_id', $characterizations, null, ['class' => 'form-control', 'placeholder' => '-- Seleccionar caracterización --']) }}
</div>

<div class="form-group col-lg-4 col-md-6">
  {{ Form::label('file_number', 'Número de Ficha') }}
  {{ Form::number('file_number', null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-lg-4 col-md-6">
  {{ Form::label('file_route', 'Ruta de aprendizaje') }}
  {{ Form::text('file_route', null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-lg-4 col-md-6">
  {{ Form::label('apprentices', 'Número de Aprendices') }}
  {{ Form::number('apprentices', null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('start_date','Fecha de Incio') }}
  {{ Form::date('start_date' ,null, ['class' => 'form-control'])}}
</div>

<div class="form-group col-lg-6 col-md-6">
   {{ Form::label('finish_date','Fecha final') }}
   {{ Form::date('finish_date',null,['class'=>'form-control']  ) }}
</div>

 <div class="d-flex justify-content-end form-group col-lg-12 col-md-12">
  <button type="submit" class="btn btn-outline-info"><i class="fa fa-save fa-lg"></i> Guardar</button>
</div>
