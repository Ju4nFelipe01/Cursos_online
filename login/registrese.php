<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <style>
    h1 {
      display: flex;
      gap: 20px;

    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    .background-radial-gradient {

      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }

    .registrarse {
      display: flex;
      justify-content: center;

    }

    .registro {
      display: flex;
      justify-content: center;
      gap: 10px;

    }

    @media (max-width:991px) {
      h1 {
        justify-content: center;
      }
    }
  </style>
  <div class="login ">
    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden">


      <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5">
          <div class="col-lg-6 mb-5 mb-lg-0 titulo" style="z-index: 10">
            <a href="../index.php" class="my-5 display-5 fw-bold ls-tight"
              style="color: hsl(218, 81%, 95%); text-decoration:none;">
              Cursos </a>
            <a href="../index.php" class="my-5 display-5 fw-bold ls-tight"
              style="color: hsl(218, 81%, 75%); text-decoration:none;">Online</a><br>
            <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
              Pfrecemos cursos online dinamicos, didacticos y con una calidad premium 100% garantizada los cuales
              garantizan su rapido acceso al mundo laboral.
            </p>
          </div>

          <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
            <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
            <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

            <div class="card bg-glass">
              <div class="card-body px-4 py-5 px-md-5">
                <form action="acciones/guardar.php" method="post" enctype="multipart/form-data">

                  <h2> Iniciar sesion</h2>

                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input input type="number" class="form-control" id="exampleInputEmail1" name="Documento"
                          required />
                        <label class="form-label" for="form3Example1">Documento</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="Nombre" required />
                        <label class="form-label" for="form3Example2">Nombre</label>
                      </div>
                    </div>
                  </div>

                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="text" class="form-control" id="exampleInputEmail1" name="Correo" required />
                    <label class="form-label" for="form3Example3">Correo</label>
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" class="form-control" id="exampleInputPassword1" name="Contraseña" required />
                    <label class="form-label" for="form3Example4">Contraseña</label>
                  </div>




              </div>
              <div class="registrarse">
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">
                  Registrarse
                </button>

              </div>

              <div class="registro">
                <p>Ya tienes cuenta? </p>
                <a href="iniciar_sesion.php"> ingresar</a>
              </div>

              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
  </section>
  <!-- Section: Design Block -->
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
</body>

</html>