@extends('layouts.layout')

@section('content')

<div class="container-fluid">
<div class="row mt-5">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header bg-secondary text-light text-center">
        <h4>Informes</h4>
      </div>
      <div class="card-header bg-secondary text-light text-center">
          <ul class="nav d-flex justify-content-between nav-pills nav-fill bg-secondary admin" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
              <li class="nav-item">
                <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true" style="color: #fff">Stock</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="true" style="color: #fff">Presupuesto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="true" style="color: #fff">Productos</a>
              </li>

            </ul>
      </div>
    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
      <div class="card-body">
          <table class="table table-bordered " width="100%" id="productsReports">
              <thead>
                <tr>
                  <th>Producto</th>
                  <th>Cantidad Disponible</th>
                  <th>Cantidad Contratada</th>
                  <th>Porcentaje de Disponibilidad</th>
                </tr>
              </thead>
            </table>
      </div>
    </div>

    <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
      <div class="card-body">
        <div class="row">
           <div class="col-md-6">
            {{-- {{
            dd(isset($chartCharacterization))
            }}  --}}
            @if(isset($chartCharacterization) == false)
              <div class="card  w-50">
              <div class="card-body">
                <p class="card-text">No se encuentran gastos por caracterización.</p>
              </div>
            </div>
            @else
          <div class="card">
              <div class="card-body">
                <div class="card-title">Presupuesto consumido, discriminado por caracterización.</div>
                  {!!  $chartCharacterization->render() !!}
                </div>
            </div>
            @endif
          </div>
          <div class="col-md-6">
            @if ($totalBudgetChart != null)
            <div class="card">
              <div class="card-body">
                  <div class="card-title">Porcentaje del presupuesto consumido.</div>
                  {!! $totalBudgetChart->render() !!}
                </div>
            </div>
            @else
            <div class="card  w-50">
              <div class="card-body">
                <p class="card-text">No se encuentra un Presupuesto registrado o activo.</p>
              </div>
            </div>
            @endif
            </div>
        </div>
      </div>
    </div>

    <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
              {!!  $chartLess->render() !!}
        </div>
        <div class="col-md-6">
          {!!  $charTop->render() !!}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
<script src="{{ asset('js/reports.js') }}"></script>
@endsection
