<?php
	include "../conexion.php";

	if(!empty($_POST)) {
		$message = '';

		if( empty($_POST['marca']) || empty($_POST['modelo']) || empty($_POST['year']) || empty($_POST['kilometraje']) || empty($_POST['precio']) || empty($_POST['estado']) || empty($_POST['placas']) || empty($_POST['imagen']) )
			$message = 'SE DEJARON CAMPOS VACIOS.';
		else {
			$id = $_POST['id'];
			$marca = $_POST['marca'];
			$modelo = $_POST['modelo'];
			$year = $_POST['year'];
			$kilometraje = $_POST['kilometraje'];
			$precio = $_POST['precio'];
			$estado = $_POST['estado'];
			$placas = $_POST['placas'];
			$imagen = $_POST['imagen'];

			$query = mysqli_query($connection, "SELECT * FROM `auto` WHERE (modelo = '$modelo' AND id != $id) OR (imagen = '$imagen' AND id != $id)");

			if($query) {
				$result = mysqli_num_rows($query);
				if($result > 0)
					$message = 'El nombre del postre o la foto ya existe';
				else {
					$update = mysqli_query($connection, "UPDATE `auto` SET marca = '$marca', modelo = '$modelo', year = '$year', kilometraje = '$kilometraje', precio = '$precio', estado = '$estado', placas = '$placas', imagen = '$imagen' WHERE id = $id");

					if($update)
						$message = 'Producto actualizado';
					else
						$message = 'Error al actualizar producto';
				}
			} else
				$message = 'Error al ejecutar consulta: '.mysqli_error($connection);
		}
	}

	if(empty($_GET['id'])) {
		header('Location: ./CatalogoAdmin.php');
		exit;
	}

	$idProduct = $_GET['id'];

	$sql = mysqli_query($connection, "SELECT marca, modelo, year, kilometraje, precio, estado, placas, imagen FROM `auto` WHERE id = $idProduct");

	if($sql) {
		$numRows = mysqli_num_rows($sql);
		if($numRows > 0) {
			while($row = mysqli_fetch_array($sql)) {
				$marca = $row['marca'];
				$modelo = $row['modelo'];
				$year = $row['year'];
				$kilometraje = $row['kilometraje'];
				$precio = $row['precio'];
				$estado = $row['estado'];
				$placas = $row['placas'];
				$imagen = $row['imagen'];
			}
		} else {
			header('Location: ./CatalogoAdmin.php');
			exit;
		}
	} else
		$message = 'Error al ejecutar consulta: '.mysqli_error($connection);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Auto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="title">Registrar Auto</div>
        <form method="post" action="./ActualizarProducto.php">
            <div class="auto-details">
                <div class="input-box">
									<input type="hidden" name="id" id="id" value="<?php echo $idProduct; ?>">
                    <span class="details">Marca</span>
                    <input type="text" name="marca" placeholder="Ingresa la marca" value="<?php echo $marca; ?>" required>
                </div>
                <div class="input-box">
                    <span class="details">Modelo</span>
                    <input type="text" name="modelo" placeholder="Ingresa el modelo" value="<?php echo $modelo; ?>" required>
                </div>
                <div class="input-box">
                    <span class="details">Año</span>
                    <input type="text" name="year" placeholder="Ingresa el año" value="<?php echo $year; ?>" required>
                </div>
                <div class="input-box">
                    <span class="details">Kilometraje</span>
                    <input type="text" name="kilometraje" placeholder="Ingresa el kilometraje" value="<?php echo $kilometraje; ?>" required>
                </div>
                <div class="input-box">
                    <span class="details">Precio</span>
                    <input type="text" name="precio" placeholder="Ingresa el precio" value="<?php echo $precio; ?>" required>
                </div>
                <div class="input-box">
                    <span class="details">Estado</span>
                    <input type="text" name="estado" placeholder="Ingresa el estado" value="<?php echo $estado; ?>" required>
                </div>
                <div class="input-box">
                    <span class="details">Placas</span>
                    <input type="text" name="placas" placeholder="Ingresa las placas" value="<?php echo $placas; ?>" required>
                </div>
                <div class="input-box">
                    <span class="details">Imagen</span>
                    <input type="text" name="imagen" placeholder="Ingresa el URL" value="<?php echo $imagen; ?>" required>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Actualizar Auto">
            </div>
        </form>
    </div>
</body>
</html>
