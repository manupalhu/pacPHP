<?php 

	function crearConexion() {
		$host = "localhost";
		$user = "root";
		$pass = "password";
		$baseDatos = "pac_dwes";

		// Crear conexión con la base de datos
		$conexion = new mysqli($host, $user, $pass, $baseDatos);

		// Comprobar conexión
		if (!$conexion) {
			die("No se ha podido realizar la conexión: " . $conexion->connect_error);
		}

		//Devolver conexión
		return $conexion;

	}


	function cerrarConexion($conexion) {
		// cerrar conexión
		mysqli_close($conexion);

		
	}


?>