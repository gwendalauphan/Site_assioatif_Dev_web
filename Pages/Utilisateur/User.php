<!DOCTYPE html>
<html lang="en">
<head>
	<title>LE VEISTIAIRE - Profil</title>
    <link rel="icon" href="../../images_accueil/image_logo/logo.png" sizes="32x32">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
    <script type="text/javascript" src="user.js"></script>
</head>
	<body>
		<div class="limiter">
			<div class="container-login100" style="background-image: url('img/BDS_garde.jpg');">
				<div class="wrap-login100 p-t-30 p-b-50">
					<span class="login100-form-title p-b-41"></span>
					<form class="login100-form validate-form p-b-33 p-t-5" id="formLogins" method="POST">
							<div class="wrap-input100 validate-input" data-validate = "Enter username">
							<input class="input100" type="text" name="Identifiant" placeholder="Identifiant (pseudo)" required="required" autocomplete="off">
							<span class="focus-input100" ></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Enter password">
							<input class="input100" type="password" name="password" placeholder="Mot de passe" required="required" autocomplete="off">
							<span class="focus-input100"></span>
						</div>
						<br>
						<div class="container-login100-form-btn m-t-32">
							<input type="button" onClick="connectUser()" class="login100-form-btn" value="Se connecter">
						</div>
						<br>
						<p>Si vous avez des problèmes à vous connecter, veuillez contacter votre administrateur. </p>
					</form>
					<br>
					<form class="login100-form validate-form p-b-33 p-t-5" action="inscription.php">
						<br>
						<div class="container-login100-form-btn m-t-32">
							<button class="login100-form-btn">
								S'inscrire
							</button>
						</div>
						<br>
					</form>
				</div>
			</div>
		</div>
		
	</body>
<?php include "../../Generic/Footer.php"; ?>
</html>