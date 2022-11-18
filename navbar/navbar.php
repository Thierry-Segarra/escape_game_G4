<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="../Styles/navbar_1.css">
    
    <title>NAVBAR</title>
</head>
<body>
   
    <nav class="main navbar" id='nav'>
    <canvas id="canvas_nav" width="100" height="100" class='navbar-canvas' id="navbar-grid"></canvas>
    
    <logo>
            <logo-inner>
                <div class='logo-gif'></div>
                <p>
                    GScape
                </p>

            </logo-inner>
        </logo>
        <!-- Coeurs de vie (gauche) -->
        <div class="vies">
            <div class="vie">
                <img id="vie_one" src="../images/coeur.png" alt="">
            </div>
            <div class="vie">
                <img id="vie_two" src="../images/coeur.png" alt="">
            </div>
            <div class="vie">
                <img id="vie_three" src="../images/coeur.png" alt="">
            </div>
        </div>

        <!-- Timer (centre) -->
        <div class="timer">
            <div class="chronometre">
                <div class="time">
                    <span id="min_times">00 min</span>:
                    <span id="sec">00 sec</span>
                </div>
                <!-- <div class="controls">
                    <button id="start" onclick="start()">Start</button>
                    <button id="stop" onclick="stop()">Stop</button>
                </div> -->
            </div>
        </div>
        <nav-menu-button>
        <div class="indice">
            <button id="button_indice nav-menu-button" class="indice nav-button"title='Navigation Menu'>
                <a href="#id01">Indice</a>
            </button>
        </nav-menu-button>
    </nav>
        <!-- Indice (droite) -->
  
            <!-- Ouverture modale indice -->
            <div id="id01" class="modal_indice">
                <div class="modal-dialo">
                    <div class="modal-conten">
                        <div > 
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

    <script src="../navbar/navbar.js">       
    </script>
    
</body>
</html>