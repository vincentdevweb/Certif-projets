<?php
$postedData->pseudotest = htmlspecialchars($postedData->pseudotest);


// Vérifie que l'utilisateur n'est pas déjà dans la BDD
if ($usedb->checkIfUserExists($postedData->pseudotest)) { 
    echo json_encode(['success' => false, 'content' => str_replace(' ', '', $postedData->pseudotest)]);
} else {
    echo json_encode(['success' => true, 'content' => str_replace(' ', '', $postedData->pseudotest)]);
}





