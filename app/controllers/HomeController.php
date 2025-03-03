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
        AuthMiddleware::isAuthenticated(); //melindungi akses halaman utama, sehingga hanya pengguna yang sudah login yang dapat mengaksesnya
        
        $tabungs = $this->tabunganModel->getAll(); //ambil semua data tabungan
        $isAdmin = $_SESSION['user_role'] === 'admin'; //cek apakah user adalah admin
        require_once 'app/views/home.php';
    }

    public function admin() {
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isAdmin(); //melindungi akses halaman admin, hanya admin yang bisa akses
        
        require_once 'app/models/User.php';
        $userModel = new User($this->db);
        $users = $userModel->getAllUsers();
        $tabungs = $this->tabunganModel->getAll();
        require_once 'app/views/admin.php';
    }
}