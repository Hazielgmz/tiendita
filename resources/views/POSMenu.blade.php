<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Punto de Venta</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/posmenu.css') }}">
</head>
<body class="bg-gray-100">
  <div class="grid grid-cols-1 md:grid-cols-12 gap-4 p-4 h-screen">
    <!-- Panel de productos y escáner -->
    <div class="md:col-span-8 flex flex-col h-full">
      <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Punto de venta</h1>
        <div class="flex items-center gap-3">
          <div class="user-info">
            <div class="user-avatar">
              <span>{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</span>
            </div>
            <div class="user-details">
              <span class="user-name">{{ Auth::user()->name }}</span>
              <span class="user-role">{{ Auth::user()->role ?? 'Cajero' }}</span>
            </div>
          </div>
        </div>
      </div>

      <div id="barcode-section" class="mb-4 p-4 bg-white border rounded-lg shadow-sm">
        <h2 class="text-sm font-medium mb-2 text-gray-700">Escanear código de barras</h2>
        <div class="flex gap-2">
          <div class="relative flex-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="barcode-icon">
              <path d="M3 5v14"></path>
              <path d="M8 5v14"></path>
              <path d="M12 5v14"></path>
              <path d="M17 5v14"></path>
              <path d="M21 5v14"></path>
            </svg>
            <input type="text" id="barcode-input" placeholder="Ingrese o escanee el código de barras" class="w-full p-2 pl-9 border rounded-lg" autocomplete="off">
          </div>
          <button id="barcode-btn" class="bg-blue-600 hover:bg-blue-700 text-white p-2 px-4 rounded-lg transition duration-200 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="11" cy="11" r="8"></circle>
              <path d="m21 21-4.3-4.3"></path>
            </svg>
            Buscar
          </button>
        </div>
        <div id="barcode-feedback" class="flex items-center gap-2 text-sm text-green-600 mt-2 hidden">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 6 9 17l-5-5"></path>
          </svg>
          ¡Producto agregado correctamente!
        </div>
      </div>

      <div class="flex flex-col flex-1 overflow-hidden">
        <div class="mb-4">
          <button id="tab-todos" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg font-medium transition duration-200">Todos</button>
        </div>
        <div id="productos-container" class="overflow-y-auto bg-white rounded-lg shadow-sm p-4" style="max-height: calc(100vh - 320px);">
          <div id="productos-grid" data-productos='@json($productos)' class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            <!-- Las tarjetas se generarán en JS -->
          </div>
        </div>
      </div>

      <div class="bg-white border rounded-lg shadow-sm mt-4 p-4">
        <div class="flex justify-between">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" id="btn-salir" class="flex items-center gap-2 py-2 px-4 bg-red-500 text-white font-bold rounded-lg hover:bg-red-600 transition duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
              </svg>
              Cerrar Sesión
            </button>
          </form>
          <a href="{{ route('admin.password') }}" id="btn-mas" class="flex items-center gap-2 py-2 px-4 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
              <circle cx="9" cy="7" r="4"></circle>
              <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            </svg>
            Admin Panel
          </a>
        </div>
      </div>
    </div>

    <!-- Panel del carrito -->
    <div class="md:col-span-4 flex flex-col h-full">
      <div class="bg-white shadow-md rounded-lg flex-1 flex flex-col overflow-hidden">
        <div class="p-4 flex flex-col h-full">
          <div class="flex justify-between items-center mb-4 pb-3 border-b">
            <h2 class="text-xl font-bold text-gray-800">Carrito</h2>
            <button id="btn-vaciar" class="border border-gray-300 hover:bg-gray-100 px-3 py-1.5 rounded-lg text-sm font-medium transition duration-200 flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 6h18"></path>
                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
              </svg>
              Vaciar
            </button>
          </div>
          <div id="carrito-contenido" class="flex-1 overflow-y-auto" style="max-height: calc(100vh - 240px);">
            <div class="flex flex-col items-center justify-center text-gray-500 h-full">
              <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-300 mb-3">
                <circle cx="8" cy="21" r="1"></circle>
                <circle cx="19" cy="21" r="1"></circle>
                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"></path>
              </svg>
              <p>El carrito está vacío</p>
            </div>
          </div>
        </div>
      </div>

      <div class="bg-white border rounded-lg shadow-sm mt-4 p-4">
        <div class="flex justify-between text-lg mb-4">
          <span class="font-bold text-gray-800">Total:</span>
          <span id="total-display" class="font-bold text-green-600">$0.00</span>
        </div>
        <button id="btn-pago" class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg font-bold transition duration-300 flex items-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect width="20" height="14" x="2" y="5" rx="2"></rect>
            <line x1="2" x2="22" y1="10" y2="10"></line>
          </svg>
          Proceder al Pago
        </button>
      </div>
    </div>
  </div>

  <!-- Modal de Pago -->
  <div id="modal-pago" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 w-11/12 max-w-md shadow-xl">
      <div class="mb-4 pb-3 border-b flex justify-between items-center">
        <h2 id="modal-titulo" class="text-xl font-bold text-gray-800">Completar Pago</h2>
        <button id="modal-close" class="text-gray-500 hover:text-gray-700">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
      </div>
      <div id="modal-body">
        <div class="space-y-4">
          <div class="text-center p-4 bg-gray-50 rounded-lg">
            <p class="text-sm text-gray-600">Total a pagar</p>
            <p id="modal-total" class="text-3xl font-bold text-green-600">$0.00</p>
          </div>
          <div class="space-y-2">
            <label for="cantidadRecibida" class="block font-medium text-gray-700">Cantidad recibida</label>
            <div class="relative">
              <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">$</span>
              <input id="cantidadRecibida" type="number" min="0" step="0.01" class="pl-8 border rounded-lg w-full p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none" placeholder="Ingrese cantidad">
            </div>
            <p id="pago-message" class="text-red-600 hidden"></p>
          </div>
        </div>
      </div>
      <div class="flex justify-end space-x-3 mt-6">
        <button id="modal-cancelar" class="border border-gray-300 hover:bg-gray-100 px-4 py-2 rounded-lg font-medium transition duration-200">Cancelar</button>
        <button id="modal-completar" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition duration-200 flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 6 9 17l-5-5"></path>
          </svg>
          Completar Pago
        </button>
      </div>
    </div>
  </div>

  <!-- Modal de Cambio -->
  <div id="cambio-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 w-11/12 max-w-md shadow-xl">
      <div class="mb-4 pb-3 border-b">
        <h2 class="text-xl font-bold text-gray-800">Cambio</h2>
      </div>
      <div class="text-center p-4 bg-gray-50 rounded-lg mb-6">
        <p class="text-sm text-gray-600">Devolver al cliente</p>
        <p id="cambio-text" class="text-3xl font-bold text-blue-600">$0.00</p>
      </div>
      <div class="flex justify-end">
        <button id="cambio-close" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition duration-200 flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14"></path>
            <path d="M12 5v14"></path>
          </svg>
          Finalizar
        </button>
      </div>
    </div>
  </div>

  <!-- Formulario oculto para guardar la venta -->
  <form id="venta-form" action="{{ route('ventas.store') }}" method="POST" class="hidden">
    @csrf
    <input type="hidden" name="total" id="form-total">
    <input type="hidden" name="fecha" id="form-fecha">
    <input type="hidden" name="productos" id="form-productos">
  </form>

  <style>
    /* Estilos para la información del usuario */
    .user-info {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      padding: 0.5rem;
      border-radius: 0.5rem;
      background-color: white;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    
    .user-avatar {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: #3b82f6;
      color: white;
      font-size: 0.875rem;
      font-weight: 600;
      flex-shrink: 0;
    }
    
    .user-details {
      display: flex;
      flex-direction: column;
    }
    
    .user-name {
      font-weight: 600;
      color: #1f2937;
      font-size: 0.875rem;
    }
    
    .user-role {
      font-size: 0.75rem;
      color: #6b7280;
    }
    
    /* Estilos para el icono de código de barras */
    .barcode-icon {
      position: absolute;
      left: 0.75rem;
      top: 50%;
      transform: translateY(-50%);
      color: #6b7280;
      pointer-events: none;
    }
    
    /* Estilos para las tarjetas de productos */
    .product-card {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background-color: white;
      border: 1px solid #e5e7eb;
      border-radius: 0.5rem;
      padding: 1rem;
      cursor: pointer;
      transition: all 0.2s ease;
      height: 150px;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }
    
    .product-card:hover {
      border-color: #3b82f6;
      transform: translateY(-2px);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .product-name {
      font-size: 0.875rem;
      font-weight: 600;
      text-align: center;
      color: #1f2937;
    }

    .product-price {
      font-size: 0.875rem;
      color: #059669;
      font-weight: 600;
      margin-top: 0.25rem;
    }

    /* Estilos para los elementos del carrito */
    .cart-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.75rem;
      border-bottom: 1px solid #e5e7eb;
    }

    .cart-item-info {
      flex: 1;
    }

    .cart-item-name {
      font-weight: 500;
      color: #1f2937;
      font-size: 0.875rem;
    }

    .cart-item-price {
      font-size: 0.875rem;
      color: #059669;
    }

    .cart-item-quantity {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .quantity-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 24px;
      height: 24px;
      border-radius: 0.25rem;
      background-color: #f3f4f6;
      border: 1px solid #e5e7eb;
      cursor: pointer;
    }

    .quantity-btn:hover {
      background-color: #e5e7eb;
    }

    .quantity-value {
      font-weight: 600;
      color: #1f2937;
      min-width: 24px;
      text-align: center;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .user-info {
        padding: 0.375rem;
      }

      .user-avatar {
        width: 32px;
        height: 32px;
        font-size: 0.75rem;
      }
    }
  </style>

  <script src="{{ asset('js/posmenu.js') }}"></script>
  <script>
    // Código de barras
    document.getElementById('barcode-btn').addEventListener('click', buscarPorCodigoBarras);
    document.getElementById('barcode-input').addEventListener('keydown', function(e) {
      if (e.key === 'Enter') buscarPorCodigoBarras();
    });
    
    function buscarPorCodigoBarras() {
      const codigo = document.getElementById('barcode-input').value.trim();
      if (!codigo) return;
      const producto = PRODUCTOS.find(p => p.codigo_barras.trim() === codigo);
      if (producto) {
        agregarAlCarrito(producto);
        document.getElementById('barcode-input').value = '';
        const feedback = document.getElementById('barcode-feedback');
        feedback.classList.remove('hidden');
        setTimeout(() => feedback.classList.add('hidden'), 1500);
      } else {
        alert("Producto no encontrado.");
      }
    }

    // Pago
    document.getElementById('btn-pago').addEventListener('click', function() {
      const total = parseFloat(document.getElementById('total-display').innerText.replace('$', ''));
      document.getElementById('modal-total').innerText = `$${total.toFixed(2)}`;
      document.getElementById('modal-pago').classList.remove('hidden');
    });

    document.getElementById('modal-cancelar').addEventListener('click', function() {
      document.getElementById('modal-pago').classList.add('hidden');
    });
    
    document.getElementById('modal-close').addEventListener('click', function() {
      document.getElementById('modal-pago').classList.add('hidden');
    });

    document.getElementById('modal-completar').addEventListener('click', function() {
      const total = parseFloat(document.getElementById('modal-total').innerText.replace('$', ''));
      const cantidadRecibida = parseFloat(document.getElementById('cantidadRecibida').value);
      const msg = document.getElementById('pago-message');
      msg.classList.add('hidden');

      if (isNaN(cantidadRecibida) || cantidadRecibida <= 0) {
        msg.innerText = 'Por favor, ingrese una cantidad válida.';
        msg.classList.remove('hidden');
      } else if (cantidadRecibida < total) {
        msg.innerText = 'La cantidad ingresada es menor que el total a pagar.';
        msg.classList.remove('hidden');
      } else {
        const cambio = cantidadRecibida - total;
        document.getElementById('cambio-text').innerText = `Cambio: $${cambio.toFixed(2)}`;
        document.getElementById('cambio-modal').classList.remove('hidden');

        // Preparar los datos para enviar
        document.getElementById('form-total').value = total.toFixed(2);
        document.getElementById('form-fecha').value = new Date().toISOString();

        // Obtener productos del carrito
        const productos = getProductosDelCarrito();
        document.getElementById('form-productos').value = JSON.stringify(productos);

        // Enviar la venta a la base de datos
        document.getElementById('venta-form').submit(); 
        
        setTimeout(function() {
         window.location.href = '{{ route("ventas.index") }}';
        }, 80000);
      }
    });

    function getProductosDelCarrito() {
      const productos = [];
      const items = document.querySelectorAll('#carrito-contenido .producto');

      items.forEach(item => {
        const id = item.dataset.id;
        const cantidad = parseInt(item.querySelector('.cantidad').value) || 0;
        const precioUnitario = parseFloat(item.dataset.precio) || 0;
        const subtotal = cantidad * precioUnitario;

        productos.push({ id, cantidad, precio_unitario: precioUnitario, subtotal });
      });

      return productos;
    }

    // Al cerrar el modal de cambio, guardamos y redirigimos
    document.getElementById('cambio-close').addEventListener('click', function() {
      document.getElementById('venta-form').submit();
      window.location.href = '{{ route("ventas.index") }}';
    });
  </script>
</body>
</html>