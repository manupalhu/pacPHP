<?php 

	function crearConexion() {
		// Cambiar en el caso en que se monte la base de datos en otro lugar
		$host = "localhost";
		$user = "root";
		$pass = "password";
		$baseDatos = "pac_dwes";

		// Crear conexión con la base de datos
		$conexion = new mysqli($host, $user, $pass, $baseDatos);

		// Comprobar conexión
		if ($conexion->connect_error) {
			die("No se ha podido realizar la conexión: " . $conexion->connect_error);
		}

		// Devolver conexión
		return $conexion;

	}


	function cerrarConexion($conexion) {
		// cerrar conexión
		$conexion->close();

	}


?>