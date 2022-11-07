<?php

require_once('Db.php');
require_once('entity/Cliente.php');

class ClienteModel
{

    private $table = 'clientes';
    static $tableStatic = 'clientes';

    public function __construct()
    {
    }

    public function getclientes()
    {
        $db = new Db();
        $sql = "SELECT * FROM " . $this->table;
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, 'Cliente');
    }

    public function addCliente($cliente)
    {
        $db = new Db();
        $sql = "INSERT INTO " . $this->table . " (nombre, apellido, telefono) VALUES (:nom,:ape,:tel)";
        $query = $db->prepare($sql);
        $nom = $cliente->nombre;
        $ape = $cliente->apellido;
        $tel = $cliente->telefono;
        $query->bindParam(':nom', $nom);
        $query->bindParam(':ape', $ape);
        $query->bindParam(':tel', $tel);
        $query->execute();
    }

    public function getCliente($id)
    {
        $db = new Db();
        $sql = "SELECT * FROM " . $this->table . " WHERE id=$id";
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchObject('cliente');
    }

    public function deleteCliente($id)
    {
        $db = new Db();
        $sql = "DELETE FROM " . $this->table . " WHERE id=$id";
        $query = $db->prepare($sql);
        $query->execute();
    }

    public function updateCliente($cliente)
    {
        $db = new Db();
        $sql = "UPDATE " . $this->table . " SET nombre=:nom, apellido=:ape, telefono=:tel WHERE id=:id";
        $query = $db->prepare($sql);
        $nom = $cliente->nombre;
        $ape = $cliente->apellido;
        $tel = $cliente->telefono;
        $id = $cliente->id;
        $query->bindParam(':nom', $nom);
        $query->bindParam(':ape', $ape);
        $query->bindParam(':tel', $tel);
        $query->bindParam(':id', $id);
        $query->execute();
    }
}
