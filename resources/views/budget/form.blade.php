<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('budget', 'Presupuesto') }}
  {{ Form::number('budget', null, ['class' => 'form-control']) }}
</div>
{{--
<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('budget_adition', 'Valor adicional al presupuesto actual') }}
  {{ Form::number('budget_adition', null, ['class' => 'form-control']) }}
</div> --}}

<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('budget_code', 'Código') }}
  {{ Form::number('budget_code', null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('budget_begin_date', 'Fecha de inicio del presupuesto') }}
  {{ Form::date('budget_begin_date', null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('budget_finish_date', 'Fecha de terminación del presupuesto') }}
  {{ Form::date('budget_finish_date', null, ['class' => 'form-control']) }}
</div>

<div class="d-flex justify-content-end form-group col-md-12 col-lg-12">
  <button type="submit" class="btn btn-info"><i class="fa fa-save fa-lg"></i> Guardar</button>
</div>
