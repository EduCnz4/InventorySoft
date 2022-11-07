<?php

class Material {
    private $id;
    private $nombres;
    private $cantidad;
    private $valorunidad;
    private $stock;

    public function __construct() {
    }

    public function __set($name, $value) {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }
}


?>