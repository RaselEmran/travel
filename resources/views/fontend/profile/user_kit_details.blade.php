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
                        <span class="vertical-box"></span><span style="font-size: 24px!important; font-weight: bold; ">Travel Kit Details</span>
                        <p class="grey-txt">This information is used to autofill your details to make it quicker for you to book. Your details will be stored securely and won't be shared publicly.</p>
                    </div>
                </div>
                <div class="row">
                 <div class="col-md-5">
                     <table class="table table-bordered">
                         <tr>
                             <td>Loaction</td>
                              <td>
                                   @if ($confirmKit->location==1)
                                    <span  class="label label-danger">Airpot</span>
                                    @else
                                     <span  class="label label-info">Hotel</span>
                                 @endif
                              </td>

                         </tr>
                         <tr>
                             <td>Pick up date</td>
                             <td>{{$confirmKit->pick_up_date}}</td>
                         </tr>

                          <tr>
                             <td>Location Name</td>
                             <td>{{$confirmKit->location_name}}</td>
                         </tr>
                          <tr>
                             <td>Paid Amount</td>
                             <td>{{$confirmKit->total_amt}}</td>
                         </tr>

                          <tr>
                             <td>transaction_id</td>
                             <td>{{$confirmKit->transaction_id}}</td>
                         </tr>

                          <tr>
                             <td>Invoice No</td>
                             <td>{{$confirmKit->invoice_no}}</td>
                         </tr>

                          <tr>
                             <td>Payment Status</td>
                             <td>
                                 @if ($confirmKit->status=='pendding')
                                    <span  class="label label-success">Payment</span>
                                    @else
                                     <span  class="label label-danger">Pendding</span>
                                 @endif
                             </td>
                         </tr>
                     </table>
                 </div>
                 <div class="col-md-7">
                     <table class="table">
                         <thead>
                             <tr>
                                 <th>Product name</th>
                                 <th>Product Quantity</th>
                                 <th>Product Price</th>
                             </tr>
                         </thead>

                         <tbody>
                             @foreach ($confirmKit->kits as $kit)
                                 <tr>
                                     <td>{{$kit->tarvelkit->name}}</td>
                                     <td>{{$kit->quantity}}</td>
                                     <td>{{$kit->price}}</td>
                                 </tr>
                             @endforeach
                         </tbody>
                     </table>
                 </div>
                   
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