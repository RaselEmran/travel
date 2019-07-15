@extends('admin.layouts.master')
@section('pageTitle') News Content @endsection
@section('page-header')
<div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">News</li>
        </ul>
    </div>
</div>
@endsection
@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Category
        <a href="{{ route('admin.news.blog') }}" class="btn btn-info"><i class=" icon-file-eye mr-2"></i>View</a>
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
        <form role="form" action="{{ route('admin.news.blog.upadte') }}" method="post" enctype="multipart/form-data" id="news_editForm">
        <input type="hidden" name="id" value="{{$news->id}}">
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label>News Title:</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="News Title" value="{{$news->title}}">
                    </div>
                </div>

                   <div class="col-md-12">
                    <div class="form-group">
                        <label>Short Content:</label>
                        <textarea rows="5" cols="5" class="form-control" name="short_content" id="short_content" placeholder="Short Content" style="resize: none;">{{$news->short_content}}</textarea>
                    </div>
                </div>
                </div>
                <div class="row">
                       <div>
                         @if($news && isset($news->banner))
                            <img src="{{asset('/storage/news/banner/'.$news->banner)}}" alt="" width="120px">
                         @endif
                    </div>
                            
                 <div class="col-md-6">
                    <div class="form-group">
                        <label>Banner:</label>
                        <input type="file" name="banner">

                         @if($news && isset($news->banner))
                         <input type="hidden" name="oldbanner" value="{{$news->banner}}">
                        @endif
                    </div>
                </div>

                 <div class="col-md-6">
                  <div>
                         @if($news && isset($news->photo))
                            <img src="{{asset('/storage/news/photo/'.$news->photo)}}" alt="" width="120px">
                         @endif
                    </div>
                    <div class="form-group">
                        <label>Photo:</label>
                        <input type="file" name="photo">
                         @if($news && isset($news->photo))
                         <input type="hidden" name="oldphoto" value="{{$news->photo}}">
                        @endif
                    </div>
                </div>
                </div>

              <div class="row">
                 <div class="col-md-4">
                    <div class="form-group">
                        <label>Category:</label>
                        <select name="category_id" id="category_id" class="form-control select">
                            @foreach ($categories as $category)
                                <option {{$news->category_id==$category->id?"selected":''}} value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                 <div class="col-md-4">
                    <div class="form-group">
                        <label>Comment:</label>
                        <select name="comment" id="comment" class="form-control select">
                            <option {{$news->comment ==1?"selected":''}} value="1">On</option>
                            <option {{$news->comment ==0?"selected":''}} value="0">Off</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Date:</label>
                      <input type="date" name="date" class="form-control" value="{{$news->date}}">
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                      <label>News Content:</label>
                        <textarea rows="5" cols="5" class="form-control summernote" name="news_content" id="news_content" style="resize: none;">{{$news->news_content}}</textarea>
                    </div>
                </div>

                    <div class="row">
                         <h4>SEO Information</h4>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Meta Title:</label>
                                <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Meta Title" value="{{$news->meta_title}}">

                            </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                <label>Meta Keywords:</label>
                                <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" placeholder="Keywords" value="{{$news->meta_keywords}}">

                               </div>
                             </div> 
                       </div>
                      <div class="row">
                         <div class="col-md-12">
                            <div class="form-group">
                            <label>Meta Description:</label>
                            <textarea rows="5" cols="5" class="form-control " name="meta_description" id="meta_description" style="resize: none;" placeholder="Meta Description">{{$news->mets_description}}</textarea>
                        </div>
                         </div>
                     </div>


            <div class="text-right">
                <button type="submit" class="btn btn-primary"  id="submit">Update News<i class="icon-arrow-right14 position-right"></i></button>
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

<script src="{{asset('backend/assets/js/news.js')}}"></script>
@endpush