<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Inventario</title>
    <style>
        /* Professional typography and colors */
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            color: #333;
            line-height: 1.5;
            margin: 0;
            padding: 20px;
            background-color: #fff;
        }
        
        /* Header styling */
        .header {
            border-bottom: 2px solid #2c3e50;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        
        .company-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo-placeholder {
            width: 150px;
            height: 50px;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
            color: #777;
            font-size: 12px;
        }
        
        /* Report title */
        h1 {
            color: #2c3e50;
            font-size: 24px;
            margin: 0;
            font-weight: 600;
        }
        
        /* Date display */
        .report-date {
            color: #555;
            font-size: 14px;
            margin: 10px 0 20px;
        }
        
        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        th {
            background-color: #2c3e50;
            color: white;
            font-weight: 500;
            text-align: left;
            padding: 12px 10px;
            font-size: 14px;
        }
        
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        tr:hover {
            background-color: #f1f1f1;
        }
        
        /* Specific column styling */
        .numeric {
            text-align: right;
        }
        
        /* Footer */
        .footer {
            margin-top: 30px;
            border-top: 1px solid #ddd;
            padding-top: 15px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
        
        /* Page number */
        .page-number {
            text-align: right;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="company-info">
            <div>
                <h1>Reporte de Inventario</h1>
                <p class="report-date">Fecha: {{ now()->format('d/m/Y H:i') }}</p>
            </div>
        </div>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $p)
            <tr>
                <td>{{ $p->codigo_barras }}</td>
                <td>{{ $p->nombre_producto }}</td>
                <td class="numeric">${{ number_format($p->precio_unitario,2) }}</td>
                <td class="numeric">{{ $p->stock }}</td>
                <td>{{ $p->tipo }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="footer">
        Información de inventario actualizada.
    </div>
    
    </div>
</body>
</html>