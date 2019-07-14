<!DOCTYPE html>

<html lang="en">

<head>

	<title>YuPa Travel- Activities, Tours, Attractions and Accommodations</title>

	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--===============================================================================================-->

	<link rel="icon" href="{{asset('fontend/images/favicon.png')}}" type="image/x-icon" />

	<!--navigation bar===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="{{asset('fontend/vendor/bootstrap-3.4.1-dist/css/bootstrap.min.css')}}">

	<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="{{ asset('fontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

	<!--==============================================================================================-->

	<!--link rel="stylesheet" type="text/css" href="vendor/animate/animate.css"-->

	<!--main css===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="{{asset('fontend/css/main.css')}}">

    <link href="{{ asset('fontend/css/rate.css') }}" rel="stylesheet">
	@stack('css')

	<!--===============================================================================================-->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

	<!--toggle bar===============================================================================================-->

	<script src="{{asset('fontend/vendor/bootstrap-3.4.1-dist/js/bootstrap.min.js')}}"></script>

</head>

<body>

	<div class="container-fluid">
		<div class="row">
			<div id="content1">
				@include('fontend.partial.topnav')
                @yield('page-header')
			</div>
		</div>


   @section('content')
   @show
   @include('fontend.partial.footer')


	</div>

<!--===============================================================================================-->

	<script src="{{asset('fontend/vendor/jquery/jquery-3.2.1.min.js')}}"></script>

<!--===============================================================================================-->

	<script src="{{asset('fontend/vendor/select2/select2.min.js')}}"></script>

<!--===============================================================================================-->

	<script src="{{asset('fontend/vendor/tilt/tilt.jquery.min.js')}}"></script>

	<script src="{{ asset('fontend/js/rate.js') }}" defer></script>

	    <script>
         $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
	@stack('js')

<!--===============================================================================================-->



</body>

</html>