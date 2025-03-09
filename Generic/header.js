function disconnect() {
    console.log("disconnect() called"); // Vérifier si la fonction est appelée
    $.ajax({
        type: "post",
        url: "/Generic/disconnect.php",
        data: { "action": "disconnect" },
        success: function(data) {
            alert(data);
            location.reload(); //rafraîchissement de la page
        }
    })
}
