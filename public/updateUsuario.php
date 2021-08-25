<?php
	include "../lib/config.php"; 
	include "../lib/database.php"; 
	include "../lib/sesion.php";
	$id = $_GET['id_login']; 
	$db = new Database(); 
	$query = "SELECT * FROM tbl_login WHERE id_login=$id"; 
	$getData = $db->select($query)->fetch_assoc();

		if(isset($_POST['submit'])){
		   $nombre = mysqli_real_escape_string($db->link, $_POST['nombre']); 
		   $apaterno = mysqli_real_escape_string($db->link, $_POST['apaterno']);
		   $amaterno = mysqli_real_escape_string($db->link, $_POST['amaterno']);
		   $user = mysqli_real_escape_string($db->link, $_POST['user']); 
		   $pass = mysqli_real_escape_string($db->link, $_POST['pass']); 
		   $rol_id = mysqli_real_escape_string($db->link, $_POST['rol_id']);
		   
		   if($nombre == '' || $apaterno == '' || $amaterno == '' || $user == '' || $pass == '' || $rol_id ==''){
		    $error = "Los campos no deben estar vacios!!!!!";
		    }
		   else{
 				/*================= ACTUALIZAR DATOS ================*/ 
 				$query = "UPDATE tbl_login
				  			 SET  nombre = '$nombre', 
											apaterno= '$apaterno', 
											amaterno = '$amaterno', 
											user = '$user', 
											password = '$pass',
											rol_id = '$rol_id' 
				 				 WHERE id_login = '$id'";

			        $update = $db->updateUser($query, $user);
	   }
    }
	  /*=================== ELIMINAR DATOS ===============*/ 
	  if(isset($_POST['delete'])){ 
		  $query = "DELETE FROM tbl_login WHERE id_login=$id"; 
		  $deleteData = $db->deleteUser($query);
	  }
	  ?>

  <!DOCTYPE html>
  <html lang="en"> 
	<head>
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit-no"> 
		<meta name="description" content=""> 
		<meta name="author" content="Marco Antonio Dorado Gomez">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit-no" >
		<link rel="shortcut icon" type="image/x-icon" href="../img/doradito.png"> 
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<title>Dashboard Template · Bootstrap</title> 
	</head> 
	<body>
	<!--==============================================NAV BARCE=====================--> 
	<nav class="navbar navbar-expand-lg navbar-light bg-dark" >
		<section class="container-fluid">
			<a class="navbar-brand text-white" href="#">SISTEMA DE CONTROL Y ATENCION</a> 
			<button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#colapsador1" aria-controls="colapsadori" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span> 
			</button> 
			<div class="collapse navbar-collapse" id="colapsador1">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
					<li class="nav-item"><a class="nav-link active text-white" aria-current="page" href="#">Home</a></li> 
					<li class="nav-item"><a class="nav-link text-white" href="#">Galeria</a></li> 
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Insumos</a>  
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#">ALMUERZOS</a></li> 
                            <li><a class="dropdown-item" href="#">PLATOS EXTRA</a></li> 
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
     <!--==============================================END NAV BAR=====================--> 
   
   <section class="container-fluid">
  	<section class="row"> 
  		<aside id="colapsador1" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"> 
  			<div class="list-group"> 
  				<ul class="nav flex-column">
                  <!-- colocar el logo de la empresa--> 
                  <center class="mb-4 mt-2"><li class="nav-item justify-content-center"><a href=""><img src="../img/logo4.jpeg" alt="" width="200" height="250"></li></center> 
                  <li class="nav-item"><a class="list-group-item list-group-item-action" href="presentacion.php"><span data-feather="file"></span>IR A INICIO</a></li> 
                  <li class="nav-item"><a class="list-group-item list-group-item-action" href="listaUsuarios.php">MOSTRAR USUARIOS</a></li> 
                  <li class="nav-item"><a class="list-group-item list-group-item-action" href="registrar.php">REGISTRAR USUARIOS</a></li> 
                  <li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR INSUMOS</a></li> 
                  <li class="nav-item"><a class="list-group-item list-group-item-action" href="#">MOSTRAR CLIENTES</a></li> 
                  <li class="nav-item"><a class="list-group-item list-group-item-action" href="#">VENTAS </a></li> 
                  <li class="nav-item"><a class="list-group-item list-group-item-action font-weight-bold" href="../logout.php"> SALIR DE SISTEMA</a></li>
                </ul>
            </div>
        </aside> 
        <main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-md-4"> 
        	<article class="container mt-1">
				<!-- ==================== ARTICULO DE PRESENTACION =================-->

    <form action="updateUsuario.php?id_login=<?php echo $id; ?>" method="POST" class="col-lg-6">
				<?php 
		  			if(isset($error)) { 
		  				echo "<center><div class='alert alert-danger'> <span>".$error."</span></div></center>";
		  			}	
				?>
	 		 <h2 class="display-6 text-danger fw-bold text-uppercase mb-5"><center>Actualizar Datos </center> </h2 >
	  <div class="mb-3">
		<input type="text" class="form-control text-primary" placeholder="Rergistrar nombre" name="nombre" id="nombre" value="<?php echo $getData['nombre'] ?>" >
	  </div> 
	  <div class="mb-3">
	  	<input type="text" class="form-control text-primary" placeholder="Registrar apellido" name="apaterno" id="apaterno" value="<?php echo $getData['apaterno'] ?>"> 
	  </div> 
	  <div class="mb-3">
	  	<input type="text" class="form-control text-primary" placeholder="Registrar pseudonimo" name="amaterno" id="amaterno" value="<?php echo $getData['amaterno'] ?>">
	  </div>
	  <div class="mb-3">
	  	<input type="text" class="form-control text-primary" placeholder="Registrar nueva contraseña" name="user" id="user" value="<?php echo $getData['user'] ?>">
	  </div> 
	  <div class="mb-3">
	  	<input type="password" class="form-control" placeholder="Registrar nueva contrasena" name="pass" id="pass" value=""> 
	  </div> 
	  <select name="rol_id" id="rol_id" class="form-control mb-5 text-primary">
	  			<option value="<?php echo $getData['rol_id'] ?>"selected> <?php echo $getData['rol_id'] ?> </option>
	  			<option value="1">Administrador</option> 
	  			<option value="2">Colaborador</option> 
	  			<option value="3">Secretaria</option> 
	  			<option value="4">invitado</option>
	  			<option value="5">cliente</option>
	  </select> 
	  <div class="mb-3"> 
	  	<center>
			<button type="submit" name="submit" id="submit" class="btn btn-primary">Guardar</button> 
			<button type="submit" name="delete" id="delete" value="Delete" class="btn btn-danger">Eliminar</button>
			<a href="listaUsuarios.php" class="btn btn-info">Cancelar</a> 
		</center> 
	</div> 
</form>
<!--======================== END OF ARTICULO DE PRESENTACION ============--> 
</article> 
</main >
</section>
<!-- PIE DE LA PAGINA --> 
<hr> 
<footer class="blockquote-footer text-center"> 
	<address>
		<small class="font-weight-bold text-uppercase"> &copy;todos los derechos reservados</small><br>
		<p class="lead font-weight-bold">LUZ VIRGINIA VASQUEZ QUISBERT<br>LA PAZ - BOLIVIA <br> 2021</p> 
	</address> 
</footer> 
</section>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/popper.min.js"></script> 
</html>
