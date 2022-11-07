<?php

require_once('Db.php');
require_once('entity/Material.php');

class MaterialModel {

    private $table = 'materiales';
    static $tableStatic = 'materiales';

    public function __construct() {       
    }

    public function getMateriales() {
        $db = new Db();
        $sql = "SELECT * FROM ".$this->table;
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, 'Material');
    }

    public function addMaterial($material) {
        $db = new Db();
        $sql = "INSERT INTO ".$this->table." (nombres, cantidad, valorunidad) VALUES (:nom,:cant,:valuni)";
        $query = $db->prepare($sql);
        $nom=$material->nombres;
        $cant=$material->cantidad;
        $valuni=$material->valorunidad;
        $query->bindParam(':nom', $nom);
        $query->bindParam(':cant', $cant);
        $query->bindParam(':valuni', $valuni);
        $query->execute();
    }

    public function getMaterial($id) {
        $db = new Db();
        $sql = "SELECT * FROM ".$this->table. " WHERE id=$id";
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchObject('material');
    }

    public function deleteMaterial($id) {
        $db = new Db();
        $sql = "DELETE FROM ".$this->table. " WHERE id=$id";
        $query = $db->prepare($sql);
        $query->execute();
    }

    public function updateMaterial($material) {
        $db = new Db();
        $sql = "UPDATE ".$this->table." SET nombres=:nom,".
            " cantidad=:cant, valorunidad=:valuni, stock=:stock WHERE id=:id";
        $query = $db->prepare($sql);
        $nom=$material->nombres;
        $cant=$material->cantidad;
        $valuni=$material->valorunidad;
        $stock=$material->stock;
        $id=$material->id;
        $query->bindParam(':nom', $nom);
        $query->bindParam(':cant', $cant);
        $query->bindParam(':valuni', $valuni);
        $query->bindParam(':id', $id);
        $query->bindParam(':stock', $stock);
        $query->execute();
    }


}



?>