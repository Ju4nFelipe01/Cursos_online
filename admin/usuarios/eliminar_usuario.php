 <?php 

  include "config/Conexion.php";

  $Documento = $_REQUEST['Documento'];

  $sql = "DELETE FROM usuarios where Documento = $Documento";

  $resultado = $conectar -> query($sql);

  if ($resultado) {
  	header('location: manipular_usuario.php');
  	 echo"<script>alert('el Usuarios se ha eliminado correctamente')</script>";
  }else {
  	 echo"<script>alert('el Usuario no se ha eliminado correctamente')</script>";

  }





 ?>