//PXJ
let menu_insert_pxj = d.querySelectorAll('#insert button');

menu_insert_pxj.forEach(select_planning => {
    select_planning.addEventListener('click', e => {
        d.querySelector('#id_planning_add').value = select_planning.value;
        d.querySelector('#insert').classList.add('d-none');
        d.querySelector('#add_joueur').classList.remove('d-none');
    });
});

let menu_add_pxj_joueur = d.querySelectorAll('#view_joueurs_add button');

menu_add_pxj_joueur.forEach(select_joueur => {
    select_joueur.addEventListener('click', e => {
        fetch('/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                pxj_add_joueur_id: select_joueur.value,
                pxj_add_planning_id: d.querySelector('#id_planning_add').value
            })
        }).then((reponse_ajax) => {//promise
            return reponse_ajax.json();
        }).then(data => {
            select_joueur.classList.add('d-none');
        });

    });
});

