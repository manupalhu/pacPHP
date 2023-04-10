<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Index.php</title>
</head>

<body>
	<!--formurario con nombre y mail -->
	<form action="" method="post">

		<p>
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre">
		</p>

		<p>
			<label for="email">Correo</label>
			<input type="email" name="email" id="correo">
		</p>
		<p>
			<input type="submit" value="Enviar">
		</p>

	</form>
	<?php

	include "consultas.php";

	//si se ha enviado el formulario
	if (isset($_POST['nombre']) && isset($_POST['email'])) {

		$tipoUsuario = tipoUsuario($_POST['nombre'], $_POST['email']);

		switch ($tipoUsuario) {

			case 0:
				echo "<p>Bienvenido " . $_POST['nombre'] . ". Pulsa <a href='articulos.php'>AQUÍ</a> para entrar al panel de artículos.</p>";
				//crear cookie con el tipo de usuario que se destruya en 1 hora
				setcookie("tipoUsuario", $tipoUsuario, time() + 3600);
				break;

			case 1:
				echo "<p>Bienvenido " . $_POST['nombre'] . ". Pulsa <a href='usuarios.php'>AQUÍ</a> para entrar al panel de usuarios.</p>";
				setcookie("tipoUsuario", $tipoUsuario, time() + 3600);
				break;


			default:
				echo "<p>El usuario no está registrado en el sistema.</p>";
				break;
		}
	}
	?>
</body>

</html>