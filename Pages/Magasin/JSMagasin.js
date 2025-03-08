let total = 0;

let ids = "";

function panier(button) {
    //fonction pour ajouter un article au panier
    tmp = button.name.split(","); //on récupère les information sur le produit dans le nom du bouton
    prix = tmp[0];
    text = tmp[1].replaceAll("_", " "); //remplacement des espaces, (ça pase pas très bien en html)
    id = button.id;
    //ajout de l'element au panier
    document.getElementById("panierText").innerHTML += "<div>" + text + "    <button type='button' name ='" + prix + "," + id + "' onclick='viderPanier(this)' style='width:20px;height:20px;'>X</button>" + "</div>";
    //incrémentation des variables
    ids += id;
    total += parseInt(prix);
    //changement de l'affichage et du bouton panier qui était désactivé 
    document.getElementById("panierPrice").innerText = total;
    document.getElementById("panierButton").disabled = false;
}

function viderPanier(button) {
    //fonction pour retirer un element du panier
    tmp = button.name.split(","); //récupération des données dans le nom du bouton
    prix = tmp[0];
    id = tmp[1];
    //on réajuste les variables
    total -= parseInt(prix);
    ids = ids.replace(id, "");
    button.parentNode.remove(); //on retire l'affichage dans le panier
    document.getElementById("panierPrice").innerText = total; //on remet le total
    if (total == 0) document.getElementById("panierButton").disabled = true; //désactivation du bouton valider panier si il n'y a pas d'articles
}

function validerPanier() {
    //remplissage des valeurs avant de les transmettre au paiement.
    document.getElementById("ids").value = ids;
    document.getElementById("price").value = total;

    //envoi du formulaire apres avoir asigné les valeurs
    document.getElementById("FormPanier").submit();
}