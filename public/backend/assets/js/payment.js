$(document).on('click','#view_details',function(){
  var url =$(this).data('url');
            $.ajax({
              method:'GET',
              url: url,
              dataType:'html',
             success: function(data){
              $("#show").html(data);
              $('.select').select2();
             }
         });
});