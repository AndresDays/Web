<?php
	include "../conexion.php";
	session_start();

if(isset($_SESSION['id'])) {
		header('Location: ../Productos/Catalogo.php');
		exit;
	}

	if(!empty($_POST['correo']) && !empty($_POST['contrasena'])) {
		$correo = $_POST['correo'];
		$password = $_POST['contrasena'];

		$sql = mysqli_query($connection, "SELECT * FROM usuario WHERE correo = '$correo'");

		if($sql) {
			$numRows = mysqli_num_rows($sql);
			if($numRows > 0) {
				while($row = mysqli_fetch_array($sql)) {
					if($row['contrasena'] == $password) {
						$_SESSION['id'] = $row['id'];
						header('Location: ../Productos/Catalogo.php');
					}
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Inicia sesión en nuestra página...">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Nunito:wght@200;300;400;600;700;800;900&family=Oswald:wght@200;300;400;500;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="icon" href="../assets/svg/login-black.svg">
  <link rel="stylesheet" href="./global.css">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="./styleL.css" media="(min-width: 375px)">
  <link rel="stylesheet" href="./tablet.css" media="(min-width: 768px)">
  <link rel="stylesheet" href="./desktop.css" media="(min-width: 1024px)">
  <title>Log In</title>
</head>
<body>
  <header>
    <a href="../">
      <img src="https://i.pinimg.com/originals/cd/36/19/cd3619f9e171f176bf0774017147170d.png" alt="Logo de Nexus Store">Sovereign Motors
    </a>
  </header>
  <main>
    <section class="login__container">
      <h1 class="title">Inicia Sesión</h1>
      <form action="./Login.php" method="post" class="login__container--form">
        <input class="input" type="email" placeholder="Correo" name="correo" autocomplete="email" required>
        <input class="input" type="password" placeholder="Contraseña" name="contrasena" required>
        <input type="submit" class="button" value="Iniciar sesion">
        <div class="login__container--remember-me">
          <input type="checkbox" name="" id="cbox1" value="checkbos">
          <label for="cbox1">Recuerdame</label>
          <a href="../">Olvidé mi contraseña</a>
        </div>
      </form>
      <section class="login__container--social-media">
        <a href="#">
          <svg fill="currentColor" viewBox="0 0 16 16">
            <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
          </svg>Inicia sesión con Google
        </a>
        <a href="#">
          <svg fill="currentColor" viewBox="0 0 16 16">
            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
          </svg>Inicia sesión con Twitter
        </a>
      </section>
      <p class="login__container--register">No tienes cuenta?
        <a href="../signup/">Registrate</a>
      </p>
    </section>
  </main>
  <footer></footer>
</body>
</html>
