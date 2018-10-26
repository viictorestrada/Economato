@extends('layouts.layout')
@section('title', 'Create Budget')
@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center"><h4>Gestión de Presupuestos</h4></div>
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="">
                <h4>Registro de Presupuesto</h4>
              </div>
              <div class="">
                <a href="{{ url('budgets') }}" class="btn btn-outline-info"><i class="fa fa-eye fa-lg"></i> Mostrar todos</a>
              </div>
            </div><hr>

            {{ Form::open(['url' => 'budgets', 'class' => 'forms', 'id' => 'BudgetCreate']) }}

              @csrf
              <div class="row">
                @include('budget.form')
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
   var initial_date = 0
    $('#budget_begin_date').change(function(){
         initial_date = $('#budget_begin_date').val();
    });
  $(()=>{
      $.validator.addMethod('fechaActual', function (value, element) {
        return this.optional(element) || moment().isBefore(value);
      });
      $.validator.addMethod('fechaInicial', function (value, element) {
        return this.optional(element) || moment(initial_date).isBefore(value);
      });
    $('#BudgetCreate').validate({
      rules:{
        budget:{
          required: true
        },
        budget_code:{
          required: true
        },
        budget_begin_date:{
          required: true,
          date: true

        },
        budget_finish_date:{
          required: true,
          date: true,
          fechaActual: true,
          fechaInicial: true
        }
      },
        messages:{
          budget:{
            required: "El campo Presupuesto es obligatorio"
          },
          budget_code:{
          required: "El campo Código es obligatorio"
         },
         budget_begin_date:{
          required: "El campo fecha de inicio es obligatorio",
          date: "Ingrese una fecha valida"
        },
        budget_finish_date:{
          required: "El campo fecha final es obligatorio",
          date: "Ingrese una fecha valida",
          fechaActual: "La fecha final debe ser mayor a la actual",
          fechaInicial: 'La fecha final debe ser mayor a la inicial'
        }

      }
    });
  });
</script>
@endsection
