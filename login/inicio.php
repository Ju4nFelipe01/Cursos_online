</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="shortcut icon" href="../assets/imagenes/logo1.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script></script>
    <?php

include('config/Conexion.php');
session_start();

$sesion= $_SESSION['documento'];


$datos= mysqli_query($conectar, "SELECT * FROM usuarios WHERE  Documento= '$sesion'");

while ($consulta = mysqli_fetch_array($datos)) {
    $_SESSION['documento'] = $consulta['Documento'];
    $_SESSION['rol'] = $consulta['Id_rol'];
    $_SESSION['Nombre'] = $consulta['Nombre'];
    $rol=$_SESSION['rol'];
    $Nombre = $_SESSION['Nombre'];
    $Documento = $_SESSION['documento'];

}
if (!isset($rol)) {
    header('location: iniciar_sesion.php');
    session_destroy();
    die();
}elseif ($rol == "1" ) {
     echo"
    <script>
    alert('bienvenido administrador: $Nombre');</script>";
    include("../admin/interfas_manipulacion.php");

}elseif ($rol == "2" ) {
    include("../vendedor/interfas_manipulacion.php");
}elseif ($rol == "3" ) {
    include("../cliente/cliente.php");
}



?>
</body>
</html>