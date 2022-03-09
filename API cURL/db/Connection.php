<?php 
class Connection {
    private $host = 'localhost';
    private $db_name = 'gameapi';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connection(){
        $this->conn = null;
        
        try{
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            // $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $exep){
            echo 'connection error' . $exep->getMessage();
        }

        return $this->conn;
    }
}
