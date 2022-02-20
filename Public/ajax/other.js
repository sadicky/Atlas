$(document).ready(function () {
    // getclientegories();
    $("#formulaire").submit(function (event) {
        event.preventDefault();
        var statut = 1;
        var client = $("#client").val();
        var montant = $("#montant").val();
        var date = $("#date").val();
        var adresse = $("#adresse").val();
        var motif = $("#motif").val();
        var dateins = $("#dateins").val();
        var tel = $("#tel").val();
        var idu = $("#idu").val();;
        $.ajax({
            url: "Public/script/addcaissee.php",
            method: "POST",
            data: {
                idu: idu,
                montant: montant,
                client: client,
                motif: motif,
                dateins: dateins,
                statut: statut,
                adresse: adresse,
                tel: tel,
                date: date,
            },
            success: function (donnees) {
                $('#message').html(donnees).slideDown();
                $("#formulaire")[0].reset();
                $("#ajoutcaissee").modal("hide");
            }
        });
    });
    $(document).on("click", ".desactiver", function (event) {
        event.preventDefault();
        //   getArticles();
          var id = $(this).attr("id");
          if (confirm("Voulez-vous desactiver cet article ? ")) {
            $.ajax({
              url: "public/script/deactivart.php",
              method: "POST",
              data: {
                id: id
              },
              success: function (data) {
                // getArticles();
              }
            });
          } else {
            return false;
          }
        });
       
        $(document).on("click", ".activer", function (event) {
          event.preventDefault();
        //   getArticles();
            var id = $(this).attr("id");
            if (confirm("Voulez-vous activer cet article? ")) {
              $.ajax({
                url: "public/script/activart.php",
                method: "POST",
                data: {
                  id: id
                },
                success: function (data) {
                //  getArticles();
                }
              });
            } else {
              return false;
            }
          });
    

});