<?php

require_once('model/PedidoModel.php');
require_once('model/ClienteModel.php');

class PedidoController {
    private $data;
    private $dataCliente;
    private $dataMaterial;

    public function __construct() {
        $this->data = new PedidoModel();
    }

    public function main() {
        $action = isset($_GET['action']) ? $_GET['action'] : "listar";
        if ($action == "listar") {
            $this->listarPedidos();
        } elseif ($action == "agregar") {
            $this->agregarPedido();
        } elseif ($action == "eliminar") {
            $this->eliminarPedido();
        } elseif ($action == "editar") {
            $this->editarPedido();
        } elseif ($action == "ver") {
            $this->verPedido();
        } elseif ($action == "addMaterial") {
            $this->addMaterial();
        } elseif ($action == "deleteMaterial") {
            $this->deleteMaterial();
        } elseif ($action == "listarMateriales") {
            $this->listarMateriales();
        } elseif ($action == "addMaterialesPedidos") {
            $this->addMaterialesPedidos();
        } 
        else {
            $this->opcionNoValida();
        }
    }

    public function addMaterialesPedidos() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header("Location: index.php?obj=pedido&action=addMaterial&id=$id");
            return;
        }
        if (isset($_POST['materiales'])) {
            foreach ($_POST['materiales'] as $id_material) {
                $this->data->addMaterialPedido($id, $id_material);
            }
        }
        header("Location: index.php?obj=pedido&action=addMaterial&id=$id");
    }

    public function listarMateriales() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header("Location: index.php?obj=pedido&action=addMaterial&id=$id");
            return;
        }
        $materiales = $this->data->getMaterialesNoPedido($id);
        
        include_once('view/pedido/listarMateriales.php');
    }

    public function deleteMaterial() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header("Location: index.php?obj=pedido");
            return;
        }
        $id_material = isset($_GET['id_material']) ? $_GET['id_material'] : null;
        if (!$id) {
            header("Location: index.php?obj=pedido&action=addMaterial&id=$id");
            return;
        }
        $this->data->deleteMaterialPedido($id, $id_material);
        header("Location: index.php?obj=pedido&action=addMaterial&id=$id");
    }

    public function addMaterial() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header("Location: index.php?obj=pedido");
            return;
        }
        $pedido = $this->data->getPedido($id);
        include_once('view/pedido/addMaterial.php');
    }

    public function opcionNoValida() {
        include_once('view/pedido/error.php');
    }

    public function verPedido() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header("Location: index.php?obj=pedido");
            return;
        }
        $pedido = $this->data->getPedido($id);
        include_once('view/pedido/show.php');
    }

    public function editarPedido() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header("Location: index.php?obj=pedido");
            return;
        }
        $pedido = $this->data->getPedido($id);
        if (isset($_POST['factura'])) {
            $factura = $_POST['factura'];
            $fecha = $_POST['fecha'];
            $cliente = $_POST['cliente'];
            $pedido->factura=$factura;
            $pedido->fecha=$fecha;
            $pedido->cliente=$cliente;
            $this->data->updatePedido($pedido);
            header('Location: index.php?obj=pedido');
            return;
        }
        if (!$this->dataCliente) {
            $this->dataCliente=new ClienteModel();
        }
        $clientes = $this->dataCliente->getClientes();
        include_once('view/pedido/edit.php');
    }

    public function eliminarPedido() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id) {
            $this->data->deletePedido($id);
        }
        header("Location: index.php?obj=pedido");
    }

    public function agregarPedido() {
        if (isset($_POST['factura'])) {
            $factura = $_POST['factura'];
            $fecha = $_POST['fecha'];
            $cliente = $_POST['cliente'];
            $pedido = new Pedido();
            $pedido->factura = $factura;
            $pedido->fecha = $fecha;
            $pedido->cliente = $cliente;
            $this->data->addPedido($pedido);

            header('Location: index.php?obj=pedido');
            return;
        }
        if (!$this->dataCliente) {
            $this->dataCliente=new ClienteModel();
        }
        $clientes = $this->dataCliente->getClientes();
        include_once('view/pedido/create.php');
    }

    public function listarPedidos() {
        $pedidos = $this->data->getPedidos();
        include_once('view/pedido/index.php');
        return;
    }
}


?>