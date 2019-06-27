function changenumberguest() {	
	var guestno = $("#num-of-guest").val();	
	var newguestno = "x" + guestno;

	var name = $("#name-package").val();
	var unitPrice = $("#price-package").val();
	var newUnitPrice = "RM " + unitPrice;

	var totalPrice = parseFloat(unitPrice) * parseFloat(guestno);
	totalPrice = "RM " + totalPrice;

	var rowAppend = "<tr id='row-order'>" +
					"<td id='package-name'>" + name + "</td>" +
					"<td id='number-guest'>" + newguestno + "</td>" +
					"<td id='unit-price' class='flt-right'>" + newUnitPrice + "</td>" +
					"</tr>";
					
	if ($("#row-order").length == 0) {
		$("#table-order").append(rowAppend);
		$("#total-price").text(totalPrice);		
	} else {
		$("#number-guest").text(newguestno);
		$("#unit-price").text(newUnitPrice);
		$("#total-price").text(totalPrice);
	}
	
	if (guestno == "") {
		$("#row-order").remove();
		$("#total-price").text("");
	} else {
		$("#package-name").text(name);
	}
}