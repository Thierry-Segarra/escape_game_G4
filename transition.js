function transitionFermer() {
  document.getElementById("transition").style.marginLeft = "-100px";
  document.getElementById("text").innerHTML = '<textarea class="area" id="textdinamique" disabled></textarea>';
  let div = 'textdinamique';
  let text = `Surprenant ! La phase de cadrage ne vous a pas vu venir.
Sans ces livrables, le projet se dirigerait droit dans le mur !`;
  let suivant = '<a class="bouton" href="stage_2.php">Suivant</a>';
  let bouton = 'text';
  setTimeout(textDinamique,3000,div,bouton, text,suivant)
}
function transitionOuver() {
  document.getElementById("transition").style.marginLeft = "100vw";
}
var interval_text;
var t = 0;

textDinamique('textdinamique','text',`Le projet ne doit pas tomber à l'eau !
Vous êtes notre dernier espoir, reprenez en main le projet et menez le jusqu'à sa réussite !
Commencez par retrouver les livrables perdus et rejoignez votre équipe.`,'<button class="bouton" onclick = "transitionOuver()">Au boulot !</button>');

function textDinamique(div,bouton, text,suivant) {
var nb_text = text.length;
interval_text = setInterval(dinamique,10,div,nb_text,text,bouton,suivant);
} 

function dinamique(div,nb_text,text,bouton,suivant){
console.log(div,nb_text,t);
if ( t < nb_text)
{
  console.log(text.substring(t,t+1));
  let lettre = text.substring(t,t+1);
  t = t +1;
  console.log(lettre);
  document.getElementById(div).innerHTML = document.getElementById(div).innerHTML + lettre;
  
}else{
  clearInterval(interval_text);
  t = 0;
  document.getElementById(bouton).innerHTML = document.getElementById(bouton).innerHTML + suivant;
}
  
}