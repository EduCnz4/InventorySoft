<?php

class Pedido {
    private $id;
    private $factura;
    private $fecha;
    //
    private $cliente;
    private $clienteObj;
    //
    private $materiales;



    public function __construct() {
        $this->materiales = array();
    }

    public function __set($fech, $value) {
        if (property_exists($this, $fech)) {
            $this->$fech = $value;
        }
    }

    public function __get($fech) {
        if (property_exists($this, $fech)) {
            return $this->$fech;
        }
    }

    public function addMaterial($material) {
        $this->materiales[]=$material;
    }


}


?>