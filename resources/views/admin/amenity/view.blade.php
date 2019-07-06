	<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">View Details</h5>
	
			</div>

			<div class="panel-body">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td>Destination Name</td>
							<td>{{$destination->name}}</td>
						</tr>

						<tr>
							<td>Heading</td>
							<td>{{$destination->heading}}</td>
						</tr>

						<tr>
							<td>Short Description</td>
							<td>{{$destination->short_description}}</td>
						</tr>

						 <tr>
							<td>Package Heading</td>
							<td>{{$destination->pkg_heading}}</td>
						  </tr>

						   <tr>
							<td>Package Subheading</td>
							<td>{{$destination->pkg_subheading}}</td>
						  </tr>

						   <tr>
							<td>Detail Heading</td>
							<td>{{$destination->pkg_detailsheading}}</td>
						  </tr>

						   <tr>
							<td>Detail Subheading</td>
							<td>{{$destination->pkg_details_subheading}}</td>
						  </tr>
						  <tr>
							<td>Introduction</td>
							<td>{!!$destination->introduction!!}</td>
						  </tr>
						  <tr>
							<td>Experience</td>
							<td>{!!$destination->experience!!}</td>
						  </tr>


						  <tr>
							<td>Hotel</td>
							<td>{!!$destination->hotel!!}</td>
						  </tr>

						  <tr>
							<td>Transpotation</td>
							<td>{!!$destination->transportation!!}</td>
						  </tr>

						    <tr>
							<td>Culture</td>
							<td>{!!$destination->culture!!}</td>
						  </tr>


						    <tr>
							<td>Featured Photo</td>
							<td> <img src="{{asset('/storage/destination/photo/'.$destination->photo)}}" alt="" width="150px"></td>
						  </tr>


						    <tr>
							<td>Banner</td>
							<td> <img src="{{asset('/storage/destination/banner/'.$destination->banner)}}" alt="" width="150px"></td>
						  </tr>

					</tbody>
				</table>
				<div class="text-right">
			
					 <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>