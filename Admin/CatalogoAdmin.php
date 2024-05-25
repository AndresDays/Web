<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./style.css">
	<title>View Products | Admin</title>
</head>
<body>
	<?php
		include "../conexion.php";

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
            <nav class="menu">
                <a href="../Login/Login.html">Login</a>
                <a href="../Registro/Registro.html">Registro</a>
                <a href="../Index.html">Principal</a>
            </nav>
        </div>
        </div>
    </header>

	<section class="productContainer">
		<a href="../reportes.php">Usuario PDF</a>
		<h2 class="title">Ver productos</h2>
		<table class="productsTable">
			<thead class="encabezadoTable">
				<tr>
					<th class="id">ID</th>
					<th class="url">IMAGEN</th>
					<th class="nombre">MARCA</th>
					<th class="descripcion">MODELO</th>
					<th class="existencias">AÑO</th>
					<th class="precio">KILOMETRAJE</th>
					<th class="precio">PRECIO</th>
					<th class="precio">ESTADO</th>
					<th class="precio">PLACAS</th>
					<th class="precio">EDITAR</th>
					<th class="precio">ELIMINAR</th>
				</tr>
			</thead>
			<tbody class="cuerpoTable">
				<?php
					while($row = mysqli_fetch_array($sql)) {
				?>
				<tr class="filaInfoProduct">
					<td class="idData"><p><?php echo $row['id'] ?></p></td>
					<td class="urlData"><img src="<?php echo $row['imagen'] ?>" alt="<?php echo $row['marca'] ?>"></td>
					<td class="marcaData"><p><?php echo $row['marca'] ?></p></td>
					<td class="modeloData"><p><?php echo $row['modelo'] ?></p></td>
					<td class="añoData"><p><?php echo $row['year'] ?></p></td>
					<td class="kilometrajeData"><p> <?php echo $row['kilometraje'] ?></p></td>
					<td class="precioData"><p>$ <?php echo $row['precio'] ?></p></td>
					<td class="estadoData"><p> <?php echo $row['estado'] ?></p></td>
					<td class="placasData"><p> <?php echo $row['placas'] ?></p></td>
					<td class="placasData"><a href="./ActualizarProducto.php?id=<?php echo $row['id']?>">EDITAR</a></td>
					<td class="placasData"><a href="./Eliminar.php?id=<?php echo $row['id']?>">ELIMINAR</a></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</section>
</body>
</html>
