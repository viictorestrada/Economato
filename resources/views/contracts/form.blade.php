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
  {{ Form::number('contract_price', null, ['class' => 'form-control','onchange'=>'validationBudget(this.value)']) }}
</div>
<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('start_date', 'Fecha inicial') }}
  {{ Form::date('start_date', null, ['class' => 'form-control', 'id' => 'start_date'], 'd/m/Y') }}
</div>
<div class="form-group col-lg-6 col-md-6">
  {{ Form::label('finish_date', 'Fecha final') }}
  {{ Form::date('finish_date', null, ['class' => 'form-control',  'id' => 'final_date'], 'd/m/Y') }}
</div>
<div class="form-group col-lg-3 col-md-3">
  {{ Form::label('', 'Productos') }}
  {{ Form::select('', $products, null, ['class' => 'form-control producto', 'placeholder' => '-- Seleccione Producto --', 'onchange="chargeMeasureUnit(this)"']) }}
</div>
<div class="form-group col-lg-3 col-md-3">
  {{ Form::label('', 'Unidad de Medida' ) }}
  {{ Form::text('', null , ['class'=>'form-control unidad','readonly', 'placeholder' => 'Unidad de medida']) }}
</div>
<div class="form-group col-lg-3 col-md-3">
  {{ Form::label('','Cantidad')}}
  {{ Form::text('',null,['class'=>'form-control cantidad', 'placeholder'=>'Cantidad', 'onchange'=>"calculations(this)",'onkeypress'=>'onlyNumbers()'] )}}
</div>
<div class="form-group col-lg-3 col-md-3">
  {{ Form::label('','Valor Unitario') }}
  {{ Form::number('',null,['class'=>'form-control precio_unitario', 'onchange'=>'calculations(this)', 'onkeypress'=>'onlyNumbers()' , 'placeholder' => 'Valor unitario'  ] ) }}
</div>
<div class="form-group col-md-3 col-lg-3">
  {{ Form::label('','Sub Total') }}
  {{ Form::number('',null,['class'=>'form-control subtotal', 'readonly', 'placeholder' => 'Sub total']) }}
</div>
<div class="form-group col-lg-3 col-md-3">
  {{ Form::label('','IVA') }}
  {{ Form::select('',$taxes,null,['class'=>'form-control tax', 'onchange'=>"calculations(this)"]) }}
</div>
<div class="form-group col-lg-3 col-md-3">
  {{ Form::label('' ,'Valor IVA' ) }}
  {{ Form::text('',null,['class'=>'form-control valor_iva','readonly', 'placeholder' => 'Valor IVA']) }}
</div>
<div class="form-group col-lg-3 col-md-3">
    {{ Form::label('' ,'Total' ) }}
    {{ Form::text('', null ,['class'=>'form-control total', 'readonly', 'placeholder' => 'Total'] ) }}
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
        <th>Sub Total</th>
        <th>IVA %</th>
        <th>Valor IVA</th>
        <th>Total</th>
        <th><button type="button" class="btn btn-outline-info add"><i class="fa fa-plus-circle"></i></button></th>
      </tr>
    </thead>
    <tbody id="tableContracts">

    </tbody>
  </table>
</div>

<div class="d-flex justify-content-end form-group col-lg-12 col-md-12">
  <button type="submit" class="btn btn-outline-info" id="createContract"><i class="fa fa-save fa-lg"></i> Guardar</button>
</div>

