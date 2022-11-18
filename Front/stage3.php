<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../Styles/stage3.css">
    <title>Stage 3</title>
</head>
<body>
<?php
    include("../Back/transition.php");
    include("../navbar/navbar.php");
    ?>
    <script>
        textDinamique('textdinamique','text',`Le produit est en cours de développement.
N'hésitez pas à prendre des nouvelles de votre équipes.
Ils ont probablement des questions à vous poser.`,'<button class="bouton" onclick = "transitionOuver();start()">Au boulot !</button>');
    </script>
</body>
</html>

<script type="text/javascript" src="../js/stage3.js" defer></script>
<audio id="soundStage3" src="../sounds/stage3.wav" autoplay loop ></audio>

<!-- Bouton VALIDER -->
<!-- <div class="red_button" onclick="returnScore()">
    <div class="red_button_text">VALIDER</div>
</div> -->

<!-- Elements de décor -->
<div class="fontaine_eau"></div>

<div class="robertCoffee"></div>

<div class="plante1"></div>

<div class="plante2"></div>

<div class="plante3"></div>

<div class="deskaqua"></div>

<div class="chefprojet"></div>

<div class="tableCoffee"></div>

<div class="tapisOurs"></div>

<div class="tapisRouge"></div>

<!-- FRONT élèves avec bureau -->
<div class="line">
    <img class="person" id="btnStudent1" src="../images/dude_1_angry.png">
    <img class="person" id="btnStudent2" src="../images/dude_3_angry.png">
</div>

<div class="line">
    <img class="person" src="../images/dude_4_happy.png">
    <img class="person" id="btnStudent3" src="../images/dude_5_angry.png">
</div>

<div  class="chien" id="initchien"></div>

<div class="line">
    <img class="person" id="btnStudent4" src="../images/dude_6_angry.png">
    <img class="person" src="../images/dude_2_happy.png">
</div>


<!-- Modal -->
<div id="modalQuestion1" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
           
                <div class="title">J'ai besoin d'ajouter des commentaires dans mon code HTML,
                    mais je ne me souviens plus de la syntaxe... 
                    Peux-tu me rappeler ce que je dois mettre s'il te plaît ?</div>
                <ul class="choices">
                    <li>
                        <label
                            ><input type="radio" id="reponseA1" name="question1" value="A" /><span
                                >#</span
                            ></label
                        >
                    </li>
                    <li>
                        <label
                            ><input type="radio" id="reponseA2" name="question1" value="B" /><span
                                >/*  */</span
                            ></label
                        >
                    </li>
                    <li>
                        <label
                            ><input type="radio" id="reponseA3" name="question1" value="C" /><span
                                >&#60!--   --></span
                            ></label
                        >
                    </li>
                    <li>
                        <label
                            ><input type="radio" id="reponseA4" name="question1" value="D" /><span
                                >//</span
                            ></label
                        >
                    </li>
                </ul>
            <button class="validation" onclick="validquizz()">Valider</button>
        <!-- </div> -->
    </div>
</div>
<div id="modalQuestion2" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
                <!-- <img class="monImage" src="images/MonImage.PNG"> -->
                <div class="title">Voici mon code HTML (clique sur le bouton pour voir le code): <br>    &#60img src="MonImage" alt="Illustration de mon image"&#62
                    J'essaie d'insérer une image mais ça ne marche pas.
                    Quelle est l'erreur ?</div>
                <button class="buttonQuestion" onclick="voirImageQuestion2()">Voir l'image</button>
                <ul class="choices">
                    <li>
                        <label
                            ><input type="radio" id="reponseB1" name="question1" value="A" /><span
                                >L'image n'est pas placée dans le bon répertoire</span
                            ></label
                        >
                    </li>
                    <li>
                        <label
                            ><input type="radio" id="reponseB2" name="question1" value="B" /><span
                                >Il manque l'extension de l'image dans l'attribut src</span
                            ></label
                        >
                    </li>
                    <li>
                        <label
                            ><input type="radio" id="reponseB3" name="question1" value="C" /><span
                                >Il est nécessaire de supprimer les doubles quotes de l'attribut src</span
                            ></label
                        >
                    </li>
                    <li>
                        <label
                            ><input type="radio" id="reponseB4" name="question1" value="D" /><span
                                >Cette balise ne permet pas d'insérer une image</span
                            ></label
                        >
                    </li>
                </ul>
        <button class="validation" onclick="validquizz()">Valider</button>
    </div>
</div>
<div id="modalQuestion3" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
                <div class="title">J'essaie d'insérer des données dans ma base de donnée mais ça ne marche pas ! Voici ma requête SQL : <br><br>
                    INSERT INTO UTILISATEURS (id, nom, prenom, login) VALUES<br>
                        (1,"Jacques","Sonne","j.sonne");<br>
                        (2,'Jean','Bambois','j.bambois');<br>
                        (3,"Lucie","Fer","lucie.fer");<br>
                        (7,"Omer","Dalors","o.dalors");<br>
                        Quel est l'erreur ?</div>
                <ul class="choices taille"> 
                    <li>
                        <label
                            ><input type="radio" id="reponseC1" name="question1" value="A" /><span
                                >Des simples quotes et des doubles quotes sont mélangés. Il faut choisir soit l'un soit l'autre</span
                            ></label
                        >
                    </li>
                    <li>
                        <label
                            ><input type="radio" id="reponseC2" name="question1" value="B" /><span
                                >La base de données n'aime pas les jeux de mots</span
                            ></label
                        >
                    </li>
                    <li>
                        <label
                            ><input type="radio" id="reponseC3" name="question1" value="C" /><span
                                >Les IDs ne sont pas tous à la suite </span
                            ></label
                        >
                    </li>
                    <li>
                        <label
                            ><input type="radio" id="reponseC4" name="question1" value="D" /><span
                                >Il y a des points-virgules à la fin de chaque ligne à insérer</span
                            ></label
                        >
                    </li>
                </ul>
        <button class="validation" onclick="validquizz()">Valider</button>
    </div>
</div>
<div id="modalQuestion4" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
                <div class="title">Je n'affiche pas les données que j'ai saisies de mon formulaire, peux-tu y jeter un coup d'oeil s'il te plaît ?</div>
                <button class="buttonQuestion" onclick="voirImageQuestion4()">Voir l'image</button>
                <ul class="choices">
                    <li>
                        <label
                            ><input type="radio" id="reponseD1" name="question1" value="A" /><span
                                >Il manque la fonction session_start()</span
                            ></label
                        >
                    </li>
                    <li>
                        <label
                            ><input type="radio" id="reponseD2" name="question1" value="B" /><span
                                    >Il faut utiliser la méthode PUT</span
                            ></label
                        >
                    </li>
                    <li>
                        <label
                            ><input type="radio" id="reponseD3" name="question1" value="C" /><span
                                >Il faut englober le code dans une balise &#60?php ?></span
                            ></label
                        >
                    </li>
                    <li>
                        <label
                            ><input type="radio" id="reponseD4" name="question1" value="D" /><span
                                >Il faut désinstaller notepad++</span
                            ></label
                        >
                    </li>
        <button class="validation" onclick="validquizz()">Valider</button>
    </div>
</div>


<!-- Bloc pour afficher l'avancée des réponses aux questions -->
<span id="resultat" class="my-results">L'avancée des réponses aux questions sera affichée içi</span>


<!-- Sound Effects -->
<audio id="failed" src="../sounds/failed.wav"></audio>
<audio id="correct" src="../sounds/correct.wav"></audio>
<audio id="aboiement" src="../sounds/chien_aboiement.wav"></audio>
<script>
    var audioStage3 = document.getElementById('soundStage3');
    audioStage3.volume = 0.7;
</script>