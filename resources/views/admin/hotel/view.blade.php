	<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">View Details</h5>

			</div>

			<div class="panel-body">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td>Hotel Name</td>
							<td>{{$hotel->name}}</td>
						</tr>

						<tr>
							<td>Entire Place :</td>
							<td>{{$hotel->entire_place}}</td>
						</tr>

						<tr>
							<td>Room Details</td>
							<td>{!!$hotel->room_details!!}</td>
						</tr>

						 <tr>
							<td>Amenity</td>
							<td>
								@forelse($hotel->amenities as $amenity)
								{{ $amenity->amenity->name . ', '}}
								@empty
								No Amenity Found
								@endforelse
							</td>
						  </tr>

						   <tr>
							<td>Rules</td>
							<td>{!!$hotel->rules!!}</td>
						  </tr>

						   <tr>
							<td>Allow / Not allow</td>
							<td>{!!$hotel->allow!!}</td>
						  </tr>

						   <tr>
							<td>Map</td>
							<td>{!! $hotel->map !!}</td>
						  </tr>
						  <tr>
							<td>Cancellation Policy</td>
							<td>{!!$hotel->policy!!}</td>
						  </tr>
						  <tr>
							<td>Featured Photo</td>
							<td> <img src="{{asset('/storage/hotel/photo/'.$hotel->photo)}}" alt="" width="150px"></td>
						  </tr>
						    <tr>
							<td>Banner</td>
							<td> <img src="{{asset('/storage/hotel/banner/'.$hotel->banner)}}" alt="" width="150px"></td>
						  </tr>

					</tbody>
				</table>
				<div class="text-right">

					 <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>