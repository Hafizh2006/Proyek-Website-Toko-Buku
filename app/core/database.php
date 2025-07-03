<?php

class database {
    // variabel privat bisa diakses di dalam class
    private $dbh;
    private $stmt;

    public function __construct()
    {
        // Sambungkan ke database
        try {
            $this->dbh = new PDO("sqlite:". DB_HOST);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    
    // bikin function Query manual
    public function Query($query) {
        $this->stmt = $this->dbh->prepare($query);
    }

    // bikin function Bind manual
    public function Bind($param, $value, $type = null) {
        if (is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }

        }

        $this->stmt->bindValue($param, $value, $type);

    } 

    // bikin function execute manual
    public function execute(){
        $this->stmt->execute();
    }
    // bikin function result semua di returnkan manual
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    // bikin function result satu di returnkan manual
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    // bikin function menghitung berapa rows yang diubah manual
    public function rowCount(){
        return $this->stmt->rowCount();
    }
}

?>