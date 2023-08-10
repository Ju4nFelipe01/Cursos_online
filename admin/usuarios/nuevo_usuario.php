<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <div class="container">
    <br>
    <h1>Agregar usuario:</h1>
    <br>

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
    <input type="password" class="form-control" id="exampleInputPassword1" name="Contraseña" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Rol</label>
    <input type="number" class="form-control" name="Rol" value="<?php echo $fila['Id_rol'] ?>" placeholder="Definir rol 1(admin), 2(vendedor), 3(usuario)">
  </div><br>
 
  <button type="submit" class="btn btn-dark">Enviar</button>
  <a href="manipular_usuario.php" class="btn btn-dark">Volver</a><br><br>
  
    </form>
    
  </div>


  </body>
</html>