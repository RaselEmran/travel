@extends('fontend.profile.profile')
@section('pageTitle') Hotel Booking Details @endsection
@push('css')
<link href="{{asset('fontend/css/toastr.min.css')}}" rel="stylesheet">
@endpush
@section('procontent')
<div class="col-md-8 booking-order-details">
    <div>
        <h4>Booking Status</h4>
        @if ($hotel_booking->status == 0)
        <button class="btn btn-sm btn-warning">Pending</button>
        @endif
    </div>
    <div>
        <h4>Booking Info</h4>
        <table class="table">
            <tr>
                <th>Check In Date</th>
                <th>Check Out Date</th>
                <th>Guest</th>
                <th>Price</th>
            </tr>
            <tr>
                <td>{{$hotel_booking->check_in}}</td>
                <td>{{$hotel_booking->check_out}}</td>
                <td>{{$hotel_booking->guest}}</td>
                <td>{{$hotel_booking->price}}</td>
            </tr>
        </table>
    </div>
    <h4>Hotel Info</h4>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td>Hotel Name</td>
                <td>{{$hotel_booking->hotel->name}}</td>
            </tr>
            @if ($hotel_booking->hotel->entire_place)
            <tr>
                <td>Entire Place :</td>
                <td>{{$hotel_booking->hotel->entire_place}}</td>
            </tr>
            @endif
            @if ($hotel_booking->hotel->room_details)
            <tr>
                <td>Room Details</td>
                <td>{!!$hotel_booking->hotel->room_details!!}</td>
            </tr>
            @endif
            <tr>
                <td>Amenity</td>
                <td>
                    @forelse($hotel_booking->hotel->amenities as $amenity)
                    {{ $amenity->amenity->name . ', '}}
                    @empty
                    No Amenity Found
                    @endforelse
                </td>
            </tr>
            @if ($hotel_booking->hotel->rules)
            <tr>
                <td>Rules</td>
                <td>{!!$hotel_booking->hotel->rules!!}</td>
            </tr>
            @endif
            @if ($hotel_booking->hotel->allow)
            <tr>
                <td>Allow / Not allow</td>
                <td>{!!$hotel_booking->hotel->allow!!}</td>
            </tr>
            @endif
            @if ($hotel_booking->hotel->map)
            <tr>
                <td>Map</td>
                <td>{!! $hotel_booking->hotel->map !!}</td>
            </tr>
            @endif
            @if ($hotel_booking->hotel->policy)
            <tr>
                <td>Cancellation Policy</td>
                <td>{!!$hotel_booking->hotel->policy!!}</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
@push('js')
<script src="{{asset('fontend/js/toastr.min.js')}}"></script>
<script>
$('.select').select2();
</script>
@endpush