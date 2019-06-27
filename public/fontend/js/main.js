//plus and minus button
function incrementValue(e) {
    e.preventDefault();
    var fieldName = $(e.target).data('field');
    var parent = $(e.target).closest('div');
    var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

    if (!isNaN(currentVal) && currentVal < 20) {
        parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
    } else {
        parent.find('input[name=' + fieldName + ']').val(1);
    }
}

function decrementValue(e) {
    e.preventDefault();
    var fieldName = $(e.target).data('field');
    var parent = $(e.target).closest('div');
    var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

    if (!isNaN(currentVal) && currentVal > 1) {
        parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
    } else {
        parent.find('input[name=' + fieldName + ']').val(1);
    }
}

$('.input-group').on('click', '.button-plus', function (e) {
    incrementValue(e);
});

$('.input-group').on('click', '.button-minus', function (e) {
    decrementValue(e);
});
//plus and minus button

//show hidden field
function showHidden(hiddenId) {
    var newhiddenId = "#";
    newhiddenId += hiddenId;

    $(newhiddenId).toggle();
    var check = $("#change-view-less").text();

    if (check == "View more ") {
        $("#change-view-less").text("View less ");
        $("#change-view-less-img").attr('src', './images/arrow-up.png');
    } else {
        $("#change-view-less").text("View more ");
        $("#change-view-less-img").attr('src', './images/drop-down.png');
    }
}

$('#change-view-less').on({
    'click': function () {
        var src = ($(this).attr('src') === './images/drop-down.png')
                ? './images/arrow-up.png'
                : './images/drop-down.png';
        $(this).attr('src', src);
    }
});