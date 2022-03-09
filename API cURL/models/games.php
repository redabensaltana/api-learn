<?php 
class Game{
    //DB stuff
    private $conn;
    private $table = 'games';

    //table collumns
    public $id;
    public $name;
    public $genre;
    public $autor;
    public $release_date;

    public function __construct($db){
        $this->conn = $db;
    }

    //get all
    public function getgames(){
        $query = 'SELECT id , name , genre , autor , release_date FROM ;' . $this->table . ""; 
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }

    //add record
    public function addgame(){
        $query = "INSERT INTO" . $this->table . "SET name = :name, genre = :genre, autor = :autor, release_date = :release_date";
        $stmt = $this->conn->prepare($query);

        //binding
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":genre", $this->genre);
        $stmt->bindParam(":autor", $this->autor);
        $stmt->bindParam(":release_date", $this->release_date);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
}   