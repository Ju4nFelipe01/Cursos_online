<?php 
session_start();
// importacion de variables a validar
$Documento = $_SESSION['documento'];
$_SESSION['documento']=$Documento;
$Nombre = $_SESSION['Nombre'];
$_SESSION['Nombre'] = $Nombre ;
//importacion y concatenacion de la informacion del producto
if (isset($Documento) || isset($Nombre)) {
    include "../login/config/Conexion.php";
$producto= $_SESSION['producto'];
$sql="SELECT * FROM productos WHERE Id = $producto";
$resultado= $conectar->query($sql);
$fila = $resultado-> fetch_assoc();
//incersion de datos en variables/ inicio de carrito
if (isset($_SESSION['carrito']) || isset($producto)) {
    if(isset($_SESSION['carrito'])){

        $carrito_mio=$_SESSION['carrito'];

        if(isset($producto)){
            $nombre = $fila['Nombre'];
            $valor = $fila['Valor'];
            $cantidad = '1';
            $ref= $fila['Id'];
            $donde=-1;
            if ($donde !=-1) {
                $cuanto = $carrito_mio[$donde]['cantidad'] + $cantidad;
                $carrito_mio[$donde] = array("nombre"=>$nombre, "valor"=>$valor, "cantidad"=>$cuanto, "ref"=>$ref);
            }else {
                $carrito_mio[] = array("nombre"=>$nombre, "valor"=>$valor, "cantidad"=>$cantidad, "ref"=>$ref);
            }
        }
    }else {
        $nombre = $fila['Nombre'];
        $valor = $fila['Valor'];
        $cantidad = '1';
        $ref= $fila['Id'];
        $carrito_mio[] = array("nombre"=>$nombre, "valor"=>$valor, "cantidad"=>$cantidad, "ref"=>$ref);

    }
}
$_SESSION['carrito']=$carrito_mio;
    header("location: ../login/inicio.php");

}else {
    header("location: ../login/iniciar_sesion.php");
}

?>