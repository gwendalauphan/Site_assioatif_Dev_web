<?php
    //fichier utilisé pour enregistrer les modifications faites à un element
    include "../../Generic/function.php";
    if (!isset($_POST["id"])){
        exit("<h1>Vous n'avez pas les droits nécessaires pour acceder à cette page!</h1><br><a href='../../index.php'>Retourner à l'acueil</a>");
    }

    $data = explode("\n", file_get_contents("../../BDD/".$_POST["db"].".txt", true)); #extraction des données
    $list = explode("µ", $data[$_POST["id"]]);

    for ($i = 1; $i < count($list); $i++){  //parcours des elemtns de la base de donnée
        if ($_POST["db"] == "user" && $i == 6){
            $i = 7; //skip de certains index dans la partie user (ce sont les historiques d'achat)
        }
        if($_POST[$i] != null){ //si la veleur envoyée n'est pas nulle, on remplace la valeur
            $list[$i] = $_POST[$i];
        }
    }
    closeDB($list, $data, $_POST["id"], $_POST["db"]); //fermeture de la base de donnée

    echo "les changements on bien été appliqués";
?>