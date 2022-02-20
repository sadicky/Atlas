$(document).ready(function () {
    // getCategories();
    $("#formulaire").submit(function (event) {
        event.preventDefault();
        var article = $("#article").val();
        var qte =  $("#qte").val();
        var sqte =  $("#sqte").val();
        var fab = $("#fab").val();
        var id = $("#id").val();
        var iduser = $("#iduser").val();
        var expired = $("#expired").val();
        $.ajax({
            url: "Public/script/approv.php",
            method: "POST",
            data: {
                iduser:iduser,
                id:id,
                qte: qte,
                article: article,
                fab: fab,
                expired: expired,
                sqte: sqte
            },
            success: function (donnees) {
                $('#message').html(donnees).slideDown();
                $("#formulaire")[0].reset();
            }
        });
    });

});