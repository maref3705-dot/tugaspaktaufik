<?php
session_start();

require_once '../config/database.php';
require_once '../models/User.php';

class AuthController {

    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        $this->user = new User($this->db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->user->username = $_POST['username'];
            $password_input = $_POST['password'];
            $row = $this->user->login();

            if ($row) {
                if ($password_input == $row['password']) {

                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['role'] = $row['role'];

                    // redirect sesuai role
                    if ($row['role'] == 'admin') {
                        header("Location: ../index.php?page=dashboard");
                    } else {
                        header("Location: ../index.php?page=mhsdashboard");
                    }

                    exit();

                } else {
                    $_SESSION['error'] = "Password salah!";
                    header("Location: ../index.php?page=login");
                    exit();
                }
            } else {
                $_SESSION['error'] = "Username tidak ditemukan!";
                header("Location: ../index.php?page=login");
                exit();
            }
        }
    }
}

$auth = new AuthController();
$auth->login();