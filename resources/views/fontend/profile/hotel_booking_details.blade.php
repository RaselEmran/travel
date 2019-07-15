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
    <div class="row">
        <div class="col-md-12">
            <h4>Review</h4>
        </div>
        @php
            $user_review = $hotel_booking->hotel->reviews->where('user_id', auth()->user()->id)->where('status', 'approved');
        @endphp
        <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Rate</th>
                    <th>Review</th>
                </tr>
            </thead>
            <tbody>
                @forelse($user_review as $review)
                <tr>
                    <td>{{ $review->created_at->format('Y/m/d') }}</td>
                    <td>{{ $review->rate }}</td>
                    <td>{!! $review->review !!}</td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('hotel.review.store') }}" id="review_form">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-12">
                        <label>Rate</label>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div id="ratings"></div>
                    </div>
                </div> <br>
                <div class="row" id="textarea" style="display: none;">
                    <div class="col-md-12" style="padding-bottom: 10px;">
                        <input type="hidden" name="rate" id="rate">
                        <input type="hidden" name="hotel_id" id="hotel_id" value="{{ $hotel_booking->hotel_id }}">
                        <textarea id="review" class="form-control form-control100" name="review" required></textarea>
                    </div>
                    <div class="col-md-12" style="padding-bottom: 10px;">
                        <button id="submit" class="btn btn-success" >Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{asset('fontend/js/toastr.min.js')}}"></script>
<script>
$('.select').select2();
    $(function () {
      $("#ratings").rateYo({
        rating: 0,
        starWidth: "30px",
        fullStar: true,
        onSet: function (rating, rateYoInstance) {
            $('#rate').val(rating);
            $("#textarea").show();
        }
      });
    });
    $(document).on('submit', '#review_form', function(e) {
        e.preventDefault();
        $(".ajax_error").remove();
        var form = $(this).serialize();
        var url = $(this).attr('action');
        $.ajax({
            method: 'POST',
            url: url,
            data: form,
            dateType: 'json',
            success: function(data) {
                if (data.success) {
                    toastr.success(data.message);
                    setTimeout(function(){
                        window.location.href = '';
                    }, 1000);

                } else {
                    const errors = data.message
                        // console.log(errors)
                    var i = 0;
                    $.each(errors, function(key, value) {
                        const first_item = Object.keys(errors)[i]
                        const message = errors[first_item][0]
                        $('#' + first_item).after('<div class="ajax_error" style="color:red">' + value + '</div');
                        toastr.error(value);
                        i++;
                    });
                }
            },
            error: function(data) {
                var jsonValue = $.parseJSON(data.responseText);
                toastr.error(jsonValue.message);
            }
        });
    });
</script>
@endpush