<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Proveedores</title>
    <style>
        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        
        body {
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
            padding: 1rem;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 1rem;
            border-radius: 8px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        /* Encabezado */
        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #eee;
        }
        
        .header {
            flex: 1;
        }
        
        .header h1 {
            color: #2c3e50;
            font-size: 1.75rem;
            margin-bottom: 0.25rem;
        }
        
        .header .subtitle {
            color: #666;
            font-size: 0.95rem;
            margin: 0;
        }
        
        .btn-add {
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 0.6rem 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            margin-bottom: 1rem;
            transition: background-color 0.2s;
        }

        .btn-add:hover {
            background-color: #2980b9;
        }

        .btn-back {
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 0.6rem 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            margin-bottom: 1rem;
            transition: background-color 0.2s;
        }

        .btn-back:hover {
            background-color: #c0392b;
        }
        
        /* Tabla */
        .table-container {
            border: 1px solid #eee;
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 1rem;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }
        
        thead {
            background-color: #2c3e50;
            color: white;
        }
        
        th {
            text-align: left;
            padding: 0.6rem 0.75rem;
            font-weight: 500;
        }
        
        td {
            padding: 0.6rem 0.75rem;
            border-bottom: 1px solid #eee;
        }
        
        tbody tr:hover {
            background-color: #f5f5f5;
        }
        
        /* Botones de acción */
        .actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-edit, .btn-delete {
            padding: 0.2rem 0.6rem;
            border-radius: 4px;
            font-size: 0.75rem;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .btn-edit {
            color: #3498db;
            border: 1px solid #3498db;
            background: transparent;
        }
        
        .btn-edit:hover {
            color: #2980b9;
            border-color: #2980b9;
        }
        
        .btn-delete {
            background-color: #e74c3c;
            color: white;
            border: none;
        }
        
        .btn-delete:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-container">
            <div class="header">
                <h1>Gestión de Proveedores</h1>
                <p class="subtitle">Administra el catálogo de proveedores</p>
            </div>
            <button onclick="window.location.href='/admin/proveedores/create-proveedores'" class="btn-add">
                Agregar Proveedor
            </button>
        </div>
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="proveedoresTableBody"></tbody>
            </table>
        </div>
        
        <button onclick="window.location.href='{{ route('admin.dashboard') }}'" class="btn-back">Atrás</button>
    </div>

    <script>
        async function renderProveedores() {
            const response = await fetch('/api/proveedores');
            const proveedores = await response.json();
            const tableBody = document.getElementById('proveedoresTableBody');
            tableBody.innerHTML = '';
            proveedores.forEach(proveedor => {
                const row = `<tr id="row-${proveedor.id}">
                    <td>${proveedor.id}</td>
                    <td><input type="text" value="${proveedor.nombre}" id="nombre-${proveedor.id}"></td>
                    <td><input type="text" value="${proveedor.direccion}" id="direccion-${proveedor.id}"></td>
                    <td><input type="email" value="${proveedor.email}" id="email-${proveedor.id}"></td>
                    <td><input type="text" value="${proveedor.telefono}" id="telefono-${proveedor.id}"></td>
                    <td>
                        <select id="estado-${proveedor.id}">
                            <option value="activo" ${proveedor.estado === 'activo' ? 'selected' : ''}>Activo</option>
                            <option value="inactivo" ${proveedor.estado === 'inactivo' ? 'selected' : ''}>Inactivo</option>
                        </select>
                    </td>
                    <td>
                        <div class="actions">
                            <button onclick="updateProveedor(${proveedor.id})" class="btn-edit">Guardar</button>
                            <button onclick="deleteProveedor(${proveedor.id})" class="btn-delete">Eliminar</button>
                        </div>
                    </td>
                </tr>`;
                tableBody.innerHTML += row;
            });
            if (proveedores.length === 0) {
                tableBody.innerHTML = '<tr><td colspan="7">No hay proveedores registrados.</td></tr>';
            }
        }

        async function updateProveedor(id) {
            const nombre = document.getElementById(`nombre-${id}`).value;
            const direccion = document.getElementById(`direccion-${id}`).value;
            const email = document.getElementById(`email-${id}`).value;
            const telefono = document.getElementById(`telefono-${id}`).value;
            const estado = document.getElementById(`estado-${id}`).value;

            const response = await fetch(`/api/proveedores/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Asegúrate de incluir el token CSRF
                },
                body: JSON.stringify({
                    nombre,
                    direccion,
                    email,
                    telefono,
                    estado
                })
            });

            const result = await response.json();
            alert(result.message);
            renderProveedores(); // Volver a cargar la lista de proveedores
        }

        async function deleteProveedor(id) {
            if (confirm('¿Estás seguro de que deseas eliminar este proveedor?')) {
                const response = await fetch(`/api/proveedores/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Asegúrate de incluir el token CSRF
                    }
                });
                const result = await response.json();
                alert(result.message);
                renderProveedores(); // Volver a cargar la lista de proveedores
            }
        }

        renderProveedores();
    </script>
</body>
</html>