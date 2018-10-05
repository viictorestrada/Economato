<div class="form-group col-md-4 col-lg-4">
  {{ Form::label('product_code', 'Código Producto') }}
  {{ Form::text('product_code', null, ['class' => 'form-control']) }}
  {{ $errors->has('product_code') ? '' : '' }}
  <strong class="text-danger">{{ $errors->first('product_code') }}</strong>
</div>

<div class="form-group col-md-4 col-lg-4">
  {{ Form::label('id_product_type', 'Tipo Producto') }}
  {{ Form::select('id_product_type', $product_types, null, ['class' => 'form-control']) }}
  {{ $errors->has('id_product_type') ? '' : '' }}
  <strong class="text-danger">{{ $errors->first('id_product_type') }}</strong>
</div>

<div class="form-group col-md-4 col-lg-4">
  {{ Form::label('product_name', 'Nombre Producto') }}
  {{ Form::text('product_name', null, ['class' => 'form-control']) }}
  {{ $errors->has('product_name') ? '' : '' }}
  <strong class="text-danger">{{ $errors->first('product_name') }}</strong>
</div>

<div class="form-group col-md-6 col-lg-6">
  {{ Form::label('id_measure_unit', 'Unidad de Medida') }}
  {{ Form::select('id_measure_unit', $measure_unit, null, ['class' => 'form-control']) }}
  {{ $errors->has('id_measure_unit') ? '' : '' }}
  <strong class="text-danger">{{ $errors->first('id_measure_unit') }}</strong>
</div>

<div class="form-group col-md-6 col-lg-6">
  {{ Form::label('presentation_id', 'Presentación del producto') }}
  {{ Form::select('presentation_id', $presentations, null, ['class' => 'form-control']) }}
  {{ $errors->has('presentation_id') ? '' : '' }}
  <strong class="text-danger">{{ $errors->first('presentation_id') }}</strong>
</div>

<div class="d-flex justify-content-end form-group col-md-12 col-lg-12">
  <button type="submit" class="btn btn-outline-info"><i class="fa fa-save fa-lg"></i> Guardar</button>
</div>
