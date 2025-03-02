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

    public function index() {
        if(!isset($_SESSION['user_id'])) {
            header('Location: login');
            exit();
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $amount = $_POST['amount'];
            $message = $_POST['message'];
            $user_id = $_SESSION['user_id'];

            if($this->tabunganModel->create($user_id, $amount, $message)) {
                header('Location: home');
                exit();
            }
        }

        require_once 'app/views/tabung.php';
    }
}
