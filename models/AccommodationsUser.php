<?php

class AccommodationsUser
{
    // public $user_id;
    // public $accommodation_id;
    private $conn;
    public $table_name = "user_accommodations";

    // Constructor que obtiene la conexión a la base de datos
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addAccommodationsUser($userid, $accommodationid)
    {
        try {
            $query = "INSERT INTO {$this->table_name} (user_id, accommodation_id) VALUES (?, ?)";
            $stmt = $this->conn->prepare($query);

            $stmt->execute([$userid, $accommodationid]);
            
            return $stmt;
        } catch (Exception $e) {
            echo "Error al añadir el alojamiento al usuario: " . $e->getMessage();
        }

    }

    public function getAccommodationsUser($userid)
    {
        try {
            $query = "SELECT ac.id_accommodation, ac.name, ac.description, ac.location, ac.price FROM users AS us INNER JOIN user_accommodations AS ua ON us.id_user = ua.user_id INNER JOIN accommodations AS ac ON ua.accommodation_id = ac.id_accommodation where us.id_user = ?";
            $stmt = $this->conn->prepare($query);

            $stmt->execute([$userid]);

            return $stmt;
        } catch (Exception $e) {
            echo "Error al obtener los alojamientos del usuario: " . $e->getMessage();
        }
    }

    public function findOne($userid, $accommodationid)
    {
        try {
            $query = "SELECT id_user_accommodations FROM {$this->table_name} WHERE user_id = ? AND accommodation_id = ?";
            $stmt = $this->conn->prepare($query);

            $stmt->execute([$userid, $accommodationid]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['id_user_accommodations'] ?? null;
            
        } catch (Exception $e) {
            echo "Error al obtener el alojamiento del usuario: " . $e->getMessage();
        }
    }

    public function deleteAccommodationUser($uaId)
    {
        try {
            $query = "DELETE FROM {$this->table_name} WHERE id_user_accommodations = ?";
            $stmt = $this->conn->prepare($query);

            return $stmt->execute([$uaId]);

        } catch (Exception $e) {
            echo "Error al eliminar el alojamiento del usuario: " . $e->getMessage();
        }
    }

}

?>