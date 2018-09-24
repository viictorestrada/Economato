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
              {{ Form::open(['url'=>'Production_orders', 'method'=>'POST', 'name' => 'formulario1', 'id' => 'ProductionRequest', 'class'=>'forms']) }}
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
              <div class="d-flex justify-content-end form-group col-lg-12 col-md-12">
                  <button type="submit" class="btn btn-outline-info"><i class="fa fa-save fa-lg"></i> Realizar Solicitud</button>
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
$(() => {
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
        required: true
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
        max: "El campo Numero de asistentes debe contener máximo 999999 asistentes."
      },
      event_place: {
        required: "El campo Lugar del evento es obligatorio.",
        minlength: "El campo lugar del evento debe contener mínimo 3 caracteres.",
        maxlength: "El campo lugar del evento debe contener máximo 45 caracteres."
      },
      order_date: {
        required: "El campo Fecha del evento es obligatorio."
      },
      description: {
        required: "El campo Descripción del evento es obligatorio.",
        minlength: "El campo Descripción del evento debe contener mínimo 10 caracteres.",
        maxlength: "El campo Descripción del evento debe contener máximo 300 caracteres."
      }
    }
  });
});
</script>
@endsection