<!DOCTYPE html>

<html lang="en">

<head>

  <title>YuPa Travel- Activities, Tours, Attractions and Accommodations</title>

  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--===============================================================================================-->

  <link rel="icon" href="{{asset('fontend/images/favicon.png')}}" type="image/x-icon" />

  <!--navigation bar===============================================================================================-->

  <link rel="stylesheet" type="text/css" href="{{asset('fontend/vendor/bootstrap-3.4.1-dist/css/bootstrap.min.css')}}">

  <!--===============================================================================================-->

  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

  <!--==============================================================================================-->

  <!--link rel="stylesheet" type="text/css" href="vendor/animate/animate.css"-->

  <!--main css===============================================================================================-->

  <link rel="stylesheet" type="text/css" href="{{asset('fontend/css/main.css')}}">
  <link href="{{asset('fontend/css/toastr.min.css')}}" rel="stylesheet">
  @stack('css')

  <!--===============================================================================================-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <!--toggle bar===============================================================================================-->

  <script src="{{asset('fontend/vendor/bootstrap-3.4.1-dist/js/bootstrap.min.js')}}"></script>

</head>
<body>
<div class="container-fluid">
<div class="row">
      <div id="content1">
        @include('fontend.partial.topnavbg')
      </div>
</div>
  <div class="row bg-payment">
      <div id="content12">
        <form action="{{ route('post_hotel_checkout') }}" method="post">
        @csrf
        <div class="container">
          <div class="row">
            <div class="col-md-7 booking-order-details">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <span style="font-size: 24px!important; font-weight: bold; ">Order Information</span>
                    <p>Fill in your details to book this room</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                  <input type="hidden" name="user_id" value="{{$check->user->id}}">
                  <input type="hidden" name="secret" value="{{$check->secret}}">
                    <div><label>First Name</label></div>
                    <div style="padding-bottom: 20px;"><input type="text" id="first_name" class="form-control form-control100" name="first_name" placeholder="Please enter" required value="{{$check->user->first_name}}" /></div>
                  </div>
                  <div class="col-md-6">
                    <div><label>Last Name</label></div>
                    <div style="padding-bottom: 20px;"><input type="text" id="last_name" class="form-control form-control100" name="last_name" placeholder="Please enter" required value="{{$check->user->last_name}}" /></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label>Email</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12" style="padding-bottom: 20px;">
                    <input type="text" id="enb_email" class="form-control form-control100" name="enb_email" placeholder="Please enter" value="{{$check->user->enb_email}}" required />
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label>Phone number</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="col-md-8" style="padding: 0; padding-bottom: 20px;">
                    <input type="text" id="phn_number" class="form-control form-control100" name="phn_number" placeholder="Please enter" required value="{{$check->user->phn_number}}" />
                    </div>
                  </div>
                  <div class="col-md-4"></div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label>Guest</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8" style="padding-bottom: 20px;">
                     <input type="text" name="guest" class="form-control" value="{{$check->guest}}" readonly>
                  </div>
                  <div class="col-md-4"></div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label>Remark</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <textarea id="remark" class="form-control form-control100" name="remark" style="resize: none;" placeholder="Let the host know a little about yourself and why you're coming."></textarea>
                  </div>
                </div>
               
              </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
              <div class="row">               
                <div class="col-md-12 booking-price-container">
                  <div class="col-md-12" style="padding-bottom: 5px;">
                    <img src="{{asset('fontend/images/question-mark.png')}}" /><label>&nbsp;Order Details</label>
                  </div>
                  <div class="col-md-12" style="padding-bottom: 20px;">
                    <label>{{$check->hotel->name}}</label>
                  </div>
                  <div class="col-md-6" style="padding-bottom: 5px;">
                    <span class="depart-date-details  label label-info" style="float: left;">Check In:{{$check->check_in}}</span>
                  </div>
                  <div class="col-md-6" style="padding-bottom: 5px;">
                    <span class="return-date-details  label label-info" style="float: right;">Check out: {{$check->check_out}}</span>
                  </div>
              
                  <div class="col-md-12" style="padding-bottom: 10px;">
                    <div class="order-total-prices">
                      <span>Total</span>
                      <input type="hidden" name="price" value="{{$check->price}}">
                      <span id="total-price" class="align-right-col flt-right">{{$check->price}}</span>
                    </div>
                  </div>
                  <div class="col-md-12" style="padding-bottom: 10px;">
                    <p>To be confirmed within 3 working day(s)</p>
                  </div>
                </div>
              </div>
              <br>
            
            </div>            
          </div>
          <br>
          <div class="row">
            <div class="col-md-7 paypal-container">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-8">
                    <input type="checkbox" id="paypal" name="paypal" value="paypal"><span class="paypal-txt"><b>&nbsp;&nbsp;Paypal</b></span>
                  </div>
                  <div class="col-md-4">
                    <img src="{{asset('fontend/images/paypal-lg.jpg')}}" />
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-7 pay-now">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-8">
                    By clicking Pay Now, you agree that you have read and understood our Terms & Conditions and Cancelation Policy.
                  </div>
                  <div class="col-md-4">
                    <input type="submit" class="btn btn-lg btn-info flt-right" id="pay-now-btn" name="pay-btn" value="Pay Now" />
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5">
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
 @include('fontend.partial.footer')
 </div>
<!--===============================================================================================-->

<script src="{{asset('fontend/vendor/jquery/jquery-3.2.1.min.js')}}"></script>

<!--===============================================================================================-->

<script src="{{asset('fontend/vendor/select2/select2.min.js')}}"></script>

<!--===============================================================================================-->

<script src="{{asset('fontend/vendor/tilt/tilt.jquery.min.js')}}">
</script>

 <script>
         $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

 </script>
 <script src="{{asset('fontend/js/toastr.min.js')}}"></script>
<script src="{{asset('fontend/js/logout.js')}}"></script>
 <script>
   @if (Session::has('msg'))
    toastr.warning('{{Session::get('msg')}}');

   @endif
  
   
</script>

<!--===============================================================================================-->
</body>
</html>
