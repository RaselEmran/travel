@extends('admin.layouts.master')
@section('pageTitle') category @endsection
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ul>
    </div>
</div>
@endsection
@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Category Update
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
        <form role="form" action="{{ route('admin.news.category.update') }}" method="post" enctype="multipart/form-data" id="cat_editForm">
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                    <input type="hidden" name="id" value="{{$category->id}}">
                        <label>Category Name:</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Category Name" value="{{$category->name}}">
                    </div>
                </div>

                 <div class="col-md-12">
                        <div>
                         @if($category && isset($category->banner))
                            <img src="{{asset('/storage/news/category/'.$category->banner)}}" alt="" width="120px">
                         @endif
                        </div>

                    <div class="form-group">
                        <label>Banner:</label>
                        <input type="file" name="banner">
                           @if($category && isset($category->banner))
                             <input type="hidden" name="oldbanner" value="{{$category->banner}}">
                         @endif
                    </div>
                </div>


            <div class="text-right">
                <button type="submit" class="btn btn-primary"  id="submit">Update Category<i class="icon-arrow-right14 position-right"></i></button>
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

<script src="{{asset('backend/assets/js/news.js')}}"></script>
@endpush