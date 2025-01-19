<?php
include_once __DIR__ . "/../config.php";

class connectBD {
    private $host;
    private $user;
    private $password;
    private $database;
    private $port;
    public $pdo;

    public function __construct(){
        $this->host = HOST;
        $this->user = USER;
        $this->password = PASSWORD;
        $this->database = DATABASE;
        $this->port = PORT;
    }

    public function connect(){
        try {
            $pdo = new PDO("mysql:host=$this->host;dbname=$this->database;port=$this->port", $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("set names utf8");
            return $pdo;
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
            return null; // Retorna null en caso de fallar la conexión
        }
    }

    function close_connection(){
        $this->pdo=null;
    }
}

?>
