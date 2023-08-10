<?php
include('../config/Conexion.php');

$Contraseña = $_POST['Contraseña'];
$Documento = $_POST['Documento'];

$verificacion = mysqli_query($conectar, "SELECT * FROM usuarios WHERE 
Contraseña='$Contraseña' and
Documento='$Documento' ");

$fila = mysqli_num_rows($verificacion);

if ($fila > 0 ) {
    session_start();

    $_SESSION['documento'] = $Documento;

    header('location:../inicio.php');
}else{
    echo"
    <script>
    alert('No se ha encontrado su cuenta en la base de datos');
    location.href = '../iniciar_sesion.php';

    </script>";

}



?>