<?php

require_once('model/ClienteModel.php');

class ClienteController {
    private $data;

    public function __construct() {
        $this->data = new ClienteModel();
    }

    public function main() {
        $action = isset($_GET['action']) ? $_GET['action'] : "listar";
        if ($action == "listar") {
            $this->listarClientes();
        } elseif ($action == "agregar") {
            $this->agregarCliente();
        } elseif ($action == "eliminar") {
            $this->eliminarCliente();
        } elseif ($action == "editar") {
            $this->editarCliente();
        } 
    }

    public function editarCliente() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header("Location: index.php?obj=cliente");
            return;
        }
        $cliente = $this->data->getcliente($id);
        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $cliente->nombre=$nombre;
            $cliente->apellido=$apellido;
            $cliente->telefono=$telefono;
            $this->data->updateCliente($cliente);
            header('Location: index.php?obj=cliente');
            return;
            
        }
        include_once('view\Clientes\edit.php');
     
    }
    

    public function eliminarCliente() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id) {
            $this->data->deleteCliente($id);
        }
        header("Location: index.php?obj=cliente");
    }

    public function agregarCliente() {
        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $cliente = new Cliente();
            $cliente->nombre=$nombre;
            $cliente->apellido=$apellido;
            $cliente->telefono=$telefono;
            $this->data->addCliente($cliente);
            header('Location: index.php?obj=cliente');
            return;
        }
        include_once('view/Clientes/create.php');
    }

    public function listarClientes() {
        $clientes = $this->data->getClientes();
        include_once('view/Clientes/index.php');
        return;
    } 
    
}



?>