<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Inventario – Alta de Productos</title>

    {{-- Carga tu CSS compilado (Tailwind/Bootstrap o tu propio app.css) --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 24px;
            font-weight: 600;
            font-size: 24px;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .card-header {
            padding: 20px;
            border-bottom: 1px solid #eee;
        }

        .card-header h2 {
            text-align: center;
            font-size: 20px;
            font-weight: 600;
        }

        .card-content {
            padding: 20px;
        }

        .card-footer {
            padding: 20px;
            border-top: 1px solid #eee;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 14px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 2px rgba(79,70,229,0.1);
        }

        .btn-primary,
        .btn-secondary {
            padding: 12px;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
            text-align: center;
            flex: 1 1 auto;
        }

        .btn-primary {
            background-color: #4f46e5;
        }

        .btn-secondary {
            background-color: #6b7280;
        }

        .btn-primary:hover,
        .btn-secondary:hover {
            opacity: 0.9;
        }

        @media (max-width: 600px) {
            .container {
                margin: 20px auto;
            }
            .card-footer {
                flex-direction: column-reverse;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Alta de Productos</h1>

        @if ($errors->any())
            <div class="alert alert-danger" style="margin-bottom:20px;">
                <ul>
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h2>Agregar Nuevo Producto</h2>
            </div>
            <form method="POST" action="{{ route('productos.store') }}">
                @csrf
                <div class="card-content">
                    <div class="form-group">
                        <label for="codigo">Código</label>
                        <input type="text" id="codigo" name="codigo" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" id="stock" name="stock" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="imagen_url">URL de la Imagen</label>
                        <input type="text" id="imagen_url" name="imagen_url">
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" id="precio" name="precio" step="0.01" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="costo">Costo</label>
                        <input type="number" id="costo" name="costo" step="0.01" min="0">
                    </div>
                    <div class="form-group">
                        <label for="tipo">Tipo</label>
                        <select id="tipo" name="tipo" required>
                            <option value="" disabled selected>Selecciona tipo</option>
                            <option value="GR">GR</option>
                            <option value="PZ">PZ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select id="estado" name="estado" required>
                            <option value="" disabled selected>Selecciona estado</option>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="proveedor_id">Proveedor</label>
                        <select id="proveedor_id" name="proveedor_id" required>
                            <option value="" disabled selected>Seleccione un proveedor</option>
                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}">
                                    {{ $proveedor->id }} – {{ $proveedor->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn-secondary" onclick="history.back()">Atrás</button>
                    <button type="submit" class="btn-primary">Agregar producto</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
