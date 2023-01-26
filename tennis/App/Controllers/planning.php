<?php 
//$date = date("Y-m-d\TH:i:s", strtotime($row['start_time']));

//CRUD de planning

//Recuperer les elements pour ma vue admin_joueur
if (isset($_GET['planning'])) {
    $terrains = $usedb->read('terrain', NULL, 'fetchAll', 'all');
    $plannings_view_insert = '';
    foreach ($terrains as $terrain) {
        $plannings_view_insert .= '<option value="'.$terrain['id'].'">'.$terrain['libelle_t'].'</option>';
        $get_terrain[$terrain['id']] = $terrain['libelle_t'];
    }

    $plannings = $usedb->read('planning', NULL, 'fetchAll', 'all');
    $plannings_view_delete = '';
    $plannings_view_update = '';
    foreach ($plannings as $planning) {
        $plannings_view_delete .= '<button class="btn text-dark border-0 btn-outline-warning btn-lg btn-block" type="button" value="' . $planning['id'] .'">' . date('d/m/Y H:i:s', $planning['date']).' : '.$get_terrain[$planning['terrain_id']].'</button>';
        $plannings_view_update .= '<button class="btn text-dark border-0 btn-outline-info btn-lg btn-block" type="button" value="' . $planning['id'] . '" data-terrain="' . $get_terrain[$planning['terrain_id']]. '" data-terraintime="'.date('Y-m-d\TH:i', $planning['date']).'">'.date('d/m/Y H:i:s', $planning['date']).' : ' . $get_terrain[$planning['terrain_id']] . '</button>';
    }

}
//INSERT
if (!empty($_POST['insert_date']) && !empty($_POST['insert_terrain_id'])) {
    $_POST['insert_date'] = strtotime($_POST['insert_date']);
    $usedb->inserer('planning', 'date', 'terrain_id', $_POST['insert_date'], $_POST['insert_terrain_id']);
}

if (!empty($_POST['update_planning']) && !empty($_POST['update_terrain_id'])) {
    $_POST['update_planning'] = strtotime($_POST['update_planning']);
    $usedb->update('planning', $_POST['update_planning_id'], $_POST['update_planning'], $_POST['update_terrain_id']);
}

//DELETE
if (!empty($postedData->delete_planning)) {

    // Protection contre les injections SQL --> enlève des caractères spéciaux 
    $string_safe = (int) $postedData->delete_planning;

    $usedb->delete('planning', $string_safe);

    //return for ajax
    echo json_encode(['success' => true, 'content' => 1]);
}