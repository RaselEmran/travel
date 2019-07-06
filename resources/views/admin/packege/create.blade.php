@extends('admin.layouts.master')
@section('pageTitle') Destination @endsection
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

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                            <li class="active">Dashboard</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-gear position-left"></i>
                                    Settings
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                                    <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                                    <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
@endsection
@section('content')
     <div class="panel panel-flat">
              <div class="panel-heading">
                    <h5 class="panel-title">Packege 
                    <a href="{{ route('admin.packege') }}" class="btn btn-info"><i class="icon-stack-plus mr-2"></i>View</a>
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
                 <form role="form" action="{{ route('admin.packege.store') }}" method="post" enctype="multipart/form-data" id="addForm">
                     <div class="row">
                         <div class="col-md-6">
                             <div class="form-group">
                                <label>Packege Name:</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Packege Name">

                            </div>
                         </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Duration(Hours):</label>
                                <input type="text" name="duration" id="duration" class="form-control" placeholder="Duration">

                            </div>
                         </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Per Persion Price:</label>
                                <input type="text" name="per_persion_price" id="per_persion_price" class="form-control" placeholder="Per Persion Price">

                            </div>
                         </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Destination:</label>
                               <select name="destination_id" id="destination_id" class="form-control select">
                                   @foreach ($destination as $element)
                                    <option value="{{$element->id}}">{{$element->name}}</option>
                                   @endforeach
                               </select>

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
                      <legend class="text-bold">Packege Option:
                      <button type="button" class="btn btn-primary" id="add_variation" data-action="add">+</button>
                      </legend>
                      <div class="col-md-12">
                          <table class="table table-bordered">
                             <thead>
                                 <tr>
                                     <td>
                                        <input type="text" name="option_name" id="option_ name" class="form-control" placeholder="Option Name">
                                       
                                     </td>
                                      <td>
                                        <input type="date" name="start_date" id="start_date" class="form-control" placeholder="Strat Date">  
                                     </td>
                                      <td>
                                        <input type="date" name="end_date" id="end_date" class="form-control" placeholder="End Date">  
                                     </td>
                                      <td>
                                        <input type="text" name="option_price" id="option_price" class="form-control" placeholder="Option Price">  
                                     </td>
                                 </tr>
                                 <tr>
                                     <td colspan="4">
                                        <legend> Packege Itinary:
                                             <button type="button" class="btn btn-success btn-xs add_variation_value_row">+</button>
                                        </legend> 
                                     </td>
                                 </tr>
                             </thead> 
                          </table>
                      </div>
                     </div>
                     <div class="row">
                         <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Short Description:</label>
                            <textarea rows="5" cols="5" class="form-control" name="description" id="description" placeholder="Short Description" style="resize: none;"></textarea>
                        </div>
                         </div>

                      <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Inclusive Of:</label>
                            <textarea rows="5" cols="5" class="form-control summernote" name="inclusive_of" id="inclusive_of" style="resize: none;"></textarea>
                        </div>
                        </div>

                        <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Not Inclusive Of:</label>
                            <textarea rows="5" cols="5" class="form-control summernote" name="not_inclusive_of" id="not_inclusive_of"  style="resize: none;"></textarea>
                        </div>
                        </div>

                       <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Booking Info:</label>
                            <textarea rows="5" cols="5" class="form-control summernote" name="booking_info" id="booking_info"  style="resize: none;"></textarea>
                        </div>
                        </div>

                        <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>location(IFrame):</label>
                            <textarea rows="5" cols="5" class="form-control " name="location" id="location" style="resize: none;"></textarea>
                        </div>
                        </div>

                       <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Policy:</label>
                            <textarea rows="5" cols="5" class="form-control summernote" name="policy" id="policy"  style="resize: none;"></textarea>
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
  <script src="{{asset('backend/assets/js/packege.js')}}"></script>
@endpush