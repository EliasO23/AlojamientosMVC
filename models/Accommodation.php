<?php

class Accommodation
{
    // public $id;
    public $name;
    public $description;
    public $location;
    public $price;
    public $created_by;
    private $conn;
    public $table_name = "accommodations";

    // Constructor que obtiene la conexión a la base de datos
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Método para obtener todos los alojamientos
    public function getAllAccommodations()
    {
        try {
            $query = "SELECT * FROM {$this->table_name}";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(); // Retorna todos los alojamientos
        } catch (Exception $e) {
            echo "Error al obtener los alojamientos: " . $e->getMessage();
            return [];
        }
    }

    public function create(){
        try {
            $query = "INSERT INTO {$this->table_name} (name, description, location, price, created_by) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);

            $stmt->execute([$this->name, $this->description, $this->location, $this->price, $this->created_by]);
            
            return $stmt;
        } catch (Exception $e) {
            echo "Error al crear el alojamiento: " . $e->getMessage();
        }
    }

}

?>