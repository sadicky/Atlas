$(document).ready(function () {
  // getUser();
      $("#formulaire").submit(function (event) {
        event.preventDefault();
          var email = $("#email").val();
          var name = $("#name").val();
          var type = $("#type").val();
          $.ajax({
              url: "Public/script/adduser.php",
              method: "POST",
              data: {
                      email: email,
                      name : name,
                      type:type
              },
              success: function (donnees) {
                  $('#message').html(donnees).slideDown();
                  $("#formulaire")[0].reset();
                  $("#ajoutuser").modal("hide");
                  // getUser();
              }
          });
      });
          
    

  

//  
function getUser(){
  $.post('Public/script/getuser.php',function(data){
      $("#getusers").html(data);
  }); //
}

});