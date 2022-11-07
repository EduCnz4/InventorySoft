<?php

require_once('controller/AppController.php');


if (!isset($_SESSION['control'])) {
    $_SESSION['control'] = new AppController(); 
}

$control = $_SESSION['control'];
$control->main();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <link rel="stylesheet" href="view/index.css">
  <link rel="stylesheet" href="./view/menus.css">
  <link rel="stylesheet" href="./view/pedido/placeh.css">
</head>
<body>
    
</body>
</html>