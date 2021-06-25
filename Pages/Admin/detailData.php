<?php
    //page pour afficher la liste des elements d'une catégorie: tous les produits, tous les utilisateurs ,...
    if (!isset($_POST["id"])){
        exit("<h1>Vous n'avez pas les droits nécessaires pour acceder à cette page!</h1><br><a href='../../index.php'>Retourner à l'acueil</a>");
    }
    echo '<select name="'.$_POST["id"].'" id="dataSelect" onchange="recupForm()">'; 
    echo '<option value=""> --Choisissez un Element-- </option>';
    $list = explode("\n", file_get_contents("../../BDD/".$_POST["id"].".txt", true)); //récupération des éléments
    for($i = 0; $i < count($list); $i++){
        $tmp = explode("µ", $list[$i]);
        if ($_POST["id"] == "event") $index = 1;
        else $index = 4;
        echo "<option value = '".$i."'>".$tmp[$index]."</option>"; //affichage du nom dans la liste
    }
    echo "<br><br></select>";
    echo "<div id='result_data'></div>";
?>