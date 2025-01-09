<?php

require_once './models/Accommodation.php';
require_once './config/database.php';

class AccommodationController
{
    public $accommodation;
    public $db;

    public function __construct()
        {
            $database = new Database();
            $this->db = $database->getConnection();
            $this->accommodation = new Accommodation($this->db);
        }
    
    public function read()
    {
        // Obtener todos los roles usando el modelo
        $accommodations = $this->accommodation->getAllAccommodations(); 
        include './views/accommodations.php';
    }

    public function adminRead()
    {
        // Obtener todos los roles usando el modelo
        $accommodations = $this->accommodation->getAllAccommodations(); 
        include './views/admin/dashboard.php';
    }

    public function createAccommodation()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=sessionUser');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->accommodation->name = $_POST['name'];
            $this->accommodation->description = $_POST['description'];
            $this->accommodation->location = $_POST['location'];
            $this->accommodation->imageURL = $_POST['imageURL'];
            $this->accommodation->price = $_POST['price'];
            $this->accommodation->created_by = $_SESSION['user_id'];

            $this->accommodation->create();
        }

        include './views/admin/create.php';
    }
    
}
