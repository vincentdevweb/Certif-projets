<?php
$_SESSION['pseudo'] = htmlspecialchars($_SESSION['pseudo']); 
$sql_id_user = "SELECT id FROM `users` WHERE pseudo = '".$_SESSION['pseudo']."'";

// Protection contre les injections SQL --> enlève des caractères spéciaux 
$string_safe = (int) $postedData->regscore;

// recupere l'id du pseudo dans la BDD 
$id_user = $usedb->requete($sql_id_user,'fetch');

// Vérifie que l'utilisateur n'est pas déjà dans la BDD
if ($string_safe == $postedData->regscore) { 
    $usedb->inserer_new_score($string_safe, $id_user['id']);
    echo json_encode(['success' => true, 'content' => 1]);
} else {
    echo json_encode(['success' => false, 'content' => 0]);
}





