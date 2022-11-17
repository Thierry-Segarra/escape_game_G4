<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Workspace</title>
        <link rel="stylesheet" href="../Styles/stage4.css">
    </head>
    <?php
    include("../Back/transition.php");
    ?>
    <script>
        textDinamique('textdinamique','text',`Nous arrivons à l'heure du bilan.
Quels ont été vos points forts ?
Dites-nous la vérité, n'utilisez pas de message codé...`,'<button class="bouton" onclick = "transitionOuver()">Au boulot !</button>');
    </script>
    <body>

        <div class="plate">
            <img class="motmele" src="../images/motmele.png">
            <div>
                <div class="validation">
                    <input type="text" id="input_mots"><br>
                    <button class="verif" onclick="verifiermots()"></button>
                </div>
            </div>
    
            <div class="row_button">
                <div class="column_button">
                    <button class="code_button" id="nb1_1" onclick="locknumber(1)"></button>
                    <span class="code" style="background-color: red;" id="nb1">0</span>
                </div>
                <div class="column_button">
                    <button class="code_button" id="nb2_2" onclick="locknumber(2)"></button>
                    <span class="code" style="background-color: blue;" id="nb2">0</span> 
                </div>
                <div class="column_button">
                    <button class="code_button" id="nb3_3" onclick="locknumber(3)"></button>
                    <span class="code" style="background-color: green;" id="nb3">0</span>
                </div>
                <div class="column_button">
                    <button class="code_button" id="nb4_4" onclick="locknumber(4)"></button>
                    <span class="code" style="background-color: yellow;"id="nb4">0</span>
                </div>
            </div>
        </div>


        <div class="morsecacher" id="morsecacher">
            <span class="couleurcacher" id="couleur1"></span>
            <span class="couleurcacher" id="couleur2"></span>
            <span class="couleurcacher" id="couleur3"></span>
            <span class="couleurcacher" id="couleur4"></span>
            <div class="reponse" id="reponse_mots"></div>
        </div>

        <div class="morse" id="morse"></div>

        <script src="../js/stage4.js"></script>
    </body>
</html>