<?php
	//fichier pour valider les logins renseignés et connecter la personne si des logins valides sont entrés
	if (!isset($_POST["password"])){
		//si la page n'as pas reçue de requete dans le contexte d'une connexion, on fait quitter la page avec un message
        exit("<h1>Vous n'avez pas les droits nécessaires pour acceder à cette page!</h1><br><a href='../../index.php'>Retourner à l'acueil</a>");
    }
	session_start();
	$identifiant = explode("\n", file_get_contents("../../BDD/user.txt", true)); // récupération des données utilisateur
    $pseudo = $_POST['Identifiant']; //récupération des données transmises
    $password = $_POST['password'];
	$valide = 0; //par défaut, on considère que les logins entrés sont invalides
	
    foreach($identifiant as $donnee){ //on boucle dans la liste des utilisateurs et on regarde si un login/mdp corresond à ce que l'utilisateur à entré
		$list = explode("µ", $donnee);
        if($list[4] == $pseudo && $list[5] == $password){
            $connecte = $list[8];		//sauvegarde du grade de l'utilisateur connecté
			$valide = 1;				//un utilisateur à été trouvé
			$_SESSION["USER"] = $list[0]; //attribution  des variables environnement
			$_SESSION["UserEvent"] = $list[6];
        }
    }

	if ($valide == 0){ //si aucun login ne correspond, on renvois un message d'erreur
		$connecte = "email ou mot de passe incorrect";
	}

	echo $connecte; //renois du message (erreur ou succès)
?>