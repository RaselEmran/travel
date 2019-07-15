@extends('fontend.profile.profile')
@section('pageTitle') booking Details @endsection
@push('css')
<link href="{{asset('fontend/css/toastr.min.css')}}" rel="stylesheet">

@endpush

@section('procontent')

	<div class="col-md-8 booking-order-details">
    <img src="{{asset('/storage/packege/banner/'.$packege->packege->banner)}}" alt="" class="img-responsive">
     <h4 class="label label-primary">Packege Info</h4>
     <table class="table">
         <tr>
             <th>Packege Name</th>
             <th>Destination Name</th>
             <th>Duration</th>
         </tr>
         <tr>
             <td>{{$packege->packege->name}}</td>
             <td>{{$packege->packege->destination->name}}</td>
             <td>{{$packege->packege->duration}}Hours</td>
         </tr>
     </table>
     <div>
         <h4 class="label label-info">Booking Info</h4>
         <table class="table">
             <tr>
                 <th>Packege Type</th>
                 <th>Depart date</th>
                 <th>Pack Quantity</th>
                 <th>Price</th>
                 <th>Total</th>
             </tr>
             <tr>
                 <td>{{$packege->type}}</td>
                 <td>{{$packege->depart_date}}</td>
                 <td>{{$packege->pack_quantity}}</td>
                 <td>{{$packege->price}}</td>
                 <td>{{$packege->total}}</td>
             </tr>
         </table>
     </div>

        <div>
         <h4 class="label label-default">Your Itinary</h4>
         <table class="table">
             <tr>
                 <th>Time</th>
                 <th>Name</th>
             </tr>
             <tr>
               @foreach ($packege->useritinary as $element)
                 <tr>
                     <td>{{$element->time}}</td>
                     <td>{{$element->name}}</td>
                 </tr>
               @endforeach
             </tr>
         </table>
         <h3>Your Tour Status @if ($packege->status==0)
             <span class="label label-danger">Pendding</span>
             @else
             <span class="label label-success">Mail Sent</span>
         @endif</h3>
     </div>
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