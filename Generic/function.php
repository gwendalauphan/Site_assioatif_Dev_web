<?php
    session_start();
    //fonction utilisée pour enregistrer une base de donnée
    function closeDB($list, $dblist, $id, $dbname){
        $dblist[$id] = implode("µ", $list); //on transforme la liste des atributs d'un element en un string séparé par un µ
        $tmp = implode("\n", $dblist); //on transforme la liste des elements en string, séparé par \n

        $file = fopen("../../BDD/".$dbname.".txt", "w"); //ouverture du fichier
        fwrite($file, $tmp); //écriture (override) des données
        fclose($file);
    }

    function SplitDB($id, $dbname){
        $data = explode("\n", file_get_contents("../../BDD/".$dbname.".txt", true)); //récupération de la base de donnée
        $list = explode("µ", $data[$id]);
        return $list;
    }
?>