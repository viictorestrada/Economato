<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('provider_name', 'Nombre Proveedor') }}
  {{ Form::text('provider_name', null, ['class' => 'form-control']) }} {{ $errors->has('provider_name') ? '' : '' }}
  <strong class="text-danger">{{ $errors->first('provider_name') }}</strong>
</div>

<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('nit', 'Nit') }}
  {{ Form::text('nit', null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('phone', 'Teléfono') }}
  {{ Form::number('phone', null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('address', 'Dirección') }}
  {{ Form::text('address', null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('contact_name', 'Nombre Contacto') }}
  {{ Form::text('contact_name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('contact_last_name', 'Apellido Contacto') }}
  {{ Form::text('contact_last_name', null, ['class' => 'form-control']) }}
</div>

<div class="d-flex justify-content-end form-group col-md-12 col-lg-12">
  <button type="submit" class="btn btn-outline-info"><i class="fa fa-save fa-lg"></i> Guardar</button>
</div>
