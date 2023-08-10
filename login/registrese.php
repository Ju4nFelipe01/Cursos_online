<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <div class="container">
    <br>
    <h1>Registrese</h1>
    <br>

    <form action="acciones/guardar.php" method="post" enctype="multipart/form-data">
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
  </div><br>
 
  <button type="submit" class="btn btn-dark">Enviar</button>
  <a href="../index.php" class="btn btn-dark">Volver</a><br><br>
  <div class="container">
    <h5>Ya tienes cuenta?
      <a class="icon-link" href="iniciar_sesion.php">
        Inicia sesión
        <svg class="bi" aria-hidden="true"><use xlink:href="#arrow-right"></use></svg>
      </a>
    </h5>
  </div>
  
    </form>
    
  </div>


  </body>
</html>