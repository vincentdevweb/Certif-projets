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