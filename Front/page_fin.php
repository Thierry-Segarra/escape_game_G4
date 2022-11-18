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
    <link rel="stylesheet" href="../Styles/nav.css">
    <link rel="stylesheet" href="../Styles/page_fin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">

    <title>Escape Game</title>
</head>



<body>
    <!-- euh--------------------------------------------------------------- -->
    <audio id="soundEnd" src="../sounds/ecran_titre.wav" autoplay loop ></audio>
    <nav id='nav' class='navbar'>
        <canvas width="100" height="100" class='navbar-canvas' id="navbar-grid"></canvas>

        <logo>
            <logo-inner>
                <div class='logo-gif'></div>
                <p>
                    GScape
                </p>

            </logo-inner>
        </logo>

        <nav-menu-button>
            <button id='nav-menu-button' class='nav-button' title='Navigation Menu'>
                Indice
            </button>
        </nav-menu-button>
    </nav>
    <!-- partial -->
    <script src="../script.js"></script>

    <!-- euh--------------------------------------------------------------- -->

    <div class="container">
        <div class="sky">
        </div>
        <div class="adjust">
            <div class="titre1"> Bravo ! </div>
            <div class="titre2"> Vous êtes le meilleur chef de projet ;) </div>

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
                    <input name="time" type="text" value="10:00" hidden>
                    <input class="valider" type="submit" value="Valider">
                </form>
            </div>



            <script src="../js/modal.js" defer></script>
            <div id="indice" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div id="pt1">
                        <div class="title">Êtes vous sûr de vouloir sacrifier une vie en échange d'un indice ?</div>
                        <button class="oui" onclick="">Oui</button>
                        <button class="non">Non</button>
                    </div>
                    <div id="pt2">
                        test test test
                        <button class="ok">OK</button>
                    </div>
                </div>




            </div>
            <div class="stars"></div>
            <div class="stars1"></div>
            <div class="stars2"></div>
            <div class="shooting-stars"></div>
        </div>
    </div>

    <script>
        var audioEnd = document.getElementById('soundEnd');
        audioEnd.volume = 0.8;
    </script>
</body>

<footer>

</footer>

</html>