<?php
class HomeController {
    private $db;
    private $tabunganModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        require_once 'app/models/Tabungan.php';
        $this->tabunganModel = new Tabungan($this->db);
    }

    public function index() {
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isAuthenticated();
        
        $tabungs = $this->tabunganModel->getAll();
        $isAdmin = $_SESSION['user_role'] === 'admin';
        require_once 'app/views/home.php';
    }

    public function admin() {
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isAdmin();
        
        require_once 'app/models/User.php';
        $userModel = new User($this->db);
        $users = $userModel->getAllUsers();
        $tabungs = $this->tabunganModel->getAll();
        require_once 'app/views/admin.php';
    }
}