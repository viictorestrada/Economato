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

    body {
      width: 100%;
      margin: 0px !important;
      padding: 0px !important;
      background-image: url("/images/sin_firma.png");
    }

    .info-pdf{

    }

    table.greyGridTable {
      border: 2px solid #FFFFFF;
      width: 100%;
      text-align: center;
      border-collapse: collapse;
    }

    table.greyGridTable td, table.greyGridTable th {
      border: 1px solid #FFFFFF;
      padding: 3px 4px;
    }

    table.greyGridTable tbody td {
      font-size: 13px;
    }

    table.greyGridTable td:nth-child(even) {
      background: #EBEBEB;
    }
    table.greyGridTable thead {
      background: #FFFFFF;
      border-bottom: 4px solid #333333;
    }

    table.greyGridTable thead th {
      font-size: 15px;
      font-weight: bold;
      color: #333333;
      text-align: center;
      border-left: 2px solid #333333;
    }

    table.greyGridTable thead th:first-child {
      border-left: none;
    }

    table.greyGridTable tfoot {
      font-size: 14px;
      font-weight: bold;
      color: #333333;
      border-top: 4px solid #333333;
    }

    table.greyGridTable tfoot td {
      font-size: 14px;
    }

    .contenedor{
      padding-top: 25%;
      padding-right:30px;
      padding-left:30px;

    }

    .contenedorDatos{
      width: 100%;
    }

    .columnas{
      width: 50%;
      display: inline-block;
      text-align: left;
    }

    .columna1{
    margin-top:25px;
    }

    .columna2{
      padding-top: -20px;
    }

    .contenedorTabla{
      padding-top: -15%;
      width: 100%;
      display: inline-block;
    }


</style>
</head>

<body>
  <div class="title-pdf contenedor">
    <div class="contenedorDatos">
      <div class="columna1 columnas">
        <p>Usuario: </p>
        <p>CC: </p>
        <p>Población: </p>
      </div>
      <div class="columna2 columnas">
        <p>Fecha: </p>
        <p>Programa: </p>
        <p>Taller: </p>
      </div>
    </div>
    <div class="contenedorTabla">
    <table class="greyGridTable">
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
    </div>
  </div>
</body>
</html>
