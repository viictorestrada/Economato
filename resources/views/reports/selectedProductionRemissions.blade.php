<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Remisión</title>
  <style>
    .page-break {
        page-break-after: always;
    }
    @page {
     margin: 0px;
      
      }

    html{
      padding:50px
    }
    body {
      width: 100%;
      margin: 0px !important;
      padding: 0px !important;
      background-image: url("/images/sinlogo.png");
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
      padding-top: 30%;
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
    margin-top:0px;
    }

    .columna2{
      padding-top: -20px;
    }

    .contenedorTabla{
      padding-top: -10%;
      width: 100%;
      display: inline-block;
      clear: both;
    }

    .greyGridTable2{
      margin-top: 5%;
    }

    .imgLogo{
      position: absolute;
      top: 70px;
      right: 0px;
      left: 0px;
    }


</style>
</head>

<body>
  <div class="title-pdf contenedor">
    <div class="contenedorDatos">
      <div class="imgLogo">
        <img src="{{asset('images/logo.png')}}" alt="">
      </div>
      <div class="columna1 columnas">
      <p>Usuario: {{ $extraInfo['user_name'] }} </p>
      
      </div>
      <div class="columna2 columnas">
        <p>Fecha: {{ $extraInfo['timestamp'] }} </p>
      
      </div>
    </div>
    <br>
    <div class="contenedorTabla" >
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
              @foreach($grouped as $key => $value)
              <tr>
              <td>{{ $value['product_name'] }}</td>
              <td>{{ $value['quantity'] }}</td>
              <td>{{ $value['measure'] }}</td>
              <td>{{ $value['unit_price'] }}</td>
              <td>{{ $value['tax']}}</td>
              <td>{{ $value['unit_price']+(($value['unit_price']*$value['tax'])/100)}}</td>
              <td>{{ $value['quantity']*($value['unit_price']+(($value['unit_price']*$value['tax'])/100)) }} </td>
              </tr>
        @endforeach
          </tbody>
        </table>
        
              <div class="contenedorDatos">
            <div style="margin-top:15px" class="columna1 columnas">
            <h4>Costo de la orden: {{ $totalCost }}</h4>
            </div>
              </div>
    {{-- </div> --}}
  </div>
</body>
</html>
