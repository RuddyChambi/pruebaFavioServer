<?php
	session_start(); //inicia una nueca sesion
	session_destroy(); // destruye toda la informacion registrada de una sesion
	header("location:index.php"); //redirecciona a la pagina de inicio
	exit();
	
?>