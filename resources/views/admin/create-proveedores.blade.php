<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Proveedor</title>
    <style>
        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        body {
            background-color: #f8f9fa;
            padding: 1rem;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 1rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        button, a {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 0.6rem;
            cursor: pointer;
            margin-top: 1rem;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            border-radius: 4px;
        }
        .back-button {
            background-color: #e74c3c; /* Color rojo para el botón de atrás */
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin-top: 1rem;
        }
        li {
            margin-bottom: 0.5rem;
            padding: 0.5rem;
            background-color: #f1f1f1;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Crear Proveedor</h1>
        <form id="createProveedorForm" method="POST" action="/api/proveedores">
            @csrf
            <ul>
                <li>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </li>
                <li>
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" required>
                </li>
                <li>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </li>
                <li>
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" required>
                </li>
                <li>
                    <label for="estado">Estado:</label>
                    <select id="estado" name="estado">
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </li>
            </ul>
            <button type="submit">Guardar</button>
            <a href="{{ route('admin.proveedores') }}" class="back-button">Atrás</a>
        </form>
    </div>
    
    <script>
        document.getElementById('createProveedorForm').addEventListener('submit', async (e) => {
            // No se usa AJAX, el formulario se envía de forma tradicional
        });
    </script>
</body>
</html>