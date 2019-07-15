@extends('admin.layouts.master')
@section('pageTitle') travelkit @endsection
@section('page-header')
  <div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Travel Kit</li>
        </ul>
    </div>
</div>
@endsection
@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">TravelKit
        <a href="{{ route('admin.travelkit') }}" class="btn btn-info"><i class=" icon-file-eye mr-2"></i>View</a>
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
        <form role="form" action="{{ route('admin.travelkit.update') }}" method="post" enctype="multipart/form-data" id="editForm">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                    <input type="hidden" name="id" value="{{$kit->id}}">
                        <label>Kit Type:</label>
                                 <select name="type" id="type" class="form-control select">
                                 <option {{$kit->type=="Phone Accessories"?'selected':''}} value="Phone Accessories">Phone Accessories</option>
                                 <option {{$kit->type=="Medical"?'selected':''}} value="Medical">Medical</option>
                                 <option {{$kit->type=="Toiletries"?'selected':''}} value="Toiletries">Toiletries</option>
                                 <option {{$kit->type=="Others"?'selected':''}} value="Others">Others</option>
                                
                               </select>
                    </div>
                </div>  
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Kit Name:</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Kit Name" value="{{$kit->name}}">
                    </div>
                </div>

                 <div class="col-md-12">
                    <div class="form-group">
                        <label>Kit Quantity:</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantity" value="{{$kit->quantity}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Kit Price:</label>
                        <input type="number" name="price" id="price" class="form-control" placeholder="Kit Price" value="{{$kit->price}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Status:</label>
                        <select name="status" id="status" class="form-control select">
                            <option {{$kit->status=='1'?"selected":''}} value="1">Active</option>
                            <option {{$kit->status=='0'?"selected":''}} value="0">InActive</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary"  id="submit">Update Kit<i class="icon-arrow-right14 position-right"></i></button>
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
<script src="{{asset('backend/assets/js/travelkit.js')}}"></script>
@endpush