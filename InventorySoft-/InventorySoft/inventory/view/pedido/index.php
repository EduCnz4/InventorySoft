<?php
require_once('entity/Pedido.php');
require_once('entity/Cliente.php');
?>
<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Lista de Pedidos";
include ('view/head.php');
?>
<body>
    <div class="container">
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <a href="index.php?obj=pedido&action=agregar" class="btn btn-success">Crear Pedido</a>
        <br><br>
        <?php
        if (count($pedidos)>0) {
            ?>
            <table class="table table-dark table-striped">
                <thead>
                    <th>Id</th>
                    <th>#Factura</th>
                    <th>Fecha Entrega</th>
                    <th>Cliente</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    <?php
                    foreach($pedidos as $pedido) {
                        echo "<tr>";
                        echo "<td>$pedido->id</td>";
                        echo "<td>$pedido->factura</td>";
                        echo "<td>$pedido->fecha</td>";
                        echo "<td>".$pedido->clienteObj->nombre." ".$pedido->clienteObj->apellido."</td>";
                        echo "<td>";
                        echo "<a href='index.php?obj=pedido&action=editar&id=$pedido->id' class='btn btn-warning me-1'>Editar</a>";
                        echo "<a href='index.php?obj=pedido&action=eliminar&id=$pedido->id' class='btn btn-danger me-1'>Eliminar</a>";
                        echo "<a href='index.php?obj=pedido&action=ver&id=$pedido->id' class='btn btn-secondary me-1'>Ver</a>";
                        echo "<a href='index.php?obj=pedido&action=addMaterial&id=$pedido->id' class='btn btn-primary'>Add Material</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo $pedido->fecha;
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "<h2>No existen Pedidos</h2>";
        }
        ?>
    </div>
    <center><a href="index.php?obj=menu" class="btn btn-secondary me-1">Volver</a></center>
</body>
</html>