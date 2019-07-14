@php
	$reviews = $hotel->reviews->where('status', 'approved');
@endphp
@extends('fontend.layouts.master')
@section('pageTitle') dashboard @endsection
@push('css')
<link href="{{asset('backend/global_assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
@endpush
@section('page-header')
<img src="{{asset('/storage/hotel/banner/'.$hotel->banner)}}" class="bg1"/ width="1351px" height="368px">
@endsection
@section('content')
<div class="container row">
	<div class="col-md-12">
		<button class="btn btn-gallery view-hotel-img"><img src="{{ asset('fontend/images/image-gallery.png') }}" height="16px" width="16px" /><span style="padding-left: 5px;">View Photos</span></button>
	</div>
</div>
</div>
</div>
<br>
<div class="row">
<div id="content12">
<div class="container">
	<div class="row">
		<div class="col-md-7">
			<div class="row">
				{{-- <div class="col-md-12">
					<span class="state">State > </span><span class="area">Balik Pulau</span>
				</div> --}}
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3>{{ $hotel->name }}</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<span class="hotel-review"><span id="rateYo_{{ $hotel->id }}"></span><span class="review">&nbsp;&nbsp;{{ $reviews->count() }} review</span></span>
					@php
					if($reviews->count()){
						$rating = $reviews->average('rate');
					} else{
						$rating = 0;
					}
					@endphp
					<script>
					$(function () {
						$("#rateYo_{{ $hotel->id }}").rateYo({
							rating: {{ $rating }},
							readOnly: true
						});
					});
					</script>
				</div>
			</div>
			@if ($reviews->count() > 0)

			<br>
			<div class="row">
				<div class="col-md-8">
					<h4 class="hotel-sub-titles">Reviews</h4>
				</div>
				<div class="col-md-4">
					<a class="view-more-review">More reviews</a>
				</div>
			</div>
			@php

			@endphp
			@foreach($reviews->take(2) as $review)
			<div class="row">
				<div class="review-hotel-container">
					<div class="col-md-2">
						<span>
							<img src="{{asset($review->user->image ? $review->user->image : 'fontend/images/profile-pic.png')}}" class="profile-pic-comment" />
						</span>
					</div>
					<div class="col-md-10">
						<div class="comment-name">{{ $review->user->name }}</div>
						<div class="comment-review-star">
							<span id="personal_rate_{{ $review->id }}"></span>&nbsp;&nbsp;{{ $review->created_at->format('Y/m/d') }}</span>
						</div>
						<div class="comment-review-desc">
							{!! $review->review !!}
						</div>
					</div>
				</div>
			</div>
			<br>
			<script>
					$(function () {
						$("#personal_rate_{{ $review->id }}").rateYo({
							rating: {{ $review->rate }},
							readOnly: true
						});
					});
					</script>
			@endforeach
			@endif
			<br>
			@if($hotel->entire_place)
			<div class="row">
				<div class="col-md-12">
					<span><b>Entire Place :</b></span>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<span class="entires">{{ $hotel->entire_place }}</span>
				</div>
			</div>
			<br>
			@endif
			<br>
			@if($hotel->room_details)
			<div class="row">
				<div class="col-md-12">
					<h4 class="hotel-sub-titles">Room Details</h4>
				</div>
				<div class="col-md-12">
					<div class="room-detail-desc">
						{!! $hotel->room_details !!}
					</div>
				</div>
			</div>
			<br>
			@endif
			@if($hotel->amenities->count() > 0)
			<div class="row">
				<div class="col-md-12">
					<h4 class="hotel-sub-titles">Amenity</h4>
				</div>
				@forelse($hotel->amenities as $amenity)
				<div class="col-md-6">
					<div class="amenity">
						<i class="{{ $amenity->amenity->icon }}"></i>&nbsp;{{$amenity->amenity->name}}
					</div>
				</div>
				@empty
				@endforelse
			</div>
			<br>
			@endif
			@if($hotel->rules)
			<div class="row">
				<div class="col-md-12">
					<h4 class="hotel-sub-titles">Rules</h4>
				</div>
				<div class="col-md-12">
					{{ $hotel->rules }}
				</div>
			</div>
			<br>
			@endif
			@if($hotel->allow)
			<div class="row">
				<div class="col-md-12">
					<h4 class="hotel-sub-titles">Allow / Not allow</h4>
				</div>
				<div class="col-md-12">
					{!! $hotel->allow !!}
				</div>
			</div>
			<br>
			@endif
			@if($hotel->map)
			<div class="row">
				<div class="col-md-12">
					<h4 class="hotel-sub-titles">Map</h4>
				</div>
				<div class="col-md-12">
					{!! $hotel->map !!}
				</div>
			</div>
			<br>
			@endif
			@if($hotel->policy)
			<div class="row">
				<div class="col-md-12">
					<h4 class="hotel-sub-titles">Cancellation Policy</h4>
				</div>
				<div class="col-md-12">
					{!! $hotel->policy !!}
				</div>
			</div>
			@endif
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-4 booking-price-container">
			<div>
				<div class="col-md-12" style="padding-bottom: 5px;">
					<img src="{{ asset('fontend/images/question-mark.png') }}" /> Price Guarantee
				</div>
				<div class="col-md-12">
					<span class="price-label">RM {{ $hotel->price }}</span><span class="per-night"> per night</span>
				</div>
				<div class="col-md-12">
					<hr>
				</div>
				<div class="col-md-12">
					<form action="{{ route('hotel.booking', $hotel->id) }}" method="POST" id="hotel_for">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-md-12">
								<label>Check-in</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12" style="padding-bottom: 10px;">
								<input type="hidden" value="{{ $hotel->id }}" name="hotel_id">
								<input type="hidden" value="{{ $hotel->price }}" name="price">
								<input type="date" id="check_in" class="form-control form-control100" name="check_in" required />
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label>Check-out</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12" style="padding-bottom: 10px;">
								<input type="date" id="check_out" class="form-control form-control100" name="check_out" required />
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label>Select number of guest</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12" style="padding-bottom: 10px;">
								<select id="select-guest" class="form-control form-control-2" name="guest" required >
									<option value="">Select Guest</option>
									<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option>											</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12" style="padding-bottom: 10px;">
									<input type="submit" class="form-control form-control-2 btn btn-info" value="Book" />
								</div>
							</div>
							<div>
								You won't be charged yet
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<hr>
<div class="row">
<div id="content11">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<span><h4><b>More place you may like</b></h4></span><span class="flt-right" ><a href="{{ route('hotel.index') }}" class="view-all-hotel">View all ></a></span>
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
@endsection
@push('js')
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('fontend/js/hotel-booking.js')}}"></script>
<script src="{{asset('fontend/js/toastr.min.js')}}"></script>
@endpush