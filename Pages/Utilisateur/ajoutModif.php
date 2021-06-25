<?php
    //fichier utilisé pour l'enregistrement des modification faites sur le profil
    if (!isset($_POST["sexe"])){
        exit("<h1>Vous n'avez pas les droits nécessaires pour acceder à cette page!</h1><br><a href='../../index.php'>Retourner à l'acueil</a>");
    }
    include "../../Generic/function.php";

    $users = explode("\n", file_get_contents("../../BDD/user.txt", true)); //récupération des données utilisateur
	$list = explode("µ", $users[$_SESSION["USER"]]);

    $sexe = $_POST['sexe']; //récupération des variables
	$nom = $_POST['surname'];
	$prenom = $_POST['name'];
    $email = $_POST['email']; 
    $pseudo = $_POST['Pseudo']; 
	$adress = $_POST["adresse"];
	$year = $_POST["year"];	
    $password = $_POST['password'];

    $tmp = array($nom, $prenom, $email, $pseudo, $password, "", $year, "", $sexe, $adress); //mise en liste
    for ($i = 1; $i < 12; $i++){
        if ($tmp[$i-1] != "" && $tmp[$i-1] != $list[$i]){ //pour chaque element, on regarde si la valeur entrée est non nulle et différente de l'ancienne
            $list[$i] = $tmp[$i-1];
        }
    }
    closeDB($list, $users, $_SESSION["USER"], "user"); //fermeture de la base de donnée

    echo "Changement appliqué";
?>