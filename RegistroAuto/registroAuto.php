<?php
    include "../conexion.php";

    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $year = $_POST['year'];
		$kilometraje = $_POST['kilometraje'];
		$precio = $_POST['precio'];
		$estado = $_POST['estado'];
		$placas = $_POST['placas'];
		$imagen = $_POST['imagen'];

    $sql = mysqli_query($connection, "INSERT INTO auto(id, marca, modelo, year, kilometraje, precio, estado, placas, imagen) VALUES (0, '$marca', '$modelo', '$year','$kilometraje','$precio','$estado','$placas','$imagen')");

    if($sql)
        echo " -> Auto registrado";
    else
        echo " -> Error al registrar auto";
?>
