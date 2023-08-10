<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar producto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

  <?php 
      include "Config/Conexion.php";

      $Id = $_REQUEST['Id'];
      $sql = "SELECT * FROM  productos where Id = $Id";
      $resultado = $conectar->query($sql);
      $fila = $resultado->fetch_assoc();
    ?>

  <div class="container">
    <br>
    <center>
      <h1>Editar Producto</h1>
    </center>

    <form action="editar_producto.php?Ideditar=<?php echo $fila['Id'] ?>" method="post" enctype="multipart/form-data">

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="NombreProducto" value="<?php echo $fila['Nombre'] ?>">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Descripcion</label>
        <input type="text" class="form-control" name="DescripcionProducto" value="<?php echo $fila['Descripcion'] ?>">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tipo</label>
        <input type="text" class="form-control" name="TipoProducto" value="<?php echo $fila['Tipo'] ?>">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Valor</label>
        <input type="number" class="form-control" name="ValorProducto" value="<?php echo $fila['Valor'] ?>">
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Imagen</label><br>

        <td><img style="width:200px;" src="data:image/jpg;base64,<?php echo base64_encode($fila['Imagen'])?>" alt="">
        </td><br>

        <input type="file" class="form-control" name="ImagenProducto">
      </div>

      <button type="submit" class="btn btn-primary">Enviar</button>
      <a href="manipular_producto.php" class="btn btn-dark">Regresar</a>
    </form>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>