<?php

class User
{
    public $username;
    public $email;
    public $password;
    public $rol_id;
    public $conn;
    public $table_name = "users";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAllUsers()
    {
        try {
            $query = "SELECT * FROM {$this->table_name}";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error al obtener los usuarios: " . $e->getMessage();
            return [];
        }
    }

    public function createUser()
    {
        try {
            $query = "INSERT INTO {$this->table_name} (username, email, password, rol_id) VALUES ( ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);

            $stmt->execute([$this->username, $this->email, $this->password, $this->rol_id]);
            
            return $stmt;
        } catch (Exception $e) {
            echo "Error al crear el usuario: " . $e->getMessage();
        }
    }

    public function sessionUser()
    {
        try {
            $query = "SELECT * FROM {$this->table_name} WHERE email = ? AND password = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$this->email, $this->password]);

            return $stmt->fetch();
            
        } catch (Exception $e) {
            echo "Error al iniciar sesión: " . $e->getMessage();
        }
    }
}

?>