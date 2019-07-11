$(document).on('submit','#hotel_form', function(e){
   e.preventDefault();
   $(".ajax_error").remove();
   var form = $(this).serialize();
   var url = $(this).attr('action');
              $.ajax({
              method:'POST',
              url: url,
              data :form,
              dateType: 'json',
              success: function(data){
                     if (data.success) {
                        toastr.success(data.message);
                        setTimeout(function(){

                      window.location.href=data.goto;
                      },2500);

                    }

                     else { 
                            const errors = data.message
                                // console.log(errors)
                            var i = 0;
                            $.each(errors, function(key, value) {
                                const first_item = Object.keys(errors)[i]
                                const message = errors[first_item][0]
                                $('#' + first_item).after('<div class="ajax_error" style="color:red">' + value + '</div');
                                 toastr.error(value);
                                i++;
                            });
                        }
               },
                error: function(data) {
                        var jsonValue = $.parseJSON(data.responseText);
                      toastr.error(jsonValue.message);
                      
                    }

            });
  });
//wishlist
$(document).on('click','.wishlist-btn',function(){
	var id =$(this).data('id');
	var url = $(this).data('url');
              $.ajax({
              method:'GET',
              url: url,
              data :{id:id},
              dateType: 'json',
              success: function(data){
                     if (data.status=='warning') {
                     	console.log(data.message);
                        toastr.warning(data.message);

                    }
                     if (data.status=='success') {
                     	console.log(data.message);
                        toastr.success(data.message);

                    }
                }
            });
});