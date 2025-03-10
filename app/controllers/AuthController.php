<?php
class AuthController {
    private $db;
    private $userModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        require_once 'app/models/User.php';
        $this->userModel = new User($this->db);
    }

    public function login() {
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isGuest(); //mencegah pengguna yang sudah login masuk kembali

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if($this->userModel->login($email, $password)) {
                header('Location: home');
                exit();
            }
        }
        require_once 'app/views/login.php';
    }

    //mencegah user yang sudah login daftar lagi
    public function register() {
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isGuest();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            // user pertama itu admin, selanjutnya user biasa
            $role = $this->isFirstUser() ? 'admin' : 'user';

            if($this->userModel->register($name, $email, $password, $role)) {
                header('Location: login');
                exit();
            }
        }
        require_once 'app/views/register.php';
    }

    private function isFirstUser() {
        $query = "SELECT COUNT(*) as count FROM users";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] === 0; //jika jumlahnya 0, maka user pertama itu admin
    }

    public function logout() {
        session_destroy();
        header('Location: login');
        exit();
    }
}