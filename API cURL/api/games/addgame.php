<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");//accept post and "get"
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers");

    include_once '../../db/Connection.php';
    include_once '../../models/games.php';

    //database
    $db = new Connection();
    $conn = $db->connection();

    //instantiate new game object
    $game = new Game($conn);

    $data = json_decode(file_get_contents("php://input"));
    $game->name = $data->name;
    $game->genre = $data->genre;
    $game->autor = $data->autor;
    $game->release_date = $data->release_date;

    if($game->addgame()){
        echo 'game added successfully !';
    } else{
        echo 'something went wrong, game not added.';
    }