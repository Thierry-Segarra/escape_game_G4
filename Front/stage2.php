<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stage 2</title>
        <link rel="stylesheet" href="../Styles/stage2.css">
    </head>

    <?php
    include("../Back/transition.php");
    ?>
    <script>
        textDinamique('textdinamique','text',`Je vous présente votre équipe.
        Il ne manquait plus que vous pour les guider.
        Donnez leur du boulot !`,'<button class="bouton" onclick = "transitionOuver()">Au boulot !</button>');
    </script>

    <body onload="load()">
        <div class="whole_table">

            <!--Bulles de droite-->
            <div class="bubble">
                <img src="../images/bubble_right.png">
                <div class="centered" id="bubble_1"></div>
            </div>
            <div class="bubble">
                <img src="../images/bubble_right.png">
                <div class="centered" id="bubble_3"></div>
            </div>
            <div class="bubble">
                <img src="../images/bubble_right.png">
                <div class="centered" id="bubble_5"></div>
            </div>
            <!--Bulles de gauche-->
            <div class="bubble">
                <img src="../images/bubble_left.png">
                <div class="centered" id="bubble_0"></div>
            </div>
            <div class="bubble">
                <img src="../images/bubble_left.png">
                <div class="centered" id="bubble_2"></div>
            </div>
            <div class="bubble">
                <img src="../images/bubble_left.png">
                <div class="centered" id="bubble_4"></div>
            </div>


            
            <div class="terminal">
                <img src="../images/terminal.png">
                <div class="terminal_text">TACHE :</div>
                <div id="terminal" class="terminal_subtext"></div>
            </div>

            <div class="tapis"></div>
            <div class="red_button" onclick="verification()">
                <div class="red_button_text">VALIDER</div>
            </div>
            <div class="clock"></div>

            <br><br><br><br>
            
            <div class="layer">
                <img class="person_left" id="person_1" src="../images/dude_1.png">
                <div class="table_top">
                    <div class="box" id="box_1"></div>
                    <div class="box" id="box_2"></div> 
                </div>
                <img class="person_right" id="person_2" src="../images/dude_3.png">
            </div>

            <div class="layer">
                <img class="person_left" id="person_3" src="../images/dude_4.png">
                <div class="table_middle">
                    <div class="box" id="box_3"></div>
                    <div class="box" id="box_4"></div> 
                </div>
                <img class="person_right" id="person_4" src="../images/dude_5.png">
            </div>

            <div class="layer">
                <img class="person_left" id="person_5" src="../images/dude_6.png">
                <div class="table_middle">
                    <div class="box" id="box_5"></div>
                    <div class="box" id="box_6"></div> 
                </div>
                <img class="person_right" id="person_6" src="../images/dude_2.png">
            </div>

            <div class="layer">
                <div class="table_bottom">
                    <div class="box" style="width: 100%; flex-direction: row;">
                        <div class="item" id="item_1" onmouseenter="textTerminal('Creer le header du jeu')"></div>
                        <div class="item" id="item_2" onmouseenter="textTerminal('Integrer des effets sonores dans le niveau 1')"></div>
                        <div class="item" id="item_3" onmouseenter="textTerminal('Creer le menu principal')"></div>
                        <div class="item" id="item_4" onmouseenter="textTerminal('Integrer la charte graphique au niveau 3')"></div>

                        <div class="item" id="item_5" onmouseenter="textTerminal('Creer le labyrinthe du niveau 1')"></div>
                        <div class="item" id="item_6" onmouseenter="textTerminal('Mettre en place lattribution aleatoire du niveau 2')"></div>
                        <div class="item" id="item_7" onmouseenter="textTerminal('Creer le systeme de vie')"></div>
                        <div class="item" id="item_8" onmouseenter="textTerminal('Creer la verification des codes secrets')"></div>

                        <div class="item" id="item_9" onmouseenter="textTerminal('Creer la maquette du niveau 4')"></div>
                        <div class="item" id="item_10" onmouseenter="textTerminal('Realiser la charte graphique du jeu')"></div>

                        <div class="item" id="item_11" onmouseenter="textTerminal('Tester le systeme d indices')"></div>
                        <div class="item" id="item_12" onmouseenter="textTerminal('Verifier la conformite des donnees a integrer')"></div>
                    </div>
                </div>
            </div>
            <div class="chef">
                <img class="person_left" id="chef" src="../images/chef_bad2.png">
            </div>
        </div>

        <audio id="audio_select" src="../sounds/select.wav"></audio>
        <audio id="audio_hint" src="../sounds/hint.wav"></audio>
        <audio id="audio_validation" src="../sounds/validation.wav"></audio>
        <audio id="audio_down" src="../sounds/down.wav"></audio>
        <script src="../js/stage2.js"></script>
    </body>
</html>