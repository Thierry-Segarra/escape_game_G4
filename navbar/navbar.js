
    var valid_ind = document.getElementById("valid_ind");
    var refuse_ind = document.getElementById("refuse_ind");
    var vie_one = document.getElementById("vie_one");
    var vie_two = document.getElementById("vie_two");
    var vie_three = document.getElementById("vie_three");
    var texte = document.getElementById("ask_indice");
    var content_indice = document.getElementById("content_indice");
    

    /** Erreurs = coeurs en moins **/
    var error = 0;

    function displayIndice()
    {
        incrementCompteur();
        document.getElementById("texte_indice").style.display = 'block';
        document.getElementById("ask_indice").style.display = 'none';

        var url = window.location.pathname;
    
        // Stage 1
        if ( url.match(/(stage1)/) ) {
            content_indice.innerHTML = "Vous êtes un chef de projet !! Dans quel ordre les livrables doivent-ils être rédigés ?"
        }
        // Stage 2
        if ( url.match(/(stage2)/) ) {
            content_indice.innerHTML = "Pensez à attribuer les bonnes tâches aux bons rôles et à ne pas les surcharger !"
        }
        // Stage 3
        if ( url.match(/(stage3)/) ) {
            content_indice.innerHTML = "Pas besoin d'indice quand la réponse est sous vos yeux !"
        }
        // Stage 4
        if ( url.match(/(stage4)/) ) {
            content_indice.innerHTML = "Dans le mot mêlé, il y a</br><ul><li>Un mot en diagonale de 12 lettres qui commence par O et finit par N</li><li>Un mot en diagonale de 13 lettres qui commence par C et finit par N</li><li>Un mot à l'horizontale de 8 lettres qui commence par L et finit par E</li><li>Un mot à la verticale de 10 lettres qui commence par L et finit par P</li></ul></br>Traduisez ensuite les codes en morse, saisissez le code et finissez votre projet !"
        }
    }

    function incrementCompteur()
    {
        error++;
        if (error === 1 ) {
            vie_one.src = "../images/coeur_vide.png"
        } else if (error === 2 ) {
            vie_two.src = "../images/coeur_vide.png"
        } else if (error === 3 ) {
            vie_three.src = "../images/coeur_vide.png"
            document.location.href="../Front/gameover.html";
        }
    }

    var btn_start, btn_stop, s = 0,mn = 0;
    /** TIMER **/
    chronos_init();
    function chronos_init()
    {

        if (localStorage != null) {
            console.log("chrono");
            temps2 = localStorage.getItem('temps');
            temps3 = temps2.split(":");
            mn = parseInt(temps3[0]);
            s = parseInt(temps3[1]);
            document.getElementById('min_times').innerHTML = mn + "min";
            document.getElementById('sec').innerHTML = s + "sec";
            localStorage.clear('temps');
        }
    }

    function update_chrono()
    {
        s += 1;
        if (s == 60) {
            s = 0;
            mn += 1
        }
        document.getElementById('min_times').innerHTML = mn + "min";
        document.getElementById('sec').innerHTML = s + "sec";
    }

    var t;

    function start()
    {
        t = setInterval(update_chrono, 1000);
    }
    function stop()
    {
        min = document.getElementById('min_times').innerHTML.split("m");
        minutes = min[0]
        sec = document.getElementById('sec').innerHTML.split("s");
        secondes = sec[0]
        temps = `${minutes}:${secondes}`
        clearInterval(t);
        localStorage.setItem('temps', temps)
    }
