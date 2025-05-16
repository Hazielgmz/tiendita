<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Proveedor</title>

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
            max-width: 500px;
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
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        input:focus {
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
            text-decoration: none;
            flex: 1;
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
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Crear Proveedor</h1>

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
                <h2>Registro de Proveedor</h2>
            </div>

            <form action="{{ route('admin.proveedores.store') }}" method="POST">
                @csrf
                <div class="card-content">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            value="{{ old('nombre') }}"
                            placeholder="Nombre del proveedor"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado / Ciudad</label>
                        <input
                            type="text"
                            id="estado"
                            name="estado"
                            value="{{ old('estado') }}"
                            placeholder="Ej. Nuevo León"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input
                            type="text"
                            id="direccion"
                            name="direccion"
                            value="{{ old('direccion') }}"
                            placeholder="Calle, número, colonia"
                        >
                    </div>

                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="correo@ejemplo.com"
                        >
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input
                            type="text"
                            id="telefono"
                            name="telefono"
                            value="{{ old('telefono') }}"
                            placeholder="(81) 1234-5678"
                        >
                    </div>
                </div>

                <div class="card-footer">
                    <button type="button" class="btn-secondary" onclick="history.back()">Atrás</button>
                    <button type="submit" class="btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
