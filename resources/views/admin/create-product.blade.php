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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: #2c3e50;
            color: white;
            text-align: left;
            padding: 12px;
        }
        td {
            border: 1px solid #ddd;
            padding: 12px;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistema de Inventario - Alta de Productos</h1>
        
    
        <!-- Formulario para agregar productos -->
        <div class="form-container">
            <h2>Agregar Nuevo Producto</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
                 
                <div class="card-footer">
                    <button type="button" class="btn-primary">Agregar producto</button>
                    <button class="back-button" onclick="window.history.back();">Atrás</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
               