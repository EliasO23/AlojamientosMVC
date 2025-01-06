<?php

class Role
{
    private $conn;

    // Constructor que obtiene la conexión a la base de datos
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Método para obtener todos los roles
    public function getAllRoles()
    {
        try {
            $query = "SELECT * FROM roles";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(); // Retorna todos los roles
        } catch (Exception $e) {
            echo "Error al obtener los roles: " . $e->getMessage();
            return [];
        }
    }
}
