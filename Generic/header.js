function disconnect() {
    //fonction pour faire une requète AJAX pour se deconnecter
    $.ajax({
        type: "post",
        url: "/Generic/disconnect.php",
        data: { "action": "disconnect" },
        success: function(data) {
            alert(data);
            location.reload(); //raffaichissement de la page
        }
    })
}