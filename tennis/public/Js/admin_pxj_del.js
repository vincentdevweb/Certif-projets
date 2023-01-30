//Shortening the code for readability
const d = document;

// Select all buttons in the delete menu
const menuDeletePxj = d.querySelectorAll("#delete button");

// Add click event listener for each button in the delete menu
menuDeletePxj.forEach(selectPlanning => {
    selectPlanning.addEventListener("click", e => {
        // Set the value of the planning to be deleted
        d.querySelector("#id_planning_del").value = selectPlanning.value;
        // Hide the delete menu
        d.querySelector("#delete").classList.add("d-none");
        // Show the delete player menu
        d.querySelector("#del_joueur").classList.remove("d-none");
    });
});

// Select all buttons in the delete player menu
const menuDeletePxjJoueur = d.querySelectorAll("#view_joueurs_del button");

// Add click event listener for each button in the delete player menu
menuDeletePxjJoueur.forEach(selectJoueur => {
    selectJoueur.addEventListener("click", e => {
        // Send a post request to the server with the selected player and planning id
        fetch("/", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                pxj_del_joueur_id: selectJoueur.value,
                pxj_del_planning_id: d.querySelector("#id_planning_del").value
            })
        })
            .then(responseAjax => {
                // Return the response as JSON
                return responseAjax.json();
            })
            .then(data => {
                // Hide the selected player button
                selectJoueur.classList.add("d-none");
            });
    });
});