<?php
require_once('entity/Cliente.php');
?>
<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Lista de Clientes";
include ('view/head.php');
?>
<body>
    <div class="container">
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <a href="index.php?obj=cliente&action=agregar" class="btn btn-success">Nuevo Cliente</a>
        <br><br>
        <?php
        if (count($clientes)>0) {
            ?>
            <table  bordercolor = "#0000FF" border="4" cellpadding="1" cellspacing="1" class="table table-dark table-striped">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    <?php
                    foreach($clientes as $cliente) {
                        echo "<tr>";
                        echo "<td>$cliente->id</td>";
                        echo "<td>$cliente->nombre</td>";
                        echo "<td>".$cliente->apellido."</td>";
                        echo "<td>".(($cliente->telefono)?$cliente->telefono:"telefono no definido")."</td>";
                        echo "<td>";
                        echo "<a href='index.php?obj=cliente&action=editar&id=$cliente->id' class='btn btn-warning me-1'>Editar</a>";
                        echo "<a href='index.php?obj=cliente&action=eliminar&id=$cliente->id' class='btn btn-danger'>Eliminar</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "<h2>No existen Clientes registrados</h2>";
        }
        ?>
    </div>
    <?php
    include_once("view/footer.php");
    ?>
   <center><a href="index.php?obj=menu" class="btn btn-secondary me-1">Volver</a></center>
</body>
</html>