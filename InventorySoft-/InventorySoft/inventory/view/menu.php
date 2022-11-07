<!DOCTYPE html>
<html lang="es">
<?php
$titulo = "Menu Principal";
include('head.php');
?>

<body>
    <header class="contenedor header">
        <div class="contenedor-menus">
            <div><br><br><br><br><br>
                <div class="container">
                    <center>
                        <h1 style="color:aliceblue" class="titulo"><span style="--l: 'Menu';">MENU</span></h1>
                    </center><br><br>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <a href="index.php?obj=material" class="btn uno btn-success mt-2 "><span>Inventario</span></a><br>
                        <a href="index.php?obj=material&action=analisis" class="btn uno btn-success mt-2"><span>Análisis Stock</span></a><br>
                        <a href="index.php?obj=cliente" class="btn uno btn-success mt-2"><span>Clientes</span></a><br>
                        <a href="index.php?obj=pedido" class="btn uno btn-success mt-2"><span>Pedidos</span></a><br><br><br><br><br><br><br>
                    </div>
                </div>
            </div>
            <div>
    </header>
</body>

</html>