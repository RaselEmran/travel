@extends('admin.layouts.master')
@section('pageTitle') dashboard @endsection
@section('page-header')
  <div class="page-header page-header-default">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Dashbord</li>
        </ul>
    </div>
</div>
@endsection
@section('content')

<div class="row">

<div class="col-md-6">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h6 class="panel-title">Booking Hotel</h6>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="reload"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div>
		</div>

		<div class="panel-body">
			<span class="label label-info">{{$hotbook->count()}}</span>
		</div>
	</div>
</div>

<div class="col-md-6">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h6 class="panel-title">Booking Packege</h6>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="reload"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div>
		</div>

		<div class="panel-body">
			<span class="label label-primary">{{$bookpack->count()}}</span>
		</div>
	</div>
</div>
</div>
                
<div class="row">

<div class="col-md-6">
	<div class="panel panel-danger">
		<div class="panel-heading">
			<h6 class="panel-title">Total Packege</h6>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="reload"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div>
		</div>

		<div class="panel-body">
			<span class="label label-danger">{{$pack->count()}}</span>
		</div>
	</div>
</div>

<div class="col-md-6">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h6 class="panel-title">Total Hotel</h6>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="reload"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div>
		</div>

		<div class="panel-body">
			<span class="label label-success">{{$hotel->count()}}</span>
		</div>
	</div>
</div>
</div>

<div class="row">

<div class="col-md-6">
	<div class="panel panel-warning">
		<div class="panel-heading">
			<h6 class="panel-title">Total Travelar</h6>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="reload"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div>
		</div>

		<div class="panel-body">
			<span class="label label-warning">{{$user->count()}}</span>
		</div>
	</div>
</div>

<div class="col-md-6">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h6 class="panel-title">Total Destination</h6>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="reload"></a></li>
            		<li><a data-action="close"></a></li>
            	</ul>
        	</div>
		</div>

		<div class="panel-body">
			<span class="label label-info">{{$destination->count()}}</span>
		</div>
	</div>
</div>
</div>
@endsection