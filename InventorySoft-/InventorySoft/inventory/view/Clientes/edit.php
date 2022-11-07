<?php

require_once('C:\wamp64\www\InventorySoft\inventory\entity\Cliente.php');

?>

<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Modificar Clientes";
include ('C:\wamp64\www\InventorySoft\inventory\view\head.php');
?>
<body>
    <div class="container">
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $cliente->id; ?>" />
            <input class="form-control" type="text" name="nombre"  value="<?php echo $cliente->nombre; ?>" />
            <input class="form-control" type="text" name="apellido"  value="<?php echo $cliente->apellido; ?>" />
            <input class="form-control" type="text" name="telefono"  value="<?php echo $cliente->telefono; ?>" />
            <button class="btn btn-success" type="submit">Modificar Cliente</button>
        </form>
    </div>
    <center><a href="index.php?obj=cliente" class="btn btn-secondary me-1">Volver</a></center>
</body>
</html>