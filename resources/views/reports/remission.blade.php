<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Document</title>
  <style>
    .page-break {w
        page-break-after: always;
    }
    </style>
</head>
<body>
{{-- {{ dd($orderCost[0]) }} --}}
    <table class="table table-bordered">
      <thead>
      <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Unidad de Medida</th>
        <th>Precio unitario</th>
        <th>Iva</th>
        <th>Precio con IVA</th>
        <th>Total</th>
      </tr>
      </thead>
      <tbody>
  @foreach($products as $key => $value)
        <tr>
        <td>{{ $value['product_name'] }}</td>
        <td>{{ $value['quantity'] }}</td>
        <td>{{ $value['measure_name'] }}</td>
        <td>{{ $value['unit_price'] }}</td>
        <td>{{ $value['tax']}}</td>
        <td>{{ $value['unit_price']+(($value['unit_price']*$value['tax'])/100)}}</td>
        <td>{{ $value['quantity']*($value['unit_price']+(($value['unit_price']*$value['tax'])/100)) }} </td>
        </tr>
  @endforeach
      </tbody>
    </table>

  <h4>Costo de la orden: {{ $orderCost[0] }}</h4>
    <h1></h1>
</body>
</html>
