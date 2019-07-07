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
        <a href="{{ route('admin.hotel') }}" class="btn btn-info"><i class="icon-stack-plus mr-2"></i>View</a>
        </h5>
    </div>
    <div class="panel-body">
        <form role="form" action="{{ route('admin.hotel.update') }}" method="post" enctype="multipart/form-data" id="addForm">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Hotel Name: *</label>
                        <input type="hidden" name="id" value="{{ $hotel->id }}">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Hotel Name" value="{{ $hotel->name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Entire Place: *</label>
                        <input type="text" name="entire_place" id="entire_place" class="form-control" placeholder="Entire Place" value="{{ $hotel->entire_place }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Price: *</label>
                        <input type="text" name="price" id="price" class="form-control" placeholder="Price" value="{{ $hotel->price }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status: *</label>
                        <select name="status" id="status" class="form-control select">
                            <option value="1" {{ $hotel->status == 1 ? 'selected': '' }}>Active</option>
                            <option value="0" {{ $hotel->status != 1 ? 'selected' : '' }}>InActive</option>
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
                            <input type="checkbox" name="amenity[]" value="{{ $amenity->id }}"
                                @foreach($hotel->amenities as $hotel_amenity)
                                @if ($hotel_amenity->hotel_id == $amenity->id)
                                checked
                                @endif
                                @endforeach
                            >
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
                        <label>Photo </label>
                        <input type="file" name="photo" id="photo" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Banner </label>
                        <input type="file" name="banner" id="banner" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Room Details:</label>
                        <textarea rows="5" cols="5" class="form-control summernote" name="room_details" id="room_details" placeholder="Room Details" style="resize: none;">{{ $hotel->room_details }}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Allow / Not Allow:</label>
                        <textarea rows="5" cols="5" class="form-control summernote" name="allow" id="allow" style="resize: none;">{{ $hotel->allow }}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Cancelation Policy:</label>
                        <textarea rows="5" cols="5" class="form-control summernote" name="policy" id="policy"  style="resize: none;">{{ $hotel->policy }} </textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Location(IFrame):</label>
                        <textarea rows="5" cols="5" class="form-control " name="map" id="map" style="resize: none;">{{ $hotel->map }} </textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <h4>SEO Information</h4>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Meta Title:</label>
                        <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Meta Title" value="{{ $hotel->meta_title }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Meta Keywords:</label>
                        <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" placehoder="Meta Keywords" value="{{ $hotel->meta_keywords }}" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Meta Description:</label>
                        <textarea rows="5" cols="5" class="form-control " name="meta_description" id="meta_description" style="resize: none;">{{ $hotel->meta_description }} </textarea>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary"  id="submit">Update Hotel<i class="icon-arrow-right14 position-right"></i></button>
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
<script src="{{asset('backend/assets/js/hotel.js')}}"></script>
@endpush