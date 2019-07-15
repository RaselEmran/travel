@extends('admin.layouts.master')
@section('pageTitle') Api setting @endsection
@section('page-header')
   <div class="page-header page-header-default">
                    <div class="page-header-content">
                        <div class="page-title">
                            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
                        </div>

                        <div class="heading-elements">
                            <div class="heading-btn-group">
                                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
@section('content')
     <div class="panel panel-flat">
              <div class="panel-heading">
                    <h5 class="panel-title"> 
                        Api Set
                    </h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>
              <div class="panel-body">
                 <form role="form" action="{{ route('admin.api.store') }}" method="post"  id="addForm">
                       <div class="row"> 
                        <legend>Facebook Api</legend>    
                         <div class="col-md-6">
                             <div class="form-group">
                                <label>FACEBOOK_CLIENT_ID:</label>
                                <input type="text" name="fb_client_id" id="fb_client_id" class="form-control" placeholder="FACEBOOK_CLIENT_ID" value="{{config('settings.fb_client_id')}}">

                            </div>
                         </div>

                           <div class="col-md-6">
                             <div class="form-group">
                                <label>FACEBOOK_CLIENT_SECRET:</label>
                               <input type="text" name="fb_secret_id" id="fb_secret_id" class="form-control" placeholder="FACEBOOK_CLIENT_SECRET"  value="{{config('settings.fb_secret_id')}}">

                            </div>
                         </div>
                         </div>

                          <div class="row">
                          <legend>Google Plus Api</legend>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>G+_CLIENT_ID:</label>
                                <input type="text" name="google_client_id" id="google_client_id" class="form-control" placeholder="G+_CLIENT_ID"  value="{{config('settings.google_client_id')}}">

                            </div>
                         </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>G+_CLIENT_SECRET:</label>
                              <input type="text" name="google_secret_id" id="google_secret_id" class="form-control" placeholder="G+_CLIENT_SECRET"  value="{{config('settings.google_secret_id')}}">

                            </div>
                         </div>
                     
                         </div>
                         <div class="row">
                         <legend>Paypale Api</legend>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>PAYPAL_CLIENT_ID:</label>
                                <input type="text" name="paypale_client_id" id="paypale_client_id" class="form-control" placeholder="PAYPAL_CLIENT_ID"  value="{{config('settings.paypale_client_id')}}">

                            </div>
                         </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>PAYPAL_SECRET:</label>
                              <input type="text" name="paypale_client_secret" id="paypale_client_secret" class="form-control" placeholder="PAYPAL_SECRET"  value="{{config('settings.paypale_client_secret')}}">

                            </div>
                         </div>
                     
                         </div>

                        <div class="row">
                         <legend>Social address</legend>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Facebook Link:</label>
                                <input type="text" name="fb_id" id="fb_id" class="form-control" placeholder="Facebook Link"  value="{{config('settings.fb_id')}}">

                            </div>
                         </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Linkedin Link:</label>
                              <input type="text" name="linkedin_link" id="linkedin_link" class="form-control" placeholder="Linkedin Link"  value="{{config('settings.linkedin_link')}}">

                            </div>
                         </div>
                     
                         </div>

                        <div class="row">
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Instagram Link:</label>
                                <input type="text" name="insta_link" id="insta_link" class="form-control" placeholder="Instagram Link"  value="{{config('settings.insta_link')}}">

                            </div>
                         </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>You tube Link:</label>
                              <input type="text" name="youtube_link" id="youtube_link" class="form-control" placeholder="You tube Link"  value="{{config('settings.youtube_link')}}">

                            </div>
                         </div>
                     
                         </div>

                    <div class="text-right">
                    <button type="submit" class="btn btn-primary"  id="submit">Set Api<i class="icon-arrow-right14 position-right"></i></button>
                    <button type="button" class="btn btn-link" id="submiting" style="display: none;">Processing <img src="{{ asset('ajaxloader.gif') }}" width="80px"></button>
                </div>
                 </form>     
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
  <script src="{{asset('backend/assets/js/setting.js')}}"></script>
@endpush