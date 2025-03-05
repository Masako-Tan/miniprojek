<?php
class TabunganController {
    private $db;
    private $tabunganModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        require_once 'app/models/Tabungan.php';
        $this->tabunganModel = new Tabungan($this->db);
    }

    public function index(){
        require_once 'app/helpers/AuthMiddleware.php';
        $userId = AuthMiddleware::getuserId();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $amount = $_POST['amount'];
            $message = $_POST['message'];
            

        //  $userId = $_SESSION['user_id'];
         if ($this->tabunganModel->create($userId, $amount, $message)) { // FIX: pakai $userId
            header('Location: home');
            exit();

            }
        }

        require_once 'app/views/tabung.php';
    }
}
