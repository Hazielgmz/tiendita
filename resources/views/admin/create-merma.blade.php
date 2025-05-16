<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Merma</title>

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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.1);
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
        }

        .btn-primary {
            background-color: #4f46e5;
            flex: 2;
        }

        .btn-secondary {
            background-color: #6b7280;
            flex: 1;
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
        <h1>Alta de Merma</h1>

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
                <h2>Registrar Merma</h2>
            </div>

            <form action="{{ route('admin.mermas.store') }}" method="POST">
                @csrf
                <div class="card-content">
                    <div class="form-group">
                        <label for="producto_id">Producto</label>
                        <select
                            id="producto_id"
                            name="producto_id"
                            required
                            style="width:100%;padding:10px;border:1px solid #ddd;border-radius:4px;font-size:16px;"
                        >
                            <option value="" disabled selected>Seleccionar producto</option>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->id }}">
                                    {{ $producto->nombre_producto }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input
                            type="number"
                            id="cantidad"
                            name="cantidad"
                            min="1"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="motivo">Motivo</label>
                        <select
                            id="motivo"
                            name="motivo"
                            required
                            style="width:100%;padding:10px;border:1px solid #ddd;border-radius:4px;font-size:16px;"
                        >
                            <option value="" disabled selected>Seleccionar motivo</option>
                            <option value="caducidad">Caducidad</option>
                            <option value="daño">Daño</option>
                            <option value="robo">Robo</option>
                            <option value="otro">Otro</option>
                        </select>
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
