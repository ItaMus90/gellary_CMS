<?php

require_once("new_config.php");

class Database{

    public $connection;

    function __construct(){
        $this->openDbConnection();
    }

    public function openDbConnection(){ 
        //$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        if($this->connection->connect_errno){
            die("Database connection failed badly ". $this->connection->error);
        }
    }

    private function confirmQuery($result){
        if(!$result){
            die("Query Failed ".$this->connection->connect_error)           ;
        }
    }

    public function query($sql){       
        //$result = mysqli_query($this->connection, $sql);
        $result = $this->connection->query($sql);
        $this->confirmQuery($result);
        return $result;
    }

    // Handel sql Injection
    public function escapeString($string){
        $escapeString = mysqli_real_escape_string($this->connection, $string);
        $escapeString = $this->connection->real_escape_string($string);

        return $escapeString;
    }

    public function insertId(){
        //return mysqli_insert_id($this->connection);
        return $this->connection->insert_id;
    }
}


$database = new Database();
?>

