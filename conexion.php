<?php
    $server = "localhost";
    $database = "SovereignMotors";
    $user = "root";
    $password = "";

    $connection = mysqli_connect($server, $user, $password, $database);
    if ($connection)
        echo "Conexion exitosa";
    else
        die("Falla en la conexion".mysqli_connect_error());
?>
