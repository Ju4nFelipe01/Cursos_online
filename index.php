<!doctype html>
<?php
include "admin/config/Conexion.php";
$resultado = mysqli_query($conectar,"SELECT * FROM productos");
$productos=mysqli_fetch_all($resultado ,MYSQLI_ASSOC);
?>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cursos Online</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="shortcut icon" href="assets/imagenes/logo1.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,700;1,800&display=swap"
        rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <style type="text/css">
        body {

            font-family: 'Quicksand', sans-serif;
            margin: 0;


        }

        :root {

            --white: #FFFFFF;
            --black: #000000;
            --dark: #232830;
            --very-light-pink: #C7C7C7;
            --text-input-field: #F7F7F7;
            --hospital-green: #ACD9B2;
            --sm: 14px;
            --md: 16px;
            --lg: 18px;

        }

        .cards {
            width: 100%;
        }

        .maincontainer {
            width: 100%;
        }


        .cardcontainer {

            display: grid;
            grid-template-columns: repeat(auto-fill, 240px);
            gap: 80px;
            place-content: center;

        }

        .productcard {

            width: 240px;
        }

        .productcard img {


            width: 100%;
            height: 240px;
            border-radius: 20px;
            object-fit: cover;
        }


        .productinfo {

            display: flex;
            justify-content: space-between;
            align-items: center;
        }



        div p:nth-child(1) {

            font-weight: bold;
            font-size: var(--md);
            margin-top: 0px;
            margin-bottom: 4px;
        }

        div p:nth-child(2) {


            font-size: var(--sm);
            color: var(--very-light-pink);
            margin-top: 0;
            margin-top: 0;
        }

        @media (max-width:640px) {

            .cardcontainer {

                display: grid;
                grid-template-columns: repeat(auto-fill, 140px);
                gap: 30px;
            }

            .productcard {

                width: 140px;
            }

            .productcard img {


                width: 100%;
                height: 140px;
                border-radius: 20px;
                object-fit: cover;
            }

            .btn {
                width: 20px;

                margin-bottom: 8px;

            }




        }
    </style>

    <!-- cabezera de la pagina -->
    <header>
        <!-- barra de nacegacion -->
        <nav>
            <a href="login/registrese.php">Registrese|</a>
            <a href="./login/acciones/cerrar copy.php"> Cerrar sesion |</a>
            <a href="#"> Servicio|</a>
            <a href="#"> Contacto|</a>
        </nav>
        <section class="textos-header">
            <h1>El mejor lugar para aprender y disfrutar al 100%</h1>
            <h2>de los mejores <a href="./login/inicio.php">cursos online</a></h2><br>
            <a href="./login/inicio.php" class="btn btn-dark">INICIAR</a>

        </section>
        <div class="wave" style="height: 150px; overflow: hidden;">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #ffffff;">
                </path>
            </svg>
        </div>
    </header>
    <main>
        <!-- mas sobre nosotros -->
        <section class="contenedor sobre-nosotros">
            <h2 class="titulo">Nuestro producto</h2>
            <div class="contenedor-sobre-nosotros">
                <img src="assets/imagenes/ilustracion2.svg" alt="" class="imagen-about-us">
                <div class="contenido-textos">
                    <h3><span>1</span>Los mejores cursos de calidad</h3>
                    <p>Ofrecemos cursos online dinamicos, didacticos y con una calidad premium 100% garantizada los
                        cuales garantizaran su rapido acceso al mundo laboral</p>
                    <h3><span>2</span>Aprendisaje rapido, seguro y sencillo</h3>
                    <p>con todos los contenidos didacticos ofrecidos en nuestros diversos programas de aprendizaje
                        virtual le garantizamos al usuario un aprendisaje seguro y rapido, en conjunto con ejercicios
                        dinamicos</p>
                </div>
            </div>
        </section>
        <!-- tipos de cursos -->
        <section class="portafolio">
            <div class="contenedor">
                <h2 class="titulo">Tipos de cursos:</h2>
                <!-- galeria tipo cursos -->
                <div class="galeria-port">
                    <div class="imagen-port">
                        <!-- imagen tipo curso 1 -->
                        <img src="assets/imagenes/img1.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="assets/imagenes/icono1.png" alt="">
                            <a href="#" class="a">Programacion</a>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <!-- imagen tipo curso 2 -->
                        <img src="assets/imagenes/img2.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="assets/imagenes/icono1.png" alt="">
                            <a href="#" class="a">Fotografia</a>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <!-- imagen tipo curso 3-->
                        <img src="assets/imagenes/img3.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="assets/imagenes/icono1.png" alt="">
                            <a href="#" class="a">Microsoft</a>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <!-- imagen tipo curso 4-->
                        <img src="assets/imagenes/img4.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="assets/imagenes/icono1.png" alt="">
                            <a href="#" class="a">Cocina</a>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <!-- imagen tipo curso 5-->
                        <img src="assets/imagenes/img5.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="assets/imagenes/icono1.png" alt="">
                            <a href="#" class="a">Idiomas</a>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <!-- imagen tipo curso 6-->
                        <img src="assets/imagenes/img6.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="assets/imagenes/icono1.png" alt="">
                            <a href="#" class="a">Emprendimiento</a>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <!-- imagen tipo curso 7-->
                        <img src="assets/imagenes/img7.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="assets/imagenes/icono1.png" alt="">
                            <a href="#" class="a">Arte</a>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <!-- imagen tipo curso 8-->
                        <img src="assets/imagenes/img8.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="assets/imagenes/icono1.png" alt="">
                            <a href="#" class="a">Contenido digital</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- algunos cursos -->

        <h2 class="titulo">algunos de nuestros cursos</h2>


        <div class="maincontainer">

            <div class="cardcontainer">
                <?php foreach($productos as $producto) { ?>

                <div class="productcard">



                    <img src="data:image/jpg;base64,<?php echo base64_encode($producto['Imagen'])?>">

                    <div class="productinfo">
                        <div>
                            <p>$
                                <?php echo $producto['Valor']; ?>pesos
                            </p>
                            <p>
                                <?php echo $producto['Nombre']; ?>
                            </p>
                        </div>
                        <div class="logoañadir">
                            <a href="curso.php?Id_producto=<?php echo $producto['Id']?>" class="btn btn-dark">INICIAR</a>
                        </div>
                    </div>


                </div>
                <?php  } ?>
            </div>


        </div>



        <!-- servicios -->
        <section class="about-services">
            <div class="contenedor">
                <h2 class="titulo">nuestos servicios</h2>
                <div class="servicio-cont">
                    <!-- imagen servicio 1 -->
                    <div class="servicio-ind">
                        <img src="assets/imagenes/ilustracion2.svg" alt="">
                        <h3>servicio 1</h3>
                        <p>descripcion servicio 1: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque,
                            officia!</p>
                    </div>
                    <!-- imagen servicio 2 -->
                    <div class="servicio-ind">
                        <img src="assets/imagenes/ilustracion3.svg" alt="">
                        <h3>servicio 2</h3>
                        <p>descripcion servicio 2: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque,
                            officia!</p>
                    </div>
                    <!-- imagen servicio 3 -->
                    <div class="servicio-ind">
                        <img src="assets/imagenes/ilustracion4.svg" alt="">
                        <h3>servicio 3</h3>
                        <p>descripcion servicio 3: Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque,
                            officia!</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- footer -->
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>