//Update button update or delete PLANNING
let view_plannings_button = d.querySelectorAll('#view_plannings button');
let view_plannings_delete_button = d.querySelectorAll('#view_plannings_delete button');

view_plannings_button.forEach(view_planning_button => {
    view_planning_button.addEventListener('click', e => {
        d.querySelector('#view_plannings').classList.add('d-none');
        d.querySelector('#update_select').classList.remove('d-none');
        d.querySelector('#update_planning_id').value = view_planning_button.value;
        d.querySelector('#update_planning').value = view_planning_button.dataset.terraintime;
        d.querySelector('#update_planning_option').innerHTML = 'Actuellement : ' + view_planning_button.dataset.terrain;
    });
});

view_plannings_delete_button.forEach(view_planning_delete_button => {
    view_planning_delete_button.addEventListener('click', e => {
        fetch('/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                delete_planning: view_planning_delete_button.value
            })
        }).then((reponse_ajax) => {//promise
            return reponse_ajax.json();
        }).then(data => {
            view_planning_delete_button.classList.add('d-none');
        });
    });
});