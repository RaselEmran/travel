$(document).ready(function(){
	$("button").click(function(){
		var getId = $(this).attr("id");
		var displayBtn1 = $("#add-itinerary-btn1");
		var displayBtn2 = $("#add-itinerary-btn2");

		if (getId == "edit-itinerary-btn1") {
			$(".itinerary-form1").addClass("itinerary-none1");
			$(".itinerary-none1").removeClass("itinerary-form1");
			$(".itinerary-none1").attr("readonly", false);
			$(this).attr("id", "done-edit1");
			$(this).text("Done");
			displayBtn1.css('display', 'block');			
			//change to display, block and display, none;

		} else if (getId == "done-edit1") {
			$(".itinerary-none1").addClass("itinerary-form1");
			$(".itinerary-form1").removeClass("itinerary-none1");
			$(".itinerary-form1").attr("readonly", true);
			$(this).attr("id", "edit-itinerary-btn1");
			$(this).text("Edit");
			displayBtn1.css('display', 'none');

		} else if (getId == "edit-itinerary-btn2") {
			$(".itinerary-form2").addClass("itinerary-none2");
			$(".itinerary-none2").removeClass("itinerary-form2");
			$(".itinerary-none2").attr("readonly", false);
			$(this).attr("id", "done-edit2");
			$(this).text("Done");
			displayBtn2.css('display', 'block');
			
		} else if (getId == "done-edit2") {
			$(".itinerary-none2").addClass("itinerary-form2");
			$(".itinerary-form2").removeClass("itinerary-none2");
			$(".itinerary-form2").attr("readonly", true);
			$(this).attr("id", "edit-itinerary-btn2");
			$(this).text("Edit");
			displayBtn2.css('display', 'none');

		} else if (getId == "add-itinerary-btn1") {
			
			var i;
			var a = 1;
			var time;
			var activity;
			for(i = 0; i < a; i++) {
				var activityId = "#activity1-" + i ;
				if($(activityId).length == 0) {
					//it doesn't exist
					time = "time1-" + i;
					activity = "activity1-" + i;

					var appendRow = "<div class='col-md-3'>" +
									"<input type='time' id='" + time + "' class='form-control form-control100 itinerary-none1' name='" + time + "' />" +
									"</div>" +
									"<div class='col-md-9'>" +
									"<input type='text' id='" + activity + "' class='form-control form-control100 itinerary-none1' name='" + activity + "' />" +
									"</div>";
					$("#itinerary-container1").append(appendRow);
				}
				else {
					a += 1;

				}
			}
		} else if (getId == "add-itinerary-btn2") {
			
			var i;
			var a = 1;
			var time;
			var activity;
			for(i = 0; i < a; i++) {
				var activityId = "#activity2-" + i ;
				if($(activityId).length == 0) {
					//it doesn't exist
					timeid = "time2-" + i;
					timename = "time2[" + i + "]";
					activity = "activity2-" + i;
					activityname = "activity2[" + i + "]";

					var appendRow = "<div class='col-md-3'>" +
									"<input type='time' id='" + timeid + "' class='form-control form-control100 itinerary-none2' name='" + timename + "' />" +
									"</div>" +
									"<div class='col-md-9'>" +
									"<input type='text' id='" + activity + "' class='form-control form-control100 itinerary-none2' name='" + activityname + "' />" +
									"</div>";
					$("#itinerary-container2").append(appendRow);
				}
				else {
					a += 1;

				}
			}
		}
	});
});

//show hidden div
function showDiv(divId) {
	// Get the checkbox
	var checkBox = document.getElementById(divId);
	if(divId == "two-way-pack") {
		// Get the output text
		var show = $("#package-details-container-two");
		var hide = $("#package-details-container-one");
		$("#depart-date-txt").text("");
		$("#pack-quantity-txt").text("");
		$("#price-txt").text("");
		$("#total-price-txt").text("");
		$("#option-package-selected").text("");
		$("#package-op").text("");
		
	} else if(divId == "one-way-pack"){
		// Get the output text
		var show = $("#package-details-container-one");		
		var hide = $("#package-details-container-two");
		$("#depart-date-txt").text("");
		$("#pack-quantity-txt").text("");
		$("#price-txt").text("");
		$("#total-price-txt").text("");
		$("#option-package-selected").text("");
		$("#package-op").text("");
	}
	
	// If the checkbox is checked, display the output text
	if (checkBox.checked == true){
		show.css('display', 'block');
		hide.css('display', 'none');
		if(divId == "one-way-pack") {
			$("#two-way-pack"). prop("checked", false);
			$("#option-package-selected").text("(One Way)");
		} else if(divId == "two-way-pack") {
			$("#one-way-pack"). prop("checked", false);
			$("#option-package-selected").text("(Two Way)");
		}
	} else {
		show.css('display', 'none');
	}
}

//get element value and paste at div (order)
function getPackageDetail(getId) {
	var newgetId = "#";
	newgetId += getId;
	
	var val = $(newgetId).val();
	
	if(getId == "depart-date") {
		$("#depart-date-txt").text(val);
	} else if (getId == "pack-quantity") {
		var newq = "x";
		newq += val;
		
		var price = $("#price-package-select").val();
		var newprice = "RM ";
		newprice += price;
		
		var totalprice = parseInt(val) * parseInt(price);
		var newtotalprice = "RM ";
		newtotalprice += totalprice;
		
		var op = "One way package"
		
		$("#package-op").text(op);
		$("#pack-quantity-txt").text(newq);
		$("#price-txt").text(newprice);
		$("#total-price-txt").text(newtotalprice);
	}
}
function getPackageDetail2(getId) {
	var newgetId = "#";
	newgetId += getId;
	
	var val = $(newgetId).val();
	
	if(getId == "depart-date2") {
		$("#depart-date-txt").text(val);
	} else if (getId == "pack-quantity2") {
		var newq = "x";
		newq += val;
		
		var price = $("#price-package-select2").val();
		var newprice = "RM ";
		newprice += price;
		
		var totalprice = parseInt(val) * parseInt(price);
		var newtotalprice = "RM ";
		newtotalprice += totalprice;

		var op = "Two ways package"
		
		$("#package-op").text(op);
		$("#pack-quantity-txt").text(newq);
		$("#price-txt").text(newprice);
		$("#total-price-txt").text(newtotalprice);
	}
}