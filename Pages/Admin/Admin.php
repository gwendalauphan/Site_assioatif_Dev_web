<?php
    include "../../Generic/function.php";
    $message = "<h1>Vous n'avez pas les droits nécessaires pour acceder à cette page!</h1><br><a href='../../index.php'>Retourner à l'acueil</a>";
    if ($_SESSION["USER"] == -1){ #si l'utilisateur n'est pas connecté, il n'as pas acces à cette page
        exit($message);
    }
    $list = SplitDB($_SESSION["USER"], "user");
    if ($list[8] != 2){
        exit($message); #si l'utilisateur n'est pas un admin, il ne peux pas acceder à la page
    }
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LE VEISTIAIRE - Administration</title>
    <link rel="icon" href="../../images_accueil/image_logo/logo.png" sizes="32x32">
    <script src="admin.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <link rel="stylesheet" href="Admin.css">
</head>

<body style ="min-height:1200px">
    <div id = "top_page">
    <h1>Page des BG</h1>
    <div id = "span_opac">
    <span><h2>Vous faites partie de la communauté des administrateurs !!!! </h2>
    <h2>Vous pouvez alors modifier différentes infos.. </h2></span>
    </div> 

    <?php
        include "../../Generic/header.php";
    ?>
    </div>
    <div class="container">

    <form id ="formulaire">
        Choisissez le type des données à modifier:
        <select id="dataSlect" onchange="recupChoice()">
            <option value="">---Selectionner---</option>
            <option value="user">Utilisateurs</option>
            <option value="event">Evenements</option>
            <option value="product">Produits</option>
        </select>
        <br>

        <!-- Endroit ou on peut selectionner l'element de la bdd -->
        <div id="listChoice">
        </div>
    
    </form>
    </div>

</body>
<?php include "../../Generic/Footer.php"; ?>
</html>