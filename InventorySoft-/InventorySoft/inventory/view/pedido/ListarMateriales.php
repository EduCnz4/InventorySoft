<?php

require_once('entity/Material.php');

?>

<!DOCTYPE html>
<html lang="es">
<?php
$titulo="Lista de Materiales Disponibles";
include ('view/head.php');
?>
<body>
    <div class="container">
        <h1 class="mt-3"><?php echo $titulo; ?></h1>
        <br><br>
        <form method="post" action="index.php?obj=pedido&action=addMaterialesPedidos&id=<?php echo $id?>">
        <button type="submit" class="btn btn-success">Agregar Materiales</button>
        <br><br>
        <?php
        if (count($materiales)>0) {
            ?>
            <table class="table table-dark table-striped">
                <thead>
                    <th></th>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Valor Unidad</th>
                    
                </thead>
                <tbody>
                    <?php
                    foreach($materiales as $material) {
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='materiales[]' value='$material->id' /></td>";
                        echo "<td>$material->id</td>";
                        echo "<td>$material->nombres</td>";
                        echo "<td>$material->cantidad</td>";
                        echo "<td>".$material->valorunidad."</td>";
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
  
</body>
</html>