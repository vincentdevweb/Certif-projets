//Update button update or delete JOUEUR
let view_joueurs_button = d.querySelectorAll('#view_joueurs button');
let view_joueurs_delete_button = d.querySelectorAll('#view_joueurs_delete button');

view_joueurs_button.forEach(view_joueur_button => {
    view_joueur_button.addEventListener('click', e => {
        d.querySelector('#view_joueurs').classList.add('d-none');
        d.querySelector('#update_select').classList.remove('d-none');
        d.querySelector('#update_joueur_id').value = view_joueur_button.value;
        d.querySelector('#update_joueur').value = view_joueur_button.innerHTML;
        d.querySelector('#update_role_option').innerHTML = 'Actuellement : ' + view_joueur_button.dataset.role;
    });
});

view_joueurs_delete_button.forEach(view_joueur_delete_button => {
    view_joueur_delete_button.addEventListener('click', e => {
        fetch('/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                delete_joueur: view_joueur_delete_button.value
            })
        }).then((reponse_ajax) => {//promise
            return reponse_ajax.json();
        }).then(data => {
            view_joueur_delete_button.classList.add('d-none');
        });
    });
});