    var lock1 = setInterval(changernb, 1000,1);
    var lock_1 = false;

    var lock2 = setInterval(changernb, 1000,2);
    var lock_2 = false;

    var lock3 = setInterval(changernb, 1000,3);
    var lock_3 = false;

    var lock4 = setInterval(changernb, 1000,4);   
    var lock_4 = false; 
    // remetre false
    var mots1 = false;
    var mots2 = false;
    var mots3 = false;
    var mots4 = false;

    var nb_reponse_lock = "";

    generation_morce("couleur1");
    generation_morce("couleur2");
    generation_morce("couleur3");
    generation_morce("couleur4");

    function verifiermots() {
        
        var reponse_mots = '';
        var mots = document.getElementById('input_mots').value;

        console.log(mots);
        switch (mots) {
        case 'leadership':
            if(mots1 == false){
                reponse_mots = mots+'<br>';
                mots1 = true;
                document.getElementById('couleur1').style.color = 'red';
                
            }
            console.log(reponse_mots);
            break;
        case 'communication':
            if(mots2 == false){
                reponse_mots = mots+'<br>';
                mots2 = true;
                document.getElementById('couleur2').style.color = 'blue';
            }
            console.log(reponse_mots);
            break;
        case 'organisation':
            if(mots3 == false){
                reponse_mots = mots+'<br>';
                mots3 = true;
                document.getElementById('couleur3').style.color = 'green';
            }
            console.log(reponse_mots);
            break;
        case 'entraide':
            if(mots4 == false){
                reponse_mots = mots+'<br>';
                mots4 = true;
                document.getElementById('couleur4').style.color = 'yellow'
            }
            console.log(reponse_mots);
            break;
        }
        document.getElementById('reponse_mots').innerHTML = document.getElementById('reponse_mots').innerHTML + reponse_mots;
        afficherMorce();
    }

    function afficherMorce() {
        if(mots1 == true && mots2 == true && mots3 == true && mots4 == true){document.getElementById('morse').innerHTML = "<span> 0 = — — — — — </span><span> 1 = • — — — — </span><span> 2 = • • — — — </span><span> 3 = • • • — — </span><span> 4 = • • • • — </span><span> 5 = • • • • • </span>";}
    }


    function changernb(nb){
        document.getElementById('nb'+nb).innerHTML = Math.floor(Math.random() * 5);
    }

    function locknumber(nb) {
        switch (nb) {
        case 1:
            console.log('1');
            if(lock_1 == false){clearInterval(lock1);lock_1 = true;document.getElementById('nb1_1').style.backgroundImage = "url(../images/redbutton.png)";verif_lock_nb()}
            else{lock1 = setInterval(changernb, 1000,1);document.getElementById('nb1_1').style.backgroundImage = "url(../images/greenbutton.png)";lock_1 = false;}
            break;
        case 2:
            console.log('2');
            if(lock_2 == false){clearInterval(lock2);lock_2 = true;document.getElementById('nb2_2').style.backgroundImage = "url(../images/redbutton.png)";verif_lock_nb()}
            else{lock2 = setInterval(changernb, 1000,2);document.getElementById('nb2_2').style.backgroundImage = "url(../images/greenbutton.png)";lock_2 = false;}
            break;
        case 3:
            console.log('3');
            if(lock_3 == false){clearInterval(lock3);lock_3 = true;document.getElementById('nb3_3').style.backgroundImage = "url(../images/redbutton.png)";verif_lock_nb()}
            else{lock3 = setInterval(changernb, 1000,3);document.getElementById('nb3_3').style.backgroundImage = "url(../images/greenbutton.png)";lock_3 = false;}
            break;
        case 4:
            console.log('4');
            if(lock_4 == false){clearInterval(lock4);lock_4 = true;document.getElementById('nb4_4').style.backgroundImage = "url(../images/redbutton.png)";verif_lock_nb()}
            else{lock4 = setInterval(changernb, 1000,4);document.getElementById('nb4_4').style.backgroundImage = "url(../images/greenbutton.png)";lock_4 = false;}
            break;
        }
    }

    

    function generation_morce(id) {
        console.log(id);
        var morse ="";
        var nb_morce = Math.floor(Math.random() * 5);
        switch (nb_morce) {
        case 0:
            morse = '— — — — —';
            break;
        case 1:
            morse = '• — — — —';
            break;
        case 2:
            morse = '• • — — —';
            break;
        case 3:
            morse = '• • • — —';
            break;
        case 4:
            morse = '• • • • —';
            break;
        case 5:
            morse = '• • • • •';
            break;
        }
        document.getElementById(id).innerHTML = morse;
        nb_reponse_lock = nb_reponse_lock + nb_morce;
        console.log(nb_reponse_lock);
    }

    function verif_lock_nb(){
        if(lock_1 == true && lock_2 == true && lock_3 == true && lock_4 == true){
            let nb_lock = ''
            let nb_1 = document.getElementById('nb1').innerHTML;
            let nb_2 = document.getElementById('nb2').innerHTML;
            let nb_3 =document.getElementById('nb3').innerHTML;
            let nb_4 =document.getElementById('nb4').innerHTML;

            nb_lock = nb_1 + nb_2 + nb_3 + nb_4;
            console.log(nb_lock);

            if (nb_lock == nb_reponse_lock) {
                console.log('bonne reponse');
                let text = `En 20 ans d'expérience je n'avais jamais vu quelqu'un prendre les commandes aussi rapidement.
                Grâce à vous, le projet est un franc succès.
                Je vous remercie sincèrement, n'hésitez pas à revenir !`;
                let suivant = "page_fin.php";
                transitionFermer(text,suivant);
            }else{
                console.log('mauvaise reponse');
            }
        }
    }