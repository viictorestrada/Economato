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
              {{ Form::open(['url'=>'Production_orders', 'method'=>'POST', 'name' => 'formulario1', 'class'=>'forms','onsubmit'=>'return confirmOrder()']) }}
              <div class="row">

                <div class="form-group col-md-6 col-lg-6">
                  {{ Form::label('title' , 'Titulo del evento' ) }}
                  {{ Form::text('title',null,['class'=>'form-control', 'placeholder' => 'Titulo del evento']) }}
                </div>
                <div class="form-group col-md-6 col-lg-6">
                  {{ Form::label('quantity' , 'Numero de asistentes' ) }}
                  {{ Form::text('quantity',null,['class'=>'form-control', 'placeholder' => 'Numero de asistentes']) }}
                </div>
                <div class="form-group col-md-12 col-lg-12">
                    {{ Form::label('order_date' , 'Fecha del evento' ) }}
                    {{ Form::date('order_date',null,['class'=>'form-control']) }}
                  </div>
                <div class="form-group col-md-12 col-lg-12">
                  {{ Form::label('description' , 'Descripción' ) }}
                  {{ Form::textarea('description',null,['class'=>'form-control', 'style' => 'resize:none', 'placeholder' => 'Descripción del evento...']) }}
                </div>
                

              </div>
              <div class="d-flex justify-content-end form-group col-lg-12 col-md-12">
                  <button type="submit" class="btn btn-info"><i class="fa fa-save fa-lg"></i> Realizar Solicitud</button>
              </div>
              {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection