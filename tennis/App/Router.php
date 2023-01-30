<?php

// Check if any of the data is empty AND escobard anti-robot
$data_status = match (empty($_POST['escobard'])) {
    !empty($postedData->delete_joueur), !empty($postedData->delete_planning) => false,
    !empty($postedData->pxj_add_joueur_id), !empty($postedData->pxj_del_joueur_id) => false,
    default => true,
};

// Check if login is not set or session is empty
if (empty($_SESSION['login']) && !isset($_GET['login'])) {
    match ($data_status) {
        isset($_GET['tarif']) => require_once(__DIR__ . '../../view/Layouts/tarif.php'),
        isset($_GET['planning']) => require_once(__DIR__ . '../../view/Layouts/planning.php'),
        isset($_GET['mention']) => require_once(__DIR__ . '../../view/Layouts/mention_legales.php'),
        isset($_GET['contact']) => require_once(__DIR__ . '../../view/Layouts/contact.php'),
        default => require_once(__DIR__ . '../../view/Layouts/home.php'),
    };
}

// Check if login is set or session is not empty
switch ($data_status) {
    case (isset($_GET['login']) || !empty($_SESSION['login'])):
        // Check if disconnect is set
        if (isset($_GET['disconnect'])) {
            // Unset and destroy session
            session_unset();
            session_destroy();
            header('location:/?login');
        }
        // Check if session is not empty
        if (!empty($_SESSION['login'])) {
            // Admin page
            if (isset($_GET['PID'])) {
                $page = '../../view/Layouts/admin_joueurxplanning_pid.php';
            } else {
                $page = '../../view/Layouts/admin_joueurxplanning.php';
            }
            match (true) {
                isset($_GET['joueur']) => require_once(__DIR__ . '../../view/Layouts/admin_joueur.php'),
                isset($_GET['planning']) => require_once(__DIR__ . '../../view/Layouts/admin_planning.php'),
                isset($_GET['joueurxplanning']) => require_once(__DIR__ . $page),
                default => require_once(__DIR__ . '../../view/Layouts/admin_panel_control.php'),
            };
        } else {
            // Show login page
            require_once(__DIR__ . '../../view/Layouts/login.php');
        }
        break;
}
