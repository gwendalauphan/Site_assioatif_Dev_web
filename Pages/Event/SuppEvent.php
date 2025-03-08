<?php
    //fichier utilisé dans la page event pour qu'un utilisateur puisse annuler un event
    if (!isset($_POST["id"])){
        //vérification qu'on est dans le cas où c'est un utilisateur qui fait la demande de suppression d'evenement
        exit("<h1>Vous n'avez pas les droits nécessaires pour acceder à cette page!</h1><br><a href='../../index.php'>Retourner à l'acueil</a>");
    }
    include "../../Generic/function.php";

    #changement sur l'event
    $events = explode("\n", file_get_contents("../../BDD/event.txt", true)); //récupération de la base de donnée
    $list = explode("µ", $events[$_POST["id"]]); #séparation suivant les éléments
    $list[6] = strval(intval($list[6]) + 1); #incrémentation du nombre de places disponibles

    closeDB($list, $events, $_POST["id"], "event"); #fermeture de la base de donnée 

    #changements sur l'utilisateur
    $users = explode("\n", file_get_contents("../../BDD/user.txt", true)); #extraction des utilisateurs
    $list = explode("µ", $users[$_SESSION["USER"]]);

    $list[6] = str_replace($_POST["id"], "", $list[6]); #modification des élènements réservés par l'utilisateur
    $_SESSION["UserEvent"] = $list[6]; #modification des évents enregistrés dans la session

    closeDB($list, $users, $_SESSION["USER"], "user"); #fermeture de la session

    echo "Event bien annulé !";
?>