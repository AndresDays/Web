<?php
session_start();

// Recibir los datos del carrito desde el cliente
$data = json_decode(file_get_contents('php://input'), true);

// Verificar si la sesión del carrito ya está inicializada
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Recorrer los nuevos elementos del carrito y agregarlos o actualizarlos en la sesión
foreach ($data as $item) {
    $found = false;
    foreach ($_SESSION['carrito'] as &$cartItem) {
        if ($cartItem['nombre'] === $item['nombre']) {
            // Si el artículo ya está en el carrito, actualiza la cantidad o cualquier otro dato necesario
            $cartItem['cantidad']++;
            $found = true;
            break;
        }
    }
    if (!$found) {
        // Si el artículo no está en el carrito, agrégalo
        $item['cantidad'] = 1; // Agregamos la cantidad al elemento
        $_SESSION['carrito'][] = $item;
    }
}

// Devolver los datos del carrito actualizados al cliente
echo json_encode($_SESSION['carrito']);
buttons.forEach(button => {
    button.addEventListener('click', function() {
        const item = this.parentNode.parentNode;
        const itemName = item.querySelector('h2').textContent;
        const itemImage = item.querySelector('img').src;
        const itemPrice = item.querySelector('.price').textContent;

        // Crear un nuevo elemento de producto para agregar al carrito
        const product = document.createElement('tr');
        product.classList.add('producto-carrito');
        product.innerHTML = `
            <td><img src="${itemImage}" alt="${itemName}" style="max-width: 100px;"></td>
            <td>${itemName}</td>
            <td>${itemPrice}</td>
            <td>1</td>
            <td><button class="eliminar">X</button></td>
        `;

        // Agregar el producto al carrito
        cartItems.appendChild(product);

        // Actualizar el carrito en el servidor
        actualizarCarritoEnServidor();
    });
});
?>
