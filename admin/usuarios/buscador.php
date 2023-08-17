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
      <h1>Lista de usuarios</h1>
    </center>
  </div>
  <br>

  <div class="container">
    <button type="button" class=" btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#miModal">Agregar
      usuario</button>
    <div class="modal fade" id="miModal" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="modaltitle">Nuevo usuario:</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
          </div>
          <div class="modal-body">
            <form action="guardar.php" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Documento</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="Documento" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="Nombre" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="Correo" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="Contraseña" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Rol</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="Rol"
                  value="<?php echo $fila['Id_rol'] ?>" placeholder="Definir rol 1(admin), 2(vendedor), 3(usuario)"
                  required>
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
    <a href="../../login/inicio.php" class="btn btn-dark">Volver</a><br><br>
    
    <!-- consulta dee datos -->
    <div>
      <h1>Consultar Usuarios</h1>
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
          <th scope="col">Documento</th>
          <th scope="col">Nombre</th>
          <th scope="col">Correo</th>
          <th scope="col">Contraseña</th>
          <th scope="col">Id_rol</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>

     <?php
require_once('config/Conexion.php');

$search_criteria = $_POST['Buscar'];

$query= "SELECT  Documento, Nombre, Correo, Contraseña, Id_rol FROM usuarios 
WHERE Documento LIKE '%".$search_criteria."%' 
OR Nombre LIKE '%".$search_criteria."%' 
OR Correo LIKE '%".$search_criteria."%' 
OR Contraseña LIKE '%".$search_criteria."%'  
OR Id_rol LIKE '%".$search_criteria."%' 
 ";

$autores = [];
$errores = ['data' => false];


$getAutores = $conectar->query($query);

if ($getAutores->num_rows > 0) {
    $fila = $getAutores;

}else{
  echo 'no hay resultados para el criterio de busqueda: ', $search_criteria  ;
  die();
}while ($contenido = $fila->fetch_assoc()) { ?>
        
         <tr>
          <th scope="row">
            <?php echo $contenido['Documento'] ?>
          </th>
          <td>
            <?php echo $contenido['Nombre'] ?>
          </td>
          <td>
            <?php echo $contenido['Correo'] ?>
          </td>
          <td>
            <?php echo $contenido['Contraseña'] ?>
          </td>
          <td>
            <?php echo $contenido['Id_rol'] ?>
          </td>
                    <td>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
              data-bs-target="#modaleditar<?php echo $contenido['Documento']?>">editar</button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
             data-bs-target="#modaleliminar<?php echo $contenido['Documento']?>">eliminar</button>
          </td>

          <div class="modal fade" id="modaleditar<?php echo $contenido['Documento']?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modaltitle">Editar usuario:</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                   <form action="editar_usuario.php?DocumentoUsuario=<?php echo $contenido['Documento'] ?>" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nombre</label>
                      <input type="text" class="form-control" name="NombreUsuario"
                        value="<?php echo $contenido['Nombre'] ?>">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Correo</label>
                      <input type="text" class="form-control" name="CorreoUsuario" value="<?php echo $contenido['Correo'] ?>">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                      <input type="text" class="form-control" name="ContraseñaUsuario" value="<?php echo $contenido['Contraseña'] ?>">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Rol</label><br>

                      <input type="number" class="form-control" name="RolUsuario" value="<?php echo $contenido['Id_rol'] ?>" placeholder="Definir rol 1(admin), 2(vendedor), 3(usuario)">
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


           <div class="modal fade" id="modaleliminar<?php echo $contenido['Documento']?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modaltitle">Eliminar Usuario:</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                  <form action="eliminar_usuario.php?Documento=<?php echo $contenido['Documento'] ?>" method="post"
                    enctype="multipart/form-data">

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">¿Estas seguro de que deseas eliminar este
                        usuario?</label>
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
        </tr>
      </tbody>
      <?php } ?>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>