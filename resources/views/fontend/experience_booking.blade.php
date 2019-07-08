@extends('fontend.layouts.master')
@section('pageTitle') dashboard @endsection
@push('css')
@endpush
@section('page-header')
<img src="{{asset('fontend/images/bg8.jpg')}}" class="bg1"/>
	<div class="container row">
		<div class="col-md-12">
			<button class="btn btn-gallery view-hotel-img"><img src="{{asset('fontend/images/image-gallery.png')}}" height="16px" width="16px" /><span style="padding-left: 5px;">View Photos</span></button>
		</div>
	</div>
@endsection
@section('content')
<div class="row">
	<div id="content12">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
					</div>
					<div class="row">
						<div class="col-md-12">
							<h3>{{$packege->name}}</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<span class="hotel-review">
								<img src="{{asset('fontend/images/star.png')}}" class="staricon"/>
								<img src="{{asset('fontend/images/star.png')}}" class="staricon"/>
								<img src="{{asset('fontend/images/star.png')}}" class="staricon"/>
								<img src="{{asset('fontend/images/star.png')}}" class="staricon"/>
								<img src="{{asset('fontend/images/star.png')}}" class="staricon"/>
								<span class="review">&nbsp;&nbsp;1 review</span>
							</span>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<span>Duration : </span><span> {{$packege->duration}} hour(s)</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<span>Location : </span><span> {{$packege->destination->name}}</span>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-8">
							<h4 class="hotel-sub-titles">Reviews</h4>
						</div>
						<div class="col-md-4">
							<a class="view-more-review">More reviews</a>
						</div>
					</div>
					<div class="row">
						<div class="review-hotel-container">
							<div class="col-md-2">
								<span>
									<img src="{{asset('fontend/images/profile-pic.png')}}" class="profile-pic-comment" />
								</span>
							</div>
							<div class="col-md-10">
								<div class="comment-name">Tsunghsien</div>
								<div class="comment-review-star">
									<img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><span class="review">&nbsp;&nbsp;2019/04/15</span>
								</div>
								<div class="comment-review-desc">
									Miss Lu, a young and bloody student, has many stories about the Big Island. Listening and listening to the spirit are coming! Although the volcano is not erupting now. But the beautiful story is also a good experience.
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 booking-price-container">
					<div>
						<div class="col-md-12" style="padding-bottom: 5px;">
							<img src="{{asset('fontend/images/question-mark.png')}}" />
							Price Guarantee
						</div>
						<div class="col-md-6" style="padding-bottom: 20px;">
							<label>
								Start form
							</label>
						</div>
						<div class="col-md-6" style="padding-bottom: 20px;">
							<span class="price-label" style="float: right;">{{$packege->one_way_price}}</span>
						</div>
						<div class="col-md-12" style="padding-bottom: 20px;">
							<a href="#package-options-content" class="btn btn-info btn-book-redirect">Book</a>
						</div>
						<div class="col-md-12" style="padding-bottom: 20px;">
							<p>To be confirmed within 3 working day(s)</p>
						</div>
					</div>
				</div>
				
				<div class="col-md-12">
					<div id="package-options-content"></div>
					<br>
					<div class="row">
						<div class="col-md-12 package-options bg-experience">
							<div class="container-fluid">
								<div class="col-md-12">
									<h4 class="hotel-sub-titles">
									Package options
									</h4>
								</div>
								<form>
												<div class="col-md-7">
													<div class="one-way">
														<div class ="row">
															<b><span class="col-md-8">{{$packege->name}} (One Way)</span><span class="price-package">RM{{$packege->one_way_price}}</span>
															<span id="ck-button"><label><input type="checkbox" id="one-way-pack" class="hidden" name="one-way" value="1" onclick="showDiv('one-way-pack')" /><span>Select</span></label></span></b>
														</div>
														<div id="package-details-container-one" class="row">
															<div class="col-md-6">
																<div><label>Select Depart Date</label></div>
																<div style="padding-bottom: 10px;"><input type="date" id="depart-date" class="form-control" name="depart-date" onchange="getPackageDetail('depart-date')" required /></div>
															</div>
															<div class="col-md-6">
															</div>
															<div class="col-md-12">
																<label>Select Pack Quantity</label>
															</div>
															<div class="col-md-6">
																<div style="padding-bottom: 10px;">
																	<select id="pack-quantity" class="form-control" name="pack-quantity" onchange="getPackageDetail('pack-quantity')" required>
																		<option value="">Select Pack Quantity</option>
																		<option value='1'>1</option>
																		<option value='2'>2</option>
																		<option value='3'>3</option>
																		<option value='4'>4</option>
																		<option value='5'>5</option>
																		<option value='6'>6</option>
																		<option value='7'>7</option>
																		<option value='8'>8</option>
																		<option value='9'>9</option>
																		<option value='10'>10</option>
																		<option value='11'>11</option>
																		<option value='12'>12</option>
																		<option value='13'>13</option>
																		<option value='14'>14</option>
																		<option value='15'>15</option>
																		<option value='16'>16</option>
																		<option value='17'>17</option>
																		<option value='18'>18</option>
																		<option value='19'>19</option>
																		<option value='20'>20</option>
																	</select>
																</div>
															</div>
															<div class="col-md-6">
															</div>
															<div class="col-md-12">
																<p>Your Itinerary :</p>
															</div>
															@foreach ($packege->oneway as $one)
															
															<div class="col-md-3">
																<input type="time" id="time1-0" class="form-control form-control100 itinerary-form1" name="time1[0]" value="{{$one->time1}}" readonly />
															</div>
															<div class="col-md-9">
																<input type="text" id="activity1-0" class="form-control form-control100 itinerary-form1" name="activity1[0]" value="{{$one->itinary_name1}}" readonly />
															</div>
														@endforeach
														
															<div id="itinerary-container1">
															</div>
															<div class="col-md-3">
																<button type="button" id="edit-itinerary-btn1" class="btn btn-info form-control" name="edit-btn1">Edit</button>
															</div>
															<div class="col-md-3">
																<button type="button" id="add-itinerary-btn1" class="btn btn-info form-control" name="add-btn1">Add</button>
															</div>
															<input type="hidden" id="price-package-select" name="price-package" value="{{$packege->one_way_price}}" />
														</div>
													</div>
													<div class="two-way">
														<div class ="row package-details-two-way">
															<b><span class="col-md-8">{{$packege->name}} (Two Way)</span><span class="price-package">RM{{$packege->two_way_price}}</span>
															<span id="ck-button1"><label><input type="checkbox" id="two-way-pack" class="hidden" name="two-way" value="1" onclick="showDiv('two-way-pack')" /><span>Select</span></label></span></b>
														</div>
														<div id="package-details-container-two" class="row">
															<div class="col-md-6">
																<div><label>Select Depart Date</label></div>
																<div style="padding-bottom: 10px;"><input type="date" id="depart-date2" class="form-control"  name="depart-date2"  onchange="getPackageDetail2('depart-date2')"required />
															</div>
														</div>
														<div class="col-md-6">
														</div>
														<div class="col-md-12">
															<label>Select Pack Quantity</label>
														</div>
														<div class="col-md-6">
															<div style="padding-bottom: 10px;">
																<select id="pack-quantity2" class="form-control" name="pack-quantity2"  onchange="getPackageDetail2('pack-quantity2')" required >
																	<option value="">Select Pack Quantity</option>
																	<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option>															</select>
																</div>
															</div>
															<div class="col-md-6">
															</div>
															<div class="col-md-12">
																<p>Your Itinerary :</p>
															</div>
															@foreach ($packege->twoway as $two)
																{{-- expr --}}
															
															<div class="col-md-3">
																<input type="time" id="time2-0" class="form-control form-control100 itinerary-form2" name="time2[0]" value="{{$two->time2}}" readonly />
															</div>
															<div class="col-md-9">
																<input type="text" id="activity2-0" class="form-control form-control100 itinerary-form2" name="activity2[0]" value="{{$two->itinary_name2}}" readonly />
															</div>
															@endforeach
													
															<div id="itinerary-container2">
																
															</div>
															<div class="col-md-3">
																<button type="button" id="edit-itinerary-btn2" class="btn btn-info form-control" name="edit-btn2">Edit</button>
															</div>
															<div class="col-md-3">
																<button type="button" id="add-itinerary-btn2" class="btn btn-info form-control" name="add-btn2">Add</button>
															</div>
															<input type="hidden" id="price-package-select2" name="price-package" value="500" />
														</div>
													</div>
												</div>
												<div class="col-md-5 booking-price-container">
													<div>
														<div class="col-md-12" style="padding-bottom: 5px;">
															<img src="{{asset('fontend/images/question-mark.png')}}" /><label>&nbsp;Order Details</label>
														</div>
														<div class="col-md-12" style="padding-bottom: 20px;">
															<label><span>{{$packege->name}} </span><span id="option-package-selected"></span></label>
														</div>
														<div class="col-md-12" style="padding-bottom: 20px;">
															<span id="depart-date-txt" class="depart-date-details flt-left" style="float: left;"></span>
														</div>
														<div class="col-md-12">
															<div class="order-details">
																<div id="package-op" class="col-md-5"></div>
																<div id="pack-quantity-txt" class="col-md-3 align-right-col"></div>
																<div id="price-txt" class="col-md-4 align-right-col"></div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="order-total-prices">
																<div class="col-md-6">Total</div>
																<div id="total-price-txt" class="col-md-6 align-right-col"></div>
															</div>
														</div>
														<div class="col-md-12" style="padding-bottom: 20px;">
															<input type="submit" class="btn btn-info btn-book" name="book-btn" value="Book now" />
														</div>
														<div class="col-md-12" style="padding-bottom: 10px;">
															<p>To be confirmed within 3 working day(s)</p>
														</div>
														<div class="col-md-12">
															<a href="" class="wishlist-btn"> Add to Wishlists</a>
														</div>
													</div>
												</div>
											</form>
							</div>
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="col-md-7" style="padding-top: 50px;">
					<div class="row">
						<div class="col-md-12">
							<h4 class="hotel-sub-titles">Description</h4>
						</div>
						<div class="col-md-12">
						{!! $packege->description  !!}
						</div>
					
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<h4 class="hotel-sub-titles">Inclusive of</h4>
						</div>
						<div class="col-md-12">
						{!!$packege->inclusive_of !!}
						</div>
					
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<h4 class="hotel-sub-titles">Not inclusive of</h4>
						</div>
						<div class="col-md-12">
						{!! $packege->not_inclusive_of !!}
						</div>
						
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<h4 class="hotel-sub-titles">Booking information</h4>
						</div>
						<div class="col-md-12">
						{!! $packege->booking_info!!}
						</div>
						<div class="col-md-12">
							<a class="show-all">Show all ></a>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<h4 class="hotel-sub-titles">Map</h4>
						</div>
						<div class="col-md-12">
							{{$packege->destination->name}}
						</div>
						<div class="col-md-12">
							{!! $packege->location !!}
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<h4 class="hotel-sub-titles">Cancellation Policy</h4>
						</div>
						<div class="col-md-12">
						{!! $packege->policy !!}
						</div>
						
					</div>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</div>
	</div>
	<hr>
	@if (count($latest)>0)

<div class="row">
<div id="content11">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<span><h4><b>More place you may like</b></h4></span
			</div>
			@foreach($latest as $hotel)
			<div class="col-lg-3 col-md-6 borderimg1">
					<center>
					<div class="darkbg3">
						<img src="{{asset('/storage/hotel/photo/'.$hotel->photo)}}" class="img3"/>
						<div class="row">
							<div class="col-md-12 titleimg4"><a href="{{ route('hotel.show', $hotel->id) }}">{{ $hotel->name }}</a></div>
							<div class="col-md-7 reviewcontainer">
								<img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><span class="review"> (188)</span>
							</div>
							<div class="col-md-5 price1">MYR {{ $hotel->price }}</div>
						</div>
					</div>
					</center>
			</div>
			@endforeach
		</div>
	</div>
</div>
</div>
@endif
@endsection
@push('js')
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('fontend/js/experience-booking.js')}}"></script>
		<script>
		function onSuccess(googleUser) {
			console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
		}
		function onFailure(error) {
			console.log(error);
		}
		function renderButton() {
			gapi.signin2.render('my-signin2', {
			'scope': 'profile email',
			'width': 240,
			'height': 50,
			'longtitle': true,
			'theme': 'dark',
			'onsuccess': onSuccess,
			'onfailure': onFailure
			});
		}
		</script>
		
		<script>
		function showPass() {
			var x = document.getElementById("password");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
				}
		}
		</script>

		<script>
		$(document).ready(function(){
		$("#ck-button").click(function(){
			$("p").toggle();
		});
		$("#show").click(function(){
			$("p").show();
		});
		});
		</script>
@endpush	