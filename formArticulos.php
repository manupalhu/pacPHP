<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Formulario de artículos</title>
</head>

<body>

	<?php
	include "funciones.php";
	?>


	<form action="formArticulos.php" method="get">

		<label for="nombre">ID:</label>

		<?php
		//si la acción es Editar o Borrar, mostrar el ID del producto
		
		$accion = $_GET['accion'];

		// Inicializar variables
		$producto = "";
		$nombre = "";
		$coste = "";
		$precio = "";
		$categoria = 1;


		if ($accion == "Editar" || $accion == "Borrar") {

			$idValue = $_GET['id'];

			print("<input type=\"text\" name=\"id\"  value=\"$idValue\" readonly>");
			//rellenar el resto de campos con los datos del producto sin javaScript
			$producto = getProducto($idValue);
			$nombre = $producto['name'];
			$coste = $producto['cost'];
			$precio = $producto['price'];
			$categoria = $producto['category_id'];

		} else {

			print("<input type=\"text\" name=\"id\"  value=\"\" disabled>");
		}


		//imprimir el resto de campos del formulario
		
		print("
		    <p>
				<label for=\"nombre\">Nombre:</label>
				<input type=\"text\" name=\"nombre\"  value=\"$nombre\">
		    </p>
		    <p>
				<label for=\"coste\">Coste:</label>
				<input type=\"number\" step=\"0.01\" name=\"coste\"  value=\"$coste\">
		    </p>
		    <p>
				<label for=\"precio\">Precio: </label>
				<input type=\"number\" step=\"0.01\" name=\"precio\"  value=\"$precio\">
		    </p>

			<p>
				<label for=\"categoria\">Categoría:</label>

			<select name=\"categoria\">
			");

		//rellenar el select con las categorías
		pintaCategorias($categoria);
		//Cerrar el select
		print("</select></p>");


		$accion = $_GET['accion'];

		if (isset($_GET['boton'])) {
			$accion = $_GET['boton'];
		}

		print("<br><input type=\"submit\" name=\"boton\" value=\"$accion\">");

		//Si esta relleno el formulario, llamar a la función correspondiente
		if ($_GET['nombre'] != "" && $_GET['coste'] != "" && $_GET['precio'] != "" && $_GET['categoria'] != "") {

			//recoger los datos del formulario
			$idValue = $_GET['id'];
			$nombre = $_GET['nombre'];
			$coste = $_GET['coste'];
			$precio = $_GET['precio'];
			$categoria = $_GET['categoria'];


			//si la acción es Editar, llamar a la función editarProducto
			if ($accion == "Editar") {

				$editar = editarProducto($idValue, $nombre, $coste, $precio, $categoria);

				if ($editar) {
					print("<a>Se ha editado el producto<a>");

				}

			}

			//Si la acción es Borrar, llamar a la función borrarProducto
			if ($accion == "Borrar") {

				$borrar = borrarProducto($idValue);
				if ($borrar) {
					print("<a>Se ha borrado el producto<a>");
				}


			}

			//Si la acción es Añadir, llamar a la función añadirProducto
			if ($accion == "Añadir") {

				anadirProducto($nombre, $coste, $precio, $categoria);

				print("<a>Se ha añadido el producto<a>");

			}
		}




		?>
		<a href="articulos.php">Volver</a>


	</form>

</body>

</html>