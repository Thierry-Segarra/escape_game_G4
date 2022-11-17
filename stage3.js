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
var answers = ["A", "A", "A", "A"],
    totalAnswers = answers.length;

//Pour calculer le nombre de questions auquelles le joueur a répondu correctement
var answersPlayer = 0; 

//Méthode qui va vérifier les bonnes réponses de chaque questionnaire
function validquizz()  {
    if (document.getElementById("reponseA1").checked) { 
        alert ('Bonne réponse !'); 
        btn1.src ="images/dude_1_happy.png";;
        answersPlayer++  
    }
    if (document.getElementById("reponseB1").checked) { 
        alert ('Bonne réponse !'); 
        btn2.src ="images/dude_2_happy.png";; 
        answersPlayer++ 
    }
    if (document.getElementById("reponseC1").checked) { 
        alert ('Bonne réponse !'); 
        btn3.src ="images/dude_4_happy.png";;
        answersPlayer++ 
    }
    if (document.getElementById("reponseD1").checked) { 
        alert ('Bonne réponse !'); 
        btn4.src ="images/dude_5_happy.png";; 
        answersPlayer++ 
    }
    else {
        //méthode pour enlever un coeur
    }
}

//Méthode qui retourne la valeur du score du joueur
function returnScore() {
    document.getElementById("resultat").innerHTML =
        "Vous avez répondu correctement a " + answersPlayer + " question(s) sur " + totalAnswers;
    if (getScore() > 3) {
        console.log("Stage réussi");
    }
}


// PAS UTILISE POUR LE MOMENT

//Méthode pour récupérer toutes les valeurs choisies par le joueur
function getCheckedValue(radioName) {
    var radios = document.getElementsByName(radioName);
    for (var y = 0; y < radios.length; y++)
        if (radios[y].checked) return radios[y].value;
}

//Méthode qui récupère le score du joueur
function getScore() {
    var score = 0;
    for (var i = 0; i < totalAnswers; i++)
        if (getCheckedValue("question" + i) === answers[i]) score += 1;
    return score;
}