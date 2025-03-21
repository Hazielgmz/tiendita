// Variables para carrito y total
let carrito = [];
let total = 0;

// Se inyecta la lista de productos desde el atributo data del contenedor
const productosGrid = document.getElementById('productos-grid');
const PRODUCTOS = JSON.parse(productosGrid.getAttribute('data-productos') || '[]') || [];

// Función para determinar la unidad en función del tipo de producto
function getUnidad(tipo) {
  return tipo === 'GR' ? 'kg' : 'pz';
}

// Renderiza las tarjetas de producto
function renderProductos() {
  const grid = document.getElementById('productos-grid');
  grid.innerHTML = '';
  PRODUCTOS.forEach(producto => {
    const unit = getUnidad(producto.tipo);
    const card = document.createElement('div');
    card.className = 'card p-3 cursor-pointer hover:shadow-md transition';
    card.innerHTML = `
      <div class="flex flex-col items-center">
        <img src="${producto.imagen_url}" alt="${producto.nombre_producto}" class="w-20 h-20 object-contain mb-2">
        <h3 class="font-medium text-center">${producto.nombre_producto}</h3>
        <p class="text-green-600 font-bold">$${Number(producto.precio_unitario).toFixed(2)}/${unit}</p>
        ${producto.codigo_barras ? `<p class="text-xs text-gray-400 mt-1">Código: ${producto.codigo_barras}</p>` : ''}
      </div>
    `;
    card.onclick = () => agregarAlCarrito(producto);
    grid.appendChild(card);
  });
}

// Agrega producto al carrito
function agregarAlCarrito(producto) {
  const itemExistente = carrito.find(item => item.producto.id === producto.id);
  if (itemExistente) {
    itemExistente.cantidad++;
    itemExistente.subtotal = itemExistente.cantidad * Number(producto.precio_unitario);
  } else {
    carrito.push({ producto, cantidad: 1, subtotal: Number(producto.precio_unitario) });
  }
  renderCarrito();
}

// Renderiza el contenido del carrito y calcula el total
function renderCarrito() {
  const contenedor = document.getElementById('carrito-contenido');
  if (carrito.length === 0) {
    contenedor.innerHTML = `<div class="flex-1 flex flex-col items-center justify-center text-gray-500 h-full">
      <p>El carrito está vacío</p>
    </div>`;
    total = 0;
  } else {
    let html = '';
    carrito.forEach((item) => {
      const unit = getUnidad(item.producto.tipo);
      html += `
        <div class="flex items-center justify-between p-2 border rounded-md">
          <div class="flex items-center gap-2">
            <img src="${item.producto.imagen_url}" alt="${item.producto.nombre_producto}" class="w-10 h-10 object-contain">
            <div>
              <p class="font-medium">${item.producto.nombre_producto}</p>
              <p class="text-sm text-gray-500">$${Number(item.producto.precio_unitario).toFixed(2)}/${unit}</p>
              ${item.producto.codigo_barras ? `<p class="text-xs text-gray-400">Código: ${item.producto.codigo_barras}</p>` : ''}
            </div>
          </div>
          <div class="flex items-center gap-2">
            <div class="flex items-center border rounded-md">
              <button class="px-2" onclick="cambiarCantidad(${item.producto.id}, -1)">-</button>
              <span class="w-8 text-center">${item.cantidad}</span>
              <button class="px-2" onclick="cambiarCantidad(${item.producto.id}, 1)">+</button>
            </div>
            <button class="px-2 text-red-500" onclick="eliminarDelCarrito(${item.producto.id})">X</button>
          </div>
        </div>
      `;
    });
    contenedor.innerHTML = html;
    total = carrito.reduce((sum, item) => sum + item.subtotal, 0);
  }
  document.getElementById('total-display').innerText = `$${total.toFixed(2)}`;
}

// Cambiar cantidad de un producto
function cambiarCantidad(id, cambio) {
  carrito = carrito.map(item => {
    if (item.producto.id === id) {
      item.cantidad = Math.max(0, item.cantidad + cambio);
      item.subtotal = item.cantidad * Number(item.producto.precio_unitario);
    }
    return item;
  }).filter(item => item.cantidad > 0);
  renderCarrito();
}

// Eliminar producto del carrito
function eliminarDelCarrito(id) {
  carrito = carrito.filter(item => item.producto.id !== id);
  renderCarrito();
}

// Vaciar carrito
document.getElementById('btn-vaciar').addEventListener('click', () => {
  carrito = [];
  renderCarrito();
});

// Funciones para el código de barras
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
    alert("Producto no encontrado. Verifique el código de barras.");
  }
}

// Funciones para el modal de pago
document.getElementById('btn-pago').addEventListener('click', () => {
  document.getElementById('modal-pago').classList.remove('hidden');
  document.getElementById('modal-total').innerText = `$${total.toFixed(2)}`;
});
document.getElementById('modal-cancelar').addEventListener('click', () => {
  document.getElementById('modal-pago').classList.add('hidden');
});
document.getElementById('modal-completar').addEventListener('click', procesarPago);
function procesarPago() {
  const metodo = document.querySelector('input[name="metodoPago"]:checked').value;
  if (metodo === 'efectivo') {
    const recibido = parseFloat(document.getElementById('cantidadRecibida').value) || 0;
    if (recibido < total) {
      alert("La cantidad recibida es menor que el total");
      return;
    }
    const cambio = Math.max(0, recibido - total);
    document.getElementById('cambio-container').classList.remove('hidden');
    document.getElementById('cambio-display').innerText = `$${cambio.toFixed(2)}`;
  }
  alert("Pago procesado correctamente");
  // Simula venta completada y reinicia la venta
  setTimeout(() => {
    document.getElementById('modal-pago').classList.add('hidden');
    nuevaVenta();
  }, 1000);
}

// Reiniciar venta
function nuevaVenta() {
  carrito = [];
  renderCarrito();
  document.getElementById('cantidadRecibida').value = '';
  document.getElementById('cambio-container').classList.add('hidden');
}

// Acciones de la barra inferior
document.getElementById('btn-salir').addEventListener('click', () => {
  if (confirm("¿Está seguro que desea cerrar la sesión?")) {
    alert("Sesión cerrada correctamente.");
  }
});
document.getElementById('btn-bloquear').addEventListener('click', () => {
  alert("Caja bloqueada. Ingrese su contraseña para desbloquear.");
});
document.getElementById('btn-config').addEventListener('click', () => {
  alert("Configuración del sistema");
});
document.getElementById('btn-mas').addEventListener('click', () => {
  alert("Más acciones");
});

// Inicializa la lista de productos al cargar la página
renderProductos();
