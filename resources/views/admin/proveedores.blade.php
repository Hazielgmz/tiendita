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
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }
        
        /* Encabezado */
        h1 {
            color: #2c3e50;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        
        .subtitle {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
        }
        
        /* Botón de alta */
        .btn-add {
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            transition: background-color 0.2s;
        }
        
        .btn-add:hover {
            background-color: #2980b9;
        }
        
        .btn-add svg {
            margin-right: 0.5rem;
        }
        
        /* Tabla */
        .table-container {
            border: 1px solid #ddd;
            border-radius: 2px;
            overflow: hidden;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        thead {
            background-color: #2c3e50;
            color: white;
        }
        
        th {
            text-align: left;
            padding: 0.75rem 1rem;
            font-weight: 500;
        }
        
        td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #ddd;
        }
        
        tbody tr:hover {
            background-color: #f5f5f5;
        }
        
        /* Badges */
        .badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
            cursor: pointer;
        }
        
        .badge-active {
            background-color: #10b981;
            color: white;
        }
        
        .badge-inactive {
            background-color: #e5e7eb;
            color: #4b5563;
        }
        
        /* Botones de acción */
        .actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-edit {
            color: #3498db;
            border: 1px solid #3498db;
            background: transparent;
            padding: 0.25rem 1rem;
            border-radius: 4px;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .btn-edit:hover {
            color: #2980b9;
            border-color: #2980b9;
        }
        
        .btn-delete {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 0.25rem 1rem;
            border-radius: 4px;
            font-size: 0.875rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .btn-delete:hover {
            background-color: #c0392b;
        }
        
        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }
        
        .modal.active {
            display: flex;
        }
        
        .modal-content {
            background-color: white;
            border-radius: 8px;
            width: 100%;
            max-width: 500px;
            padding: 1.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .modal-header {
            margin-bottom: 1rem;
        }
        
        .modal-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
        }
        
        .form-group {
            margin-bottom: 1rem;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            color: #4b5563;
        }
        
        input, select {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            font-size: 0.875rem;
        }
        
        input:focus, select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }
        
        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
            margin-top: 1.5rem;
        }
        
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-size: 0.875rem;
            cursor: pointer;
        }
        
        .btn-outline {
            background-color: transparent;
            border: 1px solid #d1d5db;
            color: #4b5563;
        }
        
        .btn-primary {
            background-color: #3498db;
            color: white;
            border: none;
        }
        
        .btn-primary:hover {
            background-color: #2980b9;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hide-md {
                display: none;
            }
        }
        
        @media (max-width: 640px) {
            .hide-sm {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gestión de Proveedores</h1>
        <p class="subtitle">Administra el catálogo de proveedores</p>
        
        <button id="btnAddProveedor" class="btn-add">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Alta de Proveedor
        </button>
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th class="hide-md">Dirección</th>
                        <th>Email</th>
                        <th class="hide-sm">Teléfono</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="proveedoresTableBody">
                    <!-- Los datos de los proveedores se cargarán aquí dinámicamente -->
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Modal para agregar proveedor -->
    <div id="addModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Agregar Nuevo Proveedor</h3>
            </div>
            <form id="addProveedorForm">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" id="direccion" name="direccion" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" required>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado">
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" id="btnCancelAdd">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Modal para editar proveedor -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Editar Proveedor</h3>
            </div>
            <form id="editProveedorForm">
                <input type="hidden" id="editId">
                <div class="form-group">
                    <label for="editNombre">Nombre</label>
                    <input type="text" id="editNombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="editDireccion">Dirección</label>
                    <input type="text" id="editDireccion" name="direccion" required>
                </div>
                <div class="form-group">
                    <label for="editEmail">Email</label>
                    <input type="email" id="editEmail" name="email" required>
                </div>
                <div class="form-group">
                    <label for="editTelefono">Teléfono</label>
                    <input type="text" id="editTelefono" name="telefono" required>
                </div>
                <div class="form-group">
                    <label for="editEstado">Estado</label>
                    <select id="editEstado" name="estado">
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" id="btnCancelEdit">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        // Datos iniciales de proveedores
        let proveedores = [
            {
                id: 1,
                nombre: "Distribuidora ABC",
                direccion: "Calle Principal 123",
                email: "contacto@abc.com",
                telefono: "555-1234",
                estado: "activo"
            },
            {
                id: 2,
                nombre: "Suministros XYZ",
                direccion: "Av. Central 456",
                email: "info@xyz.com",
                telefono: "555-5678",
                estado: "activo"
            },
            {
                id: 3,
                nombre: "Importadora Global",
                direccion: "Plaza Mayor 789",
                email: "ventas@global.com",
                telefono: "555-9012",
                estado: "inactivo"
            },
            {
                id: 4,
                nombre: "Mayorista Express",
                direccion: "Ruta 7, Km 15",
                email: "info@express.com",
                telefono: "555-3456",
                estado: "activo"
            },
            {
                id: 5,
                nombre: "Proveedora Nacional",
                direccion: "Zona Industrial, Lote 42",
                email: "contacto@nacional.com",
                telefono: "555-7890",
                estado: "inactivo"
            }
        ];
        
        // Elementos del DOM
        const proveedoresTableBody = document.getElementById('proveedoresTableBody');
        const addModal = document.getElementById('addModal');
        const editModal = document.getElementById('editModal');
        const btnAddProveedor = document.getElementById('btnAddProveedor');
        const btnCancelAdd = document.getElementById('btnCancelAdd');
        const btnCancelEdit = document.getElementById('btnCancelEdit');
        const addProveedorForm = document.getElementById('addProveedorForm');
        const editProveedorForm = document.getElementById('editProveedorForm');
        
        // Cargar datos de proveedores en la tabla
        function renderProveedores() {
            proveedoresTableBody.innerHTML = '';
            
            proveedores.forEach(proveedor => {
                const row = document.createElement('tr');
                
                row.innerHTML = `
                    <td>${proveedor.id}</td>
                    <td class="font-medium">${proveedor.nombre}</td>
                    <td class="hide-md">${proveedor.direccion}</td>
                    <td>${proveedor.email}</td>
                    <td class="hide-sm">${proveedor.telefono}</td>
                    <td>
                        <span class="badge ${proveedor.estado === 'activo' ? 'badge-active' : 'badge-inactive'}" 
                              onclick="toggleEstado(${proveedor.id})">
                            ${proveedor.estado === 'activo' ? 'Activo' : 'Inactivo'}
                        </span>
                    </td>
                    <td>
                        <div class="actions">
                            <button class="btn-edit" onclick="openEditModal(${proveedor.id})">Editar</button>
                            <button class="btn-delete" onclick="deleteProveedor(${proveedor.id})">Eliminar</button>
                        </div>
                    </td>
                `;
                
                proveedoresTableBody.appendChild(row);
            });
        }
        
        // Abrir modal para agregar proveedor
        btnAddProveedor.addEventListener('click', () => {
            addModal.classList.add('active');
        });
        
        // Cerrar modal de agregar
        btnCancelAdd.addEventListener('click', () => {
            addModal.classList.remove('active');
            addProveedorForm.reset();
        });
        
        // Cerrar modal de editar
        btnCancelEdit.addEventListener('click', () => {
            editModal.classList.remove('active');
        });
        
        // Agregar nuevo proveedor
        addProveedorForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const formData = new FormData(addProveedorForm);
            const newProveedor = {
                id: proveedores.length > 0 ? Math.max(...proveedores.map(p => p.id)) + 1 : 1,
                nombre: formData.get('nombre'),
                direccion: formData.get('direccion'),
                email: formData.get('email'),
                telefono: formData.get('telefono'),
                estado: formData.get('estado')
            };
            
            proveedores.push(newProveedor);
            renderProveedores();
            
            addModal.classList.remove('active');
            addProveedorForm.reset();
        });
        
        // Abrir modal para editar proveedor
        function openEditModal(id) {
            const proveedor = proveedores.find(p => p.id === id);
            if (!proveedor) return;
            
            document.getElementById('editId').value = proveedor.id;
            document.getElementById('editNombre').value = proveedor.nombre;
            document.getElementById('editDireccion').value = proveedor.direccion;
            document.getElementById('editEmail').value = proveedor.email;
            document.getElementById('editTelefono').value = proveedor.telefono;
            document.getElementById('editEstado').value = proveedor.estado;
            
            editModal.classList.add('active');
        }
        
        // Editar proveedor
        editProveedorForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const formData = new FormData(editProveedorForm);
            const id = parseInt(document.getElementById('editId').value);
            
            const index = proveedores.findIndex(p => p.id === id);
            if (index !== -1) {
                proveedores[index] = {
                    id: id,
                    nombre: formData.get('nombre'),
                    direccion: formData.get('direccion'),
                    email: formData.get('email'),
                    telefono: formData.get('telefono'),
                    estado: formData.get('estado')
                };
                
                renderProveedores();
                editModal.classList.remove('active');
            }
        });
        
        // Eliminar proveedor
        function deleteProveedor(id) {
            if (confirm('¿Está seguro de que desea eliminar este proveedor?')) {
                proveedores = proveedores.filter(p => p.id !== id);
                renderProveedores();
            }
        }
        
        // Cambiar estado de proveedor
        function toggleEstado(id) {
            const index = proveedores.findIndex(p => p.id === id);
            if (index !== -1) {
                proveedores[index].estado = proveedores[index].estado === 'activo' ? 'inactivo' : 'activo';
                renderProveedores();
            }
        }
        
        // Cerrar modales al hacer clic fuera de ellos
        window.addEventListener('click', (e) => {
            if (e.target === addModal) {
                addModal.classList.remove('active');
                addProveedorForm.reset();
            }
            if (e.target === editModal) {
                editModal.classList.remove('active');
            }
        });
        
        // Inicializar la tabla
        renderProveedores();
    </script>
</body>
</html>