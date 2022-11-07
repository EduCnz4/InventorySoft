<?php

class Db extends PDO {
    private $db = 'inventorysoft';
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbh;

    function __construct()
    {
        try {
            $this->dbh = parent::__construct('mysql:dbname='.$this->db.
                ';host='.$this->host, $this->username, $this->password);
        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
        }
    }

    public function close() {
        $this->dbh = NULL;
    }

}

?>