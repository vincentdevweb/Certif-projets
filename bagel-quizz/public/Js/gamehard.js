//import Cookies from 'js-cookie';

//simplification d'écriture
let d = document;

// Effet sonnore + Cookies
let game_sound = d.querySelector('#game_sound');
if (Cookies.get('sound') == undefined) {
    Cookies.set('sound', "ON!", { expires: 7 });
}
game_sound.innerHTML = Cookies.get('sound');

//Fonction d'activation sonore 
game_sound.addEventListener('click', (e) => {
    if (game_sound.innerHTML == "ON!") {
        game_sound.innerHTML = "OFF!";
        Cookies.set('sound', "OFF!", { expires: 7 });
    } else {
        game_sound.innerHTML = "ON!";
        Cookies.set('sound', "ON!", { expires: 7 });
    }
});

//dark theme body
let for_body_bg = d.querySelector('#dark_theme');
if (Cookies.get('theme_txt') == undefined) {
    Cookies.set('theme_txt', "DARK MODE !!!", { expires: 7 });
    Cookies.set('theme_color', "", { expires: 7 });
}
for_body_bg.innerHTML = Cookies.get('theme_txt');
document.body.style.backgroundColor = Cookies.get('theme_color');

for_body_bg.addEventListener('click', (e) => {
    if (for_body_bg.innerHTML == "DARK MODE !!!") {
        document.body.style.backgroundColor = '#D8DFE3';
        Cookies.set('theme_color', "#D8DFE3", { expires: 7 });
        for_body_bg.innerHTML = "WHITE MODE !!!";
        Cookies.set('theme_txt', "WHITE MODE !!!", { expires: 7 });
    } else {
        document.body.style.backgroundColor = '';
        Cookies.set('theme_color', "", { expires: 7 });
        for_body_bg.innerHTML = "DARK MODE !!!";
        Cookies.set('theme_txt', "DARK MODE !!!", { expires: 7 });
    }
});

// Start Question
let bonne_rep = 0;
let show = false;
let nombres_questions_repondu = 0;

// Acceder aux boutons 
let reponses = d.querySelector('form').querySelectorAll('button');
let hide_question_repondu = d.querySelector('form').querySelectorAll('div.card');

//taux de progress
let progress_barre_progress = d.querySelector('#taux_de_progression');

//taux de reussite 
let progress_barre_res = d.querySelector('#taux_de_reussite');

//try_again
let new_try = d.querySelector('#try_again');

//button_try_again
let div_button_try_again = d.querySelector('#div_button_try_again');
let show_pseudo = d.querySelector('#show_pseudo');

//Show 1ere question
let first_question = true;
hide_question_repondu.forEach(hide_question => {
    if (first_question == true) {
        first_question = false;
        hide_question.classList.remove("d-none");
    };
});

//param son
let mauvaise_reponse = new Audio('../Son/mauvaise_reponse.wav');
let bonne_reponse = new Audio('../Son/bonne_reponse.wav');

//timer game
let timer = d.querySelector('#timer');
let departMinutes = 3;
let temps = departMinutes * 60;
let secondes = 0;
let minutes = 0;

//function timer avec fin du jeu 
setInterval(() => {
    minutes = parseInt(temps / 60)
    secondes = temps % 60

    minutes = minutes < 10 ? "0" + minutes : minutes
    secondes = secondes < 10 ? "0" + secondes : secondes

    timer.innerHTML = minutes + ':' + secondes;
    temps = temps <= 0 ? 0 : temps - 1;

    //TIME UP
    if ((temps == 0) && (nombres_questions_repondu != 100)) {
        hide_question_repondu.forEach(hide_question => {
            hide_question.classList.add("d-none");//l'ensemble des questions
        });
        //reponses[0].classList.add('d-none');//timer
        new_try.classList.remove('d-none');//bouton try again
        div_button_try_again.innerHTML = '<h3>Malheuresement ton temps est écoulé !! Tu a réussi ' + Math.round(bonne_rep) + '% de bonne(s) reponse(s)</h3><a class="btn btn-outline-success btn-lg" href="/" role="button" id="div_a_button_try_again">Try again</a>';
    }
}, 1000)

// Fonction pour repondre a la question
reponses.forEach(reponse => {
    reponse.addEventListener('click', (e) => {
        if (temps > 0) {
            // Affiche la prochaine question et cache la question cliquer
            fetch("index.php?value=" + reponse.value, {
                method: 'GET',
                body: JSON.stringify()
            }).then((reponse_ajax) => {//promise
                return reponse_ajax.json();
            }).then((data) => {//donné renvoyer du serveur
                hide_question_repondu.forEach(hide_question => {
                    if (show == true) {
                        show = false;
                        hide_question.classList.remove("d-none");
                    };
                    if (hide_question.dataset.id == reponse.dataset.buttonid) {
                        hide_question.classList.add("d-none");
                        show = true;
                    };
                });
                //récupere les values des progress bar
                bonne_rep += Number(data.content * 100) / 10;
                nombres_questions_repondu += 100 / 10;

                //Joue le son mauvaise reponse ou bonne reponse
                if (game_sound.innerHTML == "ON!") {
                    if (data.content == 1) {
                        bonne_reponse.play();
                    } else {
                        mauvaise_reponse.play();
                    }
                }
                //fonction try_again pour jouer a la version superieur du jeu 
                //new_try.classList.add("d-none");
                if (nombres_questions_repondu / 10 == 10) {
                    div_button_try_again.innerHTML = '<h3>Super !! Tu a réussi ' + Math.round(bonne_rep) + '% de bonne(s) reponse(s) </h3><a class="btn btn-outline-success btn-lg" href="/" role="button" id="div_a_button_try_again">Try again</a>';
                    temps = 0;
                    fetch('/', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            regscore: (bonne_rep / 10)
                        })
                        }).then((reponse_ajax) => {//promise
                            return reponse_ajax.json();
                        }).then(data => {
                            console.log(data)
                        });
                    //reponses[0].classList.add('d-none'); //remove hide timer
                };

                //affiche les progress bar
                progress_barre_progress.innerHTML = '<div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" aria-label="Danger striped example" style="width: ' + nombres_questions_repondu + '%" aria-valuenow="' + nombres_questions_repondu + '" aria-valuemin="0" aria-valuemax="100">QUESTIONS ' + nombres_questions_repondu / 10 + '/10</div>';
                progress_barre_res.innerHTML = '<div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: ' + bonne_rep + '%;" aria-valuenow="' + bonne_rep + '" aria-valuemin="0" aria-valuemax="100">TAUX DE REUSSITE : ' + Math.round(bonne_rep) + '%</div>';
            });
        };
    });

});








