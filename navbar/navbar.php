<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./navbar.css">
    
    <title>NAVBAR</title>
</head>
<body>

    <nav class="main">
        <!-- Coeurs de vie (gauche) -->
        <div class="vies">
            <div class="vie">
                <img id="vie_one" src="./assets/coeur.png" alt="">
            </div>
            <div class="vie">
                <img id="vie_two" src="./assets/coeur.png" alt="">
            </div>
            <div class="vie">
                <img id="vie_three" src="./assets/coeur.png" alt="">
            </div>
        </div>

        <!-- Timer (centre) -->
        <div class="timer">
            <div class="chronometre">
                <div class="time">
                    <span>00 min</span>:
                    <span>00 sec</span>:
                    <span>00 ms</span>
                </div>
                <div class="controls">
                    <button id="start" onclick="start()">Start</button>
                    <button id="stop" onclick="stop()">Stop</button>
                </div>
            </div>
        </div>

        <!-- Indice (droite) -->
        <div class="indice">
            <button id="button_indice" class="indice">
                <a href="#id01">Ouvrir la fenêtre modale</a>
            </button>

            <!-- Ouverture modale indice -->
            <div id="id01" class="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="container"> 
                            <a href="#" class="closebtn">×</a>
                            <div id="ask_indice">
                                <h4>Voulez-vous un indice ? Cela vous coûtera une vie !</h4>
                                <div>
                                    <button id="refuse_ind"><a href="#">Non</a></button>
                                    <button id="valid_ind" onclick="displayIndice()">Oui</button>
                                </div>
                            </div>
                            <div id="texte_indice">
                                <h3>Indice :</h3>
                                <p id="content_indice"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </nav>

    <script src="./navbar.js">
       
    </script>
    
</body>
</html>