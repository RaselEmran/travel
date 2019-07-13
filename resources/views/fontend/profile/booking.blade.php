@extends('fontend.profile.profile')
@section('pageTitle') dashboard @endsection
@push('css')
<link href="{{asset('fontend/css/toastr.min.css')}}" rel="stylesheet">

@endpush

@section('procontent')

	<div class="col-md-8 booking-order-details">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <span class="vertical-box"></span><span style="font-size: 24px!important; font-weight: bold; ">Bookings</span>
                        <p class="grey-txt">This information is used to autofill your details to make it quicker for you to book. Your details will be stored securely and won't be shared publicly.</p>
                    </div>
                </div>
                <div class="row">
                @foreach ($userpackege as $allpack)
                   <div class="col-lg-4 col-md-6 borderimg1">
                          <a href="{{ route('experience-booking-details',$allpack->packege->id) }}">
					<img src="{{asset('/storage/packege/photo/'.$allpack->packege->photo)}}"
					 class="img1" width="235px" height="175" />

					<div class="centered titleimg1 darkbg1">
					{{$allpack->packege->destination->name}}</div>
				</a>
                        
                    </div>
                    @endforeach
                   {{ $userpackege->links() }}
                </div>
            </div>
    </div>
		

@endsection

@push('js')
<script src="{{asset('fontend/js/toastr.min.js')}}"></script>
<script>
$('.select').select2();
</script>
@endpush