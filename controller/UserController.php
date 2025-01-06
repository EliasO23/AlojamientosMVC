<?php

require_once './models/User.php';
require_once './config/database.php';

class UserController
{
    public $user;
    public $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function readUser()
    {
        $users = $this->user->getAllUsers();
        include './views/register.php';
    }

    public function createUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->user->username = $_POST['username'];
            $this->user->email = $_POST['email'];
            $this->user->password = $_POST['password'];
            $this->user->rol_id = 1;

            $this->user->createUser();
        }

        include './views/auth/register.php';
    }

    public function sessionUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->user->email = $_POST['email'];
            $this->user->password = $_POST['password'];

            $user = $this->user->sessionUser();

            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id_user'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['rol_id'] = $user['rol_id'];

                if ($user['rol_id'] == 2) {
                    // Si es administrador, redirigir a la página de admin
                    header("Location: ./index.php?action=adminDashboard");
                } else {
                    // Si es un usuario normal, redirigir a la página de users
                    header("Location: ./index.php?action=read");
                }
                exit();
                 
            } else {
                echo "Usuario o contraseña incorrectos";
            }
        }

        include './views/auth/login.php';
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: ./index.php?action=read");
        exit();
    }
}
