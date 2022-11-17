
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
        // Notre page (à supprimer A LA FIN)
        if ( url.match(/(navbar.php)/) ) {
            content_indice.innerHTML = "bonjour je suis l'indice test";
        }
        // Stage 1
        if ( url.match(/(stage_1)/) ) {
            content_indice.innerHTML = "Vous êtes un chef de projet !! Dans quel ordre les livrables doivent-ils être rédigés ?"
        }
        // Stage 2
        if ( url.match(/(stage_2)/) ) {
            content_indice.innerHTML = "Pensez à attribuer les bonnes tâches aux bons rôles et à ne pas les surcharger !"
        }
        // Stage 3
        if ( url.match(/(stage_3)/) ) {
            content_indice.innerHTML = "Pas besoin d'indice quand la réponse est sous vos yeux !"
        }
        // Stage 4
        if ( url.match(/(stage_4)/) ) {
            content_indice.innerHTML = "Dans le mot mêlé, il y a</br><ul><li>2 mots en diagonale de 12 et 13 lettres</li><li>1 mot à l'horizontale de 8 lettres</li><li>1 mot à la verticale de 10 lettres</li></ul></br>Traduisez ensuite les codes en morse, saisissez le code et finissez votre projet !"
        }
    }

    function incrementCompteur()
    {
        error++;
        if (error === 1 ) {
            vie_three.src = "./assets/coeur_vide.png"
        } else if (error === 2 ) {
            vie_two.src = "./assets/coeur_vide.png"
        } else if (error === 3 ) {
            vie_one.src = "./assets/coeur_vide.png"
            // alert('GAME OVER')
            // document.getElementById("id01").classList.remove("modal")
        }
    }

    /** TIMER **/
    window.onload = function()
    {
        sp = document.getElementsByTagName('span');
        btn_start = document.getElementById('start');
        btn_stop = document.getElementById('stop');
        s = 0, mn = 0;
        if (localStorage != null) {
            temps2 = localStorage.getItem('temps')
            temps3 = temps2.split(":")
            mn = parseInt(temps3[0])
            s = parseInt(temps3[1])
            sp[0].innerHTML = mn + "min";
            sp[1].innerHTML = s + "sec";
            localStorage.clear('temps')
        }
    }

    function update_chrono()
    {
        s += 1;
        if (s == 60) {
            s = 0;
            mn += 1
        }
        sp[0].innerHTML = mn + "min";
        sp[1].innerHTML = s + "sec";
    }

    function start()
    {
        t = setInterval(update_chrono, 100);
        btn_start.disabled = true
    }
    function stop()
    {
        min = sp[0].innerHTML.split("m");
        minutes = min[0]
        sec = sp[1].innerHTML.split("s");
        secondes = sec[0]
        temps = `${minutes}:${secondes}`
        clearInterval(t);
        btn_start.disabled = false
        localStorage.setItem('temps', temps)
    }
