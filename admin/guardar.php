<?php
require_once 'config/Conexion.php';

if (empty($_POST['Nombre']) || empty($_POST['Descripcion'])) {
    echo"<script>alert('por favor llenar todos los campos')</script>";

    }else{
        $Nombre = $_POST['Nombre'];
        $Descripion = $_POST['Descripcion'];
        $Imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
        $Valor = $_POST['Valor'];
        $Tipo = $_POST['Tipo'];
        $Vendedor = $_POST['Vendedor'];

        $query = " INSERT INTO productos(Nombre, Descripcion, Imagen, Valor, Tipo, Vendedor)
         values('$Nombre', '$Descripion', '$Imagen', '$Valor', '$Tipo', '$Vendedor')";

         $resultado = $conectar ->query($query);

         if ($resultado) {
            echo"<script>alert('Los datos se han insertado correctamente en la base de datos')</script>";
            header('location: manipular_producto.php');
         }else {
            echo"<script>alert('no se insertaron los datos')</script>";
         }
    }
?>