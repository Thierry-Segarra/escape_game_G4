<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stage_1.css">
    <title>Stage 1</title>
</head>

<canvas id="canvas">
</canvas>

<script type="text/javascript" >
    var canvas = document.getElementById("canvas");
    fetch("objet.json")
    .then(response => response.json())
    .then(data =>{
        console.log(data)
        canvas.width = data.terrain.width;
        canvas.height = data.terrain.height;
    })
</script>
<div>
    <p>Code</p>
    <span id="code1"></span>
    <span id="code2"></span>
    <span id="code3"></span>
    <span id="code4"></span>
</div>
<div id="inputnb"></div>



<?php include("game.php") ?>