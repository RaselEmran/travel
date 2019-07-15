@extends('admin.layouts.master')
@section('pageTitle') hotel booking @endsection
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
            <li >Dashboard</li>
            <li class="active">Booking Details</li>
        </ul>
    </div>
</div>
@endsection
@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Hotel Booking Details
        </h5>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h4>Booking Info</h4>
                <table class="table">
                    <tr>
                        <th>Check In Date</th>
                        <th>Check Out Date</th>
                        <th>Guest</th>
                        <th>Price</th>
                    </tr>
                    <tr>
                        <td>{{$booking->check_in}}</td>
                        <td>{{$booking->check_out}}</td>
                        <td>{{$booking->guest}}</td>
                        <td>{{$booking->price}}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12">
                <h2>Hotel Details</h2>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Hotel Name</td>
                            <td>{{$booking->hotel->name}}</td>
                        </tr>
                        @if ($booking->hotel->entire_place)
                        <tr>
                            <td>Entire Place :</td>
                            <td>{{$booking->hotel->entire_place}}</td>
                        </tr>
                        @endif
                        @if ($booking->hotel->room_details)
                        <tr>
                            <td>Room Details</td>
                            <td>{!!$booking->hotel->room_details!!}</td>
                        </tr>
                        @endif
                        <tr>
                            <td>Amenity</td>
                            <td>
                                @forelse($booking->hotel->amenities as $amenity)
                                {{ $amenity->amenity->name . ', '}}
                                @empty
                                No Amenity Found
                                @endforelse
                            </td>
                        </tr>
                        @if ($booking->hotel->rules)
                        <tr>
                            <td>Rules</td>
                            <td>{!!$booking->hotel->rules!!}</td>
                        </tr>
                        @endif
                        @if ($booking->hotel->allow)
                        <tr>
                            <td>Allow / Not allow</td>
                            <td>{!!$booking->hotel->allow!!}</td>
                        </tr>
                        @endif
                        @if ($booking->hotel->map)
                        <tr>
                            <td>Map</td>
                            <td>{!! $booking->hotel->map !!}</td>
                        </tr>
                        @endif
                        @if ($booking->hotel->policy)
                        <tr>
                            <td>Cancellation Policy</td>
                            <td>{!!$booking->hotel->policy!!}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form  action="{{ route('admin.send-hotel-mail') }}" method="post">
                @csrf
                 <input type="hidden" name="booking_id" value="{{$booking->id}}">
                <input type="hidden" name="user_id" value="{{$booking->user_id}}">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <label>Email:</label>
                                    <input type="text" id="email" class="form-control " name="email" value="{{$booking->user->email}}" readonly />
                                </td>
                            </tr>

                              <tr>
                                <td>
                                    <label>Price:</label>
                                    <input type="text" id="price" class="form-control " name="price" value="{{$booking->price}}" readonly />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Messege:</label>
                                    <textarea rows="5" cols="5" class="form-control summernote" name="messege" id="messege" style="resize: none;"></textarea>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>
                                <button type="submit" class="btn btn-info"> <i class=" icon-mail5"></i>Send Mail</button>
                                <button type="submit" class="btn btn-danger"> <i class=" icon-alarm-cancel"></i>Cancel Tour</button>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{asset('backend/global_assets/js/plugins/editors/summernote/summernote.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/demo_pages/editor_summernote.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{asset('backend/global_assets/js/demo_pages/form_checkboxes_radios.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>
<script src="{{asset('backend/assets/js/details.js')}}"></script>
@endpush