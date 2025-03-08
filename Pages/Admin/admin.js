function recupForm() {
    //requète pour créer le formulaire pour changer les valeurs d'un element
    var dataBase = document.getElementById("dataSelect").name;
    var value = document.getElementById("dataSelect").value;
    if (value == "") return;
    $.ajax({
        type: "post",
        url: "detailList.php",
        data: { "db": dataBase, "id": value },
        success: function(data) {
            try { //on essaye de retirer un ancien formulaire (si l'utilisateur change de produit par exemple)
                document.getElementById("Detail").remove();
            } catch {};
            $("#result_data").append(data); //ajout du resultat dans la basise prévue
        }
    })
}

function recupChoice() {
    //requète pour créer le formulaire avec les elements de la base de donnée selectionée
    var value = document.getElementById("dataSlect").value;
    $.ajax({
        type: "post",
        url: "detailData.php",
        data: { "id": value },
        success: function(data) {
            try { //essais de retirer le formulaire précédent
                document.getElementById("dataSelect").remove();
                document.getElementById("result_data").remove();
            } catch {};
            $("#listChoice").append(data); //ajout des données dans l'empalcement prévus
        }
    })
}

function saveChange() {
    //requète AJAX pour enregister les changements d'un element
    $.ajax({
        type: "post",
        url: "save.php",
        data: $("#Detail").serialize(),
        success: function(data) {
            alert(data); //affichage du résultat dans une Pop-up
            location.reload();
        }
    })
}

function deleteElement() {
    //requète AJAX pour supprimer un element
    id = document.getElementById("detailId").value;
    db = document.getElementById("detailDb").value;
    $.ajax({
        type: "post",
        url: "delete.php",
        data: { "db": db, "id": id },
        success: function(data) {
            alert(data); //affichage du résultat
            location.reload();
        }
    })
}