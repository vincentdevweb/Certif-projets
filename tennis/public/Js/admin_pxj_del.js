d = document;
let menu_delete_pxj = d.querySelectorAll('#delete button');

//MENU 2
menu_delete_pxj.forEach(select_planning => {
    select_planning.addEventListener('click', e => {
        d.querySelector('#id_planning_del').value = select_planning.value;
        d.querySelector('#delete').classList.add('d-none');
        d.querySelector('#del_joueur').classList.remove('d-none');
    });
});

//MENU DELETE
let menu_delete_pxj_joueur = d.querySelectorAll('#view_joueurs_del button');

menu_delete_pxj_joueur.forEach(select_joueur => {
    select_joueur.addEventListener('click', e => {
        fetch('/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                pxj_del_joueur_id: select_joueur.value,
                pxj_del_planning_id: d.querySelector('#id_planning_del').value
            })
        }).then((reponse_ajax) => {//promise
            return reponse_ajax.json();
        }).then(data => {
            select_joueur.classList.add('d-none');
        });

    });
});