@extends('admin.layouts.master')
@section('pageTitle') Destination @endsection
@section('page-header')
   <div class="page-header page-header-default">
                

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                            <li class="active">Destination Edit</li>
                        </ul>

            
                    </div>
                </div>
@endsection
@section('content')
     <div class="panel panel-flat">
              <div class="panel-heading">
                    <h5 class="panel-title">Destination Upadte
                    <a href="{{ route('admin.destination') }}" class="btn btn-info"><i class="icon-eye8 mr-2"></i>View</a>
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
                 <form role="form" action="{{ route('admin.destination.update') }}" method="post" enctype="multipart/form-data" id="addForm">
                     <div class="row">
                         <div class="col-md-6">
                         <input type="hidden" name="id" value="{{$destination->id}}">
                             <div class="form-group">
                                <label>Destination Name:</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Destination Name" value="{{$destination->name}}">

                            </div>
                         </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Heading:</label>
                                <input type="text" name="heading" id="heading" class="form-control" placeholder="Heading" value="{{$destination->heading}}" >

                            </div>
                         </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Package Heading:</label>
                                <input type="text" name="pkg_heading" id="pkg_heading" class="form-control" placeholder="Package Heading" value="{{$destination->pkg_heading}}">

                            </div>
                         </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Package SubHeading:</label>
                                <input type="text" name="pkg_subheading" id="pkg_subheading" class="form-control" placeholder="Package SubHeading" value="{{$destination->pkg_subheading}}">

                            </div>
                         </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Detail Heading:</label>
                                <input type="text" name="pkg_detailsheading" id="pkg_detailsheading" class="form-control" placeholder="Detail Heading" value="{{$destination->pkg_detailsheading}}">

                            </div>
                         </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Detail SubHeading:</label>
                                <input type="text" name="pkg_details_subheading" id="pkg_details_subheading" class="form-control" placeholder="Detail SubHeading" value="{{$destination->pkg_details_subheading}}">

                            </div>
                         </div>
                         </div>
                          <div class="row">
                             <div class="col-md-6">
                            <div>
                             @if($destination && isset($destination->photo))
                                <img src="{{asset('/storage/destination/photo/'.$destination->photo)}}" alt="" width="120px">
                             @endif
                            </div>
                             <div class="form-group">
                                <label>Photo *</label>
                                <input type="file" name="photo" id="photo" >
                                  @if($destination && isset($destination->photo))
                                    <input type="hidden" name="oldphoto" value="{{$destination->photo}}">
                                 @endif

                            </div>
                         </div>
                             <div class="col-md-6">
                             <div class="form-group">
                            <div>
                            <div>
                             @if($destination && isset($destination->banner))
                                <img src="{{asset('/storage/destination/banner/'.$destination->banner)}}" alt="" width="120px">
                             @endif
                            </div>
                            </div>
                                <label>Banner *</label>
                                <input type="file" name="banner" id="banner" >
                                 @if($destination && isset($destination->banner))
                                    <input type="hidden" name="oldbanner" value="{{$destination->banner}}">
                                 @endif

                            </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Short Description:</label>
                            <textarea rows="5" cols="5" class="form-control" name="short_description" id="short_description" placeholder="Short Description" style="resize: none;">{{$destination->short_description}}</textarea>
                        </div>
                         </div>

                      <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Introduction:</label>
                            <textarea rows="5" cols="5" class="form-control summernote" name="introduction" id="introduction" style="resize: none;">{!!$destination->introduction!!}</textarea>
                        </div>
                        </div>

                        <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Experience:</label>
                            <textarea rows="5" cols="5" class="form-control summernote" name="experience" id="experience"  style="resize: none;">{!!$destination->experience!!}</textarea>
                        </div>
                        </div>

                       <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Hotel:</label>
                            <textarea rows="5" cols="5" class="form-control summernote" name="hotel" id="hotel"  style="resize: none;">{!!$destination->hotel!!}</textarea>
                        </div>
                        </div>

                        <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Transportation:</label>
                            <textarea rows="5" cols="5" class="form-control summernote" name="transportation" id="transportation" style="resize: none;">{!!$destination->transportation!!}</textarea>
                        </div>
                        </div>

                       <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Culture:</label>
                            <textarea rows="5" cols="5" class="form-control summernote" name="culture" id="culture"  style="resize: none;">{!!$destination->culture!!}</textarea>
                        </div>
                        </div>
                     </div>
                     <div class="row">
                         <h4>SEO Information</h4>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Meta Title:</label>
                                <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Meta Title" value="{{$destination->meta_title}}">

                            </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                <label>Meta Keywords:</label>
                                <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" placehokeywordsKeywords" value="{{$destination->meta_keywords}}">

                               </div>
                             </div> 
                       </div>
                      <div class="row">
                         <div class="col-md-12">
                            <div class="form-group">
                            <label>Meta Description:</label>
                            <textarea rows="5" cols="5" class="form-control " name="meta_description" id="meta_description" style="resize: none;">{{$destination->meta_description}}</textarea>
                        </div>
                         </div>
                     </div>
                    <div class="text-right">
                    <button type="submit" class="btn btn-primary"  id="submit">Upadte Destination<i class="icon-arrow-right14 position-right"></i></button>
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
  <script src="{{asset('backend/assets/js/destination.js')}}"></script>
@endpush