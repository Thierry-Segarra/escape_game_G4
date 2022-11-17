<?php
require('../database.php');
$name = mysqli_real_escape_string($db,htmlspecialchars($_POST['pseudo']));
$time = mysqli_real_escape_string($db,htmlspecialchars($_POST['time']));
echo $name;
$requete = "INSERT INTO user(name, time) VALUES ('".$name."','".$time."')"; // id auto-increase
echo $requete;
            
                $requete1 = mysqli_query($db,$requete) or die("Foobar");// doit normalement executer la requete SQL

                if($requete1){
                    header('Location: ../index.php');
                }
