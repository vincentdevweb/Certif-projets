<?php
// recupere une donnée en get pour recuperer le résultat de bonne reponse par rapport à l'ID de la réponse
$_GET['value'] = (int) $_GET['value'];
if ($_GET['value'] == 0) {
    $i = 0;
    while ($i < 1) {
        echo "ERREUR";
    }
}
if ($_GET['value'] < 10000) {
    $sqlbool = 'SELECT reponse.bonne_rep FROM `reponse` WHERE reponse.id = ' . $_GET['value'];
    $bool = $usedb->requete($sqlbool, 'fetch');
    echo json_encode(['success' => true, 'content' => $bool['bonne_rep']]);
}
