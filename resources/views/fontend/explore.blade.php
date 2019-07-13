@extends('fontend.layouts.master')
@section('pageTitle') dashboard @endsection
@push('css')

@endpush
@section('page-header')
		<img src="{{asset('fontend/images/bg8.jpg')}}" class="bg1"/>
                    
           
     
            <div class="middle-right titleimg">

            <h2><strong>Times To Explore</strong></h2>

            <p class="subtitle">Start your new adventure here</p>


            </div>
@endsection

@section('content')
  <div class="row">
    <div id="content11">
        <div class="container">
            <div class="row">
                <div class="col-md-12 headercontent">
                    <h4><b>Explore The World</b></h4>
                    <p class="p1">Discover a different side of 
                    these beloved cities</p>
                </div>
               	@foreach ($packege as $allpack)
						
						<div class="col-lg-3 col-md-6 borderimg1">

						<a href="{{ route('experience-booking',$allpack->id) }}">
							<img src="{{asset('/storage/packege/photo/'.$allpack->photo)}}"
							 class="img1" width="264px" height="175" />

							<div class="centered titleimg1 darkbg1">
							{{$allpack->destination->name}}</div>
						</a>

						</div>
				@endforeach
                {{ $packege->links() }}
            </div>
        </div>
    </div>
</div>	
    

@endsection

@push('js')

@endpush