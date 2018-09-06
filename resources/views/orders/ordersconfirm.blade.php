@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center"><h4>Solicitud de Pedidos</h4></div>
          <div class="card-body">
            <div class="col-12 d-flex justify-content-end">
            </div>
              {{ Form::open(['url'=>'orders', 'method'=>'POST', 'name' => 'formulario1', 'class'=>'forms','onsubmit'=>'return confirmOrder()']) }}
              <div class="row">

                <div class="form-group col-md-6 col-lg-6">
                  {{ Form::label('files_id','Ficha') }}
                  {{ Form::select('files_id',$files,null,['class'=>'form-control','onchange'=>'chargeCharacterization(this.value)','placeholder'=>'--Seleccione una ficha--']) }}
                  {{ $errors->has('files_id'  ? '' : '') }}
                  <strong class="text-danger" >{{ $errors->first('files_id') }}</strong>
                </div>

                <div class="form-group col-md-6 col-lg-6">
                  {{ Form::label('characterization' , 'Caracterización' ) }}
                  {{ Form::text('characterization',null,['class'=>'form-control characterization', 'readonly']) }}
                </div>

                <div class="form-group col-md-6 col-lg-6">
                  {{ Form::label('order_date', 'Fecha' ) }}
                  {{ Form::date('order_date',null,[ 'class'=> 'form-control' ]) }}
                  {{ $errors->has('order_date') ? '' : '' }}
                <strong class="text-danger" >{{ $errors->first('order_date') }}</strong>
                </div>

                <div class="form-group  col-md-6 col-lg-6">
                  {{ Form::label('recipes_id','Taller') }}
                  {{ Form::select('recipes_id',$recipes,null,['class'=>'form-control', 'onchange' =>'loadRecipeProducts(this.value)' ,'placeholder'=>'--Seleccione una Receta--']) }}
                  {{ $errors->has('recipes_id') }}
                  <strong class="text-danger">{{ $errors->first('recipes_id') }}</strong>
                </div>

                <hr class="style-two">

                <div class="form-group col-md-10 col-lg-10 offset-md-1 offset-lg-1">
                  <table class="table table-bordered">
                    <thead class="text-center">
                      <tr>
                        <th>Producto</th>
                        <th>Unidad de Medida</th>
                        <th>Cantidad</th>
                      </tr>
                    </thead>
                    <tbody id="tableOrder">
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="d-flex justify-content-end form-group col-lg-12 col-md-12">
                  <button type="submit" class="btn btn-outline-info"><i class="fa fa-save fa-lg"></i> Solicitar Taller</button>
              </div>
              {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
<script>

function loadRecipeProducts(id) {
    $.ajax({
      url: "{{ url('RecipeHasProduct') }}" + '/' + id + "/show",
      type: 'get',
      datatype: "json",
      success: function(data) {
        console.log('datos'+data)
        $('#tableOrder').empty();
        var product_name;
        var measure;
        var quantity;tableOrder
        $.each(data, function(a, b) {
          $.each(b, function(c, d) {
            product_name = data[a].product_name;
            measure = data[a].measure_name;
            quantity = data[a].quantity;
          })
            $('#tableOrder').append(
            `<tr>
              <td>{{ Form::text('product_id[]', '`+product_name+`', ['class' => 'form-control', 'readonly' ]) }}</td>
              <td class="tdUnit">{{ Form::text('id_measure_unit', '`+measure+`', ['class' => 'form-control unidad', 'readonly']) }}</td>
              <td>{{ Form::number('quantity[]', '`+quantity+`', ['class' => 'form-control','readonly']) }}</td>
            </tr>`
          );
        })
      },
      error: function(r) {
        console.log("error"+r)
      }
    })
  }


</script>
@endsection
