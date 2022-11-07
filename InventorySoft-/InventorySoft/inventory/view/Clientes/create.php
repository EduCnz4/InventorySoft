<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Crear Cliente";
include ('view/head.php');
?>
<body>
    <div class="container">
        <h1 style="color:aliceblue" class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <form method="post">
            <input class="form-control" type="text" name="nombre" placeholder="Ingrese Nombre del Cliente" />
            <input class="form-control" type="text" name="apellido" placeholder="Ingrese Apellido del Cliente" />
            <input class="form-control" type="number" name="telefono" placeholder=" Ingrese Telefono del Cliente"/>
            <button class="btn btn-success" type="submit">Agregar Nuevo Cliente</button>
        </form>
        
        
    </div>
    
</body>
</html>