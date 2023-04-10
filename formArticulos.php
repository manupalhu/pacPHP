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

	<form action="formArticulos.php">
		<p>
			<label for="nombre">ID:</label>
			<input type="text" name="id" id="id">
		</p>
		<p>
			<label for="nombre">Nombre:</label>
			<input type="text" name="nombre" id="name">
		</p>
		<p>
			<label for="nombre">Coste:</label>
			<input type="text" name="coste" id="cost">
		</p>
		<p>
			<label for="nombre">Precio: </label>
			<input type="text" name="precio" id="price">
		</p>
		<p>
			<label for="nombre">Categoría: </label>
			<select name="categoria" id="category">
				<option value="1">Categoría 1</option>
				<option value="2">Categoría 2</option>
				<option value="3">Categoría 3</option>
		</p>
		<br>
		<p>
			<input type="submit" value="Enviar">
		</p>
	</form>

</body>

</html>