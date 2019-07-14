@extends('fontend.profile.profile')
@section('pageTitle') user Kit @endsection
@push('css')
<link href="{{asset('fontend/css/toastr.min.css')}}" rel="stylesheet">

@endpush

@section('procontent')

	<div class="col-md-8 booking-order-details">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <span class="vertical-box"></span><span style="font-size: 24px!important; font-weight: bold; ">Travel Kit</span>
                        <p class="grey-txt">This information is used to autofill your details to make it quicker for you to book. Your details will be stored securely and won't be shared publicly.</p>
                    </div>
                </div>
                <div class="row">
              <h3 class="label label-success">Your Travel Kit</h3>
              <table class="table">
                 <thead>
                     <tr>
                         <th>Location</th>
                         <th>Location name</th>
                         <th>Pickup date</th>
                         <th>Total Amount</th>
                         <th>View Mode</th>
                     </tr>
                 </thead> 

                 <tbody>
                     @foreach ($confirmKit as $element)
                         <tr>
                             <td>
                                 @if ($element->location==1)
                                    <span  class="label label-danger">Airpot</span>
                                    @else
                                     <span  class="label label-info">Hotel</span>
                                 @endif
                             </td>
                             <td>
                                 {{$element->location_name}}
                             </td>
                             <td>
                                 {{$element->pick_up_date}}
                             </td>
                             <td>
                                 {{$element->total_amt}}
                             </td>
                             <td>
                                 <a href="{{ route('user-kit-details',$element->id) }}" class="btn btn-warning">Details</a>
                             </td>
                         </tr>
                     @endforeach
                 </tbody>
              </table>
                   
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