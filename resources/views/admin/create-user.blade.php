<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
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
        input[type="Correo"],
        input[type="Contraseña"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="text"]:focus,
        input[type="Correo"]:focus,
        input[type="Contraseña"]:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.1);
        }

        .radio-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .radio-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        button {
            padding: 12px;
            background-color: #4f46e5;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        button:hover {
            background-color: #4338ca;
        }

        .btn-primary {
            background-color: #4f46e5;
            flex: 2;
        }

        .btn-secondary {
            background-color: #6b7280;
            flex: 1;
        }

        .btn-secondary:hover {
            background-color: #4b5563;
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
        <h1>Crea una cuenta</h1>
        
        <div class="card">
            <div class="card-header">
                <h2>Registro</h2>
            </div>
            
            <form>
                <div class="card-content">
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input 
                            type="text" 
                            id="Nombre" 
                            name="Nombre" 
                            placeholder="Ingresa tu nombre" 
                        >
                    </div>
                    
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input 
                            type="correo" 
                            id="Correo" 
                            name="Correo" 
                            placeholder="Ingresa tu correo" 
                        >
                    </div>
                    
                    <div class="form-group">
                        <label for="Contraseña">Contraseña</label>
                        <input 
                            type="Contraseña" 
                            id="Contraseña" 
                            name="Contraseña" 
                            placeholder="Crea tu contraseña"
                        >
                    </div>
                    
                    <div class="form-group">
                        <label for="confirmPassword">Confirmar contraseña</label>
                        <input 
                            type="Contraseña" 
                            id="confirmar contraseña" 
                            name="confirmar contraseña" 
                            placeholder="Confirma tu contraseña"
                        >
                    </div>
                    
                    <div class="form-group">
                        <label>Rol</label>
                        <div class="radio-group">
                            <div class="radio-item">
                                <input 
                                    type="radio" 
                                    id="administrator" 
                                    name="rol" 
                                    value="administrador" 
                                >
                                <label for="administrador">Administrador</label>
                            </div>
                            <div class="radio-item">
                                <input 
                                    type="radio" 
                                    id="empleado" 
                                    name="rol" 
                                    value="empleado" 
                                    checked
                                >
                                <label for="empleado">Empleado</label>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="card-footer">
                    <button type="button" class="btn-secondary" onclick="history.back()">Atrás</button>
                    <button type="button" class="btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
