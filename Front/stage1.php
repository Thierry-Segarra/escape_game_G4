<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Styles/stage1.css">
    <title>Stage 1</title>
</head>
<?php
include("../back/transition.php");
?>
<script>
  //textDinamique('textdinamique','text','voici le stage 1','<button class="bouton" onclick = "transitionOuver()">Au Boulot</button>'); // texte début
</script>
<body>
    <div class="sliding-background"></div>
    <canvas id="canvas" class="canvas"></canvas>

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

    <div class="lock" id="inputnb"></div>
    <div class="keyboard"></div>

    <?php include("../back/game.php") ?>
</body>