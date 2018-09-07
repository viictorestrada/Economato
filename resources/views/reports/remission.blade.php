<!DOCTYPE html>



<?php
# Cargamos la librería dompdf.
require_once 'lib/pdf/dompdf_config.inc.php';

# Contenido HTML del documento que queremos generar en PDF.
$html='
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
  <div class="title-pdf">
    <h5>Usuario: {{}}</h5>
    <h5>Fecha: {{}}</h5>
    <h5>CC: {{}}</h5>
    <h5>Programa: {{}}</h5>
    <h5>Población: {{}}</h5>
    <h5>Taller: {{}}</h5>

{{-- {{ dd($orderCost[0]) }} --}}
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
</body>
</html>';


$stylesheet= '

title-pdf {
  width: 100%;
  height: 500px;
  padding: 25px;
  background: url(images/sin_firma.pdf);
  background-repeat: no-repeat;
  background-size: 100% 100%;
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
}';




# Instanciamos un objeto de la clase DOMPDF.
$mipdf = new DOMPDF();

# Definimos el tamaño y orientación del papel que queremos.
# O por defecto cogerá el que está en el fichero de configuración.
$mipdf ->set_paper("A4", "portrait");

# Cargamos el contenido HTML.
$mipdf ->load_html(utf8_decode($stylesheet, 1));
$mipdf ->load_html(utf8_decode($html, 2));

# Renderizamos el documento PDF.
$mipdf ->render();

# Enviamos el fichero PDF al navegador.
$mipdf ->stream();
?>
