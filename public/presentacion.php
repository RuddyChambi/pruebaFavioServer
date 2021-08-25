<?php
    include "../lib/config.php";
    include "../lib/dataBase.php";
    include "../lib/sesion.php";
    $user = $_GET['msg']; /*obteniendo el id desde SigIn*/

?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=""> 
    <meta name="author" content="Favio Hernan Acarapi Callisaya"> 
    <meta name="viewport" content="width=device-width, initial-scale-1, shrink-to-fit=no"> 
    <link rel="shortcut icon" type="image/x-icon" href="../img/prueba.png"> 
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <title>Dashboard Template · Bootstrap</title>
 </head> 
 <body>
    <!-- =============================NAV BAR=======================================-->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark" >
        <section class="container-fluid">
            <a class="navbar-brand text-white" href="#">SISTEMA DE VENTAS Y CONTROL DE PRODUCTOS</a> 
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#colapsador1" aria-controls="colapsador1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> 
            </button> 
            <div class="collapse navbar-collapse" id="colapsador1"> 
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
                    <li class="nav-item"><a class="nav-link active text-white" aria-current="page" href="#">Home</a></li> 
                    <li class="nav-item"><a class="nav-link text-white" href="#">Galeria</a></li> 
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Productos</a> 
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">CORTINAS</a></li> 
                            <li><a class="dropdown-item" href="#">STORES</a></li> 
                            <li><a class="dropdown-item" href="#">RIELES</a></li>
                            <li><a class="dropdown-item" href="#">PERCIANAS</a></li> 
                            <li><a class="dropdown-item" href="#">ROLERS DUOS</a></li> 
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item"_href="#">OTROS PRODUCTOS</a></li> 
                        </ul> 
                    </li>
                    <li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a></li> 
                </ul>
                <h2 class="d-flex text-light"><?php echo $user; ?></h2>
            </div> 
        </section> 
    </nav>
   <!--=============================END NAV BAR=======================-->
   <section class="container-fluid">
      <section class="row"> 
          <aside id="colapsador1" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"> 
             <div class="list-group"> 
                 <ul class="nav flex-column">
                     <!-- colocar el logo de la empresa--> 
                     <center class="mb-4 mt-2"><li class="nav-item justify-content-center"><a href=""><img src="../img/logocreaciones.png" alt="" width="200" height="250"></li></center> 
                     <li class="nav-item"><a class="list-group-item list-group-item-action" href="principal.php"><span data-feather="file"></span>IR A INICIO</a></li> 
                     <li class="nav-item"><a class="list-group-item list-group-item-action" href="listaUsuarios.php">MOSTRAR USUARIOS</a></li> 
                     <li class="nav-item"><a class="list-group-item list-group-item-action" href="registrar.php">REGISTRAR USUARIOS</a></li> 
                     <li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR PRODUCTOS</a></li>
                     <li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR CLIENTES</a></li>
                     <li class="nav-item"><a class="list-group-item list-group-item-action" href="#">VENTAS</a></li> 
                     <li class="nav-item"><a class="list-group-item list-group-item-action font-weight-bold" href="../logout.php"> SALIR DE SISTEMA</a></li>
                 </ul>
             </div>
         </aside>
         <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <article class="container mt-1 bg-dark text-light">

                <!--=== ARTICULO DE PRESENTACION VENTAS ====-->

                <div class="row featurette"> 
                    <div class="col-md-9">
                        <h2 class="featurette-heading"> <center>CREACIONES "BRANDON" </center></h2> 
                        <h3 class="text-warning">QUIENES SOMOS?</h3> 
                        <p class="lead">Somos productores de creaciones con textiles y ofrece a la población trabajos en tela como ser: Cortinas, fundas para living, rollers, persianas, fundas en toda clase de tela, Stores, Cenefas, Tubos de madera rieles y distintas variedades de tela.  </p> <h3 class="text-warning">CONTACTO</h3> 
                        <p class="lead">Galería Tocuyeros La Paz-Bolivia - Calle Santa Cruz Local 5</p>
                    </div> 
                    <div class="col-lg-3 col-md-12">
                        <img src="../img/cubiertos.jpg" alt="" class="img-fluid mt-3">
                    </div>
                </div>
                <hr class="featurette-divider">
                <!-- ===================== END OF ARTICULO DE PRESENTACION VENTAS===========-->
            </article>
            <article class="container mb-3 bg-light">
                <!-- ========== ARTICULO DE PRESENTACION ESTUDIANTE=====-->
                <hr class="featurette-divider">
                  <div class="row featurette"> 
                     <div class="col-md-7">
                          <h2 class="text-dark">Presentacion del Proyecto<span class="text-muted"></span></h2> 
                          <h3 class="text-warning">Nombre: </h3>
                          <p class="lead">FAVIO HERNAN ACARAPI CALLISAYA</p>
                          <h3 class="text-warning">Edad:</h3> 
                          <p class="lead">23 años</p> 
                          <h3 class="featurette-heading text-danger">Tipo del proyecto:</h3> 
                          <p class="lead">PROYECTO ORIENTADO A LA WEB</p> 
                          <h3 class="featurette-heading text-danger">Objetivos Específicos:</h3>
                          <li class="lead">Investigar las actividades, acciones y tareas realizadas dentro del restaurante, para así poder ayudarnos con toda la información para poder desarrollar este proyecto</li> 
                          <li class="lead">Diseñar la base de datos para la tienda, para que el mismo sea el repositorio de los datos que serán utilizados por el sistema de información</li> 
                          <li class="lead"> Registrar la información de todos los clientes</li>
                          <li class="lead">Diseñar interfaces del sistema de modo que sea fácil de entender y utilizar el registro de ventas, clientes.</li>
                          <li class="lead">Desarrollar los módulos de compras y control de productos</li>
                      </div>
                      <div class="col-lg-5 col-md-12"><!--colocar la foto del desarrollador-->
                        <img src="../img/ima1.jpg" alt="" class="bd-placeholder-img bd-placeholder-img-1g featurette-image img-fluid" width="800">
                      </div> 
                   </div> 
               <hr class="featurette-divider">
               <!--=== END OF ARTICULO DE PRESENTACION ESTUDIANTE=====--> 
           </article>
       </main> 
   </section>
   <!-- PIE DE LA PAGINA --> 
   <hr> 
      <footer class="blockquote-footer text-center">
           <address>
              <small class="font-weight-bold text-uppercase">&copy; todos los derechos reservados</small><br>
              <p class="lead font-weight-bold">FAVIO HERNAN ACARAPI CALLISAYA<br>LA PAZ - BOLIVIA <br> 2021</p> 
           </address> 
       </footer>
        <!-- END PIE DE LA PAGINA--> 
</section> 
<script src="../js/bootstrap.min.js"></script>
<script src="../js/popper.min.js"></script> 
</body>
</html>



