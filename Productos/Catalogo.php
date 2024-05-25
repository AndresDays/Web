<?php
	require "../conexion.php";
	session_start();

	if(!isset($_SESSION['id'])) {
		header("Location: ../Login/Login.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Catálogo</title>
</head>
<body>
	<?php
		include "../conexion.php";
		$nombre = $_POST['nombre'];

		$sql = mysqli_query($connection, "SELECT * FROM auto");
	?>
    <header>
        <div class="contenedor">
            <h1 class="tit">
                <img class = "logom" src="../Iconos/SM LOGO.png"alt="Logo Ferrari">
                Sovereign Motors
            </h1>

            <input type="checkbox" id="menu-bar">
            <label class="icon-menu" for="menu-bar"></label>
            <nav id="carrito" class="menu">
                <a href="../Index.html">Principal</a>
								<i class="fa fa-shopping-cart" aria-hidden="true">
										<div class="buy-card">
											<ul class="nav-card">
													<li>Imagen</li>
													<li>Nombre</li>
													<li>Precio</li>
													<li>Cantidad</li>
													<li></li>
											</ul>
											<div class="lista_de_productos">

											</div>
											<button id="vaciar_carrito">VACIAR CARRITO</button>
										</div>
									</i>
									<label for="btn-menu" class="fa fa-user icono" aria-hidden="true"></label>
            </nav>
        </div>
				<input type="checkbox" id="btn-menu">
      <div class="container-menu">
        <div class="cont-menu">
          <nav>
            <a href="">Ver perfil</a>
            <a href="./cerrar.php">Cerrar sesión</a>
          </nav>
          <label for="btn-menu" class="fa fa-times"></label>
        </div>
      </div>
    </header>
		<div class="titulo">
            <h2>Catálogo</h2>
        </div>
    <div class="container-items">
			<?php
					while($row = mysqli_fetch_array($sql)) {
				?>
        <div class="item">
            <figure>
                <img src="<?php echo $row['imagen'] ?>" alt="<?php echo $row['modelo'] ?>">
            </figure>
            <div class="info-product">
                <h2><?php echo $row['marca'] ?> | <?php echo $row['modelo'] ?></h2>
                <p class="info">
                    <?php echo $row['year'] ?> ­· <?php echo $row['kilometraje'] ?>km<br>
                </p>
                <p class="price"><?php echo $row['precio'] ?></p>
								<button>Agregar al carrito</button>
            </div>
        </div>
				<?php
					}
				?>
        <div class="item" id="lista-productos">
            <figure>
                <img src="https://www.cnet.com/a/img/resize/722306a6a0068eb02596ddfba7d6e4219fd59710/hub/2020/06/01/d451060e-36f9-4ca9-a0b3-87f5553e90a3/ogi1-2021-bmw-4-series-038.jpg?auto=webp&fit=crop&height=675&width=1200" alt="bmw 440i">
            </figure>
            <div class="info-product">
                <h2>BMW 440i</h2>
                <p class="info">
                    2021 ­· 7689 km<br>
                </p>
                <p class="price">870,000</p>
								<button>Agregar al carrito</button>
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="https://wieck-nissanao-production.s3.amazonaws.com/photos/91f3f1b1a486b5a7fbcde89b7fd338ff2b8218da/preview-928x522.jpg" alt="versa 2022">
            </figure>
            <div class="info-product">
                <h2>Nissan Versa</h2>
                <p class="info">
                    2022 ­· 16213 km<br>
                </p>
                <p class="price">300,000</p>
								<button>Agregar al carrito</button>
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="https://http2.mlstatic.com/D_NQ_NP_998792-MLM72802671230_112023-O.webp" alt="jetta 2022">
            </figure>
            <div class="info-product">
                <h2>Volkswagen Jetta Sportline</h2>
                <p class="info">
                    2022 ­· 16,585 km<br>
                </p>
                <p class="price">490,000</p>
								<button>Agregar al carrito</button>
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="https://carsline.com.mx/wp-content/uploads/2023/09/06Honda-CRV-Turbo-Plus-2018-9004.jpg" alt="crv 2018">
            </figure>
            <div class="info-product">
                <h2>Honda CRV</h2>
                <p class="info">
                    2018 ­· 18,528 km<br>
                </p>
                <p class="price">270,000</p>
								<button>Agregar al carrito</button>
            </div>
        </div>
    </div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.item button');
    const cartItems = document.querySelector('.lista_de_productos');
    const emptyCartButton = document.getElementById('vaciar_carrito');

    // Agregar evento de clic para cada botón "Agregar al carrito"
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

    // Agregar evento de clic para cada botón "Eliminar" dentro del carrito
    cartItems.addEventListener('click', function(event) {
        if (event.target.classList.contains('eliminar')) {
            const productToRemove = event.target.parentNode.parentNode;
            productToRemove.remove();

            // Actualizar el carrito en el servidor
            actualizarCarritoEnServidor();
        }
    });

    // Agregar evento de clic para vaciar el carrito
    emptyCartButton.addEventListener('click', function() {
        cartItems.innerHTML = ''; // Vaciar el contenido del carrito

        // Actualizar el carrito en el servidor
        actualizarCarritoEnServidor();
    });

    // Función para actualizar el carrito en el servidor
    function actualizarCarritoEnServidor() {
        const productos = cartItems.querySelectorAll('.producto-carrito');
        const productosArray = Array.from(productos).map(producto => ({
            nombre: producto.querySelector('td:nth-child(2)').textContent,
            precio: producto.querySelector('td:nth-child(3)').textContent
        }));

        // Enviar los datos del carrito al servidor mediante una petición AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'actualizar_carrito.php', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.send(JSON.stringify(productosArray));
    }
});
</script>
</body>
</html>
