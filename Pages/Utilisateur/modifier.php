<?php
	include "../../Generic/function.php";
	if ($_SESSION["USER"] == "-1"){
        exit("<h1>Vous n'avez pas les droits nécessaires pour acceder à cette page!</h1><br><a href='../../index.php'>Retourner à l'acueil</a>");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<title>LE VEISTIAIRE - Profil</title>
		<link rel="icon" href="../../images_accueil/image_logo/logo.png" sizes="32x32">
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	    <link rel="icon" type="image/png" href="img/BDS.jpg"/>
	    <link rel="stylesheet" type="text/css" href="main.css">
    	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="user.js"></script>
    </head>

	<body onload="Formulaire()">
	<h1>Modification du profil</h1>
	<?php
		include "../../Generic/header.php";
	?>
		<div class="limiter">
			
			<div class="container-login100" style="background-image: url('img/BDS_garde.jpg');">
			<div class ="recap">
			<div style="background:white; color: black; padding:4%; border-radius:2em">
						<?php
							
							//affichage des informations personnelles
							SplitDB($_SESSION["USER"], "user");
							echo "<h3 style ='text-align: center'>Vos informations personnelles :</h3>"; 
							echo "<p style = 'text-align: justify'> Nom et prénom : ".$list[1]." ".$list[2]."<br>Sexe : ".$list[9]."<br>Mail : ".$list[3]."<br>Pseudo : ".$list[4]."<br>Adresse : ".$list[10]."<br>Année de naissance : ".$list[7]."<br>Votre mdp : ".$list[5];
						?>
					</div>
		</div>
				<div class="wrap-login100 p-t-30 p-b-50">
					<form class="login100-form validate-form p-b-33 p-t-5" id="formModif" method="POST">
                        
                        <div class="wrap-input100 validate-input" style="text-align: center;">
                            <label for="homme">Homme : </label><input type="radio" name="sexe" value="homme"  required id="homme">
    			            <label for="femme">Femme : </label><input type="radio" name="sexe" value="femme" required id="femme">
                        </div>

						<div class="wrap-input100 validate-input" data-validate = "modifier Nom">
							<input class="input100" type="text" name="surname" placeholder="Changer nom" autocomplete="off">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="modifier prenom">
							<input class="input100" type="text" name="name" placeholder="Changer prénom" autocomplete="off">
							<span class="focus-input100"></span>
						</div>

                        <div class="wrap-input100 validate-input" data-validate = "Changer Pseudo">
							<input class="input100" type="text" name="Pseudo" placeholder="Changer pseudo"  autocomplete="off">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Changer Mail">
							<input  type="email" class="input100" name="email" placeholder="Changer mail" autocomplete="off">
							<span class="focus-input100"></span>
						</div>

                        <div class="wrap-input100 validate-input" data-validate="adresse">
							<input class="input100" type="text" name="adresse" placeholder="Changer adresse"  autocomplete="off">
							<span class="focus-input100"></span>
						</div>

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
							<input class="input100" type="password" name="password" placeholder="Changer mot de passe" autocomplete="off">
							<span class="focus-input100"></span>
						</div>

                        <div class="wrap-input100 validate-input" style="text-align: center;">
                            <label for="list">Année de naissance : </label><select id="list" type="date" name="year"></select>
                        </div>
                    	
						<div class="container-login100-form-btn m-t-32" style = 'padding-top:2%'>
							<input type="button" class="login100-form-btn" value="Appliquer les changements" onClick="saveChanges()">
						</div>
						<br>

					</form>
					
					<!--partie pour payer la cotisation-->
					<form method="POST" action="../Paiement/Paiement.php">
						<input type="hidden" name="cotisation" value= "<?php  echo $list[0]; ?>">
						<input type="hidden" name="price" value= "10">
						<input type="hidden" name="ids" value= "-1">
						<?php if ($list[8] == 0) echo "<input type='submit' value='Payer la cotisation'>"?>
					</form>
				</div>
			</div>
		</div>
		
	</body>
<?php include "../../Generic/Footer.php"; ?>
</html>