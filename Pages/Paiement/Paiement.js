function pay() {
    //requète AJAX pour le traitement après le "paiement"
    $.ajax({
        type: "post",
        url: "confirm.php",
        data: $("#f1").serialize(),
        success: function(data) {
            window.location.replace("../../index.php");
            alert(data);
        }
    })
}