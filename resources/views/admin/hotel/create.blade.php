@extends('admin.layouts.master')
@section('pageTitle') Hotel @endsection
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Hotel</li>
        </ul>
    </div>
</div>
@endsection
@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Hotel
        <a href="{{ route('admin.hotel.create') }}" class="btn btn-info"><i class="icon-stack-plus mr-2"></i>View</a>
        </h5>
    </div>
    <div class="panel-body">
        <form role="form" action="{{ route('admin.hotel.store') }}" method="post" enctype="multipart/form-data" id="addForm">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Hotel Name: *</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Hotel Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Entire Place: *</label>
                        <input type="text" name="entire_place" id="entire_place" class="form-control" placeholder="Entire Place">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Price: * (Per Night)</label>
                        <input type="text" name="price" id="price" class="form-control" placeholder="Price">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status: *</label>
                        <select name="status" id="status" class="form-control select">
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <h4>Amenity</h4>
                @forelse($amenities as $amenity)
                <div class="col-md-6">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="amenity[]" value="{{ $amenity->id }}">
                            {{ $amenity->name }}
                        </label>
                    </div>
                </div>
                @empty
                <h3>You Don't Have any amenity. Please add some <a href="{{ route('admin.amenity.create') }}">Amenity</a> for Hotel. </h3>
                @endforelse
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
                        <label>Room Details:</label>
                        <textarea rows="5" cols="5" class="form-control summernote" name="room_details" id="room_details" placeholder="Room Details" style="resize: none;"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Allow / Not Allow:</label>
                        <textarea rows="5" cols="5" class="form-control summernote" name="allow" id="allow" style="resize: none;"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Cancelation Policy:</label>
                        <textarea rows="5" cols="5" class="form-control summernote" name="policy" id="policy"  style="resize: none;"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Location(IFrame):</label>
                        <textarea rows="5" cols="5" class="form-control " name="map" id="map" style="resize: none;"></textarea>
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
                <button type="submit" class="btn btn-primary"  id="submit">Create Hotel<i class="icon-arrow-right14 position-right"></i></button>
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
<script src="{{asset('backend/assets/js/hotel.js')}}"></script>
@endpush