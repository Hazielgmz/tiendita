<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Variables y reset */
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-light: #60a5fa;
            --secondary: #475569;
            --accent: #0f172a;
            --background-start: #f1f5f9;
            --background-middle: #e2e8f0;
            --background-end: #cbd5e1;
            --text-primary: #1e293b;
            --text-secondary: #475569;
            --text-muted: #64748b;
            --text-white: #ffffff;
            --card-background: #ffffff;
            --border: #e2e8f0;
            --input-border: #cbd5e1;
            --input-focus: #2563eb;
            --ring: rgba(37, 99, 235, 0.3);
            --radius: 0.5rem;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--background-start), var(--background-middle), var(--background-end));
            padding: 1rem;
            color: var(--text-primary);
        }

        /* Contenedor principal */
        .container {
            width: 100%;
            max-width: 400px;
            background-color: var(--card-background);
            border-radius: var(--radius);
            box-shadow: var(--shadow-xl);
            overflow: hidden;
            animation: fadeIn 0.5s ease-out;
            position: relative;
            z-index: 10;
        }

        .card {
            padding: 2rem;
        }

        /* Encabezado */
        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
        }

        .logo svg {
            width: 40px;
            height: 40px;
            color: white;
        }

        .header h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .header p {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        /* Formulario */
        .form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .label {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-primary);
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            pointer-events: none;
        }

        .input {
            width: 100%;
            padding: 0.75rem 0.75rem 0.75rem 2.5rem;
            border: 1px solid var(--input-border);
            border-radius: var(--radius);
            font-size: 0.875rem;
            color: var(--text-primary);
            background-color: var(--card-background);
            transition: all 0.2s ease;
        }

        .input:focus {
            outline: none;
            border-color: var(--input-focus);
            box-shadow: 0 0 0 3px var(--ring);
        }

        /* Alerta de error */
        .alert {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem;
            border-radius: var(--radius);
            background-color: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            font-size: 0.875rem;
            animation: slideDown 0.3s ease-out;
            display: none;
        }

        .alert svg {
            flex-shrink: 0;
        }

        /* Botones */
        .button-group {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            flex: 1;
            padding: 0.75rem 1rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            border-radius: var(--radius);
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);
        }

        .button:hover {
            background: linear-gradient(135deg, var(--primary-dark), #1e40af);
            transform: translateY(-1px);
            box-shadow: 0 6px 10px -1px rgba(37, 99, 235, 0.3);
        }

        .button:active {
            transform: translateY(0);
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.2);
        }

        .button:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .button-back {
            background: linear-gradient(135deg, var(--secondary), #334155);
        }

        .button-back:hover {
            background: linear-gradient(135deg, #334155, #1e293b);
        }

        /* Spinner */
        .spinner {
            display: inline-block;
            width: 1rem;
            height: 1rem;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s linear infinite;
            margin-right: 0.5rem;
            display: none;
        }

        /* Animaciones */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes shake {
            10%, 90% {
                transform: translate3d(-1px, 0, 0);
            }
            20%, 80% {
                transform: translate3d(2px, 0, 0);
            }
            30%, 50%, 70% {
                transform: translate3d(-3px, 0, 0);
            }
            40%, 60% {
                transform: translate3d(3px, 0, 0);
            }
        }

        .shake {
            animation: shake 0.5s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .card {
                padding: 1.5rem;
            }
            
            .logo {
                width: 60px;
                height: 60px;
            }
            
            .logo svg {
                width: 30px;
                height: 30px;
            }
            
            .header h1 {
                font-size: 1.25rem;
            }
        }

        /* Efectos adicionales */
        .glow {
            position: absolute;
            width: 40%;
            height: 200%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.2),
                transparent
            );
            transform: rotate(35deg) translateX(-200%);
            animation: glow 6s infinite linear;
            z-index: 0;
        }

        @keyframes glow {
            0% {
                transform: rotate(35deg) translateX(-200%);
            }
            100% {
                transform: rotate(35deg) translateX(200%);
            }
        }

        /* Header de la aplicación */
        .app-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 1rem;
            text-align: center;
            color: white;
            font-weight: 600;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header de la aplicación -->
        <div class="app-header">
            Admin panel
        </div>
        
        <!-- Efecto de brillo -->
        <div class="glow"></div>
        
        <div class="card" id="login-card">
            <div class="header">
                <div class="logo">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                </div>
                <h1>Acceso al Sistema</h1>
                <p>Ingrese su clave para continuar</p>
            </div>

            <form method="POST" action="{{ route('admin.password.check') }}" class="form">
    @csrf
    <div class="form-group">
        <label for="password" class="label">Clave de Administrador</label>
        <div class="input-wrapper">
            <div class="input-icon">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
            </div>
            <input 
                id="password" 
                name="password" 
                type="password" 
                class="input" 
                placeholder="Ingrese su clave" 
                required
            >
        </div>
    </div>
    
    @if ($errors->has('password'))
        <div class="alert" id="error-alert">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            <span id="error-message">{{ $errors->first('password') }}</span>
        </div>
    @endif

    <div class="button-group">
                    <button type="button" class="button button-back" id="back-button">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="19" y1="12" x2="5" y2="12"></line>
                            <polyline points="12 19 5 12 12 5"></polyline>
                        </svg>
                        Atrás
                    </button>
                    
                    <button type="submit" class="button" id="login-button">
                        <span class="spinner" id="spinner"></span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="login-icon">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                            <polyline points="10 17 15 12 10 7"></polyline>
                            <line x1="15" y1="12" x2="3" y2="12"></line>
                        </svg>
                        Ingresar
                    </button>
    </div>
</form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('login-form');
            const passwordInput = document.getElementById('password');
            const loginButton = document.getElementById('login-button');
            const backButton = document.getElementById('back-button');
            const buttonText = document.getElementById('button-text');
            const spinner = document.getElementById('spinner');
            const loginIcon = document.getElementById('login-icon');
            const errorAlert = document.getElementById('error-alert');
            const errorMessage = document.getElementById('error-message');
            const loginCard = document.getElementById('login-card');
            
            // Funcionalidad del botón atrás
            backButton.addEventListener('click', function() {
                // Verificar si hay historial para regresar
                if (window.history.length > 1) {
                    window.history.back();
                } else {
                    // Si no hay historial, redirigir a una página predeterminada
                    window.location.href = 'index.html';
                }
            });
            
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Mostrar estado de carga
                loginButton.disabled = true;
                spinner.style.display = 'inline-block';
                loginIcon.style.display = 'none';
                errorAlert.style.display = 'none';
                
                // Simular verificación con un pequeño retraso
                setTimeout(() => {
                    if (passwordInput.value === ADMIN_PASSWORD) {
                        // Mostrar mensaje de éxito antes de redirigir
                        loginButton.style.background = 'linear-gradient(135deg, #10b981 0%, #059669 100%)';
                        loginButton.style.boxShadow = '0 4px 6px -1px rgba(16, 185, 129, 0.2)';
                        
                        setTimeout(() => {
                            // En un entorno real, redirigir al panel de administrador
                            window.location.href = 'admin-dashboard.html';
                            // Para esta demo, simplemente mostramos un mensaje
                            alert('Acceso concedido. Redirigiendo al panel de administrador...');
                        }, 1000);
                    } else {
                        // Mostrar error
                        errorMessage.textContent = 'Clave incorrecta. Intente nuevamente.';
                        errorAlert.style.display = 'flex';
                        
                        // Animar el formulario
                        loginCard.classList.add('shake');
                        setTimeout(() => {
                            loginCard.classList.remove('shake');
                        }, 500);
                        
                        // Restaurar el botón
                        loginButton.disabled = false;
                        spinner.style.display = 'none';
                        loginIcon.style.display = 'inline-block';
                    }
                }, 1200);
            });
        });
    </script>
</body>
</html>