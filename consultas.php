<?php

include "conexion.php";

function tipoUsuario($nombre, $correo)
{

	//comprobar permisos del usuario
	$conexion = crearConexion();
	$consulta = "SELECT enabled FROM user WHERE full_name = '$nombre' AND email = '$correo'";
	$resultado = $conexion->query($consulta);
	$fila = $resultado->fetch_assoc();
	$permiso = $fila['enabled'];

	// cerrar conexión
	cerrarConexion($conexion);

	// Devolber resultados
	if ($resultado->num_rows > 0) {

		return $permiso;

	} else {

		return "no registrado";
	}


}


function esSuperadmin($nombre, $correo)
{

	// comparar el id del  usuario con el id del superadmin
	$conexion = crearConexion();
	$consulta = "SELECT id FROM user WHERE full_name = '$nombre' AND email = '$correo'";

	$resultado = $conexion->query($consulta);

	$fila = $resultado->fetch_assoc();
	$id = $fila['id'];

	$consulta = "SELECT id FROM superadmin WHERE id = '$id'";
	$resultado = $conexion->query($consulta);

	// cerarr conexión
	cerrarConexion($conexion);

	if ($resultado->num_rows > 0) {
		return true;
	} else {
		return false;
	}


}


function getPermisos()
{
	// Completar...

}


function cambiarPermisos()
{
	// Completar...	
}


function getCategorias()
{
	// conectar con la base de datos
	$conexion = crearConexion();

	// Consultar categorías
	$consulta = "SELECT * FROM category";
	$resultado = $conexion->query($consulta);

	// Comprobar si hay resultados
	if ($resultado->num_rows > 0) {
		// Recorrer resultados
		while ($fila = $resultado->fetch_assoc()) {
			$categorias[] = $fila;
		}
	} else {
		$categorias = null;
	}

	// Cerrar conexión
	cerrarConexion($conexion);

	// Devolver categorías
	return $categorias;

}


function getListaUsuarios()
{
	// conectar con la base de datos
	$conexion = crearConexion();

	// Consultar usuarios
	$consulta = "SELECT * FROM usuarios";
	$resultado = $conexion->query($consulta);

	// Comprobar si hay resultados
	if ($resultado->num_rows > 0) {
		// Recorrer resultados
		while ($fila = $resultado->fetch_assoc()) {
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


function getProducto($ID)
{

	//conectar con la base de datos
	$conexion = crearConexion();
	$consulta = "SELECT * FROM product WHERE id = $ID";

	// Realizar consulta
	$resultado = $conexion->query($consulta);

	// Comprobar si hay resultados
	if ($resultado->num_rows > 0) {
		// Recorrer resultados
		while ($fila = $resultado->fetch_assoc()) {
			$producto = $fila;
		}
	} else {
		$producto = null;
	}

	// Cerrar conexión
	cerrarConexion($conexion);

	// Devolver producto
	return $producto;


}


function getProductos($orden)
{
	//conectar con la base de datos
	$conexion = crearConexion();
	$consulta = "SELECT * FROM product ORDER BY $orden ASC";

	// Realizar consulta
	$resultado = $conexion->query($consulta);

	// Comprobar si hay resultados
	if ($resultado->num_rows > 0) {

		// Recorrer resultados
		while ($fila = $resultado->fetch_assoc()) {

			// Devolver productos en forma de tabla<table>
			print("<tr>" .
				"<td>" . $fila['id'] . "</td>" .
				"<td>" . $fila['name'] . "</td>" .
				"<td>" . $fila['cost'] . "</td>" .
				"<td>" . $fila['price'] . "</td>");

			// Consultar nombre de la categoría
			$consulta = "SELECT name FROM category WHERE id = " . $fila['category_id'];
			$resultado2 = $conexion->query($consulta);
			$fila2 = $resultado2->fetch_assoc();
			print("<td>" . $fila2['name'] . "</td>");

			//
			print("<td><a href='FormArticulos.php?id=" . $fila['id'] . "&accion=Editar'>Editar</a> - <a href='FormArticulos.php?id=" . $fila['id'] . "&accion=Borrar'>Borrar</a></td>" .
				"</tr>");


		}

		// Cerrar conexión
		cerrarConexion($conexion);


	} else {
		$producto = null;
	}

}


function anadirProducto($nombre, $coste, $precio, $categoria)
{
	// Añadir producto
	$conexion = crearConexion();
	$consulta = "INSERT INTO product (name, cost, price, category_id) VALUES ('$nombre', $coste, $precio, '$categoria')";
	$resultado = $conexion->query($consulta);

	// Cerrar conexión
	cerrarConexion($conexion);

	// Devolver resultado
	return $resultado;

}


function borrarProducto($id)
{
	// Borrar producto
	$conexion = crearConexion();
	$consulta = "DELETE FROM product WHERE id = '$id'";
	$resultado = $conexion->query($consulta);

	// Cerrar conexión
	cerrarConexion($conexion);

	// Devolver resultado
	return $resultado;

}



function editarProducto($id, $nombre, $coste, $precio, $categoria)
{
	// Editar producto
	$conexion = crearConexion();
	$consulta = "UPDATE product SET name = '$nombre', cost = $coste, price = $precio, category_id = '$categoria' WHERE id = '$id'";
	$resultado = $conexion->query($consulta);

	// Cerrar conexión
	cerrarConexion($conexion);

	// Devolver resultado
	return $resultado;
}

?>