<?php
require_once('entity/Material.php');
?>

<!DOCTYPE html>
<html lang="en">
<title>Inventario</title>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="inven.css">
</head>

<body>
    <?php
    if (count($materiales) > 0) {
    ?>
        <table id="tanalisis" class="table table-dark table-striped">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Cantidad actual</th>
                <th>Valor Unidad</th>
                <th>Stock Mínimo</th>
                <th>valor Total</th>

            </thead>
            <tbody>
                <?php
                foreach ($materiales as $i => $material) {
                    echo "<tr>";
                    echo "<td>$material->id</td>";
                    echo "<td>$material->nombres</td>";
                    echo "<td id='can".($i+1)."'>". $material->cantidad . "</td>";
                    echo "<td>" . (($material->valorunidad) ? $material->valorunidad : "valor no definido") . "</td>";
                    echo "<td>";
                    echo "<a href='index.php?obj=material&action=editarStock&id=$material->id' class='btn btn-light'>Editar</a> <label style:'font-size:200px' id='stock".($i+1)."' onchange='cambiaFondo(this)'>$material->stock</label> ";
                    echo "<td>";
                    echo "<label>" . $material->cantidad * $material->valorunidad . "</label>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>


        <script type="text/javascript">
            function cambiaFondo() {
                var len = document.getElementById("tanalisis").rows.length;
                for (var i = 1; i <= len; i++) {
                    var label =parseInt(document.getElementById("stock"+i).textContent);
                    var cant =parseInt(document.getElementById("can"+i).textContent);
                    if (cant > label) {
                        document.getElementById("stock"+i).style.backgroundColor = "green";
                    } else {
                        document.getElementById("stock"+i).style.backgroundColor = "red";
                    }
                }

            }
            window.onload = cambiaFondo
        </script>


    <?php
    } else {
        echo "<h2>No existen materiales</h2>";
    }
    ?>
  <center><a href="index.php?obj=menu" class="btn btn-secondary me-1">Volver</a></center>
</body>

</html>