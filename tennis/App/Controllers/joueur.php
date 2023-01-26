<?php
$postedData = file_get_contents('php://input');

//recupere et decode AJAX POST 
$postedData = json_decode($postedData);

//CRUD de joueur

//Recuperer les elements pour ma vue admin_joueur
if (isset($_GET['joueur'])) {
    $joueurs = $usedb->read('joueur', NULL, 'fetchAll', 'all');
    $joueurs_view = '';
    $joueurs_view_delete = '';
    foreach ($joueurs as $joueur) {
        $joueurs_view .= '<button class="btn text-dark border-0 btn-outline-info btn-lg btn-block" type="button" value="' . $joueur['id'] . '" data-role="' . $joueur['role'] . '">' . $joueur['nom_j'] . '</button>';
        $joueurs_view_delete .= '<button class="btn text-dark border-0 btn-outline-warning btn-lg btn-block" type="button" value="' . $joueur['id'] . '" data-role="' . $joueur['role'] . '">' . $joueur['nom_j'] . '</button>';
    }
}

if (!empty($_POST['insert_joueur']) && !empty($_POST['insert_role'])) {
    $usedb->inserer('joueur', 'nom_j', 'role', $_POST['insert_joueur'], $_POST['insert_role']);
}

if (!empty($_POST['update_joueur']) && !empty($_POST['update_role'])) {
    $usedb->update('joueur', $_POST['update_joueur_id'], $_POST['update_joueur'], $_POST['update_role']);
}

if (!empty($postedData->delete_joueur)) {

    // Protection contre les injections SQL --> enlève des caractères spéciaux 
    $string_safe = (int) $postedData->delete_joueur;

    $usedb->delete('joueur', $string_safe);

    //return for ajax
    echo json_encode(['success' => true, 'content' => 1]);
}
