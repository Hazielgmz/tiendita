<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        
        h1 {
            color: #333;
            text-align: center;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        th {
            background-color: #2c3e50;
            color: white;
            padding: 12px;
            text-align: left;
        }
        
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        
        tr:hover {
            background-color: #f9f9f9;
        }
        
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
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
            background-color: #1a252f;
        }
        
        .actions {
            display: flex;
            gap: 5px;
        }
        
        .edit-btn {
            background-color: #3498db;
        }
        
        .delete-btn {
            background-color: #e74c3c;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Gestión de Productos</h1>
        
        <div class="form-container">
            <h2>Editar Producto</h2>
            <form id="productForm">
                <input type="hidden" id="editIndex" value="-1">
                
                <div class="form-group">
                    <label for="codigo">Código:</label>
                    <input type="text" id="codigo" required>
                </div>
                
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" required>
                </div>
                
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="number" id="precio" step="0.01" min="0" required>
                </div>
                
                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number" id="stock" min="0" required>
                </div>
                
                <button type="submit">Guardar Producto</button>
                <button type="button" onclick="resetForm()">Cancelar</button>
                <button class="back-button" onclick="window.history.back();">Atrás</button>
            </form>
        </div>
             
    </script>
</body>
</html>