<?php 
// Retrieve elements for the admin_player view
if (isset($_GET['planning'])) {
    // Read all data from the 'terrain' table
    $terrains = $usedb->read('terrain', NULL, 'fetchAll', 'all');
    $plannings_view_insert = '';
    // Loop through all terrain data and build options for the insert dropdown
    foreach ($terrains as $terrain) {
        $plannings_view_insert .= '<option value="'.$terrain['id'].'">'.$terrain['libelle_t'].'</option>';
        $get_terrain[$terrain['id']] = $terrain['libelle_t'];
    }

    // Read all data from the 'planning' table
    $plannings = $usedb->read('planning', NULL, 'fetchAll', 'all');
    $plannings_view_delete = '';
    $plannings_view_update = '';
    // Loop through all planning data and build buttons for update and delete functionality
    foreach ($plannings as $planning) {
        $plannings_view_delete .= '<button class="btn text-dark border-0 btn-outline-warning btn-lg btn-block" type="button" value="' . $planning['id'] .'">' . date('d/m/Y H:i:s', $planning['date']).' : '.$get_terrain[$planning['terrain_id']].'</button>';
        $plannings_view_update .= '<button class="btn text-dark border-0 btn-outline-info btn-lg btn-block" type="button" value="' . $planning['id'] . '" data-terrain="' . $get_terrain[$planning['terrain_id']]. '" data-terraintime="'.date('Y-m-d\TH:i', $planning['date']).'">'.date('d/m/Y H:i:s', $planning['date']).' : ' . $get_terrain[$planning['terrain_id']] . '</button>';
    }

}

// INSERT
if (!empty($_POST['insert_date']) && !empty($_POST['insert_terrain_id'])) {
    // Convert string to timestamp
    $_POST['insert_date'] = strtotime($_POST['insert_date']);
    // Call insert function with date and terrain_id
    $usedb->insertData('planning', 'date', 'terrain_id', $_POST['insert_date'], $_POST['insert_terrain_id']);
}

// UPDATE
if (!empty($_POST['update_planning']) && !empty($_POST['update_terrain_id'])) {
    // Convert string to timestamp
    $_POST['update_planning'] = strtotime($_POST['update_planning']);
    // Call update function with planning_id, date, and terrain_id
    $usedb->update('planning', $_POST['update_planning_id'], $_POST['update_planning'], $_POST['update_terrain_id']);
}

// DELETE
if (!empty($postedData->delete_planning)) {
    // Convert string to integer and remove special characters to prevent SQL injection
    $string_safe = (int) $postedData->delete_planning;
    // Call delete function with planning_id
    $usedb->delete('planning', $string_safe);
    // Return success message for ajax
    echo json_encode(['success' => true, 'content' => 1]);
}