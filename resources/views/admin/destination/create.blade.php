@extends('admin.layouts.master')
@section('pageTitle') Destination @endsection
@section('page-header')
   <div class="page-header page-header-default">
                

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                            <li class="active">destination Create</li>
                        </ul>

                    
                    </div>
                </div>
@endsection
@section('content')
     <div class="panel panel-flat">
              <div class="panel-heading">
                    <h5 class="panel-title">Destination 
                    <a href="{{ route('admin.destination.create') }}" class="btn btn-info"><i class="icon-stack-plus mr-2"></i>View</a>
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
                 <form role="form" action="{{ route('admin.destination.store') }}" method="post" enctype="multipart/form-data" id="addForm">
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                <label>Destination Name:</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Destination Name">

                            </div>
                         </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Heading:</label>
                                <input type="text" name="heading" id="heading" class="form-control" placeholder="Heading">

                            </div>
                         </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Package Heading:</label>
                                <input type="text" name="pkg_heading" id="pkg_heading" class="form-control" placeholder="Package Heading">

                            </div>
                         </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Package SubHeading:</label>
                                <input type="text" name="pkg_subheading" id="pkg_subheading" class="form-control" placeholder="Package SubHeading">

                            </div>
                         </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Detail Heading:</label>
                                <input type="text" name="pkg_detailsheading" id="pkg_detailsheading" class="form-control" placeholder="Detail Heading">

                            </div>
                         </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Detail SubHeading:</label>
                                <input type="text" name="pkg_details_subheading" id="pkg_details_subheading" class="form-control" placeholder="Detail SubHeading">

                            </div>
                         </div>
                         </div>
                          <div class="row">
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Photo *</label>
                                <input type="file" name="photo" id="photo" >

                            </div>
                         </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Banner *</label>
                                <input type="file" name="banner" id="banner" >

                            </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Short Description:</label>
                            <textarea rows="5" cols="5" class="form-control" name="short_description" id="short_description" placeholder="Short Description" style="resize: none;"></textarea>
                        </div>
                         </div>

                      <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Introduction:</label>
                            <textarea rows="5" cols="5" class="form-control summernote" name="introduction" id="introduction" style="resize: none;"></textarea>
                        </div>
                        </div>

                        <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Experience:</label>
                            <textarea rows="5" cols="5" class="form-control summernote" name="experience" id="experience"  style="resize: none;"></textarea>
                        </div>
                        </div>

                       <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Hotel:</label>
                            <textarea rows="5" cols="5" class="form-control summernote" name="hotel" id="hotel"  style="resize: none;"></textarea>
                        </div>
                        </div>

                        <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Transportation:</label>
                            <textarea rows="5" cols="5" class="form-control summernote" name="transportation" id="transportation" style="resize: none;"></textarea>
                        </div>
                        </div>

                       <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Culture:</label>
                            <textarea rows="5" cols="5" class="form-control summernote" name="culture" id="culture"  style="resize: none;"></textarea>
                        </div>
                        </div>
                     </div>
                     <div class="row">
                         <h4>SEO Information</h4>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Meta Title:</label>
                                <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Meta Title">

                            </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                <label>Meta Keywords:</label>
                                <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" placehokeywordsKeywords">

                               </div>
                             </div> 
                       </div>
                      <div class="row">
                         <div class="col-md-12">
                            <div class="form-group">
                            <label>Meta Description:</label>
                            <textarea rows="5" cols="5" class="form-control " name="meta_description" id="meta_description" style="resize: none;"></textarea>
                        </div>
                         </div>
                     </div>
                    <div class="text-right">
                    <button type="submit" class="btn btn-primary"  id="submit">Create Destination<i class="icon-arrow-right14 position-right"></i></button>
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