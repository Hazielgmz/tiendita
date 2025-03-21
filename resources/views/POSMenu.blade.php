<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Punto de Venta</title>
  <!-- Tailwind CSS (desde CDN o tu compilación) -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Archivo CSS personalizado -->
  <link rel="stylesheet" href="{{ asset('css/posmenu.css') }}">
  
</head>
<body class="bg-gray-100">
  <div class="grid grid-cols-1 md:grid-cols-12 gap-4 p-4 h-screen">
    <!-- Panel izquierdo: Productos y acciones -->
    <div class="md:col-span-8 flex flex-col h-full">
      <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Punto de venta</h1>
        <div class="flex items-center gap-2"></div>
      </div>

      <!-- Sección de código de barras -->
      <div id="barcode-section" class="mb-4 p-3 border rounded-md">
        <h2 class="text-sm font-medium mb-2">Escanear código de barras</h2>
        <div class="flex gap-2">
          <input type="text" id="barcode-input" placeholder="Ingrese o escanee el código de barras" class="flex-1 p-2 border rounded" autocomplete="off">
          <button id="barcode-btn" class="bg-blue-500 text-white p-2 rounded">Buscar</button>
          <button id="barcode-scan" class="bg-gray-300 text-black p-2 rounded">Lector</button>
        </div>
        <p id="barcode-feedback" class="text-sm text-green-600 mt-2 hidden">¡Producto agregado correctamente!</p>
      </div>

      <!-- Lista de productos (única pestaña "Todos") -->
      <div class="flex flex-col flex-1 overflow-hidden">
        <div class="mb-4">
          <button id="tab-todos" class="px-4 py-2 bg-gray-200 rounded">Todos</button>
        </div>
        <!-- Inyectamos los productos en un atributo data -->
        <div id="productos-container" class="overflow-y-auto" style="max-height: calc(100vh - 320px);">
          <div id="productos-grid" data-productos='@json($productos)'
               class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            <!-- Las tarjetas se generarán en JS -->
          </div>
        </div>
      </div>

      <!-- Barra inferior de acciones -->
      <div class="bg-gray-100 border-t border-b rounded-b-md mt-4 p-2">
        <div class="flex justify-between">
          <button id="btn-salir" class="flex flex-col items-center gap-1 py-2">Salir</button>
          <button id="btn-bloquear" class="flex flex-col items-center gap-1 py-2">Bloquear</button>
          <button id="btn-config" class="flex flex-col items-center gap-1 py-2">Config</button>
          <button id="btn-mas" class="flex flex-col items-center gap-1 py-2">Más...</button>
        </div>
      </div>
    </div>

    <!-- Panel derecho: Carrito y pago -->
    <div class="md:col-span-4 flex flex-col h-full">
      <div class="bg-white shadow rounded flex-1 flex flex-col">
        <div class="p-4 flex flex-col h-full">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold flex items-center gap-2">Carrito</h2>
            <button id="btn-vaciar" class="border border-gray-400 px-2 py-1 rounded">Vaciar</button>
          </div>
          <div id="carrito-contenido" class="flex-1 overflow-y-auto">
            <div class="flex flex-col items-center justify-center text-gray-500 h-full">
              <p>El carrito está vacío</p>
            </div>
          </div>
          <div class="border-t pt-4 space-y-2">
            <div class="flex justify-between text-lg">
              <span class="font-bold">Total:</span>
              <span id="total-display" class="font-bold text-green-600">$0.00</span>
            </div>
            <button id="btn-pago" class="w-full bg-green-500 text-white py-2 rounded">Proceder al Pago</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de pago -->
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
          <div class="space-y-3">
            <label class="block">Método de pago</label>
            <div id="metodo-pago" class="grid grid-cols-1 gap-2">
              <div class="flex items-center space-x-2 border p-3 rounded cursor-pointer hover:bg-gray-50">
                <input type="radio" name="metodoPago" value="efectivo" id="efectivo" checked>
                <label for="efectivo" class="flex-1">Efectivo</label>
              </div>
              <div class="flex items-center space-x-2 border p-3 rounded cursor-pointer hover:bg-gray-50">
                <input type="radio" name="metodoPago" value="tarjeta" id="tarjeta">
                <label for="tarjeta" class="flex-1">Tarjeta de Crédito/Débito</label>
              </div>
              <div class="flex items-center space-x-2 border p-3 rounded cursor-pointer hover:bg-gray-50">
                <input type="radio" name="metodoPago" value="amex" id="amex">
                <label for="amex" class="flex-1">American Express</label>
              </div>
            </div>
          </div>
          <div id="pago-efectivo" class="space-y-2">
            <label for="cantidadRecibida" class="block">Cantidad recibida</label>
            <div class="relative">
              <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">$</span>
              <input id="cantidadRecibida" type="number" min="0" step="0.01" class="pl-8 border rounded w-full">
            </div>
            <div id="cambio-container" class="flex justify-between p-2 bg-gray-100 rounded-md hidden">
              <span>Cambio:</span>
              <span id="cambio-display" class="font-bold">$0.00</span>
            </div>
          </div>
          <div id="pago-tarjeta" class="p-3 bg-blue-50 text-blue-800 rounded-md text-sm hidden">
            Pase la tarjeta por el lector o inserte el chip para procesar el pago.
          </div>
        </div>
      </div>
      <div class="flex justify-end space-x-2 mt-4">
        <button id="modal-cancelar" class="border border-gray-400 px-4 py-2 rounded">Cancelar</button>
        <button id="modal-completar" class="bg-green-500 text-white px-4 py-2 rounded">Completar Pago</button>
      </div>
    </div>
  </div>

  <!-- Cargar el archivo JavaScript -->
  <script src="{{ asset('js/posmenu.js') }}"></script>
</body>
</html>
