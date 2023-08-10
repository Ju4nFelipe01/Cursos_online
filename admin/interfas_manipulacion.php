<?php

if (!isset($rol)) {
    header('location: ../login/iniciar_sesion.php');
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Interfas manipulacion productos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/sidemenu.css">
  <link rel="stylesheet" href="../assets/css/index.css">
</head>

<body class="body-expanded">
  <div id="sidemenu" class="menu-expanded">
    <!-- header -->
    <div id="header">
      <div id="menu-btn">
        <div class="btn-hamburger"></div>
        <div class="btn-hamburger"></div>
        <div class="btn-hamburger"></div>
      </div>
      <div id="title">
        <span>ACCIONES</span>
      </div>

    </div>
    <!-- profile -->
    <div id="profile">
        <div id="name"><span>Administrador</span></div>
      <div id="photo"><img src="../assets/imagenes/icono10.png" alt="">
        <div id="name"><span><?php echo $Nombre ?></span></div>
      </div>
    </div>
    <!-- items cursos -->
    <div id="menu-items">
      <div class="separator">
      </div>
      <div class="item">
        <a href="../admin/nuevo_producto.php">
          <div class="icon">
            <img src="../assets/imagenes/icono4.png" alt="">
          </div>
          <div class="title"><span>AGREGAR CURSO</span></div>
        </a>
      </div>
      <div class="item">
        <a href="../admin/manipular_producto.php">
          <div class="icon">
            <img src="../assets/imagenes/icono3.png" alt="">
          </div>
          <div class="title"><span>MODIFICAR CURSO</span></div>
        </a>
      </div>
      <!-- separador -->
      <div class="item-separator">
      </div>
      <div class="separator">
      </div>
      <div class="item">
        <a href="../admin/usuarios/nuevo_usuario.php">
          <div class="icon">
            <img src="../assets/imagenes/icono5.png" alt="">
          </div>
          <div class="title"><span>AGREGAR USUARIO</span></div>
        </a>
      </div>
      <div class="item">
        <a href="../admin/usuarios/manipular_usuario.php">
          <div class="icon">
            <img src="../assets/imagenes/icono6.png" alt="">
          </div>
          <div class="title"><span>MODIFICAR USUARIO</span></div>
        </a>
      </div>
      <!-- separador -->
      <div class="item-separator">
      </div>
      <div class="separator">
      </div>
      <div class="item">
        <a href="../login/acciones/cerrar.php">
          <div class="icon">
            <img src="../assets/imagenes/icono7.png" alt="">
          </div>
          <div class="title"><span>CAMBIAR DE CUENTA</span></div>
        </a>
      </div>
      <div class="item">
        <a href="../admin/cerrar.php">
          <div class="icon">
            <img src="../assets/imagenes/icono9.png" alt="">
          </div>
          <div class="title"><span>SALIR</span></div>
        </a>
      </div>
    </div>
  </div>
  <!-- nav bar -->
  <div>
    <nav data-bs-theme="dark" class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container">
        <a class="navbar-brand" href="../index.php">Cursos Online</a>
        </div>
      </div>
    </nav>
  </div><br>

  <div class="container">
    <h1 class="title text-center">Cursos:</h1>
  </div><br><br>

  <div class="container">

    <div class="row row-cols-1 row-cols-md-3 g-4">

      <?php 
      include "Config/Conexion.php";

      $sql = "SELECT * FROM productos";
      $resultado = $conectar->query($sql);

      while ($fila = $resultado-> fetch_assoc()) { ?>

      <div class="container">
        <div class="card" style="width: 18rem;">

          <img class="card-img-top" src="data:image/jpg;base64,<?php echo base64_encode($fila['Imagen'])?>" alt="">
          <div class="card-body">
            <h5 class="card-title">
              <?php echo $fila['Nombre'] ?>
            </h5>
            <p class="card-text">
              <?php echo $fila['Descripcion'] ?>
            </p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <h6 class="card-title">Nombre curso:</h5>
                <?php echo $fila['Nombre'] ?>
            </li>
            <li class="list-group-item">
              <h5 class="card-title">Tipo de curso: </h5>
              <?php echo $fila['Tipo'] ?>
            </li>
            <li class="list-group-item">
              <h5 class="card-title">valor curso: </h5>
              <?php echo $fila['Valor'] ?> pesos
            </li>
          </ul>
          <div class="card-body">
            <div class="d-grid gap-2">
              <button class="btn btn-dark" type="button">Ver más</button>
            </div>
          </div>
        </div>
      </div>

      <?php  } ?>

    </div>
  </div><br>
    <footer>
        <div class="contenedor-footer">
            <div class="content-foo">
                <h4>telefono</h4>
                <p>5539815</p>
                <p>5681721</p>
                <p>6666666</p>
                <p>5689062</p>
            </div>
            <div class="content-foo">
                <h4>celular</h4>
                <p>3135066324</p>
                <p>3209977246</p>
                <p>5681727810</p>
                <p>3116060290</p>
            </div>
            <div class="content-foo">
                <h4>email</h4>
                <p>munozarango935017@gmail.com</p>
                <p>santiago@gmail.com</p>
                <p>trejos@gmail.com</p>
                <p>Lgabriel@gmail.com</p>
            </div>
            <div class="content-foo">
                <h4>locasion</h4>
                <p>cra19#13a21</p>
                <p>cll104#31a25</p>
                <p>cll93#31a25</p>
                <p>clle54#13a51</p>
            </div>
        </div>
        <h2 class="titulo-final">&copy; Ju4nFelipe01 | kabuto1279 | ElTr3gitos</h2>
        </div>
    </footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script>
    const btn = document.querySelector('#menu-btn');
    const menu = document.querySelector('#sidemenu');
    btn.addEventListener('click', e => {
      menu.classList.toggle("menu-expanded");
      menu.classList.toggle("menu-collapsed");

      document.querySelector('body').classList.toggle('body-expanded');
    });
  </script>
</body>

</html>