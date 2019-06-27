$(document).ready(function(){
	$(".button-plus").attr("disabled","disabled");
	$(".button-minus").attr("disabled","disabled");
	
	$('input[type="checkbox"]').click(function(){
		var getId = $(this).attr("id");
		var quantityId = "#quantity-" + getId;
		var buttonId = ".button-" + getId;
		var listRowId = "row-" + getId;
		var inputId = "input[id='" + getId + "']";
		var quantitytxtId = "quantity-" + getId + "-txt";
		var itemNameId = "#name-" + getId;
		var priceId = "#price-" + getId;	
		
		var priceItem = $(priceId).text();
		var itemName = $(itemNameId).text();
		var newPriceItem = "RM " + priceItem;		
		var quantity = $(quantityId).val();
		var newQuantity = "x" +quantity;
		
		if($(inputId).prop("checked")) {
			$(quantityId).removeAttr("disabled");
			$(buttonId).removeAttr("disabled");
			var appendedText = "<tr id='" + listRowId + "'>" + 
									"<td>" + itemName + "</td>" + 
									"<td id='" + quantitytxtId + "'>" + newQuantity + "</td>" +
									"<td class='flt-right'>" + newPriceItem + "</td>" +
								"</tr>";
			$("#order-listing").append(appendedText);
			var currentTotalPrice = $("#total-price").text();
			priceItem = parseFloat(priceItem) * parseFloat(quantity);
			var newTotalPrice = parseFloat(currentTotalPrice) + parseFloat(priceItem);			
			$("#total-price").text(newTotalPrice.toFixed(2));
			
		} else {
            $(quantityId).attr("disabled","disabled");
			$(buttonId).attr("disabled","disabled");
			
			var rowDelete = "#" + listRowId;					
			$(rowDelete).remove();
			
			var minusTotalPrice = $("#total-price").text();
			var minusPriceItem = parseFloat(priceItem) * quantity;
			var latestTotalPrice = parseFloat(minusTotalPrice) - parseFloat(minusPriceItem);
			$("#total-price").text(latestTotalPrice.toFixed(2));
		}
	});
	
	$('input[type="button"]').click(function(){
		var getIdTxt = $(this).attr("class");
		var newGetIdTxt = getIdTxt.split(" ");
		var splitIdTxt = newGetIdTxt[1].split("-");
		var IdTxt = splitIdTxt[1];
		
		var inputQuantityId = "#quantity-" + IdTxt;
		var checkQuantity = $(inputQuantityId).val();
		
		var quantity = $(inputQuantityId).val();
		var newQuantityId = "#quantity-" +IdTxt + "-txt" ;		
		var priceId = "#price-" + IdTxt;
		
		var priceItem = $(priceId).text();
		var currentTotalPrice = $("#total-price").text();
		var newTotalPriceItem = currentTotalPrice;
		
		if (newGetIdTxt[0] == "button-plus") {
			quantity = parseInt(quantity) + 1;
			if(quantity < 21 ) {
				newTotalPriceItem = parseFloat(newTotalPriceItem) + parseFloat(priceItem);
			} else {
				quantity = 1;
			}
		} else if (newGetIdTxt[0] == "button-minus") {
			quantity = parseInt(quantity) - 1;
			
			if(quantity > 0 ) {
				newTotalPriceItem = parseFloat(newTotalPriceItem) - parseFloat(priceItem);
			} else {
				quantity = 1;
			}
		}
		
		var newQuantity = "x" + quantity;
		$(newQuantityId).text(newQuantity);
		
		$("#total-price").text(newTotalPriceItem.toFixed(2));
		
	});
});

function chooseCategory(chosenId) {
	if(chosenId == "phone-access") {
		$("#container-phone-access").css("display", "block");
		$("#container-medical").css("display", "none");
		$("#container-toiletries").css("display", "none");
		$("#container-others").css("display", "none");
	} else if (chosenId == "medical") {
		$("#container-phone-access").css("display", "none");
		$("#container-medical").css("display", "block");
		$("#container-toiletries").css("display", "none");
		$("#container-others").css("display", "none");		
	} else if(chosenId == "toiletries") {
		$("#container-phone-access").css("display", "none");
		$("#container-medical").css("display", "none");
		$("#container-toiletries").css("display", "block");
		$("#container-others").css("display", "none");		
	} else if(chosenId == "others") {
		$("#container-phone-access").css("display", "none");
		$("#container-medical").css("display", "none");
		$("#container-toiletries").css("display", "none");
		$("#container-others").css("display", "block");
	}
}

	/*$(".button-pha1").attr("disabled","disabled");
	
    $("#pha1").click(function(){
        if($('input[id="pha1"]').prop('checked')){
			$("#quantity-pha1").removeAttr("disabled");
			$(".button-pha1").removeAttr("disabled");
			var quantity = $("#quantity-pha1").val();
			var simCard = "<tr id='sim-card'>" + "<td>Sim Card</td>" + "<td id='quantity-pha1-txt'>x" + quantity + "</td>" + "<td class='flt-right'>RM28</td>" + "</tr>";
			$("#order-listing").append(simCard);
        } else {
            $("#quantity-pha1").attr("disabled","disabled");
			$("#sim-card").remove();
			$(".button-pha1").attr("disabled","disabled");
        }
    });
    $("#pha2").click(function(){
        if($('input[id="pha2"]').prop('checked')){
			$("#quantity-pha2").removeAttr("disabled");
			$(".button-pha2").removeAttr("disabled");
			var quantity = $("#quantity-pha2").val();
			var simCard = "<tr id='usb-cable'>" + "<td>USB cable Type C</td>" + "<td id='quantity-pha1-txt'>x" + quantity + "</td>" + "<td class='flt-right'>RM28</td>" + "</tr>";
			$("#order-listing").append(simCard);
        } else {
            $("#quantity-pha2").attr("disabled","disabled");
			$("#sim-card").remove();
			$(".button-pha2").attr("disabled","disabled");
        }
    });*/