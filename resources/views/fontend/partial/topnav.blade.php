<!--<nav class="container-fluid">-->

<nav>

	<div class="navbar" style="padding: .5rem 1rem;">

		<div class="navbar-header">

			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">

			<!-- <span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span> -->

			<img id="sidemenu" src="{{asset('fontend/images/menu.png')}}">                       

			</button>



			<a class="navbar-brand" href=""><img src="{{asset('fontend/images/yupa-logo-white.png')}}" style="width: auto; height: 55px; margin-top: -10px;"></a>

		</div>



		<div class="collapse navbar-collapse" id="myNavbar">

		  <ul class="nav navbar-nav navbar-right">
		  <li><a href="{{ route('home.index') }}">Home</a></li>
			@if (Auth::guest())
			<li><a href="{{ route('login') }}">Login</a></li>

			<li><a href="{{ route('sign-up-option') }}" class="item-white">Sign Up</a></li>
			@else
			<li><a href="{{ route('dashboard') }}" class="item-white">Dashboard</a></li>
			@endif

			<li><a href="">MYR</a></li>

			<li><a href="" class="item-white">Help</a></li>

		  </ul>

		</div>

	</div>

</nav>