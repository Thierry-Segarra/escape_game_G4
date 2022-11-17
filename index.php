<?php
require('database.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Styles/accueil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">

    <title>Escape Game</title>
</head>



<body>
    <div class="container">
        <div class="sky">

            <div class="adjust">
                <div class="titre1"> GScape </div>


                <div class="coeur">
                    <img src="Images/coeur.png" style="width: 90px;">
                    <img src="Images/coeur.png" style="width: 90px;">
                    <img src="Images/coeur.png" style="width: 90px;">
                </div>
                <div class="pseudo">
                    <a class="valider" href="Front/stage1.php">Jouer</a>
                </div>

                <div class="tab_score">
                    <div>Classement</div>
                    <?php
                    $requete = "SELECT * FROM user Order By time DESC Limit 5";
                    $exec_requete = mysqli_query($db, $requete);
                    while ($row = mysqli_fetch_assoc($exec_requete)) { ?>
                        <div>
                            <?php echo $row['name']; ?> : <?php echo $row['time']; ?>
                        </div>
                    <?php } ?>
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