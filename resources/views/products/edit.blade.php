@extends('layouts.layout')
@section('content')
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-secondary text-light text-center"><h4>Gestión de Productos</h4></div>
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="">
                <h4>Editar Producto</h4>
              </div>
              <div class="">
                <a href="{{ url('products') }}" class="btn btn-info"><i class="fa fa-eye"></i> Mostrar todos</a>
              </div>
            </div><hr>

            {{ Form::model($products, ['url' => ['products', $products->id], 'class' => 'forms', 'method' => 'PATCH']) }}

              @csrf
              <div class="row">
                @include('products.form')
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
    $('#base_price').change(function(){
      var base_price = $('#base_price').val();
      var tax = $('#tax option:selected').text();
      var final_price = (base_price)-(-base_price*(tax/100));
      $('#final_price').val(final_price);
    });

    $('#tax').change(function(){
      var base_price = $('#base_price').val();
      var tax = $('#tax option:selected').text();
      var final_price = (base_price)-(-base_price*(tax/100));
      $('#final_price').val(final_price);
    });
  </script>
@endsection
