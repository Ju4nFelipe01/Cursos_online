<?php
require_once '../config/Conexion.php';

if (empty($_POST['Documento']) || empty($_POST['Nombre'])) {
    echo"<script>alert('por favor llenar todos los campos')</script>";

    }else{
        $Documento = $_POST['Documento'];
        $Nombre = $_POST['Nombre'];
        $Correo = $_POST['Correo'];
        $Contraseña = $_POST['Contraseña'];
        

        $query = " INSERT INTO usuarios(Documento, Nombre, Correo, Contraseña, Id_rol)
         values('$Documento', '$Nombre', '$Correo', '$Contraseña', '3')";

         $resultado = $conectar ->query($query);

         if ($resultado) {
            echo"<script>alert('Los datos se han insertado correctamente en la base de datos')</script>";
            header('location: ../../index.php');
         }else {
            echo"<script>alert('no se insertaron los datos')</script>";
         }
    }
?>