$(document).on('click','#logout',function(e){
   e.preventDefault();
  var url =$(this).attr('href');
  //console.log(url);

              $.ajax({
              method:'Post',
              url: url,
              dataType: 'json',
              contentType:false,
              cache:false,
              processData:false,
              success: function(data){
              new Noty({
                        theme: 'limitless',
                        layout: 'topRight',
                        type: 'alert',
                        timeout: 2500,
                        text: data.message,
                        type: 'success'
            }).show();
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
                     new Noty({
                        theme: 'limitless',
                        layout: 'topRight',
                        type: 'alert',
                        timeout: 2500,
                        text: value,
                        type: 'error'
                    }).show();
                    i++;
                });
               }

            });
  });