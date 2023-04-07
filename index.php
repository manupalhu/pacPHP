<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Index.php</title>
</head>
<body>

	<?php
	
		include "consultas.php";

	?>
	<!--formurario con nombre y mail -->
	<form action="index.php" method="post">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" id="nombre">
		<br>
		<label for="correo">Correo</label>
		<input type="text" name="correo" id="correo">
		<br>
		<input type="submit" value="Enviar">
	
</body>
</html>