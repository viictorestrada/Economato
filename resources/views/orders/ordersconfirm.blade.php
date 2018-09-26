@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center">
              <ul class="nav d-flex justify-content-between nav-pills nav-fill bg-secondary admin" id="v-pills-tab" role="tablist" aria-orientation="horizontal">

                  <li class="nav-item">
                    <a class="nav-link active" id="v-pills-solicitudPedidos-tab" data-toggle="pill" href="#v-pills-solicitudPedidos" role="tab" aria-controls="v-pills-solicitudPedidos" aria-selected="true" style="color: #fff">Solicitud de Pedidos</a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" id="v-pills--tab" data-toggle="pill" href="#v-pills-" role="tab" aria-controls="v-pills-" aria-selected="true" style="color: #fff">Solicitud Especial</a>
                  </li>
              </ul>
          </div>
          <div class="tab-content" id="v-pills-tabContent">
              <!--Contenido de Solicitud de pedidos-->
            <div class="tab-pane fade show active" id="v-pills-solicitudPedidos" role="tabpanel" aria-labelledby="v-pills-solicitudPedidos-tab">
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

            <div class="tab-pane fade" id="v-pills-" role="tabpanel" aria-labelledby="v-pills--tab">
                <div class="card-body">
                  <div class="container">
                      <div class="row mt-5">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-body">
                              <div class="col-12 d-flex justify-content-end">
                              </div>
<<<<<<< HEAD
                              {{ Form::open(['url'=>'Production_orders', 'method'=>'POST', 'name' => 'formulario1', 'id' => 'ProductionRequest', 'class'=>'forms']) }}
=======
                              {{ Form::open(['url'=>'Special_orders', 'method'=>'POST', 'name' => 'formulario2', 'id' => 'ProductionRequest', 'class'=>'forms']) }}
>>>>>>> develop
                              <div class="row">
                                <div class="form-group col-md-6 col-lg-6">
                                  {{ Form::label('title' , 'Titulo del evento' ) }}
                                  {{ Form::text('title',null,['class'=>'form-control', 'placeholder' => 'Titulo del evento']) }}
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                  {{ Form::label('quantity' , 'Numero de asistentes' ) }}
                                  {{ Form::text('quantity',null,['class'=>'form-control', 'placeholder' => 'Numero de asistentes']) }}
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                  {{ Form::label('event_place' , 'Lugar del evento' ) }}
                                  {{ Form::text('event_place',null,['class'=>'form-control', 'placeholder' => 'Lugar del evento']) }}
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    {{ Form::label('order_date' , 'Fecha del evento' ) }}
                                    {{ Form::date('order_date',null,['class'=>'form-control']) }}
                                  </div>
                                <div class="form-group col-md-12 col-lg-12">
                                  {{ Form::label('description' , 'Descripción' ) }}
                                  {{ Form::textarea('description',null,['class'=>'form-control', 'style' => 'resize:none', 'placeholder' => 'Descripción del evento...']) }}
                                </div>


                              </div>
                              <h3>Fichas</h3>
                            <div class="input-group mb-3">
<<<<<<< HEAD
                            {{ Form::select('files_id[]',$files ,null, ['class' => 'form-control', 'aria-describedby'=>"dependence"])}}
=======
                            {{ Form::select('file_id[]',$filePopulationSpecial ,null, ['class' => 'form-control', 'aria-describedby'=>"dependence"])}}
>>>>>>> develop
                            <div class="input-group-append">
                              <button type="button" class="btn btn-outline-info" id="dependence"><i class="fa fa-plus-circle"></i></button>
                          </div>
                          </div>
                            <div class="form-group" id="fill_me">

                            </div>

                              <div class="d-flex justify-content-end form-group col-lg-12 col-md-12">
                                  <button type="submit" class="btn btn-outline-info"><i class="fa fa-save fa-lg"></i> Realizar Solicitud</button>
                              </div>
                              {{ Form::close() }}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

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
        // console.log(data)
        console.log(data);
        $('#tableOrder').empty();
        var product_name;
        var measure;
        var quantity;tableOrder;
        $.each(data, function(a, b) {
          $.each(b, function(c, d) {
            product_name = data[a].product_name;
            measure = data[a].measure_name;
            quantity = data[a].quantity;
          });
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

  $(document).ready(function() {
    $(document).on('click', '#dependence', function() {
        $('#fill_me').append(`
    <div class="input-group mb-3 remove_me">
      {{ Form::select('file_id[]', $filePopulationSpecial, null, ['class' => 'form-control', 'aria-describedby'=>"dependence"])}}
      <div class="input-group-append">
      <button type="button" class="btn btn-outline-danger click_to_delete"><i class="fas fa-times-circle"></i></button>
      </div>
    </div>
    `);

    });

    $(document).on('click', '.click_to_delete', function() {
        $(this).closest('.remove_me').remove();
    });
})

</script>
@endsection
