<?php

require_once('entity\Material.php');

?>

<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Editar Stock";
include ('C:\wamp64\www\InventorySoft\inventory\view\head.php');
?>
<body>
    <div class="container">
        <br><br><br>
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
        <br>
        <br>
        <br><br>
        <?php
        echo "<h3> Indique la cantidad del material:</h3> <h2> -> $material->nombres </h2> <h2> que considera óptima mantener siempre en inventario para cumplir con su producción </h3>";
        ?>
        <br><br>
        <form method="post">
            <input class="form-control" type="number" name="stock"  value="<?php echo $material->stock; ?>" />
            <button class="btn btn-success" type="submit">Editar</button>
        </form>
    </div>
    <br><br><br>
    <center><a href="index.php?obj=material" class="btn btn-secondary me-1">Volver</a></center>
</body>
</html>