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
        include './views/admin/users.php';
    }

    public function createUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->user->username = $_POST['username'];
            $this->user->email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $this->user->rol_id = 1;

            if ($password != $confirm_password) {
                $errorMessage = "Las contraseñas no coinciden";
                // include './views/auth/register.php';
            } else {
                $this->user->password = password_hash($password, PASSWORD_BCRYPT);
                $this->user->createUser();
                header("Location: ./index.php?action=sessionUser");
            }
        }

        include './views/auth/register.php';
    }

    public function sessionUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->user->email = $_POST['email'];
            $this->user->password = $_POST['password'];

            $user = $this->user->getUser();

            if ($user) {
                if (password_verify($this->user->password, $user['password'])) {
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
                }else{
                    $errorMessage = "Correo o contraseña incorrectos";
                    // include './views/auth/login.php';
                }
            } else {
                $errorMessage = "Correo o contraseña incorrectos";
                // include './views/auth/login.php';
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

    public function modifyRolUser($rol_id, $id_user)
    {
        $this->user->modifyRolUser($rol_id, $id_user);
        header("Location: ./index.php?action=listUsers");
    }
}
