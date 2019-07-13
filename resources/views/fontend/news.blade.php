@extends('fontend.layouts.master')
@section('pageTitle') News @endsection
@push('css')

@endpush
@section('page-header')
		<img src="{{asset('fontend/images/bg6.jpg')}}" class="bg1"/>

				<div class="centered3 titleimg9">

					<h2>New Blog</h2>				

				</div>
@endsection

@section('content')
<div class="row">
@foreach ($news as $element)
<div class="col-md-12">
  	<div class="panel panel-default">
    <div class="panel-heading">
    	<img src="{{asset('/storage/news/banner/'.$element->banner)}}" width="100%" height="250px" />
    </div>
    <div class="panel-body">
    	<a href="{{ route('news-details',['slug'=>$element->slug,'id'=>$element->id]) }}">{{$element->title}}</a>
    	<p class="label label-success">{{$element->category->name}}</p>
    </div>
  </div>
 </div>
@endforeach
</div>

@endsection

@push('js')

@endpush