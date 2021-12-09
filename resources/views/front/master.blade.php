<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('front/img/favicon.ico')}}">
    <title>DateKelly | @yield('title')</title>
    <!--CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/aos.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/rajeev-loader.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/sumoselect.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    @yield('css')
</head>
<body>
    <!-- loader -->
    <div class="loading-data" style="display:block; color: #fff;">Loading&#8230;</div>
    <header> 
        <nav class="navbar navbar-expand-md navbar-dark bg-pink pb-0 pt-0 shadow-sm">
            <div class="d-flex w-50">
                <a class="navbar-brand mr-0" href="{{route('homepage')}}"><img src="{{asset('front/img/logo.png')}}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse justify-content-center" id="collapsingNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item {{(Route::currentRouteName() == 'ladies.home') ? 'active' : ''}}">
                        <a class="nav-link px-sm-0 px-md-3" href="{{route('ladies.home')}}">Ladies <img src="{{asset('front/img/gender-icon.png')}}" alt="icon"></a>
                    </li>
                    <li class="nav-item {{(Route::currentRouteName() == 'search.home') ? 'active' : ''}}">
                        <a class="nav-link px-sm-0 px-md-3" href="{{route('search.home')}}">Search <img src="{{asset('front/img/search-icon.png')}}" alt="icon"></a>
                    </li>
                    
                    <li class="nav-item {{(Route::currentRouteName() == 'club.agencies.home') ? 'active' : ''}}">
                        <a class="nav-link px-sm-0 px-md-3" href="{{route('club.agencies.home')}}">Clubs/Agencies <img src="{{asset('front/img/club-icon.png')}}" alt="icon" class="m-0"></a>
                    </li>
                    <li class="nav-item {{(Route::currentRouteName() == 'reviews.home') ? 'active' : ''}}">
                        <a class="nav-link px-sm-0 px-md-3" href="{{route('reviews.home')}}">Reviews <img src="{{asset('front/img/review-icon.png')}}" alt="icon" class="m-0"></a>
                    </li>
                </ul>
            </div>
            <div class="navbar-text small text-truncate mt-1 w-50 login-right">
                <div class="d-flex float-right">
                    @php
                        $guard = get_guard();
                    @endphp
                    
                    @if ($guard == 'web')
                        {{-- <a href="{{route('logout')}}" class="nav-right-sec" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Log Out 
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form> --}}
                        <a href="{{route('user.dashboard')}}" class="nav-right-sec">
                            {{auth()->guard($guard)->user()->name}}
                            <span><img src="{{asset(auth()->guard($guard)->user()->profile_pic)}}"></span>
                        </a>
                        
                    @else
                        <a href="{{route('user.login')}}" class="nav-right-sec">Login 
                            {{-- <span><img src="{{asset('front/img/im1.jpg')}}"></span> --}}
                        </a>
                    @endif
                    <div class="language-drop">
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>English</option>
                            <option>France</option>
                            <option>Brazil</option>
                        </select>
                      </div>
                </div>
            </div>
        </nav>
    </header><!--header-part-->

    @yield('content')
    
    <footer class="bg-pink pt-4 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <a class="mr-0" href="{{route('homepage')}}"><img src="{{asset('front/img/logo.png')}}" alt=""></a>
                    <p>DateKelly.com</p>
                </div>
                <div class="col-12 col-md-2">
                   <ul>
                       <li><a href="{{route('ladies.home')}}">Ladies</a></li>
                       <li><a href="{{route('search.home')}}">Search</a></li>
                       <li><a href="{{route('club.agencies.home')}}">Clubs/Agencies</a></li>
                       <li><a href="{{route('reviews.home')}}">Reviews</a></li>
                       <li><a href="{{route('privacy.policy')}}"> Privacy Policy</a></li>
                   </ul> 
                </div>
                <div class="col-12 col-md-2">
                    <ul>
                        <li><a href="{{route('user.login')}}">Login / Register</a></li>
                        <li><a href="{{route('faq')}}">FAQ</a></li>
                        <li><a href="{{route('contact.us')}}"> Contact</a></li>
                        <li><a href="{{route('terms.conditions')}}"> Terms And Conditions</a></li>
                        <li><a href="{{route('about.us')}}"> About Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--footer-part-->

		<script type="text/javascript" src="{{asset('front/js/jquery-3.6.0.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('front/js/popper.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('front/js/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('front/js/owl.carousel.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('front/js/aos.js')}}"></script>
		<script type="text/javascript" src="{{asset('front/js/custom.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="{{asset('js/sumoselect.min.js')}}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.loading-data').hide();
                $(document).on('submit', 'form', function() {
                    $('button').attr('disabled', 'disabled');
                    $('.loading-data').show();
                });

                @if(Session::has('Success'))
                    swal('Success','{{Session::get('Success')}}', 'success');
                @elseif(Session::has('Errors'))
                    swal('Error','{{Session::get('Errors')}}', 'error');
                @endif
            });

            $(document).ready( function () {
                $('#customDataTable').DataTable({
                    order : [],
                });
            });
        </script>

        @yield('script')
</body>
</html>