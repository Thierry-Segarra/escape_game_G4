<script>
var canvas = document.getElementById("canvas");


var ctx = canvas.getContext("2d");
var x = canvas.width/2;
var y = canvas.height-30;





var dx = 2;
var dy = -2;
var playerSize = 0;
var paddleX = 0;
var paddleY = 0;
var speed = 0;
var rightPressed = false;
var leftPressed = false;
var upPressed = false;
var downPressed = false;
var nb_dossier = 4;

let rightverif = false;
let leftverif = false;
let upverif = false;
let downverif = false;

var brickRowCount = 5;
var brickColumnCount = 4;
var brickWidth = 35;
var brickHeight = 35;

var brickPadding = 10;
var brickOffsetTop = 30;
var brickOffsetLeft = 30;
var score = 0;
var lives = 3;

var code = '';

var dossier = [];
var mur = [];

fetch("objet.json")
.then(response => response.json())
.then(data =>{
    console.log(data)
    // Player
    playerSize = data.player.size;
    paddleX = data.player.x;
    paddleY = data.player.y;
    speed = data.player.speed;

    // Dossier
        let size = data.dossier.size;
        let x= 0;
        let y= 0;
        <?php for ($i=0; $i < 4 ; $i++) { ?>
          x= data.dossier.x<?php echo $i ?>;
          y= data.dossier.y<?php echo $i ?>;
          titre= data.dossier.titre<?php echo $i ?>;
          nombre = getRandomInt();
          code = code + nombre;
          dossier[<?php echo $i ?>] = { x: x, y: y, size: size, status: 1, titre: titre, nombre: nombre };
        <?php }; ?>
      
    // Mur
        console.log(code);
        let hm = 0;
        let wm = 0;
        let xm = 0;
        let ym = 0;
        <?php for ($a=0; $a < 40 ; $a++) { ?>
          xm= data.mur.x<?php echo $a ?>;
          ym= data.mur.y<?php echo $a ?>;
          hm= data.mur.h<?php echo $a ?>;
          wm= data.mur.w<?php echo $a ?>;
          mur[<?php echo $a ?>] = { x: xm, y: ym, h: hm, w: wm};
        <?php }; ?>
})




/*
var dossier = [];
for(var c=0; c<brickColumnCount; c++) {
  dossier[c] = [];
  for(var r=0; r<brickRowCount; r++) {
    dossier[c][r] = { x: 0, y: 0, status: 1 };
  }
}
*/

document.addEventListener("keydown", keyDownHandler, false);
document.addEventListener("keyup", keyUpHandler, false);
//document.addEventListener("mousemove", mouseMoveHandler, false);

function keyDownHandler(e) {
    if(e.key == "d") {
        rightPressed = true;
    }
    else if(e.key == "q") {
        leftPressed = true;
    }
    else if(e.key == "z") {
        upPressed = true;
    }
    else if(e.key == "s") {
        downPressed = true;
    }
}
function keyUpHandler(e) {
    if(e.key == "d") {
        rightPressed = false;
    }
    else if(e.key == "q") {
        leftPressed = false;
    }
    else if(e.key == "z") {
        upPressed = false;
    }
    else if(e.key == "s") {
        downPressed = false;
    }
}
function collisionDetection() {
  for(var c=0; c<dossier.length; c++) {
      var b = dossier[c];
      if(b.status == 1) {
        if(paddleX+playerSize > b.x && paddleX < b.x+b.size && paddleY+playerSize > b.y && paddleY < b.y+b.size) {
          dy = -dy;
          b.status = 0;
          score++;
          if(document.getElementById("code1").innerHTML == ""){
            document.getElementById("code1").innerHTML = b.titre +" : "+ b.nombre+" <br> ";

          }else if(document.getElementById("code2").innerHTML == ""){
            document.getElementById("code2").innerHTML = b.titre +" : "+ b.nombre+" <br> ";

          }else if(document.getElementById("code3").innerHTML == ""){
            document.getElementById("code3").innerHTML = b.titre +" : "+ b.nombre+" <br> ";

          }else if(document.getElementById("code4").innerHTML == ""){
            document.getElementById("code4").innerHTML = b.titre +" : "+ b.nombre+" <br> ";
          }
          /*
          if(score == brickRowCount*brickColumnCount) {
            alert("YOU WIN, CONGRATS!");
            document.location.reload();
          }
          */
        }
      }
  }
}

function drawPaddle() {
  ctx.beginPath();
  ctx.rect(paddleX, paddleY, playerSize, playerSize);
  ctx.fillStyle = "#0095DD";
  ctx.fill();
  ctx.closePath();
}

function drawdossier() {
    for(var c=0; c < dossier.length; c++) {
        var b = dossier[c];
        if(b.status == 1) {
          
          var brickX = (b.x);
          var brickY = (b.y);
          ctx.beginPath();
          ctx.rect(brickX, brickY, brickWidth, brickHeight);
          ctx.fillStyle = "#0095DD";
          ctx.fill();
          ctx.closePath();
        }
    }
  }

  function drawmur() {
    for(var c=0; c < mur.length; c++) {
        var b = mur[c];
        var brickX = (b.x);
        var brickY = (b.y);
        var brickWidth = (b.w);
        var brickHeight = (b.h);
        ctx.beginPath();
        ctx.rect(brickX, brickY, brickWidth, brickHeight);
        ctx.fillStyle = "#000000";
        ctx.fill();
        ctx.closePath();
    }
  }

/*
function drawScore() {
  ctx.font = "16px Arial";
  ctx.fillStyle = "#0095DD";
  ctx.fillText("Score: "+score, 8, 20);
}
function drawLives() {
  ctx.font = "16px Arial";
  ctx.fillStyle = "#0095DD";
  ctx.fillText("Lives: "+lives, canvas.width-65, 20);
}
*/
function draw() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  
  drawmur()
  collisionDetection();
  drawdossier();
  drawPaddle();
  


  if(rightPressed && paddleX < canvas.width-playerSize) {
    rightverif = right(mur,paddleX,paddleY,playerSize);
    if(rightverif === false){paddleX += speed}
    
  }
  else if(leftPressed && paddleX > 0) {
    leftverif = left(mur,paddleX,paddleY,playerSize);
    if(leftverif === false){paddleX -= speed}
  }
  
  if(downPressed && paddleY < canvas.height-playerSize) {
    downverif = down(mur,paddleX,paddleY,playerSize);
    if(downverif === false){paddleY += speed;}
    
  }
  else if(upPressed && paddleY > 0) {
    
    upverif = up(mur,paddleX,paddleY,playerSize);
    if(upverif === false){paddleY -= speed;}
  }

  x += dx;
  y += dy;
  requestAnimationFrame(draw);
}

draw();

function right(mur,paddleX,paddleY,playerSize){
  var lock = false;
  for(var c=0; c < mur.length; c++) {
    
      if(paddleX + playerSize +3   > mur[c].x && paddleX +3 < mur[c].x + mur[c].w && paddleY +playerSize > mur[c].y && paddleY < mur[c].y + mur[c].h){
        lock = true;
        /*
        console.log(lock);
        console.log('Player');
        console.log('PlayerX + size '+(paddleX + playerSize +1));
        console.log('PlayerX '+(paddleX +3));
        console.log('PlayerY + size '+(paddleY +playerSize));
        console.log('PlayerX '+(paddleY));
        console.log('Wall');
        console.log('MurX '+(mur[c].x));
        console.log('MurY '+(mur[c].y));
        console.log('MurX + width '+(mur[c].x + mur[c].w));
        console.log('MurY + height '+(mur[c].x + mur[c].h));
        */
        return lock;
        
      }
  }
  return lock;
}

function left(mur,paddleX,paddleY,playerSize){
  var lock = false;
  for(var c=0; c < mur.length; c++) {
    
      if(paddleX + playerSize > mur[c].x && paddleX - 3 < mur[c].x + mur[c].w && paddleY +playerSize > mur[c].y && paddleY < mur[c].y + mur[c].h){
        lock = true;
        //console.log(lock);
        return lock;
        
      }
  }
  return lock;
}

function down(mur,paddleX,paddleY,playerSize){
  var lock = false;
  for(var c=0; c < mur.length; c++) {
    
      if(paddleX + playerSize > mur[c].x && paddleX < mur[c].x + mur[c].w && paddleY +playerSize +3 > mur[c].y && paddleY < mur[c].y + mur[c].h){
        lock = true;
        //console.log(lock);
        return lock;
        
      }
  }
  return lock;
}


function up(mur,paddleX,paddleY,playerSize){
  var lock = false;
  for(var c=0; c < mur.length; c++) {
    
      if(paddleX + playerSize > mur[c].x && paddleX < mur[c].x + mur[c].w && paddleY +playerSize > mur[c].y && paddleY -3 < mur[c].y + mur[c].h){
        lock = true;
        //console.log(lock);
        return lock;
        
      }
  }
  return lock;
}

function verifier(){
  inputVerif = document.getElementById("inputVerif").value;
  
  console.log(inputVerif);
  if(inputVerif == code){
    document.location.href="game.php"; 
  }
}

function getRandomInt() {
  return Math.floor(Math.random() * 9);
}

// expected output: 0, 1 or 2

</script>