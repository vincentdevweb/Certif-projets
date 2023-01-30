// Select all buttons for viewing and deleting players
let view_joueurs_buttons = d.querySelectorAll('#view_joueurs button');
let view_joueurs_delete_buttons = d.querySelectorAll('#view_joueurs_delete button');

// Add event listener to each view player button
view_joueurs_buttons.forEach(view_joueur_button => {
    view_joueur_button.addEventListener('click', event => {

        // Hide the view players section and show the update player section
        d.querySelector('#view_joueurs').classList.add('d-none');
        d.querySelector('#update_select').classList.remove('d-none');

        // Set the update player ID and name from the clicked button
        d.querySelector('#update_joueur_id').value = view_joueur_button.value;
        d.querySelector('#update_joueur').value = view_joueur_button.innerHTML;
        d.querySelector('#update_role_option').innerHTML = 'Currently: ' + view_joueur_button.dataset.role;
    });

});

// Add event listener to each delete player button
view_joueurs_delete_buttons.forEach(view_joueur_delete_button => {
    view_joueur_delete_button.addEventListener('click', event => {
        // Send a POST request with delete player data to the server
        fetch('/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                delete_joueur: view_joueur_delete_button.value
            })
        })
            .then(response => {
                // Return the response as JSON data
                return response.json();
            })
            .then(data => {
                // Hide the delete player button after the request is processed
                view_joueur_delete_button.classList.add('d-none');
            });
    });
});
