<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Usuario</title>
    <style>
        :root {
            --primary-color: #2980b9;
            --text-color: #333;
            --border-color: #ddd;
            --placeholder-color: #888;
            --button-cancel: #e0e0e0;
            --button-hover: #1c638d;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            color: var(--text-color);
            line-height: 1.5;
            padding: 20px;
            max-width: 1000px;
            margin: 0 auto;
        }
        
        h1 {
            font-size: 24px;
            font-weight: 500;
            color: var(--text-color);
            margin-bottom: 30px;
        }
        
        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
            flex: 1;
        }
        
        .form-group.full-width {
            width: 100%;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-color);
        }
        
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border-color);
            border-radius: 5px;
            font-size: 16px;
            color: var(--text-color);
        }
        
        .form-group input::placeholder {
            color: var(--placeholder-color);
        }
        
        .form-group select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px;
        }
        
        .button-group {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .btn-cancel {
            background-color: var(--button-cancel);
            color: var(--text-color);
        }
        
        .btn-cancel:hover {
            background-color: #d0d0d0;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--button-hover);
        }
        
        .btn-back {
            background-color: #f5f5f5;
            color: var(--text-color);
            border: 1px solid #ddd;
        }
        
        .btn-back:hover {
            background-color: #e8e8e8;
        }
        
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .button-group {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <h1>Edite los datos del usuario</h1>
    
    <form>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingrese nombre completo" required>
        </div>
        
        <div class="form-group full-width">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>
        </div>
        
        <div class="form-group">
            <label for="rol">Rol</label>
            <select id="rol" name="rol" required>
                <option value="" disabled selected>Seleccione un rol</option>
                <option value="gerente">Gerente</option>
                <option value="empleado">Empleado</option>
            </select>
        </div>
        
        <div class="button-group">
    <button type="button" class="btn-back" onclick="window.history.back();">Atrás</button>
    <button type="button" class="btn btn-cancel">Cancelar</button>
    <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
</div>

<style>
    /* Botón "Atrás" con el color de la imagen 2 */
    .btn-back {
        background-color: #6b7280; /* Gris oscuro */
        color: white;
        padding: 12px 24px;
        font-size: 16px;
        font-weight: 500;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .btn-back:hover {
        background-color: #4b5563; /* Gris más oscuro al pasar el mouse */
    }

    /* Botón "Cancelar" */
    .btn-cancel {
        background-color: var(--button-cancel);
        color: var(--text-color);
    }

    .btn-cancel:hover {
        background-color: #d0d0d0;
    }

    /* Botón "Actualizar Usuario" */
    .btn-primary {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-primary:hover {
        background-color: var(--button-hover);
    }

    /* Espaciado entre los botones */
    .button-group {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        margin-top: 30px;
    }
</style>
    </form>
</body>
</html>