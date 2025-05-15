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
    <div class="md:col-span-8 flex flex-col h-full">
      <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Punto de venta</h1>
      </div>

      <div id="barcode-section" class="mb-4 p-3 border rounded-md">
        <h2 class="text-sm font-medium mb-2">Escanear código de barras</h2>
        <div class="flex gap-2">
          <input type="text" id="barcode-input" placeholder="Ingrese o escanee el código de barras" class="flex-1 p-2 border rounded" autocomplete="off">
          <button id="barcode-btn" class="bg-blue-500 text-white p-2 rounded">Buscar</button>
          <button id="barcode-scan" class="bg-gray-300 text-black p-2 rounded">Lector</button>
        </div>
        <p id="barcode-feedback" class="text-sm text-green-600 mt-2 hidden">¡Producto agregado correctamente!</p>
      </div>

      <div class="flex flex-col flex-1 overflow-hidden">
        <div class="mb-4">
          <button id="tab-todos" class="px-4 py-2 bg-gray-200 rounded">Todos</button>
        </div>
        <div id="productos-container" class="overflow-y-auto" style="max-height: calc(100vh - 320px);">
          <div id="productos-grid" data-productos='@json($productos)' class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            <!-- Las tarjetas se generarán en JS -->
          </div>
        </div>
      </div>

      <div class="bg-gray-100 border-t border-b rounded-b-md mt-4 p-2">
        <div class="flex justify-between">
        <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" id="btn-salir" class="flex flex-col items-center gap-1 py-2 px-4 bg-red-500 text-white font-bold rounded hover:bg-red-600 transition duration-300">
        cerrar sesion
    </button>
</form>
<a href="{{ route('admin.password') }}" id="btn-mas" class="flex flex-col items-center gap-1 py-2 px-4 bg-blue-500 text-white font-bold rounded hover:bg-blue-600 transition duration-300">
    Admin panel
</a>
        </div>
      </div>
    </div>
<div class="md:col-span-4 flex flex-col h-full">
  <!-- Panel scrollable de los items -->
  <div class="bg-white shadow rounded flex-1 flex flex-col overflow-hidden">
    <div class="p-4 flex flex-col h-full">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Carrito</h2>
        <button id="btn-vaciar" class="border border-gray-400 px-2 py-1 rounded">Vaciar</button>
      </div>
      <div id="carrito-contenido"
           class="flex-1 overflow-y-auto"
           style="max-height: calc(100vh - 240px);">
        <div class="flex flex-col items-center justify-center text-gray-500 h-full">
          <p>El carrito está vacío</p>
        </div>
        <!-- aquí irán tus .producto -->
      </div>
    </div>
  </div>

  <!-- Bloque fijo abajo: Total + Botón -->
  <div class="bg-gray-100 border-t rounded-b-md mt-4 p-2">
    <div class="flex justify-between text-lg mb-2">
      <span class="font-bold">Total:</span>
      <span id="total-display" class="font-bold text-green-600">$0.00</span>
    </div>
    <button id="btn-pago"
            class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">
      Proceder al Pago
    </button>
  </div>
</div>

  <div id="modal-pago" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white rounded p-4 w-11/12 max-w-md">
      <div class="mb-4">
        <h2 id="modal-titulo" class="text-xl font-bold">Completar Pago</h2>
      </div>
      <div id="modal-body">
        <div class="space-y-4">
          <div class="text-center p-2 bg-gray-100 rounded-md">
            <p class="text-sm">Total a pagar</p>
            <p id="modal-total" class="text-2xl font-bold text-green-600">$0.00</p>
          </div>
          <div class="space-y-2">
            <label for="cantidadRecibida" class="block">Cantidad recibida</label>
            <div class="relative">
              <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">$</span>
              <input id="cantidadRecibida" type="number" min="0" step="0.01" class="pl-8 border rounded w-full" placeholder="Ingrese cantidad">
            </div>
            <p id="pago-message" class="text-red-600 hidden"></p>
          </div>
        </div>
      </div>
      <div class="flex justify-end space-x-2 mt-4">
        <button id="modal-cancelar" class="border border-gray-400 px-4 py-2 rounded">Cancelar</button>
        <button id="modal-completar" class="bg-green-500 text-white px-4 py-2 rounded">Completar Pago</button>
      </div>
    </div>
  </div>

  <div id="cambio-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white rounded p-4 w-11/12 max-w-md">
      <div class="mb-4">
        <h2 class="text-xl font-bold">Cambio</h2>
      </div>
      <p id="cambio-text" class="text-lg"></p>
      <div class="flex justify-end space-x-2 mt-4">
        <button id="cambio-close" class="bg-blue-500 text-white px-4 py-2 rounded">Cerrar</button>
      </div>
    </div>
  </div>

  <div id="success-message" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white rounded p-4 w-11/12 max-w-md">
      <p id="success-text" class="text-green-600 text-lg"></p>
      <button id="success-close" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Cerrar</button>
    </div>
  </div>

  <form id="venta-form" action="{{ route('ventas.store') }}" method="POST" class="hidden">
    @csrf
    <input type="hidden" name="total" id="form-total">
    <input type="hidden" name="fecha" id="form-fecha">
    <input type="hidden" name="productos" id="form-productos">
  </form>

  <script src="{{ asset('js/posmenu.js') }}"></script>
  <script>
   // document.getElementById('btn-mas').addEventListener('click', function() {
    //  window.location.href = '/admin-dashboard';
   // });

    document.getElementById('btn-pago').addEventListener('click', function() {
      const total = parseFloat(document.getElementById('total-display').innerText.replace('$', ''));
      document.getElementById('modal-total').innerText = `$${total.toFixed(2)}`;
      document.getElementById('modal-pago').classList.remove('hidden'); // Mostrar el modal
    });

    document.getElementById('modal-completar').addEventListener('click', function() {
      const total = parseFloat(document.getElementById('modal-total').innerText.replace('$', ''));
      const cantidadRecibida = parseFloat(document.getElementById('cantidadRecibida').value);
      const messageElement = document.getElementById('pago-message');

      messageElement.classList.add('hidden');

      if (isNaN(cantidadRecibida) || cantidadRecibida <= 0) {
        messageElement.innerText = 'Por favor, ingrese una cantidad válida.';
        messageElement.classList.remove('hidden');
      } else if (cantidadRecibida < total) {
        messageElement.innerText = 'La cantidad ingresada es menor que el total a pagar.';
        messageElement.classList.remove('hidden');
      } else {
        // Si la cantidad es mayor o igual al total
        const cambio = cantidadRecibida - total;
        document.getElementById('cambio-text').innerText = `Cambio: $${cambio.toFixed(2)}`;
        document.getElementById('cambio-modal').classList.remove('hidden'); // Mostrar modal de cambio

        // Preparar los datos para enviar
        document.getElementById('form-total').value = total.toFixed(2);
        document.getElementById('form-fecha').value = new Date().toISOString();
        
        // Obtener productos del carrito
        const productos = getProductosDelCarrito();
        document.getElementById('form-productos').value = JSON.stringify(productos);

        // Enviar la venta a la base de datos
        document.getElementById('venta-form').submit(); 
        
        // Retraso antes de redirigir
        setTimeout(function() {
          window.location.href = '{{ route("ventas.index") }}';
        }, 10000); // 10 segundos de retraso
      }
    });

    document.getElementById('cambio-close').addEventListener('click', function() {
      // Redirigir al menú después de cerrar el modal de cambio
      window.location.href = '{{ route("ventas.index") }}';
    });

    document.getElementById('success-close').addEventListener('click', function() {
      document.getElementById('success-message').classList.add('hidden');
      location.reload(); // Esta línea se ejecuta solo si se cierra el modal de éxito
    });

    function getProductosDelCarrito() {
      const productos = [];
      const items = document.querySelectorAll('#carrito-contenido .producto'); 

      items.forEach(item => {
        const id = item.dataset.id; // Asegúrate de tener un data-id en el HTML
        const cantidad = parseInt(item.querySelector('.cantidad').value) || 0;
        const precioUnitario = parseFloat(item.dataset.precio) || 0; 
        const subtotal = cantidad * precioUnitario; 

        productos.push({ id, cantidad, precio_unitario: precioUnitario, subtotal });
      });

      return productos;
    }
    
  </script>
</body>
</html>