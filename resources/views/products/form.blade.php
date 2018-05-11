<div class="form-group col-md-4 col-lg-4">
  <label for="">Código Producto <strong class="text-danger">*</strong></label>
  <input class="form-control {{ $errors->has('product_code') ? 'is-invalid' : '' }}" name="product_code" value="{{ $products->product_code or old('product_code') }}">
  <strong class="invalid-feedback">{{ $errors->first('product_code') }}</strong>
</div>

<div class="form-group col-md-4 col-lg-4">
  <label for="">Tipo Producto <strong class="text-danger">*</strong></label>
  <select class="form-control {{ $errors->has('id_product_type') ? 'is-invalid' : '' }}" name="id_product_type">
    <option hidden value="{{ $products->id_product_type or old('id_product_type') }}">-- Seleccionar Tipo Producto --</option>
    @foreach ($product_types as $product_type)
      <option value="{{ $product_type->id }}">{{ $product_type->product_type_name }}</option>
    @endforeach
  </select>
  <strong class="invalid-feedback">{{ $errors->first('id_product_type') }}</strong>
</div>

<div class="form-group col-md-4 col-lg-4">
  <label for="">Nombre Producto <strong class="text-danger">*</strong></label>
  <input class="form-control {{ $errors->has('product_name') ? 'is-invalid' : '' }}" name="product_name" value="{{ $products->product_name or old('product_name') }}">
  <strong class="invalid-feedback">{{ $errors->first('product_name') }}</strong>
</div>

<div class="form-group col-md-4 col-lg-4">
  <label for="">Unidad de Medida <strong class="text-danger">*</strong></label>
  <select class="form-control {{ $errors->has('id_measure_unit') ? 'is-invalid' : '' }}" name="id_measure_unit">
    <option hidden value="{{ $products->id_measure_unit or old('id_measure_unit') }}">-- Seleccionar Unidad --</option>
    @foreach ($measure_unit as $unit)
      <option value="{{ $unit->id }}">{{ $unit->measure_name }}</option>
    @endforeach
  </select>
  <strong class="invalid-feedback">{{ $errors->first('id_measure_unit') }}</strong>
</div>

<div class="form-group col-md-4 col-lg-4">
  <label for="">Presentación</label>
  <input class="form-control {{ $errors->has('presentation') ? 'is-invalid' : '' }}" name="presentation" value="{{ $products->presentation or old('presentation') }}">
  <strong class="invalid-feedback">{{ $errors->first('presentation') }}</strong>
</div>

<div class="form-group col-md-4 col-lg-4">
  <label for="">Cantidad <strong class="text-danger">*</strong></label>
  <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" name="quantity" value="{{ $products->quantity or old('quantity') }}">
  <strong class="invalid-feedback">{{ $errors->first('quantity') }}</strong>
</div>

<div class="form-group col-md-4 col-lg-4">
  <label for="">Fecha de Vencimiento <strong class="text-danger">*</strong></label>
  <input type="date" class="form-control {{ $errors->has('due_date') ? 'is-invalid' : '' }}" name="due_date" value="{{ $products->due_date or old('due_date') }}">
  <strong class="invalid-feedback">{{ $errors->first('due_date') }}</strong>
</div>

<div class="form-group col-md-4 col-lg-4">
  <label for="">Precio Unitario</label>
  <input class="form-control {{ $errors->has('unit_price') ? 'is-invalid' : '' }}" name="unit_price" value="{{ $products->unit_price or old('unit_price') }}">
  <strong class="invalid-feedback">{{ $errors->first('unit_price') }}</strong>
</div>

<div class="form-group col-md-4 col-lg-4">
  <label for="">Stock <strong class="text-danger">*</strong></label>
  <input class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}" name="stock" value="{{ $products->stock or old('stock') }}">
  <strong class="invalid-feedback">{{ $errors->first('stock') }}</strong>
</div>

<div class="d-flex justify-content-end form-group col-md-12 col-lg-12">
  <button type="submit" class="btn btn-info"><i class="fa fa-save fa-lg"></i> Guardar</button>
</div>
