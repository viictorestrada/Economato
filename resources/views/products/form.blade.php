<div class="form-group col-md-4 col-lg-4">
  {{ Form::label('product_code', 'Código Producto') }}
  {{ Form::text('product_code', null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-md-4 col-lg-4">
  {{ Form::label('id_product_type', 'Tipo Producto') }}
  {{ Form::select('id_product_type', $product_types, null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-md-4 col-lg-4">
  {{ Form::label('product_name', 'Nombre Producto') }}
  {{ Form::text('product_name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-md-4 col-lg-4">
  {{ Form::label('id_measure_unit', 'Unidad de Medida') }}
  {{ Form::select('id_measure_unit', $measure_unit, null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-md-4 col-lg-4">
  {{ Form::label('presentation_id', 'Presentación del producto') }}
  {{ Form::select('presentation_id', $presentations, null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-md-4 col-lg-4">
  {{ Form::label('quantity', 'Cantidad') }}
  {{ Form::number('quantity', null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-md-4 col-lg-4">
  {{ Form::label('due_date', 'Fecha de Vencimiento') }}
  {{ Form::date('due_date', null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-md-4 col-lg-4">
  {{ Form::label('unit_price', 'Precio Unitario') }}
  {{ Form::number('unit_price', null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-md-4 col-lg-4">
  {{ Form::label('stock', 'Stock') }}
  {{ Form::number('stock', null, ['class' => 'form-control']) }}
</div>

<div class="d-flex justify-content-end form-group col-md-12 col-lg-12">
  <button type="submit" class="btn btn-info"><i class="fa fa-save fa-lg"></i> Guardar</button>
</div>
