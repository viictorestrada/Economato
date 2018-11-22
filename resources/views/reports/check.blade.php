<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Factura IVA</title>
  <style>
      .page-break {
          page-break-after: always;
      }
      /* @page {
        padding-top:15px; */
        /* @page {tamaño: 3600pt 4000pt; } */
        /* margin: 160px 50px;   */
      /* } */

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
        padding-top: -15%;
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
            <p>Proveedor:Sumedes </p>
            <br>
            <br>
          </div>
          <div class="columna2 columnas">
          <p>Fecha de impresión: {{ date('Y-m-d') }}</p>
           <br>
           <br>
          </div>
        </div>
        <div class="contenedorTabla" >
          @if(count($collection2)>22)
            <table class="greyGridTable">
              <thead>
                <tr>
                    <th></th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Unidad de Medida</th>
                    <th>Presentación</th>
                    <th>Precio unitario con Iva</th>
                    <th>Iva</th>
                    {{-- <th>Precio con IVA</th> --}}
                    <th>Total con IVA</th>
                </tr>
              </thead>
              <tbody>
                {{ $acum=0,$acumNeto=0 }}
            @for($i=0; $i<22 ; $i++ )
                      {{-- {{ $acum += $value['quantity']*($value['unit_price']+(($value['unit_price']*$value['tax'])/100)) }} --}}
                      {{ $acum += $value['quantity']*($value['unit_price']) }}
                     {{ $acumNeto += $value['quantity']*($value['unit_price']) }}
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $collection2[$i]['product_name'] }}</td>
                  <td>{{ $collection2[$i]['quantity'] }}</td>
                  <td>{{ $collection2[$i]['measure_name'] }}</td>
                  <td>{{ $collection2[$i]['presentation'] }}</td>
                  <td>{{ number_format($collection2[$i]['unit_price']) }}</td>
                  <td>{{ $collection2[$i]['tax']}}</td>
                  {{-- <td>{{ number_format($collection2[$i]['unit_price']+(($collection2[$i]['unit_price']*$collection2[$i]['tax'])/100))}}</td> --}}
                  {{-- <td>{{ number_format($collection2[$i]['quantity']*($collection2[$i]['unit_price']+(($collection2[$i]['unit_price']*$collection2[$i]['tax'])/100))) }} </td> --}}
                  {{-- <td>{{ number_format($collection2[$i]['quantity']*($collection2[$i]['unit_price'])) }} </td> --}}
                      <td>{{ number_format($value['quantity']*($value['unit_price'])) }} </td>
                </tr>
            @endfor
              </tbody>
              {{ $acum=0,$acumNeto=0 }}
            </table>
            <div style="width:100%;heigth:20px"></div>
                </div>
                  <table class="greyGridTable" style="margin-top:80px">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Producto</th>
                          <th>Cantidad</th>
                          <th>Unidad de Medida</th>
                          <th>Presentación</th>
                          <th>Precio unitario con IVA</th>
                          <th>Iva</th>
                          {{-- <th>Precio con IVA</th> --}}
                          <th>Total con IVA</th>
                        </tr>
                        </thead>
                      <tbody>
                        {{ $acum=0,$acumNeto=0 }}
                      @for($i=22; $i<count($collection2) ; $i++ )
                      {{-- {{ $acum += $value['quantity']*($value['unit_price']+(($value['unit_price']*$value['tax'])/100)) }} --}}
                      {{ $acum += $value['quantity']*($value['unit_price']) }}
                     {{ $acumNeto += $value['quantity']*($value['unit_price']) }}
                        <tr>
                        <td>{{ $i }}</td>
                      <td>{{ $collection2[$i]['product_name'] }}</td>
                      <td>{{ $collection2[$i]['quantity'] }}</td>
                      <td>{{ $collection2[$i]['measure_name'] }}</td>
                      <td>{{ $collection2[$i]['presentation'] }}</td>
                      <td>{{ number_format($collection2[$i]['unit_price']) }}</td>
                      <td>{{ $collection2[$i]['tax']}}</td>
                      {{-- <td>{{ number_format($collection2[$i]['unit_price']+(($collection2[$i]['unit_price']*$collection2[$i]['tax'])/100))}}</td> --}}
                      {{-- <td>{{ number_format($collection2[$i]['quantity']*($collection2[$i]['unit_price']+(($collection2[$i]['unit_price']*$collection2[$i]['tax'])/100))) }} </td> --}}
                      <td>{{ number_format($value['quantity']*($value['unit_price'])) }} </td>

                    </tr>
                      @endfor
                        </tbody>
                      </table>
                @elseif(count($collection2)<22)
                  <table class="greyGridTable">
                    <thead>
                    <tr>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Unidad de Medida</th>
                      <th>Presentación</th>
                      <th>Precio unitario con IVA</th>
                      <th>Iva</th>
                      {{-- <th>Precio con IVA</th> --}}
                      <th>Total con IVA</th>
                    </tr>
                    </thead>
                    <tbody>
                      {{ $acum=0,$acumNeto=0 }}
                @foreach($collection2 as $key => $value)
                     {{-- {{ $acum += $value['quantity']*($value['unit_price']+(($value['unit_price']*$value['tax'])/100)) }} --}}
                      {{ $acum += $value['quantity']*($value['unit_price']) }}
                     {{ $acumNeto += $value['quantity']*($value['unit_price']) }}
                      <tr>
                      <td>{{ $value['product_name'] }}</td>
                      <td>{{ $value['quantity'] }}</td>
                      <td>{{ $value['measure_name'] }}</td>
                      <td>{{ $value['presentation'] }}</td>
                      <td>{{ number_format($value['unit_price']) }}</td>
                      <td>{{ $value['tax']}}</td>
                      {{-- <td>{{ number_format($value['unit_price']+(($value['unit_price']*$value['tax'])/100))}}</td> --}}
                      {{-- <td>{{ number_format($value['quantity']*($value['unit_price']+(($value['unit_price']*$value['tax'])/100))) }} </td> --}}
                      <td>{{ number_format($value['quantity']*($value['unit_price'])) }} </td>

                    </tr>
                @endforeach
                    </tbody>
                  </table>
                  @endif
                  <div class="contenedorDatos">
                <div style="margin-top:15px" class="columna1 columnas">
                   <h4>Costo total de la factura con IVA: {{ number_format(($acum),1) }} </h4>
                </div>
                <div style="margin-top:15px" class="columna2 columnas">
                   <h4>Costo total de la factura sin IVA: {{ number_format(($acumNeto),1) }} </h4>
                </div>
                @foreach($collectionTax as $key)
                <div class="contenedorDatos">
                  <div class="columna1 columnas" style="float:left; width:20%;">
                       <p>IVA: {{ $key['tax'] }} % </p>
                      <p>Total:{{ number_format((($key['priceTax']*$key['tax'])/100),1) }} </p>
                    </div>
                  @endforeach
                </div>

        {{-- </div> --}}
      </div>
</body>
</html>




