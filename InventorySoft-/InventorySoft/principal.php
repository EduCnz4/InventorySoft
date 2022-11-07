<link rel="stylesheet" href="login.css">
<div class="cajafuera">
<div class="pagprincipal">
	
<?php
include('conexion.php');
session_start();

if(isset($_SESSION['nombredelusuario']))
{
	$usuarioingresado = $_SESSION['nombredelusuario'];
	echo header('Location: inventory/index.php?obj=menu');
}
else
{
	header('location: login.html');
}
?>
<form method="POST">
<tr><td colspan='2' align="center"><input type="submit" value="Cerrar sesión" name="btncerrar" /></td></tr>
</form>

<?php 

if(isset($_POST['btncerrar']))
{
	session_destroy();
	header('location: login.html');
}
	
?>

</div>

</div>