<?php
if (isset($_POST['log'])) {
    // Protection contre les injections SQL --> enlève des caractères spéciaux 
    $string_safe = htmlspecialchars($_POST['log']);

    //récuperation du password dans la BDD en utilisant le pseudo 
    $hashed_password = $usedb->recup_pass($string_safe);

    if (password_verify($_POST['log-pass'], $hashed_password)) {
        //remplis une fois uniquement la session si le password est identique à celle dans la BDD 
        $_SESSION['login'] = Outils::genererSTRAleatoire();
        header("Location: /");
        exit;
    } else {
        header("Location: /?login");
        exit;
    }
}
