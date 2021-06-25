function souscrireEvent(btn) {
    var idEvent = btn.name;
    //requète AJAX pour ajouter un evenement 
    $.ajax({
        type: "post",
        url: "AddEvent.php",
        data: "id=" + idEvent,
        dataType: "html",
        success: function(data) {
            alert(data);
            location.reload();
        }
    })
}

function annulerEvent(btn) {
    var idEvent = btn.name;
    //requète AJAX pour retirer un event
    $.ajax({
        type: "post",
        url: "SuppEvent.php",
        data: "id=" + idEvent,
        dataType: "html",
        success: function(data) {
            alert(data);
            location.reload();
        }
    })
}