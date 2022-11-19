<?php
$db_username = 'jch';
$db_password = 'limdp2444';
$db_name     = 'jch_gscape';// verifier ici le nom de la base de donnée
$db_host     = 'mysql-jch.alwaysdata.net';
$db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');
?>