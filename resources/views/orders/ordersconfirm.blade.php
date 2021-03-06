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
              </ul>
          </div>
          <div class="tab-content" id="v-pills-tabContent">
              <!--Contenido de Solicitud de pedidos-->
            <div class="tab-pane fade show active" id="v-pills-solicitudPedidos" role="tabpanel" aria-labelledby="v-pills-solicitudPedidos-tab">
            <div class="card-body">
              <div class="col-12 d-flex justify-content-end">
              </div>
                {{ Form::open(['url'=>'orders', 'method'=>'POST', 'name' => 'formulario1', 'id'=> 'orderRequest','class'=>'forms','onsubmit'=>'return confirmOrder()']) }}
                <div class="row">

                  <div class="form-group col-md-6 col-lg-6">
                    {{ Form::label('files_id','Ficha') }}
                    {{ Form::select('files_id',$files,null,['class'=>'form-control select','onchange'=>'chargeCharacterization(this.value)','placeholder'=>'--Seleccione una ficha--']) }}
                    {{ $errors->has('files_id'  ? '' : '') }}
                    <strong class="text-danger" >{{ $errors->first('files_id') }}</strong>
                  </div>

                  <div class="form-group col-md-6 col-lg-6">
                    {{ Form::label('characterization' , 'Caracterización' ) }}
                    {{ Form::text('characterization',null,['class'=>'form-control characterization', 'readonly']) }}
                  </div>

                  <div class="form-group col-md-6 col-lg-6">
                    {{ Form::label('user_name' , 'Instructor' ) }}
                    {{ Form::text('user_name',null,['class'=>'form-control ']) }}
                  </div>

                  <div class="form-group col-md-6 col-lg-6">
                    {{ Form::label('order_date', 'Fecha de realización del taller' ) }}
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

                  <div class="form-group  col-md-6 col-lg-6">
                    <div class="d-flex justify-content-end form-group col-lg-12 col-md-12">
                    <a href="../files/create" class="btn btn-outline-info"><i class="fa fa-file fa-lg"></i> Nueva Ficha</a>
                </div>
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
    </div>
  </div>
@endsection
@section('script')
<script>
$(() => {
  $('.select').select2();
  // $.validator.addMethod('fechas', function (value, element) {
  //       return this.optional(element) || moment(moment()).isBefore(value);
  //     });
  $('#ProductionRequest').validate({
    rules: {
      title: {
        required: true,
        minlength: 5,
        maxlength: 50
      },
      quantity: {
        required: true,
        digits: true,
        min: 1,
        max: 999999
      },
      event_place: {
        required: true,
        minlength: 3,
        maxlength: 45
      },
      order_date: {
        required: true,
        // fechas: true
      },
      description: {
        required: true,
        minlength: 10,
        maxlength: 300
      }
    },
    messages: {
      title: {
        required: "El campo Titulo del evento es obligatorio.",
        minlength: "El campo Titulo del evento debe contener mínimo 5 caracteres.",
        maxlength: "El campo Titulo del evento debe contener máximo 45 caracteres."
      },
      quantity: {
        required: "El campo Numero de asistentes es obligatorio.",
        min: "El campo Numero de asistentes debe contener mínimo 1 asistente.",
        max: "El campo Numero de asistentes debe contener máximo 999999 asistentes.",
        digits: "El campo Numero de asistentes debe contener números únicamente"
      },
      event_place: {
        required: "El campo Lugar del evento es obligatorio.",
        minlength: "El campo lugar del evento debe contener mínimo 3 caracteres.",
        maxlength: "El campo lugar del evento debe contener máximo 45 caracteres."
      },
      order_date: {
        required: "El campo Fecha del evento es obligatorio."
        // fechas: "La fecha del pedido es anterior a la actual."
      },
      description: {
        required: "El campo Descripción del evento es obligatorio.",
        minlength: "El campo Descripción del evento debe contener mínimo 10 caracteres.",
        maxlength: "El campo Descripción del evento debe contener máximo 300 caracteres."
      }
    }
  });
//   $('#orderRequest').validate({
//       rules:{
//         order_date:{
//         fechas:true
//         }
//       },
//       messages:{
//         order_date:{
//           fechas: "La fecha del pedido es anterior a la actual."
//         }
//       }
//     });
});
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

//   $(document).ready(function() {
//     $(document).on('click', '#dependence', function() {
//         $('#fill_me').append(`
//     <div class="input-group mb-3 remove_me">
//       {{ Form::select('file_id[]', $filePopulationSpecial, null, ['class' => 'form-control', 'aria-describedby'=>"dependence"])}}
//       <div class="input-group-append">
//       <button type="button" class="btn btn-outline-danger click_to_delete"><i class="fas fa-times-circle"></i></button>
//       </div>
//     </div>
//     `);

//     });

//     $(document).on('click', '.click_to_delete', function() {
//         $(this).closest('.remove_me').remove();
//     });
// })

</script>
@endsection
