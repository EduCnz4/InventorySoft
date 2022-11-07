<?php
require_once('entity/Material.php');
?>
<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Lista de Materiales";
include ('view/head.php');
?>
<body>
    <div class="container">
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <a href="index.php?obj=material&action=agregar" class="btn btn-success">Nuevo Material</a>
        <br><br>
        <?php
        if (count($materiales)>0) {
            ?>
            <table  bordercolor = "#0000FF" border="4" cellpadding="1" cellspacing="1" class="table table-dark table-striped">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Valor Unidad</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    <?php
                    foreach($materiales as $material) {
                        echo "<tr>";
                        echo "<td>$material->id</td>";
                        echo "<td>$material->nombres</td>";
                        echo "<td>".$material->cantidad."</td>";
                        echo "<td>".(($material->valorunidad)?$material->valorunidad:"valor no definido")."</td>";
                        echo "<td>";
                        echo "<a href='index.php?obj=material&action=editar&id=$material->id' class='btn btn-warning me-1'>Editar</a>";
                        echo "<a href='index.php?obj=material&action=eliminar&id=$material->id' class='btn btn-danger'>Eliminar</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "<h2>No existen materiales</h2>";
        }
        ?>
    </div>
    <?php
    include_once("view/footer.php");
    ?>
    <center><a href="index.php?obj=menu" class="btn btn-secondary me-1">Volver</a></center>
</body>
</html>