<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Inventario - Alta de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        .form-container {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #2c3e50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #1a2530;
        }
        .back-button {
            background-color: #7f8c8d;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
            display: inline-block;
            text-decoration: none;
        }
        .back-button:hover {
            background-color: #6c7a7d;
        }
        .proveedores {
            margin-top: 20px;
            padding: 10px;
            background-color: #e9ecef;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistema de Inventario - Alta de Productos</h1>
        
        <div class="form-container">
            <h2>Agregar Nuevo Producto</h2>
            <form method="post" action="{{ route('productos.store') }}">
                @csrf
                <div class="form-group">
                    <label for="codigo">Código:</label>
                    <input type="text" id="codigo" name="codigo" required>
                </div>
                
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="number" id="precio" name="precio" step="0.01" min="0" required>
                </div>
                
                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number" id="stock" name="stock" min="0" required>
                </div>

                <div class="form-group">
                    <label for="imagen_url">URL de la Imagen:</label>
                    <input type="text" id="imagen_url" name="imagen_url">
                </div>

                <div class="form-group">
                    <label for="costo">Costo:</label>
                    <input type="number" id="costo" name="costo" step="0.01" min="0">
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <input type="text" id="tipo" name="tipo">
                </div>

                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <input type="text" id="estado" name="estado" value="activo">
                </div>

                <div class="form-group">
                    <label for="proveedor_id">Proveedor:</label>
                    <select id="proveedor_id" name="proveedor_id" required>
                        <option value="">Seleccione un proveedor</option>
                        @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}">{{ $proveedor->id }} - {{ $proveedor->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn-primary">Agregar producto</button>
                    <button type="button" class="back-button" onclick="window.history.back();">Atrás</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>