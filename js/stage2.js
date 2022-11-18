var mousePosition;
var div;

var isDown = false;


// Fonctions utilitaire //

function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min)
  }

  function hasId(element){
    return typeof element.id != 'undefined';
}

function shuffle(array,array2) {
    let currentIndex = array.length,  randomIndex;
    while (currentIndex != 0) {
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex--;
        [array[currentIndex], array[randomIndex]] = [
            array[randomIndex], array[currentIndex]];
        [array2[currentIndex], array2[randomIndex]] = [
            array2[randomIndex], array2[currentIndex]];
    }
    return array,array2;
  }


// Documents aleatoire //

function changeDocument(){
    var item_elem = document.getElementsByClassName('item');
    for (var i = 0; i < item_elem.length; ++i) {
        var item = item_elem[i];  
        skin = randomIntFromInterval(1,6);
        item.style.backgroundImage = "url(../images/document_" + skin + ".png)"
    }
}

// Distribution des roles aleatoire //

function distribution(){
    attribut = ["FRONT1","FRONT2","BACK1","BACK2","DESIGNER","CONTROLE"];

    texte = ["Jacques HADIL, developpeur FRONT. N'hesite pas a me donner du travail!",
            "Salut, Alex de la famille TERIEUR. Mon grand frere est developper BACK.",
            "Bonjour ! Jean MENNUI de l'equipe de developpeur BACK. On n'a rien a faire?",
            "Alain de la famille TERIEUR. Mon petit-frere est developpeur FRONT!",
            "Je suis designer graphique, Adam TROIJOUR a votre service!",
            "On est pas en retard ? Ah oui. Bonjour, Axel ERE du pole controle qualite."]

    shuffle(attribut,texte); //melanger la table attribut
    //console.log(attribut);
    //console.log(texte);

    var box_elem = document.getElementsByClassName('box');
    for (var i = 0; i < box_elem.length; ++i) {
        var theBox = box_elem[i]; 

        theBox.setAttribute('id',attribut.shift()); //rajouter la premiere valeur d'attribut et l'enlever de la table
    }
    for (var i = 0; i < 6; ++i) {
        console.log(i);
        document.getElementById('bubble_' + i).innerHTML = texte.shift(); //rajouter la premiere valeur d'attribut et l'enlever de la table
    }

    //console.log(attribut);
    //console.log(texte);
}

function load(){
    distribution();
    changeDocument();
}


// Drag and drop //

document.addEventListener('mousedown', function(e) {
    isDown = true;
    if (document.elementFromPoint(e.clientX, e.clientY).className === "item"){
        div = document.elementFromPoint(e.clientX, e.clientY)
        div.style.zIndex = 0;
        div.style.position = "absolute";
        document.getElementById("audio_select").play();
    }
}, true);

document.addEventListener('mouseup', function(e) {
    isDown = false;
    if ((document.elementFromPoint(e.clientX, e.clientY).classList.contains('box')) && div!=null){
        box = document.elementFromPoint(e.clientX, e.clientY);
        div.style.zIndex = 2;

        box.prepend(div);
        div.style.position = "static";
        div = null;
        document.getElementById("audio_down").play();
        
    }
}, true);

document.addEventListener('mousemove', function(event) {
    event.preventDefault();
    if (isDown && (div != null)) {
        mousePosition = {

            x : event.clientX,
            y : event.clientY

        };
        div.style.left = (mousePosition.x + 10) + 'px';
        div.style.top  = (mousePosition.y + 10) + 'px';
    }
}, true);

// Verification des taches //

function gameOver(){
    document.getElementById("chef").src = "../images/chef_good.png";
    let text = `Votre organisation nous mènera au succès !
    Prochaine étape: la phase de production !`;
    let suivant = "stage3.php";
    transitionFermer(text,suivant);
    stop();
}

function verification(){
    var partie_front_1 = false;
    var partie_front_2 = false;
    var partie_back_1 = false;
    var partie_back_2 = false;
    var partie_designer = false;
    var partie_controle = false;

    var FRONT1 = document.getElementById('FRONT1');
    var FRONT2 = document.getElementById('FRONT2');
    item_1 = document.getElementById('item_1');
    item_2 = document.getElementById('item_2');
    item_3 = document.getElementById('item_3');
    item_4 = document.getElementById('item_4');

    var BACK1 = document.getElementById('BACK1');
    var BACK2 = document.getElementById('BACK2');
    item_5 = document.getElementById('item_5');
    item_6 = document.getElementById('item_6');
    item_7 = document.getElementById('item_7');
    item_8 = document.getElementById('item_8');

    var DESIGNER = document.getElementById('DESIGNER');
    item_9 = document.getElementById('item_9');
    item_10 = document.getElementById('item_10');

    var CONTROLE = document.getElementById('CONTROLE');
    item_11 = document.getElementById('item_11');
    item_12 = document.getElementById('item_12');

    if ((FRONT1.childElementCount === 2) && (FRONT1.contains(item_1) || FRONT1.contains(item_2) || FRONT1.contains(item_3) || FRONT1.contains(item_4))){
        FRONT1.style.border = "solid 3px green";
        partie_front_1 = true;
        document.getElementById("audio_validation").play();
    }else{
        FRONT1.style.border = "dashed 2px rgb(37, 37, 37)";
        FRONT1.style.border = "border: right 5px green";
        partie_front_1 = false;
    }

    if ((FRONT2.childElementCount === 2) && (FRONT2.contains(item_1) || FRONT2.contains(item_2) || FRONT2.contains(item_3) || FRONT2.contains(item_4))){
        FRONT2.style.border = "solid 3px green";
        partie_front_2 = true;
        document.getElementById("audio_validation").play();
    }else{
        FRONT2.style.border = "dashed 2px rgb(37, 37, 37)";
        partie_front_2 = false;
    }

    if ((BACK1.childElementCount === 2) && (BACK1.contains(item_5) || BACK1.contains(item_6) || BACK1.contains(item_7) || BACK1.contains(item_8))){
        BACK1.style.border = "solid 3px green";
        partie_back_1 = true;
        document.getElementById("audio_validation").play();
    }else{
        BACK1.style.border = "dashed 2px rgb(37, 37, 37)";
        partie_back_1 = false;
    }

    if ((BACK2.childElementCount === 2) && (BACK2.contains(item_5) || BACK2.contains(item_6) || BACK2.contains(item_7) || BACK2.contains(item_8))){
        BACK2.style.border = "solid 3px green";
        partie_back_2 = true;
        document.getElementById("audio_validation").play();
    }else{
        BACK2.style.border = "dashed 2px rgb(37, 37, 37)";
        partie_back_2 = false;
    }

    if ((DESIGNER.childElementCount === 2) && (DESIGNER.contains(item_9) || DESIGNER.contains(item_10))){
        DESIGNER.style.border = "solid 3px green";
        partie_designer = true;
        document.getElementById("audio_validation").play();
    }else{
        DESIGNER.style.border = "dashed 2px rgb(37, 37, 37)";
        partie_designer = false;
    }

    if ((CONTROLE.childElementCount === 2) && (CONTROLE.contains(item_11) || CONTROLE.contains(item_12))){
        CONTROLE.style.border = "solid 3px green";
        partie_controle = true;
        document.getElementById("audio_validation").play();
    }else{
        CONTROLE.style.border = "dashed 2px rgb(37, 37, 37)";
        partie_controle = false;
    }


    if (partie_front_1 && partie_front_2 && partie_back_1 && partie_back_2 && partie_designer && partie_controle){
        console.log("ca marche!");
        gameOver(); // Fin du jeu
    }
}

function textTerminal(text){
    document.getElementById('terminal').innerHTML = "> " + text
}