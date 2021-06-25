
<?php
	#on regarde si l'utilisateur à une raison d'être la, sinon on lui envoie un message
	if (!isset($_POST["cotisation"])){
        exit("<h1>Vous n'avez pas les droits nécessaires pour acceder à cette page!</h1><br><a href='../../index.php'>Retourner à l'acueil</a>");
    }
	$cotisation= $_POST['cotisation']; #savoir si c'est une cotisation ou un paiement

	if ($cotisation==1) {
		$prix= "10"; #le prix de cotisation est de 10€
	}
	else{
		$prix = $_POST["price"];
		$ids = $_POST["ids"]; #panier
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>LE VEISTIAIRE - Paiement</title>
		<link rel="icon" href="../../images_accueil/image_logo/logo.png" sizes="32x32">
		<link rel="stylesheet" type="text/css" href="forme.css" />
		<script type='text/javascript' src='Paiement.js' >
		</script>
		<meta charset="utf-8" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	</head>
	<body>
		<h1>Paiement</h1>
		<div class ="container">
		<div class = "paiement">
			<form id='f1' action='confirm.php' method="POST">
				<fieldset>
					<legend>
						        Veuillez saisir les informations de votre paiement    
					</legend>
					<div class="card-data">
						<p class="picto-field" id="splitCardNumberBlock">
							<label for="cardNumberField" id="cardNumberField-label" class="control-label">Numéro de carte&nbsp;:</label>
							<input type="tel" id="cardNumberField0" maxlength="4" pattern="[0-9]{3,7}" style="width:32px;" class="bite">
							     -     
							<input type="tel" id="cardNumberField1" maxlength="4" inputmode="numeric" pattern="[0-9]{3,7}" style="width:32px;" class="cardNumberFieldSplitBlock">
							     -     
							<input type="tel" id="cardNumberField2" maxlength="4" inputmode="numeric" pattern="[0-9]{3,7}" style="width:32px;" class="cardNumberFieldSplitBlock">
							     -     
							<input type="tel" id="cardNumberField3" maxlength="7" inputmode="numeric" pattern="[0-9]{3,7}" style="width:56px;" class="cardNumberFieldSplitBlock">
						</p>
						<fieldset class="k-choice">
							<legend>
								                Date d’expiration :            
							</legend>
							<p>
								<label for="expirydatefield" id="expirydatefield-label" class="control-label"><span></span></label>
								<span aria-labelledby="expirydatefield-label" class="monthdatafield" id="expirydatefield">
									<label class="month-date-label" for="expirydatefield-month">
										                        Mois :                        
										<span class="styledSelect">
											<select autocomplete="cc-month" name="expirydatefield-month" class="date-select" id="expirydatefield-month">
												<option value="01">01</option>
												<option value="02">02</option>
												<option value="03">03</option>
												<option value="04">04</option>
												<option value="05">05</option>
												<option value="06">06</option>
												<option value="07">07</option>
												<option value="08">08</option>
												<option value="09">09</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
											</select>
										</span>
									</label>
									<label class="year-date-label" for="expirydatefield-year">
										                        Année :                        
										<span class="styledSelect">
											<select autocomplete="cc-year" name="expirydatefield-year" class="date-select" id="expirydatefield-year">
												<option value="2021">2021</option>
												<option value="2022">2022</option>
												<option value="2023">2023</option>
												<option value="2024">2024</option>
												<option value="2025">2025</option>
												<option value="2026">2026</option>
												<option value="2027">2027</option>
												<option value="2028">2028</option>
												<option value="2029">2029</option>
												<option value="2030">2030</option>
												<option value="2031">2031</option>
											</select>
										</span>
									</label>
								</span>
							</p>
						</fieldset>
						<div id = "fin">
							<p>
								<label for="cvvfield" id="cvvfield-label" class="control-label">Cryptogramme visuel :</label>
								<input aria-labelledby="cvvfield-label" maxlength="3" autocomplete="OFF" id="cvvfield" class="form-control" name="cvvfield" type="tel"/>
							</p>
							<p id ="fin2">
								<?php  echo "Total :" .$prix."€"  ?>
								<br>
								<br>
								<input type="hidden" name="cotisation" value='<?php echo $cotisation ?>' >
								<input type="hidden" name="produits" value='<?php echo $ids ?>' >
								<input type="button" name="Payer" value="Payer" onClick="pay()">
							</p>
						</div>
					</div>
				</fieldset>
			</form>
</div>
<div id=commande style="text-align:center">
			<u>
				 Pannier :
			</u>
			<br>
			<?php
				if ($cotisation==0){ #si on a un paiement
					$products = explode("\n", file_get_contents("../../BDD/product.txt", true)); #on récupère la base de donnée des produits
					foreach (str_split($ids) as $item){
						$list = explode("µ", $products[intval($item)]);
						echo $list[4]." ".$list[2]." €<br>"; #pour chauque produit, si il est dans la liste du panier, on l'affiche
					}   
				}
				else{
					echo "Cotisation";
				}
				
				?>
		</div>
</div>
</body>
<?php include "../../Generic/Footer.php"; ?>
</html>


