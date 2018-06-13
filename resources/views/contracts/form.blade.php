<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('contract_number', 'Número de Contrato') }}
  {{ Form::number('contract_number', null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('provider_id', 'Proveedor') }}
  {{ Form::select('provider_id', $providers, null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('contract_price', 'Monto') }}
  {{ Form::number('contract_price', null, ['class' => 'form-control']) }}
</div>


<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('contract_date', 'Fecha') }}
  {{ Form::date('contract_date', null, ['class' => 'form-control'], 'd/m/Y') }}
</div>

<div class="d-flex justify-content-end form-group col-lg-12 col-md-12">
  <button type="submit" class="btn btn-info"><i class="fa fa-save fa-lg"></i> Guardar</button>
</div>
