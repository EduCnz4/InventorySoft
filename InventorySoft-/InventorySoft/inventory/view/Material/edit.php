<?php

require_once('C:\wamp64\www\InventorySoft\inventory\entity\Material.php');

?>

<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Modificar Material";
include ('C:\wamp64\www\InventorySoft\inventory\view\head.php');
?>
<body>
    <div class="container">
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $material->id; ?>" />
            <input class="form-control" type="text" name="nombres"  value="<?php echo $material->nombres; ?>" />
            <input class="form-control" type="number" name="cantidad"  value="<?php echo $material->cantidad; ?>" />
            <input class="form-control" type="number" name="valorunidad"  value="<?php echo $material->valorunidad; ?>" />
            <button class="btn btn-success" type="submit">Modificar Material</button>
        </form>
    </div>
    <center><a href="index.php?obj=material" class="btn btn-secondary me-1">Volver</a></center>
</body>
</html>