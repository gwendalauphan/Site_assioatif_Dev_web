<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LE VEISTIAIRE - Accueil</title>
    <link rel="icon" href="/images_accueil/image_logo/logo.png" sizes="32x32">
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <?php 
        session_start();
        //initialisation des variables si elles ne sont pas définies
        if (!isset($_SESSION["USER"])){
            $_SESSION["USER"] = "-1";
            $_SESSION["UserEvent"] = "";
        }
        include "Generic/header.php"; 
    ?>
    <div class="suite">
        <br>
        <p>a</p>
    </div>
    <div class="presentation">
    <h1>L'Equipe du BDS</h1>
    <div class="membres">
    <div class = mate>
    <img src="images_accueil/image_crew/Gwendal.png" alt="Gwendal Auphan" width="30%">
    <h2>Gwendal Auphan</h2>
    </div>
    <div class = mate>
    <img src="images_accueil/image_crew/Dorian.png" alt="Dorian Gaspar" width="30%">
    <h2>Dorian Gaspar</h2>
    </div>

     <div class = mate>
    <img src="images_accueil/image_crew/Quentin.png" alt="Quentin De giovanni" width="30%">
    <h2>Quentin De giovanni</h2>
    </div>

     <div class = mate>
    <img src="images_accueil/image_crew/Alex.png" alt="Alexandre Richaudeau" width="30%">
    <h2>Alexandre Richaudeau</h2>
    </div>

     <div class = mate>
    <img src="images_accueil/image_crew/Arthur.png" alt="Arthur Dounies" width="30%">
    <h2>Arthur Dounies</h2>
    </div>

    </div>
    <h1>Vous présente ses activités</h1>


	<div class="slider">

	<div class = "photo fade">
			<img class="event" src="images_accueil/image_activites/rando_velo.jpg" alt="rando_velo" style="width:100%">
			<div class="text">Activité Rando / Vélo</div>
	</div>

	<div class="photo fade">
			<img class="event" src="images_accueil/image_activites/extreme_sport.jpg" alt="extreme_sport" style="width:100%">
			<div class="text">Sports Extremes</div>
	</div>

	<div class="photo fade">
			<img class="event" src="images_accueil/image_activites/ball_sport.jpg" alt="ball_sport" style="width:100%">
			<div class="text">Sports en coopération</div>
	
	</div>

	<a class="gauche" onclick="plusSlides(-1)">&#10094;</a>
	<a class="droite" onclick="plusSlides(1)">&#10095;</a>

			
	<div style="text-align:center">
		<span class="dot" onclick="currentSlide(1)"></span>
		<span class="dot" onclick="currentSlide(2)"></span>
		<span class="dot" onclick="currentSlide(3)"></span>
	</div>

	</div>
    <script src="accueil.js"></script>
</body>
<?php include "Generic/Footer.php"; ?>
</html>