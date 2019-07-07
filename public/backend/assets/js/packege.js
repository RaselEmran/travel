//Select all input values on click
$('.select').select2();
$(document).on('click', 'input, textarea', function(event) {
    $(this).select();
});
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
//Insert data
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

//Fetch Data
 function get_data_table(){
  $.ajax({
    url:"/category/fetchdata",
    type:"GET",
    dataType:"html",
    success:function(data_tbl){
      $("#data_table_body").html(data_tbl);

    }
  });
}


//edit........
 $(document).on('submit','#editForm', function(e){
   e.preventDefault();
    $('#submit').hide();
    $('#submiting').show();
    $(".ajax_error").remove();
   var form = $(this).serialize();
   var url = $(this).attr('action');

              $.ajax({
              method:'POST',
              url: url,
              data :form,
              dateType: 'json',
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
                      
                         $('#submit').show();
                         $('#submiting').hide();
                    }

            });
  });

//delete
$(document).on('click', '#delete_item', function(e) {
            e.preventDefault();
            var row = $(this).data('id');
            var url = $(this).data('url');
            //console.log(row, url);
           swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#EF5350",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel pls!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(data) {
                    if (data.success) {
                 swal({
                    title: "Deleted!",
                    text: "Your imaginary file has been deleted.",
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });
                    window.location.reload();
                        }
                 if (data.error) {
                       new Noty({
                        theme: 'limitless',
                        layout: 'topRight',
                        type: 'alert',
                        timeout: 2500,
                        text: data.message,
                        type: 'warning'
                       }).show();
                 }       
                      }
                  });  
             
            }
            else {
                swal({
                    title: "Cancelled",
                    text: "Your imaginary file is safe :)",
                    confirmButtonColor: "#2196F3",
                    type: "error"
                });
            }
        });
        });
//
  //variation product
      $(document).on('click', '#add_option', function() {
        var row_index = $('#variation_counter').val();
        var action = $(this).attr('data-action');
        console.log('row_index');

        $.ajax({
            method: 'GET',
            url: '/admin/get_packege_option',
            data: { row_index: row_index, action: action},
            dataType: 'html',
            success: function(result) {
                if (result) {
                    $('#table_append').append(result);
                    $('#variation_counter').val(parseInt(row_index) + 1);
                    $('.select').select2();
                }
            },
        });
    });

      //

    $(document).on('click', '.add_variation_value_row', function() {

        var row = $(this).data('id');
        var variation_id =parseInt($("#variation_id_"+row).val());

        $.ajax({
            method: 'GET',
            url: '/admin/get_variation_value_row',
            data: {
                variation_id:variation_id,
                row:row,
            },
            dataType: 'html',
            success: function(result) {
                if (result) {
                      $("#variation_id_"+row).val(variation_id+1)
                      $("#itinary_option_"+row).append(result);
                }
            },
        });
    });


    $(document).on('click', '.remove_variation_value_row', function() {
        var row =$(this).data('id');
         var count = $(this)
                    .closest('table')
                    .find('.remove_variation_value_row').length;
                if (count === 1) {
                    $("#itinary_option_"+row).closest('table')
                        .remove();
                } else {
                    $(this)
                        .closest('tr')
                        .remove();
                }
    });
