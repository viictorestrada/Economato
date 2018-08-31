<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Document</title>
  <style>
    .page-break {
        page-break-after: always;
    }
    </style>
</head>
<body>
{{
  dump($products)
}}
  @foreach($products as $key => $value){
    <table>
      <thead>
        <th>Producto</th>
        <th>Unidad de Medida</th>
        <th>Cantidad</th>
        <th>Precio unitario</th>
        <th>Iva</th>
        <th>Total</th>
      </thead>
    </table>
  }
</body>
</html>
