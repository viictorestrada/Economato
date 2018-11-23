<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Gatos por formación Economato</title>
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
      width: 100%;
      position: absolute;
      top: 70px;
      right: 0px;
      left: 0px;
    }

    .imgLogo img{
      width: 100%;
      }


</style>
</head>

<body>
  <div class="title-pdf contenedor">
    <div class="contenedorDatos">
      <div class="imgLogo">
        <img style="margin-left:30px" src="{{asset('images/logo.png')}}" alt="">
      </div>
      <div class="columna1 columnas">
      <p></p>
      <p></p>
      <p></p>
      </div>
      <div class="columna2 columnas">
        <p> </p>
        <p></p>
         <p> </p>
      </div>
    </div>
    <br>
          @if(count($characterization)<22)
              <table class="greyGridTable">
                <thead>
                <tr>
                  <th>Caracterización</th>
                  <th>Presupuesto consumido</th>
                </tr>
                </thead>
                <tbody>
                  {{ $acum=0 }}
            @foreach($characterization as $key => $value)
            {{  $acum +=$value['sum'] }}
                  <tr>
                  <td>{{ $value['characterization_name'] }}</td>
                  <td>{{ number_format($value['sum']) }}</td>
                  </tr>
            @endforeach
                </tbody>
              </table>
              @endif
              <div class="contenedorDatos" style="margin-top:15px">
            <div class="columna1 columnas">
            <h4>Total consumido por Formación: {{ number_format($acum) }}</h4>
            </div>
            <div  class="columna2 columnas">
            </div>
              </div>
            <div class="contenedorDatos">

             <div class="columna1 columnas">
              <strong><hr style="color:black;" size="3" width="50%">
              <div style="margin-left:90px">Firma economato</div>
              </strong>
            </div>
            <div  class="columna2 columnas">
              <strong><hr style="color:black;" size="3" width="50%">
              <div style="margin-left:90px">Firma de Coordinación</div>
              </strong>
            </div>

              </div>
    {{-- </div> --}}
  </div>
</body>
</html>


