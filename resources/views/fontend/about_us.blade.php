@extends('fontend.layouts.master')
@section('pageTitle') about-us @endsection
@push('css')

@endpush
@section('page-header')
		<img src="{{asset('/storage/pages/about/'.$aboutinfo->about_banner)}}" class="bg1" height="400px" />

				<div class="centered3 titleimg9">

					<h2>{{$aboutinfo->abt_heading}}</h2>				

				</div>
@endsection

@section('content')
<div class="row">
<div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-body">
     {!! $aboutinfo->abt_content !!}
    </div>
  </div>
 </div>
</div>

@endsection

@push('js')

@endpush