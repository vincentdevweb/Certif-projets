<?php

namespace PALLAS\App\Controllers;


$questions = 'SELECT * FROM `question` ORDER BY RAND() LIMIT 10';//pour modegamer.php
$reponses = 'SELECT reponse.libelle_rep, reponse.id_question, reponse.bonne_rep, reponse.id as rep_id FROM `reponse`; ';

// recupere les questions et reponses dans la BDD 
$questions = $usedb->requete($questions);
$reponses = $usedb->requete($reponses);

//initialise la Question a 1 pour l'affichage dans l'index
$numero_question = 1;
