$(document).ready(function () {
    // getCategories();
    $("#formulaire").submit(function (event) {
        event.preventDefault();
        var aqte =  $("#aqte").val();
        var sqte =  $("#sqte").val();
        var qqte =  $("#qqte").val();
        var id = $("#id").val();
        $.ajax({
            url: "Public/script/recquisq.php",
            method: "POST",
            data: {
                id:id,
                aqte: aqte,
                qqte: qqte,
                sqte: sqte
            },
            success: function (donnees) {
                $('#message').html(donnees).slideDown();
                $("#formulaire")[0].reset();
            }
        });
    });

});