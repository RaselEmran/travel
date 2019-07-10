$(document).on('click','#logout',function(e){
   e.preventDefault();
  var url =$(this).attr('href');
  //console.log(url);

              $.ajax({
              method:'Post',
              url: url,
              dateType: 'json',
              contentType:false,
              cache:false,
              processData:false,
              success: function(data){
            toastr.success(data.message);
            
              setTimeout(function(){

              window.location.href=data.goto;
              },2500);
               },
               error:function (data) {
                var jsonValue = $.parseJSON(data.responseText);
                const errors = jsonValue.errors;
                var i = 0;
                $.each(errors, function(key, value) {
                    const first_item = Object.keys(errors)[i]
                    const message = errors[first_item][0]
                    toastr.error(value);
                    i++;
                });
               }

            });
  });