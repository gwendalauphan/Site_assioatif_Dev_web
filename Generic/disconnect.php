<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_POST["action"])) {
        exit("<h1>Vous n'avez pas les droits nécessaires pour accéder à cette page!</h1><br><a href='../../index.php'>Retourner à l'accueil</a>");
    }

    $_SESSION["USER"] = -1; // Utilisation de l'entier au lieu de "-1" qui est une chaîne
    $_SESSION["UserEvent"] = "";

    echo "Vous avez été déconnecté"; // Message de déconnexion
?>
