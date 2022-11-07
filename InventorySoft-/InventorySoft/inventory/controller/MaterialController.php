<?php

require_once('model/MaterialModel.php');

class MaterialController {
    private $data;

    public function __construct() {
        $this->data = new MaterialModel();
    }

    public function main() {
        $action = isset($_GET['action']) ? $_GET['action'] : "listar";
        if ($action == "listar") {
            $this->listarMateriales();
        } elseif ($action == "agregar") {
            $this->agregarMaterial();
        } elseif ($action == "eliminar") {
            $this->eliminarMaterial();
        } elseif ($action == "editar") {
            $this->editarMaterial();
        } elseif ($action == "analisis") {
            $this->analisisMaterial();
        } elseif ($action == "editarStock") {
            $this->editarStock();
        } 
    }

    public function editarMaterial() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header("Location: index.php?obj=material");
            return;
        }
        $material = $this->data->getMaterial($id);
        if (isset($_POST['nombres'])) {
            $nombres = $_POST['nombres'];
            $cantidad = $_POST['cantidad'];
            $valorunidad = $_POST['valorunidad'];
            $material->nombres=$nombres;
            $material->cantidad=$cantidad;
            $material->valorunidad=$valorunidad;
            $this->data->updateMaterial($material);
            header('Location: index.php?obj=material');
            return;
        }
        include_once('view\Material\edit.php');
     
    }
    public function editarStock() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header("Location: index.php?obj=material");
            return;
        }
        $material = $this->data->getMaterial($id);
        if (isset($_POST['stock'])) {
            $stock = $_POST['stock'];
            $material->stock=$stock;
            $this->data->updateMaterial($material);
            header('Location: index.php?obj=material&action=analisis');
            return;
        }
        include_once('view\inventario\stock.php');
     
    }

    public function eliminarMaterial() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id) {
            $this->data->deleteMaterial($id);
        }
        header("Location: index.php?obj=material");
    }

    public function agregarMaterial() {
        if (isset($_POST['nombres'])) {
            $nombres = $_POST['nombres'];
            $cantidad = $_POST['cantidad'];
            $valorunidad = $_POST['valorunidad'];
            $material = new Material();
            $material->nombres=$nombres;
            $material->cantidad=$cantidad;
            $material->valorunidad=$valorunidad;
            $this->data->addMaterial($material);
            header('Location: index.php?obj=material');
            return;
        }
        include_once('view/Material/create.php');
    }

    public function listarMateriales() {
        $materiales = $this->data->getMateriales();
        include_once('view/Material/index.php');
        return;
    } 
    
    public function analisisMaterial() {
        $materiales = $this->data->getMateriales();
        include_once('view/inventario/index.php');
        return;
        
    } 
}



?>