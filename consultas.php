<?php 

	include "conexion.php";

	function tipoUsuario($nombre, $correo){
		// Completar...

	}


	function esSuperadmin($nombre, $correo){
		// Completar...
	}


	function getPermisos() {
		// Completar...	
	}


	function cambiarPermisos() {
		// Completar...	
	}


	function getCategorias() {
		// Completar...	
	}


	function getListaUsuarios() {
		// conectar con la base de datos
		$conexion = crearConexion();
		
		// Consultar usuarios
		$consulta = "SELECT * FROM usuarios";
		$resultado = $conexion->query($consulta);

		// Comprobar si hay resultados
		if ($resultado->num_rows > 0) {
			// Recorrer resultados
			while($fila = $resultado->fetch_assoc()) {
				$usuarios[] = $fila;
			}
		} else {
			$usuarios = null;
		}

		// Cerrar conexión

		cerrarConexion($conexion);

		// Devolver usuarios
		return $usuarios;
		
	}


	function getProducto($ID) {
		// Completar...	
	}


	function getProductos($orden) {
		// Completar...	
	}


	function anadirProducto($nombre, $coste, $precio, $categoria) {
		// Completar...	
	}


	function borrarProducto($id) {
		// Completar...	
	}


	function editarProducto($id, $nombre, $coste, $precio, $categoria) {
		// Completar...	
	}

?>