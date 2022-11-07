<?php

include('conexion.php');

$nombre = $_POST["txtusuario"];
$pass 	= $_POST["txtpassword"];

if(isset($_POST["btnloginx"]))
{

$queryusuario = mysqli_query($conn,"SELECT * FROM login WHERE user = '$nombre'");
$nr 		= mysqli_num_rows($queryusuario); 
$mostrar	= mysqli_fetch_array($queryusuario); 
	
if (($nr == 1) && (password_verify($pass,$mostrar['pass'])) )
	{ 
		session_start();
		$_SESSION['nombredelusuario']=$nombre;
		header("Location: principal.php");
	}
else
	{
	echo "<script> alert('Usuario o contraseña incorrecto.');window.location= 'login.html' </script>";
	}
}

if(isset($_POST["btnregistrarx"]))
{

$queryusuario 	= mysqli_query($conn,"SELECT * FROM login WHERE user = '$nombre'");
$nr 			= mysqli_num_rows($queryusuario); 

if ($nr == 0)
{

	$pass_fuerte = password_hash($pass, PASSWORD_BCRYPT);
	$queryregistrar = "INSERT INTO login(user, pass) values ('$nombre','$pass_fuerte')";
	

if(mysqli_query($conn,$queryregistrar))
{
	echo "<script> alert('Usuario registrado: $nombre');window.location= 'login.html' </script>";
}

}else
{
		echo "<script> alert('No puedes registrar a este usuario: $nombre');window.location= 'login.html' </script>";
}

} 
?>