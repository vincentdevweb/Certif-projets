<?php
// Get the POST data from the input
$postedData = file_get_contents('php://input');

// Decode the JSON encoded POST data
$postedData = json_decode($postedData);

// Get the players for the admin_joueur view
if (isset($_GET['joueur'])) {
    $joueurs = $usedb->read('joueur', NULL, 'fetchAll', 'all');
    $joueurs_view = '';
    $joueurs_view_delete = '';
    foreach ($joueurs as $joueur) {
        // Generate view for display
        $joueurs_view .= '<button class="btn text-dark border-0 btn-outline-info btn-lg btn-block" type="button" value="' . $joueur['id'] . '" data-role="' . $joueur['role'] . '">' . $joueur['nom_j'] . '</button>';
        // Generate view for delete button
        $joueurs_view_delete .= '<button class="btn text-dark border-0 btn-outline-warning btn-lg btn-block" type="button" value="' . $joueur['id'] . '" data-role="' . $joueur['role'] . '">' . $joueur['nom_j'] . '</button>';
    }
}

// Insert a new player
if (!empty($_POST['insert_joueur']) && !empty($_POST['insert_role'])) {
    $usedb->insertData('joueur', 'nom_j', 'role', $_POST['insert_joueur'], $_POST['insert_role']);
}

// Update an existing player
if (!empty($_POST['update_joueur']) && !empty($_POST['update_role'])) {
    $usedb->update('joueur', $_POST['update_joueur_id'], $_POST['update_joueur'], $_POST['update_role']);
}

// Delete a player
if (!empty($postedData->delete_joueur)) {

    // Sanitize input to prevent SQL injection
    $string_safe = (int) $postedData->delete_joueur;

    $usedb->delete('joueur', $string_safe);

    // Return result for AJAX
    echo json_encode(['success' => true, 'content' => 1]);
}
