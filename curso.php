<?php
session_start();
$_SESSION['producto']=$_GET['Id_producto'];

include "login/config/Conexion.php";
$producto= $_SESSION['producto'];
$sql="SELECT * FROM productos WHERE Id = $producto";
$resultado= $conectar->query($sql);
$fila = $resultado-> fetch_assoc()
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/css/curso.css">
</head>

<body>
  <section class="info-imagen">
    <div class="info">
      <h1><?php echo $fila['Nombre']?></h1>
      <div class="reseña-opinion">
        <div class="reseña">
          <img src="favorito.png" alt="" />
          <img src="favorito.png" alt="" />
          <img src="favorito.png" alt="" />
          <img src="favorito.png" alt="" />
          <div>
            <p class="opinion">4678opiniones</p>
          </div>
        </div>
      </div>
      <p class="descripcion">
        Descripcion del curso: <?php echo $fila['Descripcion']?>
      </p>

      <ul>
        <li>$<?php echo $fila['Valor']?></li>
        <li><?php echo $fila['Tipo']?></li>
      </ul>

      <div class="comenzar">
        <p>Mira nuestro curso</p>
        <a href="" class="btn btn-dark"></a>
        <a class="boton" href="cliente/carrito.php" style="text-decoration: none; color:black"><p style="color:black">comenzar</p></a>
      </div>
    </div>

    <div class="imagen">
      <img class="foto-curso" src="data:image/jpg;base64,<?php echo base64_encode($fila['Imagen'])?>" alt="" />
    </div>
  </section>
</body>

</html>