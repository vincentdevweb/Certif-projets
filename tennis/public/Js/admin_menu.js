//Simplification pour l'écriture
let d = document;

//On récupère des valeurs et on met une solution pour faire disparaitre le menu du depart
let menu = d.querySelector('#menu');
let menu_values = menu.querySelectorAll('button');

//On veut faire apparaitre les autres menus
let menu_insert = d.querySelector('#insert');
let menu_update = d.querySelector('#update');
let menu_delete = d.querySelector('#delete');

menu_values.forEach(menu_value => {
    menu_value.addEventListener('click', (e) => {
        menu.classList.add('d-none'); // On fait disparaitre le menu de départ
        if (menu_value.value == 1) {
            menu_insert.classList.remove('d-none');// On fait asparaitre le menu insert
        } else if (menu_value.value == 2) {
            menu_update.classList.remove('d-none');// On fait asparaitre le menu update
        } else {
            menu_delete.classList.remove('d-none');// On fait asparaitre le menu delete
        }
    });
});