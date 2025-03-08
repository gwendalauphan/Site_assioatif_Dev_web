<?php
    if (!isset($_POST["id"])){ #si aucune donnée n'as été envoyé, l'utilisateur n'as rien à faire ici
        exit("<h1>Vous n'avez pas les droits nécessaires pour acceder à cette page!</h1><br><a href='../../index.php'>Retourner à l'acueil</a>");
    }
    include "../../Generic/function.php";

    #changement sur l'event
    $events = explode("\n", file_get_contents("../../BDD/event.txt", true));
    $list = explode("µ", $events[$_POST["id"]]);
    if ($list[6] == "0"){ #si aucune palce n'est dispos, on quitte le fichier avec un message
        exit("Il n'y a plus de place de disponible.");
    }
    $list[6] = strval(intval($list[6]) - 1); #sinon on retire un au nombre de places disponible

    closeDB($list, $events, $_POST["id"], "event"); #fermeture de la abse de donnée

    #changements sur l'utilisateur
    $users = explode("\n", file_get_contents("../../BDD/user.txt", true)); #extraction des utilisateurs
    $list = explode("µ", $users[$_SESSION["USER"]]);

    $list[6] = $list[6].$_POST["id"]; #ajout de l'id de l'évènement à ceux enregistrés
    $_SESSION["UserEvent"] = $list[6]; #ajout à la variable de session

    closeDB($list, $users, $_SESSION["USER"], "user"); #fermeture de la base de donnée

    echo "Event bien réservé !";
?>