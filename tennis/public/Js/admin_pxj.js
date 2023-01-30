// Select all buttons within the 'insert' element
const menuInsertPxj = d.querySelectorAll('#insert button');

// Loop through each button in the 'insert' element
menuInsertPxj.forEach(selectedPlanning => {
    // Add a click event listener to each button
    selectedPlanning.addEventListener('click', event => {
        // Set the value of the 'id_planning_add' element to the value of the clicked button
        document.querySelector('#id_planning_add').value = selectedPlanning.value;
        // Hide the 'insert' element and show the 'add_joueur' element
        document.querySelector('#insert').classList.add('d-none');
        document.querySelector('#add_joueur').classList.remove('d-none');
    });
});

// Select all buttons within the 'view_joueurs_add' element
const menuAddPxJoueur = d.querySelectorAll('#view_joueurs_add button');

// Loop through each button in the 'view_joueurs_add' element
menuAddPxJoueur.forEach(selectedJoueur => {
    // Add a click event listener to each button
    selectedJoueur.addEventListener('click', event => {
        // Make a POST request to the server with the selected joueur and planning information
        fetch('/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                pxj_add_joueur_id: selectedJoueur.value,
                pxj_add_planning_id: document.querySelector('#id_planning_add').value
            })
        })
            // Wait for the response from the server
            .then(responseAjax => {
                // Convert the response to JSON format
                return responseAjax.json();
            })
            .then(data => {
                // Hide the selected joueur button
                selectedJoueur.classList.add('d-none');
            });
    });
});