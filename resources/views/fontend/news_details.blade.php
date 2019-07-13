@extends('fontend.layouts.master')
@section('pageTitle') news-details @endsection
@push('css')

@endpush
@section('page-header')
		<img src="{{asset('/storage/news/banner/'.$details->banner)}}" class="bg1" height="400px" />

				<div class="centered3 titleimg9">

					<h2>{{$details->title}}</h2>				

				</div>
@endsection

@section('content')
<div class="row">
<div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading">
      <img src="{{asset('/storage/news/photo/'.$details->photo)}}" width="100%" height="250px" />
    </div>
    <div class="panel-body">
      <h4>{{$details->short_content}}</h4>
      {!!$details->news_content!!}
      <p class="label label-success">{{$details->category->name}}</p>
    </div>
  </div>
 </div>
</div>

@endsection

@push('js')

@endpush