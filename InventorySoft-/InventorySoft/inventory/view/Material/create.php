<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Ingresar Material";
include ('view/head.php');
?>
<body>
    <div class="container">
        <h1 style="color:aliceblue" class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <form method="post">
            <input class="form-control" type="text" name="nombres" placeholder="Ingrese Nombre del Material" />
            <input class="form-control" type="number" name="cantidad" placeholder="Ingrese Cantidad en unidades" />
            <input class="form-control" type="number" name="valorunidad" placeholder=" Ingrese el Valor por Unidad"/>
            <button class="btn btn-success" type="submit">Agregar Nuevo Material</button>
        </form>
        
        
    </div>
    <center><a href="index.php?obj=material" class="btn btn-secondary me-1">Volver</a></center>
</body>
</html>