<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Adiciones al presupuesto</title>
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
      <p>Presupuesto: {{ number_format($aditions[0]['initial_budget'])}}</p>
      <p>Fecha de inicio: {{ $aditions[0]['budget_begin_date'] }}</p>
      <p>Fecha Final: {{ $aditions[0]['budget_finish_date'] }}</p>
      </div>
      <div class="columna2 columnas">
        <p>Código del presupuesto: {{ $aditions[0]['budget_code'] }} </p>
       <br>
       <br>
       <br>
      </div>
    </div>
    <br>
    <div class="contenedorTabla" >
      @if(count($aditions)>22)
        <table class="greyGridTable">
          <thead>
            <tr>
                <th></th>
                <th>Codigo</th>
                <th>Presupuesto Adicionado</th>
                <th>Fecha de la adición</th>
                <th>Fecha de clausura</th>
            </tr>
          </thead>
          <tbody>
        @for($i=0; $i<22 ; $i++ )
            <tr>
              <td>{{ $i+1 }}</td>
              <td>{{ $aditions[$i]['aditional_budget_code'] }}</td>
              <td>{{ number_format($aditions[$i]['aditional_budget']) }}</td>
              <td>{{ $aditions[$i]['aditional_begin_date'] }}</td>
              <td>{{ $aditions[$i]['aditional_finish_date'] }}</td>
            </tr>
        @endfor
          </tbody>
        </table>
        <div style="width:100%;heigth:20px"></div>
            </div>
              <table class="greyGridTable" style="margin-top:80px">
                  <thead>
                    <tr>
                      <th></th>
                        <th>Codigo</th>
                        <th>Presupuesto Adicionado</th>
                        <th>Fecha de la adición</th>
                        <th>Fecha de clausura</th>
                    </tr>
                    </thead>
                  <tbody>
                  @for($i=22; $i<count($aditions) ; $i++ )
                    <tr>
                          <td>{{ $i}}</td>
                          <td>{{ $aditions[$i]['aditional_budget_code'] }}</td>
                          <td>{{ number_format($aditions[$i]['aditional_budget']) }}</td>
                          <td>{{ $aditions[$i]['aditional_begin_date'] }}</td>
                          <td>{{ $aditions[$i]['aditional_finish_date'] }}</td>
                    </tr>
                  @endfor
                    </tbody>
                  </table>
            @elseif(count($aditions)<22)
              <table class="greyGridTable">
                <thead>
                <tr>
                 <th>Codigo</th>
                <th>Presupuesto Adicionado</th>
                <th>Fecha de la adición</th>
                <th>Fecha de clausura</th>
                </tr>
                </thead>
                <tbody>
            @foreach($aditions as $key => $value)
                  <tr>
                  <td>{{ $value['aditional_budget_code'] }}</td>
                  <td>{{ number_format($value['aditional_budget']) }}</td>
                  <td>{{ $value['aditional_begin_date'] }}</td>
                  <td>{{ $value['aditional_finish_date'] }}</td>
                  </tr>
            @endforeach
                </tbody>
              </table>
              @endif
              <div class="contenedorDatos" style="margin-top:15px">
            <div class="columna1 columnas">
              <h4></h4>
              <h4></h4>
            </div>
            <div  class="columna2 columnas">
                <h4></h4>
            </div>

              </div>
    {{-- </div> --}}
  </div>
</body>
</html>
