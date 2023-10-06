<?php
session_start();
    $Nombre = $_SESSION['Nombre'];
   $_SESSION['Nombre']=$Nombre;
   $rol=$_SESSION['rol'];
   $_SESSION['rol']=$rol;

if (!isset($rol)) {
    header('location: ../../login/iniciar_sesion.php');
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>manipulacion usuario</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="../../assets/css/sidemenu.css">
  <link rel="stylesheet" href="../../assets/css/index.css">
  <script src="../../assets/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="../../assets/js/dselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body class="body-expanded">

  <!-- modal agregar curso-->
  <div class="modal fade" id="miModal" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
    <div class="modal-dialog">
      <?php 
        include "../Config/Conexion.php";
        $query = "
            SELECT Documento,Nombre FROM  usuarios WHERE Id_rol=2 
            ORDER BY Nombre ASC
        ";
        $result = $conectar->query($query);
        ?>
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modaltitle">Nuevo curso:</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
        </div>
        <div class="modal-body">
          <form action="../guardar.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Proveedor</label>
              <select name="Vendedor" class="form-select" id="select_box" required>
                <option value="" >Seleccione un proveedor</option>
                <?php 
                        foreach($result as $row)
                        {
                            echo '<option value="'.$row["Documento"].'">'.$row["Nombre"].'</option>';
                        }
                        ?>
              </select>
            </div>

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

  <!-- modal agregar usuario -->
  <div class="modal fade" id="miModalusuario" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
    <div class="modal-dialog">

      <?php
        include "../Config/Conexion.php";
        $query='SELECT Id, Rol FROM rol';
        $sql=mysqli_query($conectar,$query);  
        ?>

      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modaltitle">Nuevo usuario:</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
        </div>
        <div class="modal-body">
          <form action="guardar.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Rol</label>
              <select name="Rol" id="" class="form-select" required>
                <option selected>seleccione un rol</option>
                <?php 
                  while ($v=mysqli_fetch_array($sql)) {
                    echo "<option value=" .$v[0].">".$v[1]."</option>";
                  }
                  ?>
              </select>
            </div><br>
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

            <div class="modal-footer">
              <button type="submit" class="btn btn-dark">Enviar</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

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
      <div id="photo"><img src="../../assets/imagenes/icono10.png" alt="">
        <div id="name"><span>
            <?php echo $Nombre ?>
          </span></div>
      </div>
    </div>
    <!-- items cursos -->
    <div id="menu-items">
      <div class="separator">
      </div>
      <div class="item">
        <a href="#" data-bs-toggle="modal" data-bs-target="#miModal">
          <div class="icon">
            <img src="../../assets/imagenes/icono4.png" alt="">
          </div>
          <div class="title"><span>AGREGAR CURSO</span></div>
        </a>
      </div>
      <div class="item">
        <a href="../../admin/manipular_producto.php">
          <div class="icon">
            <img src="../../assets/imagenes/icono3.png" alt="">
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
        <a href="" data-bs-toggle="modal" data-bs-target="#miModalusuario">
          <div class="icon">
            <img src="../../assets/imagenes/icono5.png" alt="">
          </div>
          <div class="title"><span>AGREGAR USUARIO</span></div>
        </a>
      </div>
      <div class="item">
        <a href="../../admin/usuarios/manipular_usuario.php">
          <div class="icon">
            <img src="../../assets/imagenes/icono6.png" alt="">
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
        <a href="../../login/acciones/cerrar.php">
          <div class="icon">
            <img src="../../assets/imagenes/icono7.png" alt="">
          </div>
          <div class="title"><span>CAMBIAR DE CUENTA</span></div>
        </a>
      </div>
      <div class="item">
        <a href="../../admin/cerrar.php">
          <div class="icon">
            <img src="../../assets/imagenes/icono9.png" alt="">
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
        <a class="navbar-brand" href="../../index.php">Cursos Online</a>
      </div>
  </div>
  </nav>
  </div><br>
  <div class="container">
    <br>
    <center>
      <h1>Lista de usuarios:</h1>
    </center>
  </div>
  <br>

  <div class="container">
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#miModalusuario">Agregar
      usuario</button>


    <a href="../../login/inicio.php" class="btn btn-dark">Volver</a><br><br>

    <!-- consulta dee datos -->
    <div>
      <h1>Consultar usuario</h1>
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
      include "Config/Conexion.php";
      $query='SELECT Id, Rol FROM rol';
      $sql = "SELECT * FROM  usuarios";
      $resultado = $conectar->query($sql);
      $sqli=mysqli_query($conectar,$query);  

      while ($fila = $resultado-> fetch_assoc()) { ?>

        <tr>
          <th scope="row">
            <?php echo $fila['Documento'] ?>
          </th>
          <td>
            <?php echo $fila['Nombre'] ?>
          </td>
          <td>
            <?php echo $fila['Correo'] ?>
          </td>
          <td>
            <?php echo $fila['Contraseña'] ?>
          </td>
          <td>
            <?php echo $fila['Id_rol'] ?>
          </td>
          <td>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
              data-bs-target="#modaleditar<?php echo $fila['Documento']?>"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></button>
            <button type="button" class=" btn btn-danger" data-bs-toggle="modal"
              data-bs-target="#modaleliminar<?php echo $fila['Documento']?>"><i class="fa-solid fa-trash" style="color: #000000;"></i></button>
          </td>

          <div class="modal fade" id="modaleditar<?php echo $fila['Documento']?>">
              <?php
        include "Config/Conexion.php";
        $query='SELECT Id, Rol FROM rol';
        $sqli=mysqli_query($conectar,$query);  
        ?>
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modaltitle">Editar usuario:</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                  <form action="editar_usuario.php?DocumentoUsuario=<?php echo $fila['Documento'] ?>" method="post"
                    enctype="multipart/form-data">

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nombre</label>
                      <input type="text" class="form-control" name="NombreUsuario"
                        value="<?php echo $fila['Nombre'] ?>">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Correo</label>
                      <input type="text" class="form-control" name="CorreoUsuario"
                        value="<?php echo $fila['Correo'] ?>">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                      <input type="text" class="form-control" name="ContraseñaUsuario"
                        value="<?php echo $fila['Contraseña'] ?>">
                    </div>
                    <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Rol <?php echo $fila['Id_rol'] ?><br>1(admin) 2(vendedor) 3(usuario)</label>
              <select name="RolUsuario" id="" class="form-select" required>
                <option selected value="<?php echo $fila['Id_rol'] ?>">seleccione un rol</option>
                <?php 
                  while ($v=mysqli_fetch_array($sqli)) {
                    echo "<option value=" .$v[0].">".$v[1]."</option>";
                  }
                  ?>
              </select>
                    </div><br>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-dark">Enviar</button>
                      <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>


          <div class="modal fade" id="modaleliminar<?php echo $fila['Documento']?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modaltitle">Eliminar Usuario:</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                  <form action="eliminar_usuario.php?Documento=<?php echo $fila['Documento'] ?>" method="post"
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
      </tbody>
      <?php  } ?>
    </table>
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
  <script>
    var select_box_element = document.querySelector('#select_box');
    dselect(select_box_element, {
      search: true
    });
  </script>
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