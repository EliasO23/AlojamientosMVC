<?php 
    require_once './controller/AccommodationController.php';
    require_once './controller/UserController.php';
    require_once './controller/AccommodationUserController.php';

    $controllerA = new AccommodationController();
    $controllerU = new UserController();
    $controllerAU = new AccommodationUserController();

    $action = isset($_GET['action']) ? $_GET['action'] : 'read';
    $id = isset($_GET['id']) ? $_GET['id']: '';
    $user = isset($_GET['user']) ? $_GET['user']: '';
    

    switch($action){
        case 'listUsers':
            $controllerU->readUser();
            break;

        case 'read':
            $controllerA->read();
            break;
        
        case 'adminDashboard':
            $controllerA->adminRead();
            break;

        case 'createAccomodations':
            $controllerA->createAccommodation();
            break;

        case 'users':
            $controllerU->readUser();
            break;

        case 'newUser':
            $controllerU->createUser();
            break;

        case 'sessionUser':
            $controllerU->sessionUser();
            break;

        case 'logout':
            $controllerU->logout();
            break;

        case 'addAccommodationUser':
            $controllerAU->addAccommodationUser($id);
            break;

        case 'getAccommodationUser':
            $controllerAU->getAccommodationUser();
            break;

        case 'deleteAccommodationUser':
            $controllerAU->deleteAccommodationUser($id);
            break;

        case 'rolUser':
            $controllerU->modifyRolUser($id, $user);
            break;

    }

?>