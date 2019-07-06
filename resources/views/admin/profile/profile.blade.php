@extends('admin.layouts.master')
@section('pageTitle') profile @endsection
@section('page-header')
   <div class="page-header page-header-default">

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                            <li class="active">Dashboard</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-gear position-left"></i>
                                    Settings
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                                    <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                                    <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
@endsection
@section('content')
     <div class="panel panel-flat">
              <div class="panel-heading">
                    <h5 class="panel-title">Admin Profile
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
                <form action="">
                  <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                            <label>Email Address:</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email Address" value="{{$admin->email}}" readonly>

                    </div>
                  </div>

                    <div class="col-md-12">
                    <div class="form-group">
                            <label>User Name:</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="User Name" value="{{$admin->name}}">

                    </div>
                  </div>
              </div>
             </form>
          </div>
    </div>
                

@endsection