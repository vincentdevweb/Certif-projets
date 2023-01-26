<?php
$_SESSION['pseudo'] = htmlspecialchars($_SESSION['pseudo']);
$sql_id_user = "SELECT id FROM `users` WHERE pseudo = '".$_SESSION['pseudo']."'";

// recupere l'id du pseudo dans la BDD 
$id_user = $usedb->requete($sql_id_user,'fetch');

$sql_score = 'SELECT score.date_session, score.bonne_rep_user FROM users INNER JOIN score ON score.id_user = users.id WHERE users.id = '.$id_user['id'].' ORDER BY score.bonne_rep_user DESC;';

// recupere les questions et reponses dans la BDD 
$data_scores = $usedb->requete($sql_score);

//parametrage de mon tableau de score 
$i = 1;
$tablephp_scores = "";
foreach ($data_scores as $data_score) {
    extract($data_score);
    $tablephp_score = "<tr><th scope='row'>".$i."</th><td>".date('d/m/Y', $date_session)."</td><td>".date('H:i:s', $date_session)."</td><td>".$bonne_rep_user."</td></tr>";
    $tablephp_scores .= $tablephp_score ;
    $i++;
}


