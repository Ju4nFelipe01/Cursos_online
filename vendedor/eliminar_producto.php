<?php 
  include "config/Conexion.php";

  $Documento= $_GET['Documento'];
  echo $Documento;
  $Id = $_REQUEST['Id'];
  $sql = "DELETE FROM productos where Id = $Id";
  $resultado = $conectar -> query($sql);
  if ($resultado) {
  	header("location: manipular_producto.php?Documento='$Documento'");
  	 echo"<script>alert('el producto se ha eliminado correctamente')</script>";
  }else {
  	 echo"<script>alert('el producto co se ha eliminado correctamente')</script>";
  }
 ?>