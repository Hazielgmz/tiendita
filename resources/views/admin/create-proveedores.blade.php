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
        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 0.6rem;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Crear Proveedor</h1>
        <form id="createProveedorForm">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>
            <label for="estado">Estado:</label>
            <select id="estado" name="estado">
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
            <button type="submit">Guardar</button>
        </form>
    </div>
    <script>
        document.getElementById('createProveedorForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(e.target);
            const data = Object.fromEntries(formData.entries());
            const response = await fetch('/api/proveedores', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data),
            });
            if (response.ok) {
                alert('Proveedor creado con éxito');
                e.target.reset();
            } else {
                const errorData = await response.json();
                alert('Error al crear proveedor: ' + errorData.message);
            }
        });
    </script>
</body>
</html>