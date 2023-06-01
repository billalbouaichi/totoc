<?php
session_start(); // Démarrez la session (si ce n'est pas déjà fait)

// Détruisez toutes les variables de session
$_SESSION = array();

// Si vous souhaitez détruire complètement la session, supprimez également le cookie de session.
// Notez que cela détruira la session et pas seulement les données de session.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Enfin, détruisez la session.
session_destroy();
header("Location: ./index1.php");

?>