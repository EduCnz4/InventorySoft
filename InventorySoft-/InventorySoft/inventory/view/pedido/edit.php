<?php

require_once('entity/Pedido.php');
require_once('entity/Cliente.php');

?>

<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Editar de Pedido";
include ('view/head.php');
?>
<body>
    <div class="container">
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $pedido->id; ?>" />
        
            <input class="form-control" type="text" name="factura" value="<?php echo $pedido->factura; ?>" />
            <input type= "date" class="form-control" name="fecha" placeholder="Ingrese Fecha de entrega del Pedido" value="<?php echo date("Y-m-d"); ?>" required/>
            <select class="form-control" id="cliente" name="cliente">
                <?php
                foreach ($clientes as $cliente) {
                    if ($pedido->cliente == $cliente->id) {
                        echo "<option selected value='".$clienter->id."'>".$cliente->nombre." ".$cliente->apellido."</option>";
                    } else {
                        echo "<option value='".$cliente->id."'>".$cliente->nombre." ".$cliente->apellido."</option>";
                    }
                    
                }
                ?>
            </select>
            <button class="btn btn-success" type="submit">Modificar Pedido</button>
        </form>
    </div>
    <center><a href="index.php?obj=pedido" class="btn btn-secondary me-1">Volver</a></center>
</body>
</html>