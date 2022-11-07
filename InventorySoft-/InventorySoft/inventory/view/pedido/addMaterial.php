<?php

require_once('entity/Pedido.php');
require_once('entity/Cliente.php');
require_once('entity/Material.php');

?>

<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Agregar Materiales al Pedido";
include ('view/head.php');
?>
<body>
    <div class="container">
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <table class="table table-dark table-striped">
            <tr>
                <td>Factura del Pedido</td>
                <td><?php echo $pedido->factura; ?></td>
            </tr>
            <tr>
                <td>Fecha del Pedido</td>
                <td><?php echo $pedido->fecha; ?></td>
            </tr>
            <tr>
                <td>Nombre del Cliente</td>
                <td><?php echo $pedido->clienteObj->nombre . " " . $pedido->clienteObj->apellido; ?></td>
            </tr>
        </table>
        <br><br>
        <a href="index.php?obj=pedido&action=listarMateriales&id=<?php echo $pedido->id?>" class="btn btn-success">Agregar Materiales</a>
        <br><br>
        <br><br>
        <?php
        if (count($pedido->materiales)>0) {
            ?>
            <table class="table table-dark table-striped">
                <thead>
                    <th>Id</th>
                    <th>Nombres</th>
                    <th>Cantidad</th>
                    <th>Valor unidad</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    <?php
                    foreach($pedido->materiales as $material) {
                        echo "<tr>";
                        echo "<td>$material->id</td>";
                        echo "<td>$material->nombres</td>";
                        echo "<td>$material->cantidad</td>";
                        echo "<td>".$material->valorunidad."</td>";
                        echo "<td>";
                        echo "<a href='index.php?obj=pedido&action=deleteMaterial&id=$pedido->id&id_material=$material->id' class='btn btn-danger'>Eliminar</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "<h2>No existen Materiales</h2>";
        }
        ?>
    </div>
    <center><a href="index.php?obj=pedido" class="btn btn-secondary me-1">Volver</a></center>
</body>
</html>