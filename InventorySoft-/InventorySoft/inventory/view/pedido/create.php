<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Crear de Pedido";
include ('view/head.php');
?>
<body>
    <div class="container">
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <form method="post">
            <input class="form-control" type="text" name="factura" placeholder=" Ingrese Factura del Pedido"/>
            <input type= "date" class="form-control" name="fecha" placeholder="Ingrese Fecha de entrega del Pedido" value="<?php echo date("Y-m-d"); ?>" required/>
            <select class="form-control" id="cliente" name="cliente">
                <?php
                foreach ($clientes as $cliente) {
                    echo "<option value='".$cliente->id."'>".$cliente->nombre." ".$cliente->apellido."</option>";
                }
                ?>
            </select>
            <button class="btn btn-success" type="submit">Crear Pedido</button>
        </form>
        
        
    </div>
    <center><a href="index.php?obj=pedido" class="btn btn-secondary me-1">Volver</a></center>
</body>
</html>