<div class="form-group col-lg-4 col-md-4">
  {{ Form::label('contract_number', 'Número de Contrato') }}
  {{ Form::number('contract_number', null, ['class' => 'form-control', 'onkeypress' => 'onlyNumbers()']) }}
</div>

<div class="form-group col-lg-4 col-md-4">
  {{ Form::label('provider_id', 'Proveedor') }}
  {{ Form::select('provider_id', $providers, null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-lg-4 col-md-4">
  {{ Form::label('contract_price', 'Valor contrato') }}
  {{ Form::number('contract_price', null, ['class' => 'form-control']) }}
</div>

<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('start_date', 'Fecha inicial') }}
  {{ Form::date('start_date', null, ['class' => 'form-control'], 'd/m/Y') }}
</div>

<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('finish_date', 'Fecha final') }}
  {{ Form::date('finish_date', null, ['class' => 'form-control'], 'd/m/Y') }}
</div>
<hr class="bg-dark">

<div class="table-responsive">

  <table class="table table-bordered table-sm" id="tabla">

    <thead>
      <tr class="text-center">
        <th>Producto</th>
        <th>Unidad de Medida</th>
        <th>Cantidad</th>
        <th>Valor Unitario</th>
        <th>Valor Total</th>
        <th>IVA %</th>
        <th>Valor IVA</th>
        <th>Total</th>
        <th><button type="button" class="btn btn-info add"><i class="fa fa-plus-circle"></i></button></th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>{{ Form::select('product_id[]', $products, null, ['class' => 'form-control', 'placeholder' => '-- Seleccione Producto --', 'onchange="chargeMeasureUnit(this.value)"']) }}</td>
        <td class="tdUnit"><input type="text" class="form-control unidad" readonly></td>
        <td><input type="text" name="quantity[]" onkeypress="onlyNumbers()" class="form-control" placeholder="Cantidad"></td>
        <td><input type="number" name="unit_price[]" class="form-control" onkeypress="onlyNumbers()"></td>
        <td><input type="number" name="ValoPres[]" class="form-control precio" readonly></td>
        <td>{{ Form::select('taxes_id', $taxes, null, ['class' => 'form-control']) }}</td>
        <td class="tdprecio"><input type="number" name="ValoPres[]" class="form-control precio" readonly></td>
        <td class="tdprecio"><input type="number" name="ValoPres[]" class="form-control precio" readonly></td>
      </tr>
    </tbody>
  </table>
</div>

<div class="d-flex justify-content-end form-group col-lg-12 col-md-12">
  <button type="submit" class="btn btn-info"><i class="fa fa-save fa-lg"></i> Guardar</button>
</div>

