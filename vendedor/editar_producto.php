<?php 


error_reporting(1);

include "config/Conexion.php";

$Id = $_REQUEST['Ideditar'];
$Nombre = $_POST['NombreProducto'];
$Descripion = $_POST['DescripcionProducto'];
$Valor = $_POST['ValorProducto'];
$Tipo = $_POST['TipoProducto'];
$Imagen = addslashes(file_get_contents($_FILES['ImagenProducto']['tmp_name']));


$sql = "UPDATE productos SET
Nombre= '$Nombre',
Descripcion= '$Descripion',
Valor = '$Valor',
Tipo = '$Tipo',
Imagen = '$Imagen' WHERE Id = $Id";

$resultado = $conectar->query($sql);

if ($resultado) {

	header('location: manipular_producto.php');
	echo"<script>alert('Los datos se han editado correctamente')</script>";
}else {
	echo"<script>alert('Los datos no se han editado correctamente')</script>";
}

