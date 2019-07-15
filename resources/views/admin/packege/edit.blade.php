@extends('admin.layouts.master')
@section('pageTitle') Packege @endsection
@section('page-header')
  <div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Packege</li>
        </ul>
    </div>
</div>
@endsection
@section('content')
     <div class="panel panel-flat">
              <div class="panel-heading">
                    <h5 class="panel-title">Packege 
                    <a href="{{ route('admin.packege.store') }}" class="btn btn-info"><i class="icon-stack-plus mr-2"></i>View</a>
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
                 <form role="form" action="{{ route('admin.packege.update',$packege->id) }}" method="post" enctype="multipart/form-data" id="editForm">
                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group">
                                <label>Packege Name:</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Packege Name" value="{{$packege->name}}">

                            </div>
                         </div>
                        </div>
                        <div class="row">
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Duration(Hours):</label>
                                <input type="text" name="duration" id="duration" class="form-control" placeholder="Duration" value="{{$packege->duration}}">

                            </div>
                         </div>
                              <div class="col-md-6">
                             <div class="form-group">
                                <label>Destination:</label>
                               <select name="destination_id" id="destination_id" class="form-control select">
                                   @foreach ($destination as $element)
                                    <option {{$packege->destination_id ==$element->id?'selected':''}} value="{{$element->id}}">{{$element->name}}</option>
                                   @endforeach
                               </select>

                            </div>
                         </div>
                         </div>

                          <div class="row">
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>One Way Price:</label>
                                <input type="text" name="one_way_price" id="one_way_price" class="form-control" placeholder="One Way Price" value="{{$packege->one_way_price}}">

                            </div>
                          </div>
                             <div class="col-md-6">
                             <div class="form-group">
                                <label>Two Way Price:</label>
                              <input type="text" name="two_way_price" id="two_way_price" class="form-control" placeholder="Two Way Price" value="{{$packege->two_way_price}}">

                            </div>
                         </div>
                     
                         </div>
                          <div class="row">
                             <div class="col-md-6">
                              <div>
                                 @if($packege && isset($packege->photo))
                                    <img src="{{asset('/storage/packege/photo/'.$packege->photo)}}" alt="" width="120px">
                                 @endif
                            </div>
                             <div class="form-group">
                                <label>Photo *</label>
                                <input type="file" name="photo" id="photo" >

                                 @if($packege && isset($packege->photo))
                                    <input type="hidden" name="oldphoto" value="{{$packege->photo}}">
                                 @endif

                            </div>
                         </div>
                             <div class="col-md-6">
                             @if($packege && isset($packege->banner))
                                <img src="{{asset('/storage/packege/banner/'.$packege->banner)}}" alt="" width="120px">
                             @endif
                             <div class="form-group">
                                <label>Banner *</label>
                                <input type="file" name="banner" id="banner" >
                                 @if($packege && isset($packege->banner))
                                    <input type="hidden" name="oldbanner" value="{{$packege->banner}}">
                                 @endif

                            </div>
                         </div>
                     </div>

                     <div class="row">
                       <legend class="text-bold">One Way Packege:
                       <button type="button" class="btn btn-primary" id="add_option1" data-action="add">Add Itinary(+)</button>
                      </legend>
                       <table class="table table-bordered">
                           <tbody id="one_way_body">
                        @if (count($packege->oneway)>0)
                           @foreach ($packege->oneway as $one)                         
                               <tr>
                                     <td>
                                     <input type="time" name="time1[]" id="time1" class="form-control" placeholder="Itinary Time" value="{{$one->time1}}">  
                                     </td>
                                     <td >
                                          <input type="text" name="itinary_name1[]" id="itinary_name1" class="form-control" placeholder="Itinary Name" value="{{$one->itinary_name1}}">  
                                     </td>
                                     <td>
                                         <button type="button" class="btn btn-danger btn-xs " >-</button>
                                     </td> 
                               </tr>

                             @endforeach
                             @endif
                           </tbody>
                       </table>
                      
                     </div>

                      <div class="row">
                       <legend class="text-bold">Two Way Packege:
                       <button type="button" class="btn btn-primary" id="add_option2" data-action="add">Add Itinary(+)</button>
                      </legend>
                       <table class="table table-bordered">
                           <tbody id="two_way_body">
                           @if (count($packege->twoway)>0)
                           
                           @foreach ($packege->twoway as $two)
                                <tr>
                                   <td>
                                     <input type="time" name="time2[]" id="time2" class="form-control" placeholder="Itinary Time" value="{{$two->time2}}">  
                                     </td>
                                     <td >
                                          <input type="text" name="itinary_name2[]" id="itinary_name2" class="form-control" placeholder="Itinary Name" value="{{$two->itinary_name2}}">  
                                     </td>
                                     <td>
                                         <button type="button" class="btn btn-danger btn-xs" data-id="0">-</button>
                                     </td> 
                                </tr>
                                 @endforeach
                                 @endif
                           </tbody>
                       </table>
                      
                     </div>
                     <div class="row">
                         <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Short Description:</label>
                            <textarea rows="5" cols="5" class="form-control" name="description" id="description" placeholder="Short Description" style="resize: none;">{{$packege->description}}</textarea>
                        </div>
                         </div>

                      <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Inclusive Of:</label>
                            <textarea rows="5" cols="5" class="form-control summernote" name="inclusive_of" id="inclusive_of" style="resize: none;">{{$packege->inclusive_of}}</textarea>
                        </div>
                        </div>

                        <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Not Inclusive Of:</label>
                            <textarea rows="5" cols="5" class="form-control summernote" name="not_inclusive_of" id="not_inclusive_of"  style="resize: none;">{{$packege->not_inclusive_of}}</textarea>
                        </div>
                        </div>

                       <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Booking Info:</label>
                            <textarea rows="5" cols="5" class="form-control summernote" name="booking_info" id="booking_info"  style="resize: none;">{{$packege->booking_info}}</textarea>
                        </div>
                        </div>

                        <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>location(IFrame):</label>
                            <textarea rows="5" cols="5" class="form-control " name="location" id="location" style="resize: none;">{{$packege->location}}</textarea>
                        </div>
                        </div>

                       <div class="col-md-12">
                                     
                        <div class="form-group">
                            <label>Policy:</label>
                            <textarea rows="5" cols="5" class="form-control summernote" name="policy" id="policy"  style="resize: none;">{{$packege->policy}}</textarea>
                        </div>
                        </div>
                     </div>
                     <div class="row">
                         <h4>SEO Information</h4>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Meta Title:</label>
                                <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Meta Title" value="{{$packege->meta_title}}">

                            </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                <label>Meta Keywords:</label>
                                <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" value="{{$packege->meta_keywords}}">

                               </div>
                             </div> 
                       </div>
                      <div class="row">
                         <div class="col-md-12">
                            <div class="form-group">
                            <label>Meta Description:</label>
                            <textarea rows="5" cols="5" class="form-control " name="meta_description" id="meta_description" style="resize: none;">{{$packege->meta_description}}</textarea>
                        </div>
                         </div>
                     </div>
                    <div class="text-right">
                    <button type="submit" class="btn btn-primary"  id="submit">Update Packege<i class="icon-arrow-right14 position-right"></i></button>
                    <button type="button" class="btn btn-link" id="submiting" style="display: none;">Processing <img src="{{ asset('ajaxloader.gif') }}" width="80px"></button>
                </div>
                 </form>     
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