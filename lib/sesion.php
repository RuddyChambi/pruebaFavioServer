<?php
	session_start();
	if (!$_SESSION['user_sesion']) 
	{
		header("location:../logout.php");/*direccionar al destructor de sistemas*/
	}
?>