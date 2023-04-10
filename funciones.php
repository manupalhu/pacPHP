<?php

include "consultas.php";


function pintaCategorias($defecto)
{
	$categorias = getCategorias();
	//recorrer categorías para pintarlas

	foreach ($categorias as $categoria) {

		$catId=$categoria['id'];
		$catName=$categoria['name'];
		if ($categoria['id'] == $defecto) {

			print("<option value=\"$catId\" selected>$catName</option>");

		} else {

			print("<option value=\"$catId\">$catName</option>");
		}


	}


}


function pintaTablaUsuarios()
{
	// consultar usuarios
	$usuarios = getListaUsuarios();

}


function pintaProductos($orden)
{
	//Cabecera de la tabla	
	print("
			<tr>
				<th><a href='articulos.php?orden=ID'</a>ID</th>
				<th><a href='articulos.php?orden=name'</a>Nombre</th>
				<th><a href='articulos.php?orden=cost'</a>Coste</th>
				<th><a href='articulos.php?orden=price'</a>Precio</th>
				<th><a href='articulos.php?orden=category_id'</a>Categoría</th>
				<th>Acciones</th>
			</tr>");

	getProductos($orden);
}

?>