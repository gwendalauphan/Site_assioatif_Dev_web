<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <title>LE VEISTIAIRE - Magasin</title>
    <link rel="icon" href="../../images_accueil/image_logo/logo.png" sizes="32x32">
    <link rel="stylesheet" type="text/css" href="Magasin.css" />
    <script type="text/javascript" src="JSMagasin.js"></script>
  </head>

  <body> 

    <div id="titre">
	    <h1>Boutique</h1>
      <h4>Découvre la collection complète CY-Tech , choisis la tenue qu'il te faut et affiche fièrement ton soutien à ton école.</h4>
      <?php
        session_start();
        include "../../Generic/header.php";
      ?>
    </div>

    <?php
      #récupération de la liste des articles
      $articles = explode("\n", file_get_contents("../../BDD/product.txt", true));
      for ($i=0; $i<count($articles); $i++) { #pour chaque element, on l'affiche
          $list = explode("µ", $articles[$i]);
          echo "<div id=KIT1".$i." >";
          echo "<div> <h3 style='text-align : center;'> <strong>".$list[4]." : ".$list[2]." € </strong> </h3> (".$list[1]." elements restants) </div>";
          echo "<div> <img src=".$list[3]."> </div>";
      if ($_SESSION["USER"] == -1){ #si l'utilisateur n'est pas connecté, on affiche un bouton dédié
        echo "<button class='article' style='background:#555' disabled>Vous n'êtes pas connecté</button>";
      }
      else if ($list[1] > 0){
        #si un article est disponible, on affiche le bouton pour le commander
        echo "<div> <button name= ".$list[2].",".str_replace(" ", "_", $list[4])." id=".$i." class='article' onclick='panier(this)' >JE COMMANDE</button> </div>";
      }
      else{
        #si l'article est en rupture de stock, on affiche un bouton pour l'anoncer
        echo "<button class='article' style='background:#555' disabled>Rupture de stock</button>";
      }
          echo "</div>"; 
      }
    ?>


    <div  id="destination">
		<h2>Votre Panier</h2>
		<form id="FormPanier" action="../Paiement/Paiement.php" method="POST">
			<u> Montant du panier : <span id="panierPrice"  name="panier"> 0 </span>€</u>
			<div id="panierText"></div>
			<br>
			<input type="button" id="panierButton" onClick="validerPanier()" value="VALIDER LE PANIER" disabled>
			<input type="hidden" name="cotisation" value ="0">
			<input type="hidden" name="ids" id="ids" value ="">
			<input type="hidden" name="price" id="price" value ="0">
		</form>
    </div>

  </body>
<?php include "../../Generic/Footer.php"; ?>
</html>


