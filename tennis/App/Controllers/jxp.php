<?php
//CRUD de joueur

//Recuperer les elements pour mes vues qui affiche mon planning 
if (isset($_GET['planning']) || (!empty($_SESSION['login']) && empty($_GET))) {
    $pxjts = $usedb->planning();
    $global_view = '';
    $date ='';
    $terrain ='';
    foreach ($pxjts as $pxjt) {
        if (($pxjt['date'] != $date)||(($pxjt['terrain'])!= $terrain)&&($pxjt['date'] = $date)) {
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
        $global_view .= '
            <tr>
                <th scope="row">' . $pxjt['joueur'] . '</th>
                </tr>';
        $date = $pxjt['date'];
        $terrain = $pxjt['terrain'];
    }
    $global_view .= '</tbody>';
} else if (!empty($_GET['PID'])) {
    $pxjs = $usedb->readjoinpxj((int) $_GET['PID']);
    $joueurs_view = '';
    foreach ($pxjs as $pxj) {
        $joueurs_view .= '<button class="btn text-dark border-0 btn-outline-warning btn-lg btn-block" type="button" value="' . $pxj['jid'] . '">' . $pxj['nom'] . '</button>';
    }
} else if (isset($_GET['joueurxplanning'])) {
    $joueurs = $usedb->read('joueur', NULL, 'fetchAll', 'all');
    $plannings = $usedb->read('planning', NULL, 'fetchAll', 'all');
    $terrains = $usedb->read('terrain', NULL, 'fetchAll', 'all');

    foreach ($terrains as $terrain) {
        $get_terrain[$terrain['id']] = $terrain['libelle_t'];
    }

    $plannings_view = '';
    $plannings_view_del = '';
    foreach ($plannings as $planning) {
        $plannings_view .= '<button class="btn text-dark border-0 btn-outline-success btn-lg btn-block" type="button" value="' . $planning['id'] . '">' . date('d/m/Y H:i:s', $planning['date']) . ' : ' . $get_terrain[$planning['terrain_id']] . '</button>';
        $plannings_view_del .= '<a class="btn text-dark border-0 btn-outline-danger btn-lg btn-block" href="?joueurxplanning&PID=' . $planning['id'] . '" role="button">' . date('d/m/Y H:i:s', $planning['date']) . ' : ' . $get_terrain[$planning['terrain_id']] . '</a>';
    }

    $joueurs_view = '';
    foreach ($joueurs as $joueur) {
        $joueurs_view .= '<button class="btn text-dark border-0 btn-outline-info btn-lg btn-block" type="button" value="' . $joueur['id'] . '" data-role="' . $joueur['role'] . '">' . $joueur['nom_j'] . '</button>';
    }
}


if (!empty($postedData->pxj_add_joueur_id)) {

    // Protection contre les injections SQL --> enlève des caractères spéciaux 
    $string_safe1 = (int) $postedData->pxj_add_joueur_id;
    $string_safe2 = (int) $postedData->pxj_add_planning_id;

    if ($usedb->checkIfJxPExists($string_safe1, $string_safe2)) {
        $usedb->inserer('pj_mm', 'joueur_id', 'planning_id', $string_safe1, $string_safe2);
        //return for ajax
        echo json_encode(['success' => true, 'content' => 1]);
    } else {
        echo json_encode(['success' => false, 'content' => 0]);
    }
}

if (!empty($postedData->pxj_del_joueur_id)) {

    // Protection contre les injections SQL --> enlève des caractères spéciaux 
    $string_safe1 = (int) $postedData->pxj_del_joueur_id;
    $string_safe2 = (int) $postedData->pxj_del_planning_id;

    $usedb->deletepxj($string_safe1, $string_safe2);

    //return for ajax
    echo json_encode(['success' => true, 'content' => 1]);
}
