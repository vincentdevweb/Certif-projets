//Shortening the code for readability
let d = document;

//Get values and hide the initial menu
let menu = d.querySelector('#menu');
let menu_values = menu.querySelectorAll('button');

//Show the other menus
let menu_insert = d.querySelector('#insert');
let menu_update = d.querySelector('#update');
let menu_delete = d.querySelector('#delete');

menu_values.forEach(menu_value => {
    menu_value.addEventListener('click', (e) => {
        menu.classList.add('d-none'); // Hide the initial menu
        if (menu_value.value == 1) {
            menu_insert.classList.remove('d-none'); // Show insert menu
        } else if (menu_value.value == 2) {
            menu_update.classList.remove('d-none'); // Show update menu
        } else {
            menu_delete.classList.remove('d-none'); // Show delete menu
        }
    });
});