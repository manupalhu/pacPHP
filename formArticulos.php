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
	include_once "consultas.php";
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
		$categoria =1;


		if ($accion == "Editar" || $accion == "Borrar") {

			$id = $_GET['id'];

			print("<input type=\"text\" name=\"id\" id=\"id\" value=\"$id\" disabled>");
			//rellenar el resto de campos con los datos del producto sin javaScript
			$producto = getProducto($id);
			$nombre = $producto['name'];
			$coste = $producto['cost'];
			$precio = $producto['price'];
			$categoria = $producto['category_id'];

		} else {

			print("<input type=\"text\" name=\"id\" id=\"id\" value=\"\" disabled>");
		}


		//imprimir el resto de campos del formulario
		
		print("
		    <p>
				<label for=\"nombre\">Nombre:</label>
				<input type=\"text\" name=\"nombre\" id=\"name\" value=\"$nombre\">
		    </p>
		    <p>
				<label for=\"coste\">Coste:</label>
				<input type=\"number\" name=\"coste\" id=\"cost\" value=\"$coste\">
		    </p>
		    <p>
				<label for=\"precio\">Precio: </label>
				<input type=\"number\" name=\"precio\" id=\"price\" value=\"$precio\">
		    </p>

			<p>
				<label for=\"categoria\">Categoría:</label>

			<select name=\"categoria\" id=\"category_id\>
			");

		//rellenar el select con las categorías
		pintaCategorias($categoria);
		//Cerrar el select
		print("</select></p>");


		$accion = $_GET['accion'];


		


		print("<br><input type=\"submit\" value=\"$accion\">

		 <a href=\"articulos.php?orden=ID\">Volver</a>");



		?>

	</form>

</body>

</html>