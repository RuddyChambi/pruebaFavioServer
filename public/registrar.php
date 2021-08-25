<?php
	include "../lib/config.php";
	include "../lib/sesion.php";
	include "../lib/DataBase.php";

	/*====== REGISTAR USUARIOS ==========================*/
  $db = new Database();
  if (isset($_POST['submit'])) {
  	$nombre = mysqli_real_escape_string($db-> link, $_POST ['nombre']);
  	$apaterno= mysqli_real_escape_string($db-> link, $_POST ['apaterno']);
  	$amaterno = mysqli_real_escape_string($db-> link, $_POST ['amaterno']);

  	$user = mysqli_real_escape_string($db-> link, $_POST ['user']);
  	$contra = mysqli_real_escape_string($db-> link, $_POST ['pass']);
  	$rol = mysqli_real_escape_string($db-> link, $_POST ['rol']);
  	$foto = (isset($_FILES['foto']['name']))?$_FILES['foto']['name']:"";//agregar ubicacion de imagen


  	if ($nombre == '' || $apaterno == '' || $amaterno == '' || $user == '' || $contra == '' || $rol == '' || $foto == '') 
  	{

  		header('Location:registrar.php?msg='.urlencode('Debe llenar los campos'));
  	} else{
  		/*codigo pàra alamcenar el tiempo que se guardo la imagen para que no exista duplicado en nombre de archivos*/
  		
  		$fecha = new DateTime();
  		$nomArchivo = ($foto!="")?$fecha->getTimestamp()."_".$_FILES["foto"]["name"]:"avatar.png";
  		$tmpfoto=$_FILES["foto"]["tmp_name"];
  		/*encriptando la contrasenia*/

  		$pass_cifrado = password_hash($contra, PASSWORD_DEFAULT);
  		$query = "INSERT INTO tbl_login (nombre , apaterno, amaterno, user, password, foto, rol_id)
  			VALUES ('$nombre', '$apaterno', '$amaterno', '$user', '$pass_cifrado','$nomArchivo', '$rol')";

  			if($tmpfoto != "")
  			{
  				move_uploaded_file($tmpfoto, "../img/".$nomArchivo);
  			}
  		$create = mysqli_insert_id($db->registerUser($query, $user));
  	}

  }

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name=author content="Estudiante Favio Hernan Acarapi Callisaya"> 
    <meta name="KEYWORDS" content="inicio con bootstrap forms, formulario, login">
    <meta name="description" content="Formulario bootstrp5">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>PRÁCTICA DOS - PHP-POO</title> 
    <link rel="shortcut icon" type="image/x-icon" href="../img/prueba.png">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
	<section class="container">
		<div class="row bg-light">
	    	<div class="my-2"></div> 
	    	<div class="col-sm-12 col-md-12 col-lg-6 float-left my-5"> 
	    		<article class="" style="text-align: justify;">,
					<h3 class="display-4 text-uppercase text-center font-weight-bold">PROYECTO</h3> 
					<h4 class="text-uppercase text-danger font-italic">SISTEMA WEB DE CONTROL DE VENTAS Y ORGANIZACION DE PRODUCTOS</h4> 
					<p class="lead text-justify font-weight-bold font-italic">Software para el control de ventas y organizacion de productos en la EMPRESA "Creaciones Brandon"
					</p> 
					<h4 class="text-uppercase text-danger font-italic">Objetivo General del proyecto:</h4> 
					<p class="lead text-justify font-weight-bold font-italic">
						 Implementar un sistema Web para el control de  ventas y organizacion de productos ,optimizando el tiempo en la centralización de los productos y de acceso a la información, además de automatizar todos los procesos manuales que ocurren en la empresa.
					</p> 
				</article> 
			</div> 
			<div class="col-sm-12 col-md-12 col-lg-6 float-right my-2"> 
				<form class="bg-secondary p-3 m-5 rounded" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"    enctype ="multipart/form-data"> 
					<?php
						if(isset($_GET['msg'])){/*obtiene el mensaje que manda el checklogin a la url*/ 
						echo "<center><div class='alert alert-danger'><span>" .$_GET['msg']."</span></div></center>";
						}
						?>
					<?php
						error_reporting(E_ALL ^E_NOTICE);/* deja de mostrar notificaciones*/ 
						if ($_GET["error"]=="si") {
							echo '<div class="alert alert-danger" role="alert"><center><strong>Ops!-Verifica tus datos.</strong></center></div>';
						}
						else{ echo "";}
						?>	
						<h2 class="display-5 text-center fw-bold"> REGISTRAR USUARIOS</h2>
						<div class="form-group mb-3">
							<input type="text" class="form-control" placeholder="Introduzca nombres" name="nombre" id="nombre"> 
						</div> 
						<div class="form-group mb-3">
							<input type="text" class="form-control" placeholder="Introduzca apellido paterno" name="apaterno" id="apaterno"> 
						</div> 
						<div class="form-group mb-3">
							<input type="text" class="form-control" placeholder="Introduzca apellido materno" name="amaterno" id="amaterno"> 
						</div>  
						<div class="form-group mb-3">
							<input type="email" class="form-control" placeholder="Introduzca correo" name="user" id="user"> 
						</div> 
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Introduzca contraseña" name="pass" id="pass"> 
						</div> 
						<select name="rol" id="rol" class="form-control mt-3">
							<option value=""> - Seleccionar roles de usuario - </option>
							<option value="1">Administrador</option>
							<option value="2">Colaborador</option>
							<option value="3">Invitado</option>
							<option value="4">Secretario</option>
							<option value="5">Cliente</option>

						</select>

						<div class="input-group mb-3">
							<input type="file" accept="image/*" name="foto" id="foto" class="form-control mt-3"> 
						</div>


						<div class="my-4">
							<label class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input"> 
								<span class="custom-control-indicator"></span>
								<span class="custom-control-description text-dark">Recordar contraseña en esta computadora</span>
							</label> 
						</div> 
						<div class="form-group d-grid gap-2 mb-3">
							<button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg">Guardar Datos</button>
							<span><a class="btn btn-warning btn-block btn-lg d-grid gap-2" href="registrar.php">Limpiar Datos</a></span>
							<span><a class="btn btn-danger btn-block btn-lg d-grid gap-2" href="presentacion.php">Salir del Registro</a></span>  
						</div>
				</form> 
			</div> 
		</div>
	</section>
    <script src="js/bootstrap.bundle.min.js"></script> 
    <script src="js/popper.min.js"></script> 
</body>
</html>	
