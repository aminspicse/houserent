<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        @yield('title') :
        {{ config('app.name', 'House Rent Solution') }} 
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel = "icon" href ="{{asset('public/icon/icon.jpg')}}" type = "image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('public/users/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/users/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('public/users/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/users/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/users/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('public/users/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('public/users/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('public/users/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('public/users/css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{asset('public/users/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('public/users/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('public/users/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/users/dropdownbutton.css')}}">
</head>

<body>
    <!--
    <div class="top">
    	<div class="container">
    		<div class="row d-flex align-items-center">
    			<div class="col">
    				<p class="social d-flex">
    					<a href="#"><span class="icon-facebook"></span></a>
    					<a href="#"><span class="icon-twitter"></span></a>
    				</p>
    			</div>
    			<div class="col d-flex justify-content-end">
    				<p class="num"><span class="icon-phone"></span> +880 1689015612</p>
    			</div>
    		</div>
    	</div>
    </div>
-->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-light ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">{{ config('app.name', 'House Rent Solution') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{url('/property')}}" class="nav-link">Property</a></li>
                    <li class="nav-item"><a href="{{url('/agent-list')}}" class="nav-link">Agents</a></li>
                    <li class="nav-item"><a href="{{url('/about')}}" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="{{url('/contact')}}" class="nav-link">Contact</a></li>
                    @if(Auth::user())
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="#" class="nav-link dropbtn">{{Auth::user()->name}}</a>
                            <div class="dropdown-content">
                                @if(Auth::user()->role_id == '1')
                                <a href="{{url('/admin')}}">Admin Pannel</a>
                                @elseif(Auth::user()->role_id == '2')
                                <a href="{{url('/agent')}}">Agent Pannel</a>
                                @elseif(Auth::user()->role_id == '3')
                                <a href="{{url('/user')}}">User Pannel</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                    @else
                    <li class="nav-item cta"><a href="{{url('/login')}}" class="nav-link ml-lg-2"><span
                                class="icon-user"></span> Sign-In</a></li>
                    <li class="nav-item cta cta-colored"><a href="{{url('/register')}}" class="nav-link"><span
                                class="icon-pencil"></span> Sign-Up</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    @yield('slider')

    @yield('search')

    @yield('content')

    <section class="ftco-section-parallax">
        <div class="parallax-img d-flex align-items-center">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                        <h2>Subcribe to our Newsletter</h2>
                        <p></p>
                        <div class="row d-flex justify-content-center mt-5">
                            <div class="col-md-8">
                                <form action="{{url('subscribe')}}" method="post" class="subscribe-form">
                                    @csrf
                                    <div class="form-group d-flex">
                                        <input type="email" name="email" class="form-control" placeholder="Enter email address">
                                        <input type="submit" value="Subscribe" class="submit px-3">
                                        
                                    </div>
                                </form>
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">{{config('app.name')}}</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="https://www.facebook.com/houserentsolution" target="_new"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Buy</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Home For Sale</a></li>
                            <li><a href="#" class="py-2 d-block">Open Houses</a></li>
                            <li><a href="#" class="py-2 d-block">New Listing</a></li>
                            <li><a href="#" class="py-2 d-block">Recently Reduce</a></li>
                            <li><a href="#" class="py-2 d-block">Off-Market Homes</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Sell</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Sell Your Home</a></li>
                            <li><a href="#" class="py-2 d-block">Get A Home Valuation</a></li>
                            <li><a href="#" class="py-2 d-block">Local Home Prices</a></li>
                            <li><a href="#" class="py-2 d-block">Guides &amp; Rules</a></li>
                            <li><a href="#" class="py-2 d-block">Others</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">102 Bachalor Point,
                                        Taltola Sylhet-3100, Sylhet, Bangladesh</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+880
                                            1689015612</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span>
								<span class="text">info@houserent.myspeec.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script>
                        All rights reserved | {{ config('app.name', 'House Rent Solution') }}
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg>
    </div>

    <script src="{{asset('public/users/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/users/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('public/users/js/popper.min.js')}}"></script>
    <script src="{{asset('public/users/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/users/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('public/users/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('public/users/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('public/users/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/users/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('public/users/js/aos.js')}}"></script>
    <script src="{{asset('public/users/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('public/users/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('public/users/js/jquery.timepicker.min.js')}}"></script>
    <script src="{{asset('public/users/js/scrollax.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{asset('public/users/js/google-map.js')}}"></script>
    <script src="{{asset('public/users/js/main.js')}}"></script>

</body>

</html>