<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Mi Tiendita</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}"> 
</head>
<body>
  <!-- Ondas animadas en el fondo -->
  <div class="wave wave1"></div>
  <div class="wave wave2"></div>
  <div class="wave wave3"></div>

  <!-- Elementos de fondo -->
  <div class="bg-element register">
    <svg viewBox="0 0 24 24" fill="currentColor">
      <path d="M20 10h-2V7c0-1.1-.9-2-2-2H4C2.9 5 2 5.9 2 7v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-3h2c1.1 0 2-.9 2-2v-2c0-1.1-.9-2-2-2zm-6 7H4V7h10v10zm6-5h-2v-2h2v2z"/>
    </svg>
  </div>

  <div class="bg-element cart">
    <svg viewBox="0 0 24 24" fill="currentColor">
      <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/>
    </svg>
  </div>

  <div class="bg-element clock">
    <svg viewBox="0 0 24 24" fill="currentColor">
      <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/>
    </svg>
  </div>

  <!-- Partículas y productos animados (se generarán con JavaScript) -->
  <div id="particles"></div>
  <div id="products"></div>

  <div class="container">
    <div class="header">
      <div class="logo-container">
        <div class="logo-item coffee">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 8h1a4 4 0 1 1 0 8h-1"></path>
            <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"></path>
            <line x1="6" x2="6" y1="2" y2="4"></line>
            <line x1="10" x2="10" y1="2" y2="4"></line>
            <line x1="14" x2="14" y1="2" y2="4"></line>
          </svg>
        </div>
        <div class="logo-item bag">
          <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path>
            <path d="M3 6h18"></path>
            <path d="M16 10a4 4 0 0 1-8 0"></path>
          </svg>
        </div>
        <div class="logo-item receipt">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M21 10H3M16 14H8M18 18H6"></path>
            <path d="M3 6h18l-2 14H5L3 6z"></path>
          </svg>
        </div>
      </div>
      <h1 class="title">
        Evenezer
        <span class="title-dot"></span>
      </h1>
      <p class="subtitle">¡Bienvenido de vuelta!</p>
    </div>

    <div class="card" id="loginCard">
      <!-- Puntos decorativos en las esquinas -->
      <div class="corner-dot top-right"></div>
      <div class="corner-dot bottom-left"></div>

      <!-- Contenedor para el confeti (se añadirá con JavaScript) -->
      <div class="confetti-container" id="confettiContainer" style="display: none;"></div>

      <div class="card-header">
        <h2 class="card-title">Iniciar Sesión</h2>
        <p class="card-description">Ingresa tus datos para acceder a tu cuenta</p>
      </div>

      <div class="card-content">
      <form method="POST" action="{{ route('login.submit') }}">
      @csrf
        <!-- Corregido: eliminado el formulario duplicado y las referencias a Laravel -->
        <form class="form" id="loginForm">
          <div class="form-group">
            <label class="form-label" for="email">
              Correo Electrónico
              <span class="form-label-icon">✉️</span>
            </label>
            <div class="input-wrapper">
              <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                <polyline points="22,6 12,13 2,6"></polyline>
              </svg>
              <input type="email" id="email" name="email" class="input" placeholder="tu@correo.com" required>
              <div class="input-indicator"></div>
            </div>
            <div class="error-message" id="email-error"></div>
          </div>

          <div class="form-group">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              <label class="form-label" for="password">
                Contraseña
                <span class="form-label-icon" style="animation-delay: 0.5s;">🔒</span>
              </label>
              <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
            </div>
            <div class="input-wrapper">
              <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
              </svg>
              <input type="password" id="password" name="password" class="input" style="animation-delay: 0.3s;" required>
              <div class="input-indicator"></div>
            </div>
            <div class="error-message" id="password-error"></div>
          </div>

          <div class="checkbox-wrapper">
            <input type="checkbox" id="remember" name="remember" class="checkbox">
            <label for="remember" class="checkbox-label">Recordarme</label>
          </div>

          <button type="submit" class="button" id="loginButton">
            <span class="button-fill"></span>
            <span class="button-text">Ingresar</span>
            <span class="button-arrow">→</span>
          </button>
        </form>
        </form>
      </div>

      <div class="card-footer">
        <p class="register-text">
          ¿No tienes una cuenta? <a href="#" class="register-link">Regístrate</a>
        </p>
      </div>
    </div>

    <div class="footer">
      <svg class="footer-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M17 8h1a4 4 0 1 1 0 8h-1"></path>
        <path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"></path>
        <line x1="6" x2="6" y1="2" y2="4"></line>
        <line x1="10" x2="10" y1="2" y2="4"></line>
        <line x1="14" x2="14" y1="2" y2="4"></line>
      </svg>
      <span>© 2024 Mi Tiendita - Todos los derechos reservados</span>
    </div>
  </div>

  <script>
    // Crear partículas
    function createParticles() {
      const particlesContainer = document.getElementById('particles');
      const numParticles = 15;
      
      for (let i = 0; i < numParticles; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        
        const size = Math.random() * 6 + 2;
        const colors = ['#f59e0b', '#10b981', '#84cc16', '#ef4444', '#8b5cf6'];
        const color = colors[Math.floor(Math.random() * colors.length)];
        
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        particle.style.backgroundColor = color;
        particle.style.left = `${Math.random() * 100}%`;
        particle.style.top = `${Math.random() * 100}%`;
        particle.style.animationDuration = `${Math.random() * 3 + 5}s`;
        
        particlesContainer.appendChild(particle);
      }
    }

    // Crear productos flotantes
    function createProducts() {
      const productsContainer = document.getElementById('products');
      const products = [
        {
          icon: `<svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2a9 9 0 0 0-9 9c0 4 3.5 12 9 12s9-8 9-12a9 9 0 0 0-9-9zm0 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5z"/></svg>`,
          color: '#ef4444'
        },
        {
          icon: `<svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2.27 21.7s9.87-3.5 12.73-6.36a4.5 4.5 0 0 0-6.36-6.37C5.77 11.84 2.27 21.7 2.27 21.7zM8.64 14l-2.05-2.04M15.34 15l-2.46-2.46"/></svg>`,
          color: '#f97316'
        },
        {
          icon: `<svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 9c0-2.45 1.76-5 6-5s6 2.55 6 5a4 4 0 0 1-4 4h-1.5a2.5 2.5 0 0 0 0 5H12"/><path d="M3 17h4"/></svg>`,
          color: '#eab308'
        },
        {
          icon: `<svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 8h1a4 4 0 1 1 0 8h-1"/><path d="M3 8h14v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4Z"/><line x1="6" x2="6" y1="2" y2="4"/><line x1="10" x2="10" y1="2" y2="4"/><line x1="14" x2="14" y1="2" y2="4"/></svg>`,
          color: '#b45309'
        }
      ];
      
      for (let i = 0; i < products.length; i++) {
        const product = document.createElement('div');
        product.className = 'product';
        product.style.left = `${20 + i * 20}%`;
        product.style.top = `${Math.random() * 70 + 15}%`;
        product.style.animationDelay = `${i * 0.7}s`;
        product.style.animationDuration = `${5 + i}s`;
        product.innerHTML = products[i].icon;
        product.style.color = products[i].color;
        
        productsContainer.appendChild(product);
      }
    }

    // Crear confeti
    function createConfetti() {
      const confettiContainer = document.getElementById('confettiContainer');
      confettiContainer.innerHTML = '';
      confettiContainer.style.display = 'block';
      
      const colors = ['#f59e0b', '#10b981', '#84cc16', '#ef4444', '#8b5cf6'];
      
      for (let i = 0; i < 40; i++) {
        const confetti = document.createElement('div');
        confetti.className = 'confetti';
        confetti.style.left = `${Math.random() * 100}%`;
        confetti.style.animationDelay = `${Math.random() * 2.5}s`;
        confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        
        confettiContainer.appendChild(confetti);
      }
      
      setTimeout(() => {
        confettiContainer.style.display = 'none';
      }, 2500);
    }

    // Validación del formulario
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Obtener valores
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const emailError = document.getElementById('email-error');
      const passwordError = document.getElementById('password-error');
      
      // Reiniciar mensajes de error
      emailError.textContent = '';
      passwordError.textContent = '';
      
      // Validar email
      let isValid = true;
      if (!email) {
        emailError.textContent = 'El correo electrónico es obligatorio';
        isValid = false;
      } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        emailError.textContent = 'Ingresa un correo electrónico válido';
        isValid = false;
      }
      
      // Validar contraseña - solo verificamos que no esté vacía
      if (!password) {
        passwordError.textContent = 'La contraseña es obligatoria';
        isValid = false;
      }
      
      // Si todo es válido, continuar con el envío
      if (isValid) {
        const button = document.getElementById('loginButton');
        
        // Mostrar estado de carga
        button.disabled = true;
        button.innerHTML = `
          <svg class="spinner" width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
          </svg>
          <span class="loading-text">Ingresando...</span>
        `;
        
        // Simular inicio de sesión
        setTimeout(() => {
          button.disabled = false;
          button.innerHTML = `
            <span class="button-fill"></span>
            <span class="button-text">Ingresar</span>
            <span class="button-arrow">→</span>
          `;
          
          // Animar tarjeta y mostrar confeti
          document.getElementById('loginCard').classList.add('success-shake');
          createConfetti();
          
          // Quitar animación después de un tiempo
          setTimeout(() => {
            document.getElementById('loginCard').classList.remove('success-shake');
          }, 500);
          
          console.log('Login con:', email, password);
          
          // Aquí podrías enviar el formulario si todo está correcto
          // this.submit();
        }, 1500);
      }
    });

    // Inicializar
    document.addEventListener('DOMContentLoaded', function() {
      createParticles();
      createProducts();
    });
  </script>
</body>
</html>
