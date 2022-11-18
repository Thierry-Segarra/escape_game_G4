<?php
require('../database.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../Styles/modal.css">
    <link rel="stylesheet" href="../Styles/page_fin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">

    <title>Escape Game</title>
</head>



<body>

    <div class="container">
        <div class="sky">
        </div>
        <div class="adjust">
            <div class="titre1"> Bravo ! </div>
            <div class="titre2"> Vous êtes le meilleur chef de projet ;) </div>
            <div class="titre2" id="temps"></div>

            <div class="coeur">
                <img src="../Images/coeur.png" style="width: 90px;">
                <img src="../Images/coeur.png" style="width: 90px;">
                <img src="../Images/coeur.png" style="width: 90px;">
            </div>
            <div class="pseudo">
                <form action="../Back/ajout_joueur.php" method="POST">
                    <label>
                        <p>Entrez votre Pseudo</p>
                    </label>
                    <input name="pseudo" type="text">
                    <input name="time" id="temps_local" type="text" value="" hidden>
                    <input class="valider" type="submit" value="Valider">
                </form>
            </div>



            




            </div>
            <div class="stars"></div>
            <div class="stars1"></div>
            <div class="stars2"></div>
            <div class="shooting-stars"></div>
        </div>
    </div>
</body>

<footer>

</footer>

</html>
<script>
    window.onload = function()
    {   
        var s= 0;
        var mn = 0;
        if (localStorage != null) {
            temps2 = localStorage.getItem('temps');
            document.getElementById('temps').innerHTML = temps2;
            document.getElementById('temps_local').value = temps2;
        }
    }
</script>