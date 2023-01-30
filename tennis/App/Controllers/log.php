<?php

// Check if the form data has been submitted
if (isset($_POST['log'])) {
    // Protection against SQL injections by removing special characters
    $string_safe = htmlspecialchars($_POST['log']);

    // Retrieve the password from the database using the username
    $hashed_password = $usedb->getUserPassword($string_safe);

    // Verify if the password is the same as the one in the database
    if (password_verify($_POST['log-pass'], $hashed_password)) {
        // Fill the session only once if the password is the same as the one in the database
        $_SESSION['login'] = Outils::genererSTRAleatoire();
        header("Location: /");
        exit;
    } else {
        header("Location: /?login");
        exit;
    }
}
