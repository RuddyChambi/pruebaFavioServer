<?php
   include "../lib/config.php"; 
   include "../lib/database.php"; 
   include "../lib/sesion.php";
?>
<?php
    $db = new Database(); 
    $query = "SELECT * FROM tbl_login"; 
    $read = $db->select($query);
?>

<!DOCTYPE html> 
<html lang="en"> 
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=""> 
    <meta name="author" content="Luz Virginia Vasquez Quisbert"> 
    <meta name="viewport" content="width=device-width, initial-scale-1, shrink-to-fit=no"> 
    <link rel="shortcut icon" type="image/x-icon" href="../img/prueba.png"> 
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
   <title> Dashboard Template • Bootstrap </title> 
 </head> 
<body>
<!-- ===================EEEEEEEEEENAV BAREEE==================-->
   <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <section class="container-fluid">
        <a class="navbar-brand text-white" href="#">CREACIONES "BRANDON"</a> 
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#colapsador1" aria-controls="colapsador1" aria-expanded="false" aria-label ="Toggle navigation">
            <span class="navbar-toggler-icon"></span> 
        </button> 
<div class="collapse navbar-collapse" id="colapsador1"> 
	<ul class="navbar-nav me-auto mb-2 mb-lg- text-white">

        <li class="nav-item"><a class="nav-link active text-white" aria-current="page" href="#">Home</a></li> 
                    <li class="nav-item"><a class="nav-link text-white" href="#">Galeria</a></li> 
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">PRODUCTOS</a> 
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">CORTINAS</a></li> 
                            <li><a class="dropdown-item" href="#">STORES</a></li> 
                            <li><a class="dropdown-item" href="#">PLATOS ESPECIALES</a></li>
                            <li><a class="dropdown-item" href="#">POSTRES ESPECIALES</a></li> 
                            <li><a class="dropdown-item" href="#">REFRESCOS</a></li> 
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item"_href="#">OTROS PRODUCTOS</a></li> 
                        </ul> 
                    </li>

        <li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a></li> 
    </ul> 
</div> 
</section>
</nav> 

<!-- =============== ========== END NAV BAR======= ==========--->

<section class="container-fluid">
        <section class="row"> 
        	<aside id="colapsador1" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"> 
        		<div class="list-group"> 
        			<ul class="nav flex-column">

                      <!-- colocar el logo de la empresa--> 

                      <center class="mb-4 mt-2"><li class="nav-item justify-content-center" ><a href=""><img src="../img/logo4.jpeg" alt="" width="100"></lix></center>  
                      	<li class="nav-item"><a class="list-group-item list-group-item-action" href="presentacion.php?msg=<?php echo urlencode($user); ?>"><span data-feather="file"></span> IR A INICIO</a></li> 
                      	<li class="nav-item"><a class="list-group-item list-group-item-action" href="">MOSTRAR USUARIOS </a></li> 
                      	<li class="nav-item"><a class="list-group-item list-group-item-action" href="registrar.php">REGISTRAR USUARIOS</a></li> 
                      	<li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR PRODUCTOS</a></li> 
                      	<li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR MOSTRAR ESTADISTICAS</a></li>
                        <li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR ACTIVOS DE LA EMPRESA </a></li>
                        <li class="nav-item"><a class="list-group-item list-group-item-action font-weight-bold" href="../logout.php">SALIR DE SISTEMA</a></li> 
                    </ul> 
                </div> 
            </aside> 
            <main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-md-4"> 
            	<article class="container">
<!--=== ARTICULO DE PRESENTACION  ========-->


<?php
     if(isset($_GET['msg1']))
     {
        echo "<div class='alert alert-success fw-bold fs-5 text-end'><span>".$_GET['msg1']."</span></div>";
     } ?>
 <b class="display-4 text-center text-danger text-uppercase text-success mb-3">Lista de usuarios</b> 
 <table id="tabla_dinamica" class="table table-hover">
        <thead class="thead-dark"> 
            <tr>
               <th scope="col">Numero</th>
               <th scope="col">Nombres</th>
               <th scope="col">Apaterno</th> 
               <th scope="col">Amaterno</th> 
               <th scope="col">Correo</th> 
               <th scope="col">Cargo</th> 
               <th scope="col">Fecha_Creacion</th>
               <th scope="col">Foto</th>
               <th scope="col">Accion</th> 
            </tr>
        </thead> 
        <tbody> 
 <?php foreach ($read as $row) {?> 
    <tr>
        <td><?php echo $row['id_login']; ?></td> 
        <td><?php echo $row['nombre']; ?></td> 
        <td><?php echo $row['apaterno']; ?></td> 
        <td><?php echo $row['amaterno']; ?></td>  
        <td><?php echo $row['user']; ?></td> 
        <td><?php echo $row['rol_id']; ?></td> 
        <td><?php echo $row['fecha_creacion']; ?></td>
        <td><img class="img-thumbnail"  width="100px" src="../img/<?php echo $row['foto'];?>"></td>


        <td><a href="updateUsuario.php?id_login=<?php echo urlencode($row['id_login']); ?>" class="btn btn-primary btn-sm">Editar</a></td>
    </tr> 
<?php } ?>

</tbody> 
</table>

<!--===== END OF ARTICULO DE PRESENTACION ESTUDIANTE======== -->




    </article> 
  </main> 
</section>

<!-- PIE DE LA PAGINA-->

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
</html>

  

