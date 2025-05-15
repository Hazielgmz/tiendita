<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Inventario</title>
    <style>
      body { font-family: DejaVu Sans, sans-serif; }
      table { width:100%; border-collapse:collapse; }
      th, td { border:1px solid #444; padding:6px; }
      th { background:#eee; }
    </style>
</head>
<body>
  <h2 style="text-align:center">Inventario Actual</h2>
  <p>Fecha: {{ now()->format('d/m/Y H:i') }}</p>
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Tipo</th>
        <th>Estado</th>
      </tr>
    </thead>
    <tbody>
      @foreach($productos as $p)
        <tr>
          <td>{{ $p->codigo_barras }}</td>
          <td>{{ $p->nombre_producto }}</td>
          <td>{{ number_format($p->precio_unitario,2) }}</td>
          <td>{{ $p->stock }}</td>
          <td>{{ $p->tipo }}</td>
          <td>{{ $p->estado }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
