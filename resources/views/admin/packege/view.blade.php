	<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">View Details</h5>
	
			</div>

			<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td width="25%">Packege Name</td>
							<td width="75%">{{$packege->name}}</td>
						</tr>

						<tr>
							<td width="25%">Duration</td>
							<td width="75%">{{$packege->duration}} Hours</td>
						</tr>

						<tr>
							<td width="25%">Per Persion Price</td>
							<td width="75%">{{$packege->per_persion_price}}</td>
						</tr>

						 <tr>
							<td width="25%">Tour Destination</td>
							<td width="75%">{{$packege->destination->name}}</td>
						  </tr>
						  <tr>
							<td width="25%">Description</td>
							<td width="75%">{!!$packege->description!!}</td>
						  </tr>
						  <tr>
							<td width="25%">Inclusive Of</td>
							<td width="75%">{!!$packege->inclusive_of!!}</td>
						  </tr>


						  <tr>
							<td width="25%">Not Inclusive Of</td>
							<td width="75%">{!!$packege->not_inclusive_of!!}</td>
						  </tr>

						  <tr>
							<td width="25%">Booking Info</td>
							<td width="75%">{!!$packege->booking_info!!}</td>
						  </tr>

						    <tr>
							<td width="25%">Location</td>
							<td width="75%">{!!$packege->location!!}</td>
						  </tr>


						    <tr>
							<td width="25%">Featured Photo</td>
							<td width="75%"> <img src="{{asset('/storage/packege/photo/'.$packege->photo)}}" alt="" width="150px"></td>
						  </tr>


						    <tr>
							<td width="25%">Banner</td>
							<td width="75%"> <img src="{{asset('/storage/packege/banner/'.$packege->banner)}}" alt="" width="150px"></td>
						  </tr>

					</tbody>
				</table>
				</div>
				<div class="text-right">
			
					 <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>