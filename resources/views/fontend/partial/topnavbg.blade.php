<!--<nav class="container-fluid">-->

<nav class="bg-white-nav">

  <div class="navbar minus-bottom" style="padding: .5rem 1rem;">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <!-- <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> -->
              <img id="sidemenu" src="{{asset('fontend/images/menu.png')}}">                       
            </button>

            <a class="navbar-brand" href="{{URL::to('/')}}"><img src="{{asset('fontend/images/yupa-logo-blue.png')}}" style="width: 165px; height: 45px; margin-top: -10px;"></a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('home.index') }}" class="text-nav-black">Home</a></li>
			     @if (Auth::guest())
                    <li><a href="{{ route('login') }}" class="text-nav-black">Login</a></li>
                    <li><a href="{{ route('sign-up-option') }}" class="item-white text-nav-black">Sign Up</a></li>
                    @else
                    <li><a href="{{ route('dashboard') }}" class="text-nav-black">Dashboard</a></li>
			       @endif
                    <li><a href="" class="text-nav-black">MYR</a></li>
                    <li><a href="" class="item-white text-nav-black">Help</a></li>
                </ul>
        </div>
    </div>

</nav>