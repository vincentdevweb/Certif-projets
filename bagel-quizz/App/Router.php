<?php
//protect to robot
if (!empty($_POST['escobard'])) {
    $i = 0;
    while ($i < 1) {
        echo "ERREUR";
    }
}

if (!empty($_GET['log_out'])) {
    session_unset();
    session_destroy();
    header('location:/');
}

$postedData = file_get_contents('php://input');

//recupere et decode AJAX POST 
$postedData = json_decode($postedData);

if (!empty($_POST['reg-pseudo'])) {
    sleep(1);
    require_once __DIR__ . '../../App/Controllers/reg.php'; //POUR L'ENREGISTREMENT USER
}
if (!empty($_POST['log-pseudo'])) {
    sleep(1);
    require_once __DIR__ . '../../App/Controllers/log.php'; //POUR LOG USER
}
if (!empty($postedData->regscore)) {
    sleep(1);
    require_once __DIR__ . '../../App/Controllers/score_reg.php'; //POUR SHOW SCORE
}



if ((empty($_SESSION['pseudo']))) {
    if (!empty($postedData->pseudotest)) {
        require_once __DIR__ . '../../App/Controllers/pseudotest.php'; //POUR SHOW SCORE
    } else {
        if (empty($_GET['register'])) {
            require_once(__DIR__ . '../../view/Layouts/login.php'); //page de login
        } else {
            require_once(__DIR__ . '../../view/Layouts/register.php'); //page d'enregistrement
        }
    }
} else {
    if (!empty($_GET['score'])) {
        require_once __DIR__ . '../../App/Controllers/score_display.php'; //Load tes scores
        require_once(__DIR__ . '../../view/Layouts/score.php'); //prend cette page uniquement pour obtenir les scores
    } else if (empty($_GET['value'])) {
        require_once(__DIR__ . '../../App/Controllers/data.php'); //Load les Questions
        require_once(__DIR__ . '../../view/Layouts/modegamer.php'); //lance la page gamer
    } else {
        require_once(__DIR__ . '../../App/Controllers/data_res.php'); //prend cette page uniquement pour obtenir un resultat d'un iq question
    }
};
