function connectUser() {
    //requète AJAX pour verifier la connexion d'un utilisateur
    $.ajax({
        type: "post",
        url: "connexion.php",
        data: $("#formLogins").serialize(),
        success: function(data) {
            if (data != "email ou mot de passe incorrect") {
                if (data == "2") {
                    //si il s'agit d'un admin, on le redirige vers la page d'administration
                    window.location.replace("../Admin/Admin.php");
                } else window.location.replace("../../index.php"); //sinon vers la page d'accueil
            } else alert(data);
        }
    })
}

function saveChanges() {
    //requete ajax pour appliquer les changemments sur le compte
    $.ajax({
        type: "post",
        url: "ajoutModif.php",
        data: $("#formModif").serialize(),
        success: function(data) {
            alert(data);
            location.reload();
        }
    })
}

function Formulaire() {
    //fonction pour remplir automatiquement le formulaire avec les années de naissance
    var birthdate = document.getElementById("list"); //on se place dans ID list 
    var opt = document.createElement('option');
    opt.text = "Selecitonnez une année";
    opt.value = "";
    birthdate.appendChild(opt);
    for (var i = 1990; i < 2005; i++) { //probleme pour la boucle for : année de naissance
        var opt = document.createElement('option'); //on crée un une balise option
        opt.text = i; //avec comme texte i
        opt.value = i; //avec comme value i
        birthdate.appendChild(opt);
    }
}