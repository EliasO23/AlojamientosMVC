<?php

require_once './models/AccommodationsUser.php';
require_once './config/database.php';

class AccommodationUserController
{
    public $accommodationUser;
    public $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->accommodationUser = new AccommodationsUser($this->db);
    }

    public function checkSessionAndRedirect()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=sessionUser');
            exit();
        }

        return $_SESSION['user_id'];
    }

    public function addAccommodationUser($accommodationid)
    {
        $user_id = $this->checkSessionAndRedirect();
        $accommodation_id = $accommodationid;

        $this->accommodationUser->addAccommodationsUser($user_id, $accommodation_id);
        header("Location: ./index.php?action=read");
    }

    public function getAccommodationUser()
    {
        $userid = $this->checkSessionAndRedirect();

        $accommodations = $this->accommodationUser->getAccommodationsUser($userid);
        include './views/home.php';
    }

    public function deleteAccommodationUser($accommodationid)
    {
        $user_id = $this->checkSessionAndRedirect();
        $accommodation_id = $accommodationid;

        $uaId = $this->accommodationUser->findOne($user_id, $accommodation_id);

        if ($uaId){
            $this->accommodationUser->deleteAccommodationUser($uaId);
            header("Location: ./index.php?action=getAccommodationUser");
        } else {
            echo "No se encontró un alojamiento relacionado";
        }
        
    }
}

?>