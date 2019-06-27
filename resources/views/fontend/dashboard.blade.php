@extends('fontend.layouts.master')
@section('pageTitle') dashboard @endsection
@push('css')
<link href="{{asset('fontend/css/toastr.min.css')}}" rel="stylesheet">

@endpush

@section('content')
<?php
$ip = $_SERVER['REMOTE_ADDR']; 
$api_key = "b51d822dc3a5abfc3eccdac12850ddcb";
$freegeoipjson = file_get_contents("http://api.ipstack.com/".$ip."?access_key=".$api_key."");
$jsondata = json_decode($freegeoipjson);
$countryfromip = $jsondata->country_name;
$cityfromip = $jsondata->city;

?>
	<div class="row bg-dash">
			<div id="content12">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="row">								
								<div class="col-md-12 user-profile-container">
									<div class="col-md-12" style="padding-bottom: 10px;">
										<center>
										<span><img src="{{asset('fontend/images/profile-pic.png')}}" class="profile-pic-dash" /></span>
										</center>
									</div>
									<div class="col-md-12" style="padding-bottom: 10px;">
										<center><label class="user-name">User</label></center>
									</div>
									<div class="col-md-12" style="padding-bottom: 20px;">
										<center><a class="edit-profile">Edit Profile</a></center>
									</div>
									<div class="col-md-6 offpadding right-border" style="padding-bottom: 5px;">
										<center>
										<div class="user-status">Active</div>
										<div class="lbl-status">Status</div>
										</center>
									</div>
									<div class="col-md-6 offpadding" style="padding-bottom: 5px;">
										<center>
										<div class="user-join-date">03 May 2019</div>
										<div class="lbl-joined">Joined</div>
										</center>
									</div>
									<div class="col-md-12">
										<div class="dash-menu"><a href="" class="menu-a"><i class="far fa-clipboard icon-menu"></i><span class="menu-space">Booking</span></a></div>
									</div>
									<div class="col-md-12">
										<div class="dash-menu"><a href="" class="menu-a"><i class="far fa-comment-dots icon-menu"></i><span class="menu-space">Review</span></a></div>
									</div>
									<div class="col-md-12">
										<div class="dash-menu"><a href="" class="menu-a"><i class="far fa-heart icon-menu"></i><span class="menu-space">Booking</span></a></div>
									</div>
									<div class="col-md-12 dash-logout-border">
										<div class="dash-menu"><a href="{{ route('logout') }}" class="menu-a" id="logout"><i class="fas fa-sign-out-alt icon-logout"></i><span class="menu-space">Log out</span></a></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-1"></div>
						<div class="col-md-8 booking-order-details">
							<div class="container-fluid">
								<form action="{{ route('dashboard.store') }}" method="post" id="addForm">
								<div class="row">
									<div class="col-md-12">
										<span class="vertical-box"></span><span style="font-size: 24px!important; font-weight: bold; ">Account Information</span>
										<p class="grey-txt">This information is used to autofil your details to make it quicker for you to book. Your details will be stored securely and won't be shared publicly.</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-5">
										<div><label>First Name</label></div>
										<div style="padding-bottom: 10px;"><input type="text" id="first-name" class="form-control form-control100" name="first_name" placeholder="Please enter"  value="{{$info->first_name}}"/></div>
									</div>
									<div class="col-md-5">
										<div><label>Last Name</label></div>
										<div style="padding-bottom: 10px;"><input type="text" id="last-name" class="form-control form-control100" name="last_name" placeholder="Please enter"  value="{{$info->last_name}}"/></div>
									</div>
									<div class="col-md-2">
										<div><label>Gender</label></div>
										<div style="padding-bottom: 10px;">
										<select id="gender" class="form-control form-control100" name="gender">
										<option {{$info->gender ==1?'selected':''}} value="1">Male</option>
										<option {{$info->gender ==2?'selected':''}} value="2">Female</option></select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-5">
										<div><label>Country</label></div>
										<div style="padding-bottom: 10px;"><input type="text" id="country" class="form-control form-control100" name="country" placeholder="Please enter"  value="{{$info->country}}" /></div>
									</div>
									<div class="col-md-5">
										<div><label>State</label></div>
										<div style="padding-bottom: 10px;"><input type="text" id="state" class="form-control form-control100" name="state" placeholder="Please enter" value="{{$info->state}}" /></div>
									</div>
									<div class="col-md-2"></div>
								</div>
								<div class="row">
									<div class="col-md-5">
										<div><label>Country Code</label></div>
										<div style="padding-bottom: 10px;">
										<input type="text" id="country_code" class="form-control form-control100" name="country_code" placeholder="Country Code"  value="{{$info->country_code}}" /></div
										</div>
									</div>
									<div class="col-md-5">
										<div><label>Phone number</label></div>
										<div style="padding-bottom: 10px;"><input type="text" id="phn_number" class="form-control form-control100" name="phn_number" placeholder="Please enter"   value="{{$info->phn_number}}"/></div>
									</div>
									<div class="col-md-2"></div>
								</div>
								<div class="row">
									<div class="col-md-5">
										<div><label>Email (To Receive Voucher)</label></div>
										<div style="padding-bottom: 10px;"><input type="text" id="enb_email" class="form-control form-control100" name="enb_email" placeholder="Please enter"  value="{{$info->enb_email}}" /></div>
									</div>
									<div class="col-md-7">
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<div style="padding-bottom: 10px;"><input type="submit" id="save-info-btn" class="btn btn-info form-control form-control100" name="save-info-btn" value="Save" /></div>
									</div>
									<div class="col-md-10">
									</div>
								</div>
								</form>
								<br>
								<br>
								<form action="{{ route('change-pass') }} " method="post" id="ChangePass">
							
						
								<div class="row">
									<div class="col-md-12">
										<div><label>New Password (passwords must be 8-20 characters long and contain at least 1 letter and 1 number)</label></div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-5">										
										<div style="padding-bottom: 10px;"><input type="password" id="new_pass" class="form-control form-control100" name="new_pass" placeholder="Enter new password" /></div>
									</div>
									<div class="col-md-7">										
									</div>
								</div>
								<div class="row">
									<div class="col-md-5">										
										<div style="padding-bottom: 10px;"><input type="password" id="new_pass-confirm" class="form-control form-control100" name="new_pass_confirmation" placeholder="Confirm password"  /></div>
									</div>
									<div class="col-md-7">										
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<div style="padding-bottom: 10px;"><input type="submit" id="change-pass-btn" class="btn btn-info form-control form-control100" name="change-pass-btn" value="Save" /></div>
									</div>
									<div class="col-md-10">
									</div>
								</div>
							</form>
							</div>
						</div>
					</div>
					<br>
				</div>
			</div>
		</div>

@endsection

@push('js')
<script src="{{asset('fontend/js/toastr.min.js')}}"></script>
<script>
$('.select').select2();
$(document).on('submit','#ChangePass', function(e){
   e.preventDefault();
    $(".ajax_error").remove();
   var form = $(this).serialize();
   var url = $(this).attr('action');
              $.ajax({
              method:'POST',
              url: url,
              data :form,
              dateType: 'json',
              success: function(data){
                     if (data.success) {
                        toastr.success(data.message);

                    }

                     else {
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
//......................
$(document).on('submit','#addForm', function(e){
   e.preventDefault();
    $(".ajax_error").remove();
   var form = $(this).serialize();
   var url = $(this).attr('action');
              $.ajax({
              method:'POST',
              url: url,
              data :form,
              dateType: 'json',
              success: function(data){
                     if (data.success) {
                        toastr.success(data.message);

                    }

                     else {
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

//....................
$(document).on('click','#logout',function(e){
   e.preventDefault();
  var url =$(this).attr('href');
  //console.log(url);

              $.ajax({
              method:'Post',
              url: url,
              dateType: 'json',
              contentType:false,
              cache:false,
              processData:false,
              success: function(data){
            toastr.success(data.message);
            
              setTimeout(function(){

              window.location.href=data.goto;
              },2500);
               },
               error:function (data) {
                var jsonValue = $.parseJSON(data.responseText);
                const errors = jsonValue.errors;
                var i = 0;
                $.each(errors, function(key, value) {
                    const first_item = Object.keys(errors)[i]
                    const message = errors[first_item][0]
                    toastr.error(value);
                    i++;
                });
               }

            });
  });
</script>
@endpush