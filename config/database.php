<?php 

    class Database{
        public $host = "localhost";
        public $dbname = "alojamientos";
        public $username = "root";
        public $password = "1234";
        public $conn;

        public function getConnection(){
            try{
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->username,$this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo $exception->getMessage();
            }
            return $this->conn;

        }

    }

?>