<?php
    //fichier utilisé pour la deconnexion
    if (!isset($_POST["action"])) {
        exit("<h1>Vous n'avez pas les droits nécessaires pour acceder à cette page!</h1><br><a href='../../index.php'>Retourner à l'acueil</a>");
    }
    session_start();
    $_SESSION["USER"] = "-1"; //attribution des lvaleur par défaut aux variables de session
    $_SESSION["UserEvent"] = "";
    echo "Vous avez été deconnecté"; //message de deconnexion
?>