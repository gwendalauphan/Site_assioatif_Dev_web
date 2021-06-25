<?php
    //fichier pour supprimer un element d'une base de donnée
    if (!isset($_POST["id"])){
        exit("<h1>Vous n'avez pas les droits nécessaires pour acceder à cette page!</h1><br><a href='../../index.php'>Retourner à l'acueil</a>");
    }
    $data = file_get_contents("../../BDD/".$_POST["db"].".txt", true);
    $datas = explode("\n", $data); #extraction des données
    
    //le dernier element est spécial car il n'as pas de \n, dans les deux cas, on remplace l'element par du vide, ce qui a pour effet de le supprimer
    if ($_POST["id"] == count($datas)-1){
        $data = str_replace("\n".$datas[$_POST["id"]], "", $data);
    }
    else{
        $data = str_replace($datas[$_POST["id"]]."\n", "", $data);
    }

    $datas = explode("\n", $data); //enregistrement du résultat

    //réagencement des index, on parcours tous les éléments en leur attribuant un index en ordre croissant de 0 à n-1
    $index = 0;
    for ($i = 0; $i < count($datas); $i++){
        $list = explode("µ", $datas[$i]);
        $list[0] = $index ++;
        $datas[$i] = implode("µ", $list);
    }
    $tmp = implode("\n", $datas); //enregistrement dans la base de donnée

    $file = fopen("../../BDD/".$_POST["db"].".txt", "w");
    fwrite($file, $tmp);
    fclose($file);

    echo "Element retiré avec succès"; //message de succès
?>