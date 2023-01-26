<?php
// vérifie que password et bien retaper --> eviter erreur utilisateur
if ($_POST['reg-pass'] != $_POST['reg-rep-pass']) {
    echo "<p>There was an error processing your request. Please try again.</p>";
    header("Location: /?register=on_error", 10, 303);
    exit;
}

// Protection contre les injections SQL --> enlève des caractères spéciaux 
$string_safe = htmlspecialchars($_POST['reg-pseudo']);

// Vérifie que l'utilisateur n'est pas déjà dans la BDD
if ($usedb->checkIfUserExists($string_safe) === true) {
    header('Location: /error.php');
    exit;
} else if ($string_safe == $_POST['reg-pseudo']) { //Vérifie que le pseudo rentrer et le même si l'on enlève les caractères spéciaux
    $pass_hash = password_hash($_POST['reg-pass'], PASSWORD_DEFAULT);
    $usedb->inserer_new_user($string_safe, $pass_hash);
} else {
    echo "ERREUR";
}
