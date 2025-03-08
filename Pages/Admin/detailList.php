<?php
    include "../../Generic/function.php";
    //fichier servant à afficher tous les champs modifiable pour un type de donnée
    if (!isset($_POST["db"])){
        exit("<h1>Vous n'avez pas les droits nécessaires pour acceder à cette page!</h1><br><a href='../../index.php'>Retourner à l'acueil</a>");
    }
    //on gère les données de type différent et pour chacune d'elle, on créé des champs d'entrée correspondant
    if ($_POST["db"] == "user"){
        $list = SplitDB($_POST["id"], "user");
        echo "<form id='Detail'>";

        echo "<div class='lign_container'>Nom de famille :<input type ='text' name = '1' placeholder='".$list[1]."'></div>";
        echo "<div class='lign_container'>Prenom :<input type ='text' name = '2' placeholder='".$list[2]."'></div>";
        echo "<div class='lign_container'>mail :<input type ='text' name = '3' placeholder='".$list[3]."'></div>";
        echo "<div class='lign_container'>pseudo :<input type ='text' name = '4' placeholder='".$list[4]."'></div>";
        echo "<div class='lign_container'>Mot de passe :<input type ='text' name = '5' placeholder='".$list[5]."'></div>";
        echo "<div class='lign_container'>rôle (0 non cotisé, 1 membre, 2 admin) : <input type ='text' name = '8' placeholder='".$list[8]."'></div>";
        echo "<div class='lign_container'>Sexe :<input type ='text' name = '9' placeholder='".$list[9]."'></div>";
        echo "<div class='lign_container'>adresse :<input type ='text' name = '10' placeholder='".$list[10]."'></div>";
        echo "<div class='lign_container'>Année de naissance :<input type ='text' name = '7' placeholder='".$list[7]."'></div>";
        echo "<input type='hidden' value='".$_POST["id"]."' name='id' id='detailId'>";
        echo "<input type='hidden' value='".$_POST["db"]."' name='db' id='detailDb'>";

        echo "<input type='button' value ='Supprimer utilisateur' onClick='deleteElement()'>";      //bouton pour supprimer l'element
        echo "<input type='button' value='Appliquer les changements' onClick='saveChange(this)'>";  //bouton pour enregistrer les changements
        echo "</form>";
    }
    if ($_POST["db"] == "event"){
        $list = SplitDB($_POST["id"], "event");

        echo "<form id='Detail'>";

        echo '<div class="lign_container">Titre : <textarea name = "1" placeholder="'.$list[1].'" value=""></textarea></div>';
        echo "<div class='lign_container'>Endroit :<input type ='text' name = '2' placeholder='".$list[2]."'></div>";
        echo "<div class='lign_container'>Date de début (yyyy/mm/jj hh:mm:ss) : <input type ='text' name = '3' placeholder='".$list[3]."'></div>";
        echo "<div class='lign_container'>Date de fin (yyyy/mm/jj hh:mm:ss) : <input type ='text' name = '4' placeholder='".$list[4]."'></div>";
        echo '<div class="lign_container">Description : <textarea name = "5" placeholder="'.$list[5].'" value=""></textarea></div>';
        echo "<div class='lign_container'>Places :<input type ='text' name = '6' placeholder='".$list[6]."'></div>";
        echo "<input type='hidden' value='".$_POST["id"]."' name='id' id='detailId'>";
        echo "<input type='hidden' value='".$_POST["db"]."' name='db' id='detailDb'>";

        echo "<input type='button' value ='Supprimer event' onClick='deleteElement()'>";
        echo "<input type='button' value='Appliquer les changements' onClick='saveChange(this)'>";
        echo "</form>";
    }
    if ($_POST["db"] == "product"){
        $list = SplitDB($_POST["id"], "product");

        echo "<form id='Detail'>";

        echo "<p>Quantité :<input type ='text' name = '1' placeholder='".$list[1]."'></div>";
        echo "<p>Prix :<input type ='text' name = '2' placeholder='".$list[2]."'></div>";
        echo "<p>Emplacement image : <input type ='text' name = '3' placeholder='".$list[3]."'></div>";
        echo "<p>Description : <input type ='text' name = '4' placeholder='".$list[4]."'></div>";
        echo "<input type='hidden' value='".$_POST["id"]."' name='id' id='detailId'></div>";
        echo "<input type='hidden' value='".$_POST["db"]."' name='db' id='detailDb'></div>";

        echo "<input type='button' value ='Supprimer produit' onClick='deleteElement()'></div>";
        echo "<input type='button' value='Appliquer les changements' onClick='saveChange()'></div>";
        echo "</form>";
    }
?>