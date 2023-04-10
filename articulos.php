<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Articulos</title>
</head>

<body>

	<?php

	include "funciones.php";

	?>

	<h1>Lista de artículos</h1>

	<table>

		<?php

		// Comprobar si el usuario tiene permisos para ver la página
		if (isset($_COOKIE['tipoUsuario'])) {

			if ($_COOKIE['tipoUsuario'] == 0 || $_COOKIE['tipoUsuario'] == 1) {

				if(isset($_GET ['orden'])){

					getProductos($_GET ['orden']);

				}else{

					//Por defecto, ordenar por ID
					getProductos("ID");

				}

				

			} else {

				//si no tiene permisos, mostrar mensaje y enlace para volver al inicio
				echo "<p>No tiene permiso para estar aquí. <a href='index.php'>Volver al inicio</a></p>";

			}

		} else {

			echo "<p>No tiene permiso para estar aquí. <a href='index.php'>Volver al inicio</a></p>";

		}
		
		?>

	</table>
</body>

</html>