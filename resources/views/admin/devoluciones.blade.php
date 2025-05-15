<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Devoluciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #fff;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
<<<<<<< HEAD
=======
        .header-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .back-button {
            display: flex;
            align-items: center;
            padding: 8px 16px;
            background-color: #f1f1f1;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            color: #333;
            margin-right: 15px;
            transition: background-color 0.3s;
        }
        .back-button:hover {
            background-color: #e0e0e0;
        }
        .back-icon {
            margin-right: 5px;
            width: 16px;
            height: 16px;
        }
>>>>>>> aa12fc19d6a10b7cefca771f78d09a7e857052d3
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 8px;
        }
        p {
            color: #666;
            margin-bottom: 24px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        thead tr {
            background-color: #2c3e50;
            color: white;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        tbody tr:hover {
            background-color: #f5f5f5;
        }
        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            color: white;
        }
        .btn-devolver {
            background-color: #f39c12;
        }
        .btn-devolver:hover {
            background-color: #d35400;
        }
        .badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
        }
        .badge-active {
            background-color: #e8f5e9;
            color: #2e7d32;
        }
        .badge-returned {
            background-color: #fff8e1;
            color: #f57f17;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border-radius: 5px;
            width: 400px;
        }
        .modal-header {
            margin-bottom: 15px;
        }
<<<<<<< HEAD
=======
        .modal-body {
            margin-bottom: 20px;
        }
>>>>>>> aa12fc19d6a10b7cefca771f78d09a7e857052d3
        .modal-footer {
            margin-top: 20px;
            text-align: right;
        }
        .btn-cancel {
            background-color: #95a5a6;
            margin-right: 10px;
        }
        .btn-confirm {
            background-color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="container">
<<<<<<< HEAD
        <h1>Gestión de Devoluciones</h1>
        <p>Administra las devoluciones de productos</p>
=======
        <div class="header-container">
            <button class="back-button" onclick="goBack()">
                <svg class="back-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Atrás
            </button>
            <div>
                <h1>Gestión de Devoluciones</h1>
                <p>Administra las devoluciones de productos</p>
            </div>
        </div>
>>>>>>> aa12fc19d6a10b7cefca771f78d09a7e857052d3

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Fecha</th>
                        <th>Precio</th>
<<<<<<< HEAD
                        <th>Acciones</th>
=======
>>>>>>> aa12fc19d6a10b7cefca771f78d09a7e857052d3
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1001</td>
                        <td>Aguacate</td>
                        <td>$25.00</td>
                        <td>1000</td>
<<<<<<< HEAD
                        <td><span class="badge badge-active">Activo</span></td>
                        <td>
                            <button class="btn btn-devolver" onclick="abrirModalConfirmacion('1001')">Devolver</button>
                        </td>
=======
>>>>>>> aa12fc19d6a10b7cefca771f78d09a7e857052d3
                    </tr>
                    <tr>
                        <td>1002</td>
                        <td>Avena</td>
                        <td>$5.00</td>
                        <td>1000</td>
<<<<<<< HEAD
                        <td><span class="badge badge-active">Activo</span></td>
                        <td>
                            <button class="btn btn-devolver" onclick="abrirModalConfirmacion('1002')">Devolver</button>
                        </td>
=======
>>>>>>> aa12fc19d6a10b7cefca771f78d09a7e857052d3
                    </tr>
                    <tr>
                        <td>1003</td>
                        <td>Granola</td>
                        <td>$10.00</td>
                        <td>1000</td>
<<<<<<< HEAD
                        <td><span class="badge badge-active">Activo</span></td>
                        <td>
                            <button class="btn btn-devolver" onclick="abrirModalConfirmacion('1003')">Devolver</button>
                        </td>
=======
                       
>>>>>>> aa12fc19d6a10b7cefca771f78d09a7e857052d3
                    </tr>
                    <tr>
                        <td>1004</td>
                        <td>Platano</td>
                        <td>$5.00</td>
                        <td>1000</td>
<<<<<<< HEAD
                        <td><span class="badge badge-active">Activo</span></td>
                        <td>
                            <button class="btn btn-devolver" onclick="abrirModalConfirmacion('1004')">Devolver</button>
                        </td>
=======
                       
>>>>>>> aa12fc19d6a10b7cefca771f78d09a7e857052d3
                    </tr>
                    <tr>
                        <td>1005</td>
                        <td>Manzana</td>
                        <td>$10.00</td>
                        <td>1000</td>
<<<<<<< HEAD
                        <td><span class="badge badge-active">Activo</span></td>
                        <td>
                            <button class="btn btn-devolver" onclick="abrirModalConfirmacion('1005')">Devolver</button>
                        </td>
=======
>>>>>>> aa12fc19d6a10b7cefca771f78d09a7e857052d3
                    </tr>
                    <tr>
                        <td>1006</td>
                        <td>Naranja</td>
                        <td>$8.00</td>
                        <td>1000</td>
<<<<<<< HEAD
                        <td><span class="badge badge-returned">Devuelto</span></td>
=======
>>>>>>> aa12fc19d6a10b7cefca771f78d09a7e857052d3
                        <td>
                            <!-- No hay botón de devolver para productos ya devueltos -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal de confirmación -->
    <div id="modalConfirmacion" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Confirmar devolución</h3>
            </div>
            <div class="modal-body">
                <p id="mensajeConfirmacion">¿Está seguro que desea devolver este producto?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-cancel" onclick="cerrarModal()">Cancelar</button>
                <button class="btn btn-confirm" onclick="confirmarDevolucion()">Confirmar</button>
            </div>
        </div>
    </div>

    <script>
        let productoSeleccionado = null;
        
        function abrirModalConfirmacion(codigo) {
            productoSeleccionado = codigo;
            document.getElementById('mensajeConfirmacion').textContent = 
                `¿Está seguro que desea devolver el producto con código ${codigo}?`;
            document.getElementById('modalConfirmacion').style.display = 'block';
        }
        
        function cerrarModal() {
            document.getElementById('modalConfirmacion').style.display = 'none';
        }
        
        function confirmarDevolucion() {
            // Aquí iría la lógica para procesar la devolución
            alert(`Producto con código ${productoSeleccionado} devuelto correctamente`);
            cerrarModal();
        }
        
<<<<<<< HEAD
=======
        function goBack() {
            window.history.back();
        }
        
>>>>>>> aa12fc19d6a10b7cefca771f78d09a7e857052d3
        // Cerrar el modal si se hace clic fuera de él
        window.onclick = function(event) {
            const modal = document.getElementById('modalConfirmacion');
            if (event.target == modal) {
                cerrarModal();
            }
        }
    </script>
</body>
</html>