<?php

header('Access-Control-Allow-Origin: *');//make the api public
header('Content-Type: application/json');//use json format

include_once '../../db/Connection.php';
include_once '../../models/games.php';

//database
$db = new Connection();
$conn = $db->connection();

//instantiate new game object
$game = new Game($conn);

//
$result = $game->getgames();
$num = $result->rowCount();

 if($num > 0){
     $games_arr = array();
     $games_arr['data'] = array();
     $games_arr['num'] = $num;

     while($row = $result->fetch(PDO::FETCH_ASSOC)){
         extract($row);
         $game_record = array(
             'id' => $id,
             'name' => $name,
             'genre' => $genre,
             'autor' => $autor,
             'release_date' => $release_date,
         );
         array_push($games_arr["data"],$game_record);
     }
     echo json_encode($games_arr);
 }else{
    http_response_code(404);
    echo json_encode(array("message" => "No record found."));
 }