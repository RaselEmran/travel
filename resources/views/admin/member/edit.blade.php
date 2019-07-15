@extends('admin.layouts.master')
@section('pageTitle') team-member @endsection
@section('page-header')
 <div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Member</li>
        </ul>
    </div>
</div>
@endsection
@section('content')
     <div class="panel panel-flat">
              <div class="panel-heading">
                    <h5 class="panel-title">Update Team Member 
                    <a href="{{ route('admin.team-member') }}" class="btn btn-info"><i class="icon-stack-plus mr-2"></i>View</a>
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
                 <form role="form" action="{{ route('admin.team-member.update') }}" method="post" enctype="multipart/form-data" id="editForm">
                       <div class="row"> 
                       <input type="hidden" name="id" value="{{$member->id}}">
                         <div class="col-md-6">
                             <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{$member->name}}">

                            </div>
                         </div>

                           <div class="col-md-6">
                             <div class="form-group">
                                <label>Destination:</label>
                               <input type="text" name="designation" id="designation" class="form-control" placeholder="Designation" value="{{$member->designation}}">

                            </div>
                         </div>
                         </div>

                          <div class="row">
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Email:</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{$member->email}}">

                            </div>
                         </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Phone:</label>
                              <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="{{$member->phone}}">

                            </div>
                         </div>
                     
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Youtube:</label>
                                <input type="text" name="youtube" id="youtube" class="form-control" placeholder="Yutube" value="{{$member->youtube}}">

                            </div>
                         </div>
                             <div class="col-md-6">
                              @if($member && isset($member->photo))
                                    <img src="{{asset('/storage/member/'.$member->photo)}}" alt="" width="120px">
                                 @endif
                             <div class="form-group">
                                <label>Photo:</label>
                              <input type="file" name="photo" id="photo" value="{{$member->name}}">
                               @if($member && isset($member->photo))
                                    <input type="hidden" name="oldphoto" value="{{$member->photo}}">
                                 @endif

                            </div>
                         </div>
                     
                         </div>

                           <div class="row">
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Facebook:</label>
                                <input type="text" name="facebook" id="facebook" class="form-control" placeholder="Facebook" value="{{$member->facebook}}">

                            </div>
                         </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Twiter:</label>
                              <input type="text" name="twiter" id="twiter" class="form-control" placeholder="Twiter" value="{{$member->twiter}}">

                            </div>
                         </div>
                     
                        </div>


                           <div class="row">
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Linedin:</label>
                                <input type="text" name="linkedin" id="linkedin" class="form-control" placeholder="Linkedin" value="{{$member->linkedin}}">

                            </div>
                         </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Google Plus:</label>
                              <input type="text" name="google_plus" id="google_plus" class="form-control" placeholder="Google Plus" value="{{$member->google_plus}}">

                            </div>
                         </div>
                     
                        </div>
                     
              
                     <div class="row">
                      

                      <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Details:</label>
                            <textarea rows="5" cols="5" class="form-control summernote" name="details" id="details" style="resize: none;">{{$member->details}}</textarea>
                        </div>
                        </div>

                        </div>
                 
                    <div class="text-right">
                    <button type="submit" class="btn btn-primary"  id="submit">Update Member<i class="icon-arrow-right14 position-right"></i></button>
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
  <script src="{{asset('backend/assets/js/member.js')}}"></script>
@endpush