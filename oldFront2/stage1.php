<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Styles/stage1.css">
    <title>Stage 1</title>
</head>
<?php
include("../Back/transition.php");
include("../navbar/navbar.php");
?>
<script>
    textDinamique('textdinamique','text',`Le projet ne doit pas tomber à l'eau !
Vous êtes notre dernier espoir, reprenez en main le projet et menez le jusqu'à sa réussite !
Commencez par retrouver les livrables perdus et rejoignez votre équipe.`,'<button class="bouton" onclick = "transitionOuver();lock_drow_function();start()">Au boulot !</button>');
</script>
<body>
    <audio id="soundStage1" src="../sounds/stage1.wav" autoplay loop ></audio>
    <div class="sliding-background"></div>
    <div class="canva_bord">
        <canvas id="canvas" class="canvas"></canvas>
    </div>
    

    <div class="hidden">
        <img id="source" src="../images/down1.png"width="8" height="8">
        <img id="source1" src="../images/mur.png"width="8" height="8">
        <img id="doc1" src=""width="8" height="8">
        <img id="doc2" src=""width="8" height="8">
        <img id="doc3" src=""width="8" height="8">
        <img id="doc4" src=""width="8" height="8">
    </div>


    <script type="text/javascript" >
        var canvas = document.getElementById("canvas");
        fetch("../js/objet.json")
        .then(response => response.json())
        .then(data =>{
            console.log(data)
            canvas.width = data.terrain.width;
            canvas.height = data.terrain.height;
        })
    </script>

    <div class="code">
        <span id="code1"></span>
        <span id="code2"></span>
        <span id="code3"></span>
        <span id="code4"></span>
    </div>

    <div class="lock" id="inputnb"><input class="number" type="number" id="inputVerif" min="0" max="9999"></input></div>
    <div class="keyboard"></div>

    <?php include("../back/game.php") ?>
    <script type="text/javascript">
        var audioStage1 = document.getElementById('soundStage1');
        audioStage1.volume = 1;
    </script>
</body>