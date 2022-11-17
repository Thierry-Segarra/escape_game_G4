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

var endSize = 35;
var endStatus = 0;
var lockEnd = false;

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

var image = document.getElementById("source");
var image_mur = document.getElementById("source1");

var nb_dossier_image = 1;


fetch("../js/objet.json")
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
          image_dossier = image_doc(nb_dossier_image);
          dossier[<?php echo $i ?>] = { x: x, y: y, size: size, status: 1, titre: titre, nombre: nombre ,image_dossier: image_dossier};
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
        leftPressed = false;
        upPressed = false;
        downPressed = false;
        animation_mouve("right",rightPressed);
    }
    else if(e.key == "q") {
        rightPressed = false;
        leftPressed = true;
        upPressed = false;
        downPressed = false;
        animation_mouve("left",leftPressed);
    }
    else if(e.key == "z") {
        rightPressed = false;
        leftPressed = false;
        upPressed = true;
        downPressed = false;
        animation_mouve("up",upPressed);
    }
    else if(e.key == "s") {
        rightPressed = false;
        leftPressed = false;
        upPressed = false;
        downPressed = true;
        animation_mouve("down",downPressed);
    }
}

function keyUpHandler(e) {
    if(e.key == "d") {
        rightPressed = false;
        animation_mouve("right",rightPressed);
    }
    else if(e.key == "q") {
        leftPressed = false;
        animation_mouve("left",leftPressed);
    }
    else if(e.key == "z") {
        upPressed = false;
        animation_mouve("up",upPressed);
    }
    else if(e.key == "s") {
        downPressed = false;
        animation_mouve("down",downPressed);
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
var lockendStatus = false;

function collisionDetectionEND() {
      if(endStatus == 1 && lockendStatus == false) {
        if(paddleX+playerSize > canvas.width - endSize && paddleX < canvas.width && paddleY+playerSize > canvas.height - endSize && paddleY < canvas.height) {
          lockendStatus = true;
          document.getElementById("inputnb").innerHTML ='<input class="number" type="number" id="inputVerif" min="0" max="9999"></input><button class="validation" onclick="verifier()">valider code</button>';
        }
      }
  }


function drawPaddle() {
  ctx.beginPath();
  ctx.rect(paddleX, paddleY, playerSize, playerSize);
  ctx.drawImage(image, paddleX - 5, paddleY - 5, 30,30);
  ctx.closePath();
}

function drawEnd() {
  if(endStatus == 1) {
    ctx.beginPath();
    ctx.rect(canvas.width - endSize, canvas.height - endSize, endSize, endSize);
    ctx.fillStyle = "green";
    ctx.fill();
    ctx.closePath();
  }
}

function DossierCollecter() {
  endStatus = 1;
  for(var c=0; c < dossier.length; c++) {
        var b = dossier[c];
        if(b.status == 1) {
          endStatus = 0;
        }
  }
}

function drawdossier() {
    for(var c=0; c < dossier.length; c++) {
        var b = dossier[c];
        if(b.status == 1) {
          var brickX = (b.x);
          var brickY = (b.y);
          ctx.beginPath();
          ctx.rect(brickX, brickY, brickWidth, brickHeight);
          ctx.drawImage(b.image_dossier, brickX - 5, brickY - 5, brickWidth,brickHeight);
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
        ctx.fillStyle = ctx.createPattern(image_mur, "repeat");
        ctx.shadowColor = "black";
        ctx.shadowBlur = 15;
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
  drawEnd()
  collisionDetectionEND()
  DossierCollecter()
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
    if(downverif === false){paddleY += speed}
    
  }
  else if(upPressed && paddleY > 0) {
    
    upverif = up(mur,paddleX,paddleY,playerSize);
    if(upverif === false){paddleY -= speed}
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
    //document.location.href="game.php"; 
  }
}

function getRandomInt() {
  return Math.floor(Math.random() * 9);
}

var lock_move_left = false;
var lock_move_right = false;
var lock_move_up = false;
var lock_move_down = false;

var animation_move_image;

var nb_image = 2;

function animation_mouve(move, lock){

  if(lock == true){
    if (move == 'left') {
      if(lock_move_left == false){
        lock_move_left = true;
        lock_move_right = false;
        lock_move_up = false;
        lock_move_down = false;
        clearInterval(animation_move_image);
        nb_image = 1;
        document.getElementById("source").src = '../images/left1.png';
        animation_move_image = setInterval(animation_player_move, 100, 'left');
      }
      

    }else if (move == 'right') {

      if(lock_move_right == false){
        lock_move_left = false;
        lock_move_right = true;
        lock_move_up = false;
        lock_move_down = false;
        clearInterval(animation_move_image);
        nb_image = 2;
        document.getElementById("source").src = '../images/right1.png';
        animation_move_image = setInterval(animation_player_move, 100, 'right');
      }

    }else if (move == 'up') {
      if(lock_move_up == false){
        lock_move_left = false;
        lock_move_right = false;
        lock_move_up = true;
        lock_move_down = false;
        clearInterval(animation_move_image);
        nb_image = 2;
        document.getElementById("source").src = '../images/up1.png';
        animation_move_image = setInterval(animation_player_move, 100, 'up');
      }
    }else if (move == 'down') {
      if(lock_move_down == false){
        lock_move_left = false;
        lock_move_right = false;
        lock_move_up = false;
        lock_move_down = true;
        clearInterval(animation_move_image);
        nb_image = 2;
        document.getElementById("source").src = '../images/down1.png';
        animation_move_image = setInterval(animation_player_move, 100, 'down');
      }
    }
  }else{
    lock_move_left = false;
    lock_move_right = false;
    lock_move_up = false;
    lock_move_down = false;
    
    
    
    
    clearInterval(animation_move_image);
  }

}

function animation_player_move(direction){
  if(nb_image >4){
    nb_image = 1;
  }
  if(direction == 'left'){
    document.getElementById("source").src = '../images/left'+nb_image+'.png';
    nb_image++;
  }else if(direction == 'right'){
    document.getElementById("source").src = '../images/right'+nb_image+'.png';
    nb_image++;
  }else if(direction == 'up'){
    document.getElementById("source").src = '../images/up'+nb_image+'.png';
    nb_image++;
  }else if(direction == 'down'){
    document.getElementById("source").src = '../images/down'+nb_image+'.png';
    nb_image++;
  }
  
  
}

function image_doc(id){
  let nb_image = Math.floor(Math.random() * (3) + 1);
  document.getElementById("doc"+id).src = '../images/document_'+nb_image+'.png';
  let image_doc = document.getElementById("doc"+id);
  nb_dossier_image++;
  return image_doc; 
}
// expected output: 0, 1 or 2

</script>