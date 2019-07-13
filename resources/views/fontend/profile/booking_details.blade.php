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
    </div>
		

@endsection

@push('js')
<script src="{{asset('fontend/js/toastr.min.js')}}"></script>
<script>
$('.select').select2();
</script>
@endpush