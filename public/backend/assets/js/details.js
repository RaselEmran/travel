$(document).on('click','#itinary_edit',function(){
  $(".itinerary-form").attr("readonly", false);
});

$(document).on('click','#itinary_done',function(){
  $(".itinerary-form").attr("readonly", true);
});