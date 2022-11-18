//Liste des boutons pour les récupérer
var btn1 = document.getElementById("btnStudent1");
var btn2 = document.getElementById("btnStudent2");
var btn3 = document.getElementById("btnStudent3");
var btn4 = document.getElementById("btnStudent4");

//Liste des modaux
var modal1 = document.getElementById("modalQuestion1");
var modal2 = document.getElementById("modalQuestion2");
var modal3 = document.getElementById("modalQuestion3");
var modal4 = document.getElementById("modalQuestion4");

// Pour récupérer le span de la modale donc la croix X
var span1 = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close")[1]; 
var span3 = document.getElementsByClassName("close")[2]; 
var span4 = document.getElementsByClassName("close")[3]; 

// Pour récupérer le bouton de validation de la question
var validation1 = document.getElementsByClassName("validation")[0];
var validation2 = document.getElementsByClassName("validation")[1]; 
var validation3 = document.getElementsByClassName("validation")[2]; 
var validation4 = document.getElementsByClassName("validation")[3]; 

// Permets d'afficher la modale lorsque le joueur clique sur le bouton btn en question
btn1.onclick = function() {
    modal1.style.display = "block";
}

btn2.onclick = function() {
    modal2.style.display = "block";
}

btn3.onclick = function() {
    modal3.style.display = "block";
}

btn4.onclick = function() {
    modal4.style.display = "block";
}

// Permet de fermer la modale lorsque le joueur clique sur la croix
span1.onclick = function() {
    modal1.style.display = "none";
}
span2.onclick = function() {
    modal2.style.display = "none";
}
span3.onclick = function() {
    modal3.style.display = "none";
}
span4.onclick = function() {
    modal4.style.display = "none";
}


// Récupérer la réponse + fermer la modale en question
validation1.onclick = function() {
    modal1.style.display = "none";
    validquizz();
    returnScore();
}
validation2.onclick = function() {
    modal2.style.display = "none";
    validquizz();
    returnScore();
}
validation3.onclick = function() {
    modal3.style.display = "none";
    validquizz();
    returnScore();
}
validation4.onclick = function() {
    modal4.style.display = "none";
    validquizz();
    returnScore();
}


//Liste des valeurs correctes du QCM
var answers = ["reponseA3", "reponseB2", "reponseC4", "A"],
    totalAnswers = answers.length;

//Pour calculer le nombre de questions auquelles le joueur a répondu correctement
var answersPlayer = 0; 

//Méthode qui va vérifier les bonnes réponses de chaque questionnaire
function validquizz()  {
    if (document.getElementById("reponseA3").checked) { 
        btn1.src ="../images/dude_1_happy.png";
        document.getElementById("correct").play();
        answersPlayer++  
    }
    else if (document.getElementById("reponseA1").checked || document.getElementById("reponseA2").checked || document.getElementById("reponseA4").checked){
        document.getElementById("failed").play();
        incrementCompteur()
    }
    if (document.getElementById("reponseB2").checked) { 
        btn2.src ="../images/dude_2_happy.png"; 
        document.getElementById("correct").play();
        answersPlayer++ 
    }
    else if (document.getElementById("reponseB1").checked || document.getElementById("reponseB3").checked || document.getElementById("reponseB4").checked){
        document.getElementById("failed").play();
        incrementCompteur()
    }
    if (document.getElementById("reponseC4").checked) { 
        btn3.src ="../images/dude_4_happy.png";
        document.getElementById("correct").play();
        answersPlayer++ 
    }
    else if (document.getElementById("reponseC1").checked || document.getElementById("reponseC2").checked || document.getElementById("reponseC3").checked){
        document.getElementById("failed").play();
        incrementCompteur()
    }
    if (document.getElementById("reponseD3").checked) {  
        btn4.src ="../images/dude_5_happy.png";
        document.getElementById("correct").play();
        answersPlayer++ 
    }
    else if (document.getElementById("reponseD2").checked || document.getElementById("reponseD1").checked || document.getElementById("reponseD4").checked){
        document.getElementById("failed").play();
        incrementCompteur()
    }
}


//Animation pour le chien
function ChienAnimation() {
    document.getElementById("chien").style.marginLeft = "130vw";
    document.getElementById("aboiement").autoplay;
}

var image_chien = 1;
initicialChien();

function initicialChien(){
    document.getElementById('initchien').innerHTML = '<img id="chien" class="image" src="../images/chien1.png" alt="">';
    setTimeout(() => {
        setInterval(animationChien,100);
        ChienAnimation()
        setTimeout(() => {
            initicialChien()
            clearInterval(setInterval(animationChien,100));
        }, 30000);
    }, 10000);

}

function animationChien(){
    if (image_chien >= 5) {
        image_chien = 1;
    }
    document.getElementById('chien').src = '../images/chien'+image_chien+'.png';
    image_chien++;

}


//Méthode qui retourne la valeur du score du joueur
        var text = `Un chef de projet qui connait aussi les bases du développement WEB.. 
        Vous êtes de l'Institut G4 ? Vous êtes l'élu !`;
        var suivant = "stage4.php";
function returnScore() {
    document.getElementById("resultat").innerHTML =
        "Vous avez répondu correctement a " + answersPlayer + " question(s) sur " + totalAnswers;
    if (answersPlayer == 4) {
        console.log("Stage réussi");
        stop();
        console.log(text,suivant);
        transitionFermer(text,suivant);
        
    }
}


//Méthodes pour afficher les images que l'on retrouve dans les questions
function voirImageQuestion2() {
    window.open("../images/imageQuestion2.PNG")     
}

function voirImageQuestion4() {
    window.open("../images/imageQuestion4.PNG")     
}