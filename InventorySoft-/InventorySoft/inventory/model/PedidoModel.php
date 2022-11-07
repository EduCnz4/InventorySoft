<?php

require_once('entity/Pedido.php');
require_once('entity/Cliente.php');
require_once('entity/Material.php');
require_once('model/ClienteModel.php');
require_once('model/MaterialModel.php');

class PedidoModel {
    private $table = 'pedidos';

    public function __construct() {       
    }

    public function getPedidos() {
        $db = new Db();
        $sql = "SELECT * FROM ".$this->table;
        $query = $db->prepare($sql);
        $query->execute();
        $pedidos= $query->fetchAll(PDO::FETCH_CLASS, 'Pedido');
        foreach($pedidos as $pedido) {
            $sql = "SELECT * FROM ".ClienteModel::$tableStatic." WHERE id=$pedido->cliente";
            $query = $db->prepare($sql);
            $query->execute();
            $pedido->clienteObj = $query->fetchObject('Cliente');
        }
        return $pedidos;
    }

    public function addPedido($pedido) {
        $db = new Db();
        $sql = "INSERT INTO ".$this->table." (factura, fecha, cliente) VALUES ".
        "(:fac,:fech,:clien)";
        $query = $db->prepare($sql);
        $fac=$pedido->factura;
        $fech=$pedido->fecha;
        $clien=$pedido->cliente;
        $query->bindParam(':fac', $fac);
        $query->bindParam(':fech', $fech);
        $query->bindParam(':clien', $clien);
        $query->execute();
    }

    public function getPedido($id) {
        $db = new Db();
        $sql = "SELECT * FROM ".$this->table. " WHERE id=$id";
        $query = $db->prepare($sql);
        $query->execute();
        $pedido = $query->fetchObject('Pedido');
        $sql = "SELECT * FROM ".ClienteModel::$tableStatic." WHERE id=$pedido->cliente";
        $query = $db->prepare($sql);
        $query->execute();
        $pedido->clienteObj = $query->fetchObject('Cliente');
        $sql = "SELECT * FROM ".MaterialModel::$tableStatic." WHERE id IN ".
        " (SELECT id_material FROM pedido_tiene_material WHERE id_pedido=$pedido->id)";
        $query = $db->prepare($sql);
        $query->execute();
        $pedido->materiales = $query->fetchAll(PDO::FETCH_CLASS, 'Material');
        return $pedido;
    }

    public function deletePedido($id) {
        $db = new Db();
        $sql = "DELETE FROM ".$this->table. " WHERE id=$id";
        $query = $db->prepare($sql);
        $query->execute();
    }

    public function updatePedido($pedido) {
        $db = new Db();
        $sql = "UPDATE ".$this->table." SET factura=:fac, fecha=:fech,".
            " cliente=:clien WHERE id=:id";
        $query = $db->prepare($sql);
        $fac=$pedido->factura;
        $fech=$pedido->fecha;
        $clien=$pedido->cliente;
        $id=$pedido->id;
        $query->bindParam(':fac', $fac);
        $query->bindParam(':fech', $fech);
        $query->bindParam(':clien', $clien);
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function deleteMaterialPedido($id, $id_material) {
        $db = new Db();
        $sql = "DELETE FROM pedido_tiene_material WHERE id_pedido=$id and id_material=$id_material";
        $query = $db->prepare($sql);
        $query->execute();
    }

    public function addMaterialPedido($id, $id_material) {
        $db = new Db();
        $sql = "INSERT INTO pedido_tiene_material (id_pedido, id_material) VALUES ($id, $id_material)";
        $query = $db->prepare($sql);
        $query->execute();
    }

    public function getMaterialesNoPedido($id) {
        $db = new Db();
        $sql = "SELECT * FROM materiales where id NOT IN ".
        "(SELECT id_material from pedido_tiene_material WHERE id_pedido=$id)";
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, 'Material');
    }
}


?>