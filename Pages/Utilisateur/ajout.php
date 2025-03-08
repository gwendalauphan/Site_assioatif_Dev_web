<?php
	//fichier pour ajouter un utilisateur
	if (!isset($_POST["sexe"])){ //check si une personne essaye d'acceder à cette page, sans requète
		exit("<h1>Vous n'avez pas les droits nécessaires pour acceder à cette page!</h1><br><a href='../../index.php'>Retourner à l'acueil</a>");
	}
	session_start();
	$users = explode("\n", file_get_contents("../../BDD/user.txt", true)); //récupération du fichier utilisateur
	$list = explode("µ", end($users));
	$id = strval(intval($list[0]) + 1); //attribution de l'id du nouvel utilisateur en fonction du dernier dans le fichier

	$sexe = $_POST['sexe']; //récupération des champs
	$nom = $_POST['surname'];
	$prenom = $_POST['name'];
    $email = $_POST['email']; 
    $pseudo = $_POST['Pseudo']; 
	$adress = $_POST["adresse"];
	$year = $_POST["year"];	
    $password = $_POST['password'];

	$newList = $id."µ".$nom."µ".$prenom."µ".$email."µ".$pseudo."µ".$password."µµ".$year."µ0µ".$sexe."µ".$adress;

	//enregistrement du nouvel utilisateur dans le fichier
	array_push($users, $newList);
	$tmp = implode("\n", $users);

	$file = fopen("../../BDD/user.txt", "w");
	fwrite($file, $tmp);
	fclose($file);

	$_SESSION["USER"] = $id;     //enregistrement des varables de sesssion
	$_SESSION["UserEvent"] = "";

	header("Location: ../../index.php"); //redirection vers la page d'accueil
?>	