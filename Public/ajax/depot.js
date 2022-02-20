$(document).ready(function () {
    $(document).on('click', '.approv', function(){
        var id = $(this).attr("id");
        var btn_action = 'fetch_single';
        $.ajax({
         url:"Public/script/approv.php",
         method:"POST",
         data:{id:id,},
         dataType:"json",
         success:function(data)
         {
          $('#article').val(data.ARTICLE);
          $('#category_id').val(category_id);
          $('#category_id').val(category_id);
          $('#action').val('Edit');
          $('#btn_action').val("Edit");
         }
        })
       });

});