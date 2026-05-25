<?php
class Database {
    private $host = "localhost";
    private $db_name = "db_finware"; // Asegúrate que este sea el nombre en phpMyAdmin
    private $username = "root";
    private $password = "";
    public $conn;

    // ESTA ES LA FUNCIÓN QUE TE ESTÁ PIDIENDO EL ERROR
    public function conectar() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>