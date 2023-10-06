<?php

error_reporting(1);

include "config/Conexion.php";
$Id = $_REQUEST['Ideditar'];
$Nombre = $_POST['NombreProducto'];
$Descripion = $_POST['DescripcionProducto'];
$Valor = $_POST['ValorProducto'];
$Tipo = $_POST['TipoProducto'];

// Verificamos si se ha cargado una nueva imagen
if ($_FILES['ImagenProducto']['name'] != "") {
    $Imagen = addslashes(file_get_contents($_FILES['ImagenProducto']['tmp_name']));
    $sql = "UPDATE productos SET
    Nombre= '$Nombre',
    Descripcion= '$Descripion',
    Valor = '$Valor',
    Tipo = '$Tipo',
    Imagen = '$Imagen' WHERE Id = $Id";
} else {
    $sql = "UPDATE productos SET
    Nombre= '$Nombre',
    Descripcion= '$Descripion',
    Valor = '$Valor',
    Tipo = '$Tipo' WHERE Id = $Id";
}

$resultado = mysqli_query($conectar, $sql);

if ($resultado) {
    header('location: manipular_producto.php');
    echo "<script>alert('Los datos se han editado correctamente')</script>";
} else {
    echo "<script>alert('Los datos no se han editado correctamente')</script>";
}
