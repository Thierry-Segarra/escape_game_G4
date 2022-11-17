<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stage_1.css">
    <title>Stage 1</title>
</head>

<canvas id="canvas" class="canvas">
</canvas>
<img id="source" src="image/down1.png"width="8" height="8">
<img id="source1" src="image/mur.png"width="8" height="8">

<img id="doc1" src=""width="8" height="8">
<img id="doc2" src=""width="8" height="8">
<img id="doc3" src=""width="8" height="8">
<img id="doc4" src=""width="8" height="8">

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