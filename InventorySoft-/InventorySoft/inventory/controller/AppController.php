<?php

require_once('MaterialController.php');
require_once('ClienteController.php');
require_once('PedidoController.php');


class AppController {
    private $material;
    private $cliente;
    private $pedido;

    public function __construct() {
    }

    public function main() {
        $obj = isset($_GET['obj'])?$_GET['obj'] : 'menu';
        if ($obj == 'menu') {
            include_once('view/menu.php');
            return;
        } else if ($obj == 'material') {
            if (!$this->material) {
                $this->material = new MaterialController();
            }
            $this->material->main();
        } else if ($obj == 'cliente') {
            if (!$this->cliente) {
                $this->cliente = new ClienteController();
            }
            $this->cliente->main();
        } else if ($obj == 'pedido') {
            if (!$this->pedido) {
                $this->pedido = new PedidoController();
            }
            $this->pedido->main();
        }
    }
}

?>