<?php 


error_reporting(1);

include "config/Conexion.php";

$Documento = $_REQUEST['DocumentoUsuario'];
$Nombre = $_POST['NombreUsuario'];
$Correo = $_POST['CorreoUsuario'];
$Contraseña = $_POST['ContraseñaUsuario'];
$Id_Rol = $_POST['RolUsuario'];


$sql = "UPDATE  usuarios SET
Nombre= '$Nombre',
Correo= '$Correo',
Contraseña = '$Contraseña',
Id_Rol = '$Id_Rol' WHERE Documento = $Documento";

$resultado = $conectar->query($sql);

if ($resultado) {

	header('location: manipular_usuario.php');
	echo"<script>alert('Los datos se han editado correctamente')</script>";
}else {
	echo"<script>alert('Los datos no se han editado correctamente')</script>";
}

