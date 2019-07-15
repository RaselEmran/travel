@extends('fontend.layouts.master')
@section('pageTitle') about-us @endsection
@push('css')
@endpush
@section('page-header')
<img src="{{asset('fontend/images/bg8.jpg')}}" class="bg1" height="400px" />
<div class="centered3 titleimg9">
	<h2>Search Result For : {{ $query }}</h2>
</div>
@endsection
@section('content')
@if (!$packages->count() && !$hotels->count())
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center">No Result Found for : {{ $query }}</h1>
		</div>
	</div>
@else
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				@if($packages->count())
				<div class="{{ !$hotels->count() ? 'col-md-12': 'col-md-6' }}">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th colspan="2">Package</th>
							</tr>
						</thead>
						<tbody>
							@forelse($packages as $package)
							<tr>
								<td>
									<a href="{{ route('experience-booking', $package->id) }}">
										<h4>{{ $package->name }}</h4>
										<p>
											{!! $package->description !!}
										</p>
									</a>
								</td>
								<td>
									<a href="{{ route('experience-booking', $package->id) }}">
										<img src="{{ asset('/storage/packege/photo/'.$package->photo) }}" alt="" width="300px" height="150px">
									</a>
								</td>
							</tr>
							@empty
							<tr>
								<td>No Package Found</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
				@endif
				@if($hotels->count())
				<div class="{{ !$packages->count() ? 'col-md-12': 'col-md-6' }}">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th colspan="2">Hotel</th>
							</tr>
						</thead>
						<tbody>
							@forelse($hotels as $hotel)
							<tr>
								<td>
									<a href="{{ route('experience-booking', $hotel->id) }}">
										<h4>{{ $hotel->name }}</h4>
										<p>
											{!! $hotel->description !!}
										</p>
									</a>
								</td>
								<td>
									<a href="{{ route('experience-booking', $hotel->id) }}">
										<img src="{{ asset('/storage/hotel/photo/'.$hotel->photo) }}" alt="" width="300px" height="150px">
									</a>
								</td>
							</tr>
							@empty
							<tr>
								<td>No Hotel Found</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endif
@endsection
@push('js')
@endpush