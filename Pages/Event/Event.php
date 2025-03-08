<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LE VEISTIAIRE - Event</title>
    <link rel="icon" href="../../images_accueil/image_logo/logo.png" sizes="32x32">
    <link rel="stylesheet" href="style.css">
    <script src="event.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
</head>  
<body>
<div id = "top_page">
    <h1>Évenements organisés par votre BDS</h1>
    <div id = "span_opac">
    <span>Vous avez cotisés dans notre association et vous souhaiter participer aux activités de votre association? <br> 
    Vous êtes sur la bonne page! <br>
    Pour vous y inscrire c'est juste en dessous: </span></div>
    </div> 
    <?php
        session_start();
        include "../../Generic/header.php";
    ?>
    <div class = "container">

    <?php
        $events = explode("\n", file_get_contents("../../BDD/event.txt", true)); #extraction des events
        foreach($events as $event){
            $list = explode("µ", $event); #liste contenant les propriétés des events
            echo "<div class='event'>";
            echo "<div class='date'> du ". $list[3] . " au ". $list[4] . "</div>"; #affichage de la date de l'event
            echo "<div class='name'>". $list[1] . "</div>";                        #affichage du titre
            echo "<div class='description'><br>". $list[5] . "<br><br></div>";     #affichage de la description
            echo "<div class='place'>". $list[2] . "</div>";                       #affichage de l'endroit
            echo "<div class='quantity'>".$list[6] ." places restantes</div>";     #affichage du nombre de places restantes

            if ($_SESSION["USER"] >0){  #vérificationsi l'utilisateur est connecté et à cotisé (ou est un admin)
                $tmp = 0;
                
                foreach (str_split($_SESSION["UserEvent"]) as $listeEvents){ #on bouche dans tous les évènements réservé par l'utilisateur
                    if ($listeEvents == $list[0]){
                        #création du botton pour annuler l'event
                        echo "<button name=".$list[0]." class='EventButton' onclick='annulerEvent(this)'> Annuler</button>";
                        $tmp = 1;
                    }
                }
                
                if ($tmp == 0 && intval($list[6]) > 0){
                    #event n'est pas réservé par l'utiliosateur, on place le bouton pour le reserver
                    echo "<button name=".$list[0]." class='EventButton' onclick='souscrireEvent(this)'>Reserver</button>";
                }
            }
            else echo "Veuillez vous inscrire et cotiser pour pouvoir participer";
            
            echo "</div>";
        }
    ?>
    </div>
</body>
<?php include "../../Generic/Footer.php"; ?>
</html>
