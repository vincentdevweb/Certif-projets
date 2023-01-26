<?php
//protect to robot
if (!empty($_POST['escobard'])) {
    $i = 0;
    while ($i < 1) {
        echo "ERREUR";
    }
}


require_once __DIR__ . '../../App/Controllers/joueur.php';
require_once __DIR__ . '../../App/Controllers/planning.php';
require_once __DIR__ . '../../App/Controllers/jxp.php';
require_once __DIR__ . '../../App/Controllers/log.php';


if ((empty($postedData->delete_joueur)) && (empty($postedData->delete_planning)) && (empty($postedData->pxj_add_joueur_id)) && (empty($postedData->pxj_del_joueur_id))) {
    if (isset($_GET['login']) || !empty($_SESSION['login'])) {
        if (isset($_GET['disconnect'])) {
            session_unset();
            session_destroy();
            header('location:/?login');
        }
        //PAGE ADMIN
        if (!empty($_SESSION['login'])) {
            //$usedb->inserer('joueur','nom_j','role','John DOE3','Prof');
            if (isset($_GET['joueur'])) {
                require_once(__DIR__ . '../../view/Layouts/admin_joueur.php');
            } else if (isset($_GET['planning'])) {
                require_once(__DIR__ . '../../view/Layouts/admin_planning.php');
            } else if (isset($_GET['joueurxplanning'])) {
                if (isset($_GET['PID'])) {
                    require_once(__DIR__ . '../../view/Layouts/admin_joueurxplanning_pid.php');
                } else {
                    require_once(__DIR__ . '../../view/Layouts/admin_joueurxplanning.php');
                }
            } else {
                require_once(__DIR__ . '../../view/Layouts/admin_panel_control.php');
            }
        } else {
            require_once(__DIR__ . '../../view/Layouts/login.php');
        }
    } else if (isset($_GET['tarif'])) {
        require_once(__DIR__ . '../../view/Layouts/tarif.php');
    } else if (isset($_GET['planning'])) {
        require_once(__DIR__ . '../../view/Layouts/planning.php');
    } else if (isset($_GET['mention'])) {
        require_once(__DIR__ . '../../view/Layouts/mention_legales.php');
    } else if (isset($_GET['contact'])) {
        require_once(__DIR__ . '../../view/Layouts/contact.php');
    } else {
        require_once(__DIR__ . '../../view/Layouts/home.php');
    }
}

// $_SERVER['REQUEST_URI'] = '/';