var btn = document.getElementById("nav-menu-button");

var pt1 = document.getElementById("pt1");

var pt2 = document.getElementById("pt2");

var modal = document.getElementById("indice");

// Pour récupérer le span de la modale donc la croix X
var span = document.getElementsByClassName("close")[0];

var ok = document.getElementsByClassName("ok")[0];

// Pour récupérer le bouton de validation de la question
var valider = document.getElementsByClassName("oui")[0];

// Pour récupérer le bouton de validation de la question
var refuser = document.getElementsByClassName("non")[0];

// Permets d'afficher la modale lorsque le joueur clique sur le bouton btn en question
btn.onclick = function() {
    modal.style.display = "block";
    pt1.style.display = "block";
}

ok.onclick = function() {
    modal.style.display = "none";
    pt2.style.display = "none";
}

// Permet de fermer la modale lorsque le joueur clique sur la croix
span.onclick = function() {
    modal.style.display = "none";
    pt1.style.display = "none";
    pt2.style.display = "none";
}

refuser.onclick = function() {
    modal.style.display = "none";
    pt1.style.display = "none";
}

valider.onclick = function() {
    modal.style.display = "block";
    pt1.style.display = "none";
    pt2.style.display = "block";
}