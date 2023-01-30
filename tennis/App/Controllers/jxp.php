<?php
//Recuperer les elements des vues qui affichent mon planning 
// Get elements for views that display my schedule  
if (isset($_GET['planning']) || (!empty($_SESSION['login']) && empty($_GET))) {
    $pxjts = $usedb->planning();
    $global_view = '';
    $date = '';
    $terrain = '';
    //Loop from schedules to schedule
    foreach ($pxjts as $pxjt) {

        // Check if the date or field has changed and update the header
        if (($pxjt['date'] != $date) || (($pxjt['terrain']) != $terrain) && ($pxjt['date'] = $date)) {
            if ($pxjt['date'] != '') {
                $global_view .= '</tbody>';
            }
            $global_view .= '<thead class="h5 text-info">
        <tr>
            <th scope="col">PLANNING DU :' . date('d/m/Y H:i', $pxjt['date']);
            $global_view .= '--->' . $pxjt['terrain'] . '</th>
            </tr>
        </thead>
        <tbody>';
        }

        // Add players to schedule
        $global_view .= '
            <tr>
                <th scope="row">' . $pxjt['player'] . '</th>
                </tr>';

        // Update date and terrain
        $date = $pxjt['date'];
        $terrain = $pxjt['terrain'];
    }
    // Close tbody 
    $global_view .= '</tbody>'; // for view planning 
} else if (!empty($_GET['PID'])) {
    $pxjs = $usedb->readjoinpxj((int) $_GET['PID']);
    $joueurs_view = '';
    // Loop players
    foreach ($pxjs as $pxj) {
        // Add player button
        $joueurs_view .= '<button class="btn text-dark border-0 btn-outline-warning btn-lg btn-block" type="button" value="' . $pxj['jid'] . '">' . $pxj['nom'] . '</button>';
    }
} else if (isset($_GET['joueurxplanning'])) {
    //retrieve data
    $joueurs = $usedb->read('joueur', NULL, 'fetchAll', 'all');
    $plannings = $usedb->read('planning', NULL, 'fetchAll', 'all');
    $terrains = $usedb->read('terrain', NULL, 'fetchAll', 'all');

    // Get terrain names
    foreach ($terrains as $terrain) {
        $get_terrain[$terrain['id']] = $terrain['libelle_t'];
    }

    $plannings_view = '';
    $plannings_view_del = '';
    // Loop schedules
    foreach ($plannings as $planning) {
        $plannings_view .= '<button class="btn text-dark border-0 btn-outline-success btn-lg btn-block" type="button" value="' . $planning['id'] . '">' . date('d/m/Y H:i:s', $planning['date']) . ' : ' . $get_terrain[$planning['terrain_id']] . '</button>';
        $plannings_view_del .= '<a class="btn text-dark border-0 btn-outline-danger btn-lg btn-block" href="?joueurxplanning&PID=' . $planning['id'] . '" role="button">' . date('d/m/Y H:i:s', $planning['date']) . ' : ' . $get_terrain[$planning['terrain_id']] . '</a>';
    }

    $joueurs_view = '';
    // Loop players
    foreach ($joueurs as $joueur) {
        $joueurs_view .= '<button class="btn text-dark border-0 btn-outline-info btn-lg btn-block" type="button" value="' . $joueur['id'] . '" data-role="' . $joueur['role'] . '">' . $joueur['nom_j'] . '</button>';
    }
}


// Check if pxj_add_joueur_id is not empty
if (!empty($postedData->pxj_add_joueur_id)) {

    // Make player and planning ids safe from SQL injection
    $string_safe1 = (int) $postedData->pxj_add_joueur_id;
    $string_safe2 = (int) $postedData->pxj_add_planning_id;

    // Check if player-planning combination exists
    if ($usedb->isPlayerInDB($string_safe1, $string_safe2)) {
        // Insert player-planning combination if it does not exist
        $usedb->insertData('pj_mm', 'joueur_id', 'planning_id', $string_safe1, $string_safe2);
        // Return success message for ajax call
        echo json_encode(['success' => true, 'content' => 1]);
    } else {
        // Return failure message for ajax call
        echo json_encode(['success' => false, 'content' => 0]);
    }
}

// Check if pxj_del_joueur_id is not empty
if (!empty($postedData->pxj_del_joueur_id)) {
    // Make player and planning ids safe from SQL injection
    $string_safe1 = (int) $postedData->pxj_del_joueur_id;
    $string_safe2 = (int) $postedData->pxj_del_planning_id;

    // Delete player-planning combination
    $usedb->deletepxj($string_safe1, $string_safe2);

    // Return success message for ajax call
    echo json_encode(['success' => true, 'content' => 1]);
}
