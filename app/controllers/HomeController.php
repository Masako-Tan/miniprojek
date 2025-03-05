<?php
class HomeController {
    private $db;
    private $tabunganModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        require_once 'app/models/Tabungan.php';
        require_once 'app/models/user.php';
        $this->tabunganModel = new Tabungan($this->db);
        $this->userModel = new User($this->db);
    }

    public function index() {
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isAuthenticated(); //pastikan user login

        $userId = AuthMiddleware::getUserId();
        $isAdmin = $_SESSION['user_role'] === 'admin';
        $tabungs = $this->tabunganModel->getByUserId($userId); // admin & user hanya lihat tabungan sendiri
        require_once 'app/views/home.php';
    }
    public function admin() {
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isAdmin(); //melindungi akses halaman admin, hanya admin yang bisa akses
        
        $tabungs = $this->tabunganModel->getAll();
        $users = $this->userModel->getAllUsers();
        require_once 'app/views/admin.php';
    }
}