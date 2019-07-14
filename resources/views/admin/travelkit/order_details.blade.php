<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<tbody>
			 <tr>
			 	<td>Travelar Name:</td>
			 	<td>{{$kit->user->name}}</td>
			 </tr>	
			 <tr>
			 <td>Pick up date:</td>
			 <td>{{$kit->pick_up_date}}</td>
			 </tr>
			 <tr>
			 <td>Pick up Time:</td>
			 <td>{{$kit->pick_up_time}}</td>
			 </tr>
			 <tr>
			 <td>Location:</td>
			 <td>@if ($kit->location ==1)
			 	<span class="label label-danger">Airpot</span>
			 	@else
			 	<span class="label label-info">Airpot</span>
			 @endif</td>
			 </tr>
			 <tr>
			 <td>Location name:</td>
			 <td>{{$kit->location_name}}</td>
			 </tr>

			  <tr>
			 <td>Total Amount:</td>
			 <td><span class="label label-success">{{$kit->total_amt}}</span></td>
			 </tr>
			  @if ($kit->transaction_id)
			  <tr>
			 <td>Transaction Id:</td>
			 <td>{{$kit->transaction_id}}</td>
			 </tr>
			  @endif

			  @if ($kit->invoice_no)
			  <tr>
			 <td>Invoice Number:</td>
			 <td>{{$kit->invoice_no}}</td>
			 </tr>
			  @endif

			 @if ($kit->payment_date)
			  <tr>
			 <td>Payment date:</td>
			 <td>{{$kit->payment_date}}</td>
			 </tr>
			  @endif

			  <tr>
			 <td>Payment Status:</td>
			 <td>
			 	@if ($kit->status==1)
			 		<span class="label label-info">Complete</span>
			 		@else
			 		<span class="label label-danger">Not Complete</span>
			 	@endif
			 </td>
			 </tr>
			</tbody>
		</table>
		<h2 class="label label-success">Booking Kit</h2>
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>Kit Type</td>
					<td>Kit name</td>
					<td>Kit Quantity</td>
					<td>Kit Price</td>
				</tr>
				@foreach ($kit->kits as $element)
					<tr>
						<td>{{$element->tarvelkit->type}}</td>
						<td>{{$element->tarvelkit->name}}</td>
						<td>{{$element->quantity}}</td>
						<td>{{$element->price}}</td>
					</tr>

				@endforeach
			</thead>
		</table>
	</div>
</div>