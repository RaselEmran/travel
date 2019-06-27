<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>@yield('pageTitle')</title>
      <!-- Favicon png -->
    <link rel="shortcut icon" href="@if(isset($appSettings['bussiness_settings']) & isset($appSettings['bussiness_settings']['favicon'])){{asset('storage/logo/'.$appSettings['bussiness_settings']['favicon'])}} @else{{ asset('image/favicon.png') }}@endif">
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/global_assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/css/core.min.css')}}" rel="stylesheet" type="text/css">
     <link href="{{asset('backend/assets/css/calulator.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
      @stack('css')
    <!-- /global stylesheets -->


    <!-- /theme JS files -->

</head>

<body>

@include('admin.partail.navbar')


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
        @include('admin.partail.sidebar')
            <!-- /main sidebar -->


            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
             @yield('page-header')
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">
                @section('content')
                @show
                </div>
                <!-- /content area -->
                 @include('admin.partail.footer')
            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->
    <!-- Core JS files -->
    <script src="{{asset('backend/global_assets/js/plugins/loaders/pace.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/core/libraries/jquery.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/core/libraries/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{asset('backend/global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script src="{{asset('backend/global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{asset('backend/global_assets/js/plugins/notifications/noty.min.js')}}"></script>

    <script src="{{asset('backend/assets/js/app.js')}}"></script>
    <script src="{{asset('backend/assets/js/accounting.js')}}"></script>
    <script src="{{asset('backend/assets/js/common.js')}}"></script>
    {{-- <script src="{{asset('backend/global_assets/js/demo_pages/dashboard.js')}}"></script> --}}
    <script>
         $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
    <script src="{{asset('js/logout.js')}}"></script>
    @stack('js')
</body>
</html>
