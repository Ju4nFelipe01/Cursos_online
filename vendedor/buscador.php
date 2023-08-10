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
    <a href="nuevo_producto.php" class="btn btn-dark">Agregar producto</a>
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

$fila = [];
$errores = ['data' => false];


$getAutores = $conectar->query($query);

if ($getAutores->num_rows > 0) {
    $fila = $getAutores;

}else{
  echo 'no hay resultados para el criterio de busqueda: ', $search_criteria  ;
  die();
}

while ($contenido = $fila->fetch_assoc()) { ?>
        
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
            <a href="vista_editar.php?Id=<?php echo $contenido['Id'] ?>" class="btn btn-dark">Editar</a>
            <a href="eliminar_producto.php?Id=<?php echo $contenido['Id'] ?>" class="btn btn-danger">Eliminar</a>
          </td>
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