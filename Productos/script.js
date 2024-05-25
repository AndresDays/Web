const carrito = document.getElementById("carrito"),
			listaProductos = document.getElementById("lista-productos"),
			contenedorCarrito = document.querySelector('.buy-card .lista_de_productos'),
			vaciarCarritoBtn = document.querySelector('#vaciar_carrito');

registrarEventsListeners()

function registrarEventsListeners() {
	listaProductos.addEventListener('click', agregarProducto);
}

function agregarProducto() {
	console.log("Agregando producto")
}
