// Select all buttons for updating or deleting planning
let view_plannings_button = d.querySelectorAll('#view_plannings button');
let view_plannings_delete_button = d.querySelectorAll('#view_plannings_delete button');

// Loop through each button for updating planning
view_plannings_button.forEach(view_planning_button => {

    // Add click event listener to each button
    view_planning_button.addEventListener('click', event => {

        // Hide the current view of plannings
        d.querySelector('#view_plannings').classList.add('d-none');

        // Show the update select option
        d.querySelector('#update_select').classList.remove('d-none');

        // Update the value of planning id for updating
        d.querySelector('#update_planning_id').value = view_planning_button.value;

        // Update the value of planning time for updating
        d.querySelector('#update_planning').value = view_planning_button.dataset.terraintime;

        // Show the current selected terrain option
        d.querySelector('#update_planning_option').innerHTML = 'Actuellement : ' + view_planning_button.dataset.terrain;
    });
});

// Loop through each button for deleting planning
view_plannings_delete_button.forEach(view_planning_delete_button => {

    // Add click event listener to each button
    view_planning_delete_button.addEventListener('click', event => {
        
        // Send a post request with the value of planning id for deleting
        fetch('/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                delete_planning: view_planning_delete_button.value
            })
        })
            .then((ajax_response) => { // Promise
                // Return the response as a JSON object
                return ajax_response.json();
            })
            .then(data => {
                // Hide the button for deleting planning
                view_planning_delete_button.classList.add('d-none');
            });
    });
});