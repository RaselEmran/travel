@extends('fontend.profile.profile')
@section('pageTitle') Hotel Booking List @endsection
@push('css')
<link href="{{asset('fontend/css/toastr.min.css')}}" rel="stylesheet">
@endpush
@section('procontent')
<div class="col-md-8 booking-order-details">
    <div class="container-fluid">
        <div class="row">
            @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
            <div class="col-md-12">
                <span class="vertical-box"></span><span style="font-size: 24px!important; font-weight: bold; ">Hotel Bookings</span>
                <p class="grey-txt">This information is used to autofill your details to make it quicker for you to book. Your details will be stored securely and won't be shared publicly.</p>
            </div>
        </div>
        <div class="row">
            @foreach($hotels as $hotel_booking)
            <div class="col-lg-4 col-md-6 borderimg1">
                <center>
                <div class="darkbg3" style="width: 225px;">
                    <img src="{{asset('/storage/hotel/photo/'.$hotel_booking->hotel->photo)}}" class="img3" style="width: 225px;" />
                    <div class="row">
                        <div class="col-md-12 titleimg4"><a href="{{ route('hotel.booking_details', $hotel_booking->id) }}">{{ $hotel_booking->hotel->name }}</a></div>
                        <div class="col-md-7 reviewcontainer">
                            <img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><img src="{{asset('fontend/images/star.png')}}" class="staricon"/><span class="review"> (188)</span>
                        </div>
                        <div class="col-md-5 price1">MYR {{ $hotel_booking->price }}</div>
                    </div>
                </div>
                </center>
            </div>
            @endforeach
        </div>
        <div class="row">
            {!! $hotels->links() !!}
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