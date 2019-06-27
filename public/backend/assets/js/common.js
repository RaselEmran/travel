  update_font_size();
$(document).on('click', '.toggle-font-size', function(event) {
    localStorage.setItem('upos_font_size', $(this).data('size'));
    update_font_size();
});

function update_font_size() {
    var font_size = localStorage.getItem('upos_font_size');
    var font_size_array = [];
    font_size_array['s'] = ' - 3px';
    font_size_array['m'] = '';
    font_size_array['l'] = ' + 3px';
    font_size_array['xl'] = ' + 6px';
    if (typeof font_size !== 'undefined') {
        $('.navbar').css('font-size', 'calc(100% ' + font_size_array[font_size] + ')');
        $('.sidebar').css('font-size', 'calc(100% ' + font_size_array[font_size] + ')');
        $('.footer').css('font-size', 'calc(100% ' + font_size_array[font_size] + ')');
        $('.page-header').css('font-size', 'calc(100% ' + font_size_array[font_size] + ')');
        $('.panel').css('font-size', 'calc(100% ' + font_size_array[font_size] + ')');
        $('.page-header-content').css('font-size', 'calc(100% ' + font_size_array[font_size] + ')');
        $('div#modal_default').css('font-size', 'calc(100% ' + font_size_array[font_size] + ')');
    }
}

// Determines button clicked via id
function calEnterVal(id) {
  document.calc.result.value+=id;
}

// Clears calculator input screen
function clearScreen() {
  document.calc.result.value="";
}

// Calculates input values
function calculate() {
  try {
    var input = eval(document.calc.result.value);
    document.calc.result.value=input;
  } catch(err){
      document.calc.result.value="Error";
    }
}

$(document).ready( function(){
    $('#btnCalculator').popover();
});

$('button#btnCalculator').hover(function() {
    $(this).tooltip('show');
});
$(document).on('mouseleave', 'button#btnCalculator', function(e) {
    $(this).tooltip('hide');
});