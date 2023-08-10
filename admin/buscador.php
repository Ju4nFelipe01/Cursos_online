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
        <button type="button" class="mt-5 mx-5 btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal">Agregar
      curso</button>
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
                <button type="submit" class="btn btn-dark">Enviar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>

    <a href="../login/inicio.php" class="btn btn-dark">Volver</a><br><br>
    <!-- consulta dee datos -->
    <div>
      <h1>Consultar producto</h1>
      <div class="input-container">
        <form class="d-flex" role="search" method="post" action="#">
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
require_once('config/Conexion.php');

$search_criteria = $_POST['Buscar'];


$query= "SELECT Id, Nombre, Descripcion, Imagen, Valor, Tipo FROM productos 
WHERE Id LIKE '%".$search_criteria."%' 
OR Nombre LIKE '%".$search_criteria."%' 
OR Descripcion LIKE '%".$search_criteria."%' 
OR Valor LIKE '%".$search_criteria."%'  
OR Tipo LIKE '%".$search_criteria."%' 
 ";

$autores = [];
$errores = ['data' => false];


$getAutores = $conectar->query($query);

if ($getAutores->num_rows > 0) {
    $fila = $getAutores;

  echo 'no hay resultados para el criterio de busqueda: ', $search_criteria  ;
  die();
  
}while ($contenido = $fila->fetch_assoc()) { ?>
        
         <tr>
          <th scope="row">
            <?php echo $contenido['Id'] ?>
          </th>
          <td>
            <?php echo $contenido['Nombre'] ?>
          </td>
          <td>
            <?php echo $contenido['Descripcion'] ?>
          </td>
          <td>
            <?php echo $contenido['Tipo'] ?>
          </td>
          <td>
            <?php echo $contenido['Valor'] ?>
          </td>
          <td><img style="width:150px;" src="data:image/jpg;base64,<?php echo base64_encode($contenido['Imagen'])?>" alt="">
          </td>
          <td>
            <button class="btn btn-small btn-warning" data-bs-toggle="modal"
              data-bs-target="#modaleditar<?php echo $contenido['Id']?>">Editar</button>
            <button class="btn btn-small btn-danger" data-bs-toggle="modal"
              data-bs-target="#modaleliminar<?php echo $contenido['Id']?>">Eliminar</button>
          </td>
          <div class="modal fade" id="modaleditar<?php echo $contenido['Id']?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modaltitle">Editar curso:</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                  <form action="editar_producto.php?Ideditar=<?php echo $contenido['Id'] ?>" method="post"
                    enctype="multipart/form-data">

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nombre</label>
                      <input type="text" class="form-control" name="NombreProducto"
                        value="<?php echo $contenido['Nombre'] ?>">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                      <input type="text" class="form-control" name="DescripcionProducto"
                        value="<?php echo $contenido['Descripcion'] ?>">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Tipo</label>
                      <input type="text" class="form-control" name="TipoProducto" value="<?php echo $contenido['Tipo'] ?>">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Valor</label>
                      <input type="text" class="form-control" name="ValorProducto" value="<?php echo $contenido['Valor'] ?>">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Imagen</label><br>

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


          <div class="modal fade" id="modaleliminar<?php echo $contenido['Id']?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modaltitle">Eliminar curso:</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                  <form action="eliminar_producto.php?Id=<?php echo $contenido['Id'] ?>" method="post"
                    enctype="multipart/form-data">

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Estas seguro de que deseas eliminar este
                        curso</label>
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