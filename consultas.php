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
	// Completar...	
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

		//Cabecera de la tabla	
		echo "
			<tr>
				<th><a href='articulos.php?orden=ID'</a>ID</th>
				<th><a href='articulos.php?orden=name'</a>Nombre</th>
				<th><a href='articulos.php?orden=cost'</a>Coste</th>
				<th><a href='articulos.php?orden=price'</a>Precio</th>
				<th><a href='articulos.php?orden=category_id'</a>Categoría</th>
				<th>Acciones</th>
			</tr>";


		// Recorrer resultados
		while ($fila = $resultado->fetch_assoc()) {

			// Devolver productos en forma de tabla<table>
			echo "<tr>";
			echo "<td>" . $fila['id'] . "</td>";
			echo "<td>" . $fila['name'] . "</td>";
			echo "<td>" . $fila['cost'] . "</td>";
			echo "<td>" . $fila['price'] . "</td>";

			// Consultar nombre de la categoría
			$consulta = "SELECT name FROM category WHERE id = " . $fila['category_id'];
			$resultado2 = $conexion->query($consulta);
			$fila2 = $resultado2->fetch_assoc();
			echo "<td>" . $fila2['name'] . "</td>";
	
			echo "<td><a href='formArticulos.php?id=" . $fila['id'] . "'>Editar</a></td>";
			echo "<td><a href='formArticulos.php?id=" . $fila['id'] . "'>Borrar</a></td>";
			echo "</tr>";


		}

	} else {
		$producto = null;
	}

}


function anadirProducto($nombre, $coste, $precio, $categoria)
{
	// Completar...	
}


function borrarProducto($id)
{
	// Completar...	
}


function editarProducto($id, $nombre, $coste, $precio, $categoria)
{
	// Completar...	
}

?>