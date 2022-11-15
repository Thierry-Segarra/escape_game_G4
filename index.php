<?php
require('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    
    <script src="./classement.js"></script>

    <title>Accueil</title>
</head>
<body>

    <div class="title">
        <h1>Bienvenue sur **MON-JEU**</h1>
    </div>

    <div class="container">
        <button>JOUER</button>
    </div>

    <div class="tab_score" style="border: 1px solid gray; background-color:lightgray; border-radius: 5px; margin: 6px; padding: 7px">
        <h4>Classement :</h4>
        <?php foreach($users as $user) { ?>
            <p>
                <?php echo $user['name'];?> : <?php echo $user['time'];?>
            </p>
        <?php } ?>
    </div>
  
</body>
</html>