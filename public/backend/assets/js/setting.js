$(document).on('click', 'input, textarea', function(event) {
    $(this).select();
});

 $(document).on('submit','#addForm', function(e){
   e.preventDefault();
    $('#submit').hide();
    $('#submiting').show();
    $(".ajax_error").remove();
   var formData = new FormData($(this)[0]);
   var url = $(this).attr('action');

              $.ajax({
              method:'POST',
              url: url,
              data:formData,
              dataType:'JSON',
              contentType: false,
              cache: false,
              processData: false,
              success: function(data){
             // console.log(data);
                     if (data.success) {
                        new Noty({
                        theme: 'limitless',
                        layout: 'topRight',
                        type: 'alert',
                        timeout: 2500,
                        text: data.message,
                        type: data.status
                       }).show();
                      $('#submit').show();
                      $('#submiting').hide();
                      setTimeout(function(){

                      window.location.href=data.goto;
                      },2500);

                    }

                     else {
                            const errors = data.message
                                console.log(errors)
                            var i = 0;
                            $.each(errors, function(key, value) {
                                const first_item = Object.keys(errors)[i]
                                const message = errors[first_item][0]
                                $('#' + first_item).after('<div class="ajax_error" style="color:red">' + value + '</div');
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
                       $('.select').select2();
                       $('#submit').show();
                       $('#submiting').hide();
                        }
               },
                error: function(data) {
                        var jsonValue = $.parseJSON(data.responseText);
                        //console.log(jsonValue.Message);
                      new Noty({
                        theme: 'limitless',
                        layout: 'topRight',
                        type: 'alert',
                        timeout: 2500,
                        text: jsonValue.message,
                        type: 'danger'
                       }).show();
                        $('.select').select2();
                         $('#submit').show();
                         $('#submiting').hide();
                    }

            });
  });