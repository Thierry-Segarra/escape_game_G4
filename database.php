<?php

    try{
        $pdo = new PDO("mysql:host=localhost;dbname=escape_game_g4;charset=utf8;", "root","root");
    }
    catch(Exception $e){
        die('Erreur:'.$e->getMessage());
    }

    $userInfo = $pdo->prepare('SELECT * FROM user ORDER BY time ASC LIMIT 5');

    $userInfo->execute();
    $users = $userInfo->fetchAll();

?>