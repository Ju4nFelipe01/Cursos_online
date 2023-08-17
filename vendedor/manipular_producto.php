<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>index</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <br>
    <center>
      <h1>Listado de productos</h1>
    </center>
  </div>
  <br>

  <div class="container">

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal">Agregar
      curso</button>
    <a href="../login/inicio.php" class="btn btn-dark">volver</a>
    <div class="modal fade" id="miModal" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="modaltitle">Nuevo curso:</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
          </div>
          <div class="modal-body">
            <form action="guardar.php" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre de curso</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="Nombre" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tipo de curso</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="Tipo" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Valor COP</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="Valor" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Descripcion</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="Descripcion" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="Imagen" required>
              </div><br>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>

    <!-- consulta de datos -->
    <div>
      <h1>Consultar producto</h1>
      <div class="input-container">
        <form class="d-flex" role="search" method="post" action="buscador.php">
          <input class="form-control me-2" type="search" placeholder="buscar" aria-label="Search" id="search"
            name="Buscar">
        </form>
      </div><br>
    </div>
    <br>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nombre</th>
          <th scope="col">Descripción</th>
          <th scope="col">Tipo</th>
          <th scope="col">Valor</th>
          <th scope="col">Imagen</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>

        <?php 
      include "Config/Conexion.php";

      $sql = "SELECT * FROM productos";
      $resultado = $conectar->query($sql);

      while ($fila = $resultado-> fetch_assoc()) { ?>

        <tr>
          <th scope="row">
            <?php echo $fila['Id'] ?>
          </th>
          <td>
            <?php echo $fila['Nombre'] ?>
          </td>
          <td>
            <?php echo $fila['Descripcion'] ?>
          </td>
          <td>
            <?php echo $fila['Tipo'] ?>
          </td>
          <td>
            <?php echo $fila['Valor'] ?>
          </td>
          <td><img style="width:150px;" src="data:image/jpg;base64,<?php echo base64_encode($fila['Imagen'])?>" alt="">
          </td>
          <td>
            <button class="btn btn-small btn-warning" data-bs-toggle="modal"
              data-bs-target="#modaleditar<?php echo $fila['Id']?>">Editar</button>
            <button class="btn btn-small btn-danger" data-bs-toggle="modal"
              data-bs-target="#modaleliminar<?php echo $fila['Id']?>">Eliminar</button>
          </td>
          <div class="modal fade" id="modaleditar<?php echo $fila['Id']?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modaltitle">Editar curso:</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                  <form action="editar_producto.php?Ideditar=<?php echo $fila['Id'] ?>" method="post"
                    enctype="multipart/form-data">

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nombre</label>
                      <input type="text" class="form-control" name="NombreProducto"
                        value="<?php echo $fila['Nombre'] ?>">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                      <input type="text" class="form-control" name="DescripcionProducto"
                        value="<?php echo $fila['Descripcion'] ?>">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Tipo</label>
                      <input type="text" class="form-control" name="TipoProducto" value="<?php echo $fila['Tipo'] ?>">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Valor</label>
                      <input type="text" class="form-control" name="ValorProducto" value="<?php echo $fila['Valor'] ?>">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Imagen</label><br>
                      <img style="width:150px;" src="data:image/jpg;base64,<?php echo base64_encode($fila['Imagen'])?>" alt=""><br><br>

                      <input type="file" class="form-control" name="ImagenProducto">
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-dark">Enviar</button>
                      <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>


          <div class="modal fade" id="modaleliminar<?php echo $fila['Id']?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modaltitle">Eliminar curso:</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                  <form action="eliminar_producto.php?Id=<?php echo $fila['Id'] ?>" method="post"
                    enctype="multipart/form-data">

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Estas seguro de que deseas eliminar este curso</label>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-danger">Estoy de acuerdo</button>
                      <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
  </tr>
  </tbody>
  <?php  } ?>
  </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>