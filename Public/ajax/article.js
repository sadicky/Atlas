$(document).ready(function () {
    // getCategories();
      $("#formulaire").submit(function (event) {
        event.preventDefault();
        var statut = 1;
        var article = $("#article").val();;
        var prix  = $("#prix").val();
        var qte=0;
        var montant=0;
        var iduser=$("#iduser").val();
        var stock=0;
          var cat = $("#cat").val();
          var fab = $("#fab").val();
        var dateins = $("#dateins").val();
        var expired = $("#expired").val();
          var cond = $("#cond").val();
          var statut = 1;
          $.ajax({
              url: "Public/script/addart.php",
              method: "POST",
              data: {
                      qte: qte,
                      iduser:iduser,
                      cat : cat,
                      fab:fab,
                      dateins:dateins,
                      expired:expired,
                      statut: statut,
                      article: article,
                      prix: prix,
                      cond: cond,                      
              },
              success: function (donnees) {
                  $('#message').html(donnees).slideDown();
                  $("#formulaire")[0].reset();
                  $("#ajoutart").modal("hide");                  
              }
          });
      });


  });