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
<style>
    .new_land{
        height:100vh;
        background:#e91482;
    }
    .md_image .card{
        height:100vh;
        width:100%;
        position:relative;
        border-radius: 0;
        background-color: #e91482;
        border: 0;
    }
    .md_image .card img{
        width:100%;
        height:100%;
        object-fit: cover;
    }
    .md_image .card::before{
      content: "";
      position: absolute;
      width: 100%;
      height:100%;
      background: rgba(233, 20, 130, 0.72);
    }
</style>
<body>
    <!-- loader -->
    <div class="loading-data" style="display:block; color: #fff;">Loading&#8230;</div>
    <header class="d-none"> 
        <nav class="navbar navbar-expand-md navbar-dark bg-pink pb-0 pt-0 shadow-sm">
            <div class="d-flex">
                <a class="navbar-brand mr-0" href="{{route('homepage')}}"><img src="{{asset('front/img/logo.png')}}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse justify-content-center" id="collapsingNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item {{(Route::currentRouteName() == 'ladies.home') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('ladies.home')}}">Ladies <img src="{{asset('front/img/gender-icon.png')}}" alt="icon"></a>
                    </li>
                    <li class="nav-item {{(Route::currentRouteName() == 'search.home') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('search.home')}}">Search <img src="{{asset('front/img/search-icon.png')}}" alt="icon"></a>
                    </li>
                    <!--<li class="nav-item {{(Route::currentRouteName() == 'demo.home') ? 'active' : ''}}">
                        <a class="nav-link px-sm-0 px-md-3" href="{{route('demo.home')}}">Demo <img src="{{asset('front/img/search-icon.png')}}" alt="icon"></a>
                    </li>-->
                    
                    <li class="nav-item {{(Route::currentRouteName() == 'club.agencies.home') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('club.agencies.home')}}">Clubs/Agencies <img src="{{asset('front/img/club-icon.png')}}" alt="icon" class="m-0"></a>
                    </li>
                    <li class="nav-item {{(Route::currentRouteName() == 'reviews.home') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('reviews.home')}}">Reviews <img src="{{asset('front/img/review-icon.png')}}" alt="icon" class="m-0"></a>
                    </li>
                </ul>
            </div>
            <div class="navbar-text small text-truncate mt-1">
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
    
<section class="pt-5 pb-5 d-none">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-12 col-md-10">
                <h4 class="mb-4">Search your favourite demo</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 border pt-3 pb-3">
                <form action="{{route('get.search.results')}}" method="POST" enctype="multipart/form-data" class="w-100">
                    @csrf
                    <div class="form-group row">
                        <div class="col-lg-6 d-flex flex-column">
                            <label class="" for="address">Location:</label>
                            <input name="address" id="address" class="form-control @error('address'){{('is-invalid')}}@enderror" value="{{old('address')}}" placeholder="Location">
                        </div>
                        <!-- <div class="col-lg-6 d-flex flex-column">
                            <label class="" for="distance">Distance in (KM):</label>
                            <input name="distance" id="distance" class="form-control @error('distance'){{('is-invalid')}}@enderror" value="{{old('distance')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="4" placeholder="Distance in Kilo Meter">
                            @error('distance')<span class="text-danger">{{$message}}</span>@enderror
                        </div> -->
                    </div>

                    <div class="form-group row">
                        @php $myServices = (old('my_service') ?? []); @endphp
                        <div class="col-lg-12 d-flex flex-column">
                            <label class="" for="myservice">Service:</label>
                            <div class="d-flex">
                                <input id="private" class="form-check-input d-none" type="checkbox" name="my_service[]" value="private_visit" @if(in_array('private_visit',$myServices)){{('checked')}}@endif>
                                <!-- <p class="ml-2">Private Visit</p> -->
                                <label for="private" class="form-check-label mr-2">Private Visit</label>
                                    &nbsp;
                                <input id="escort" class="form-check-input d-none" type="checkbox" name="my_service[]" value="escort" @if(in_array('escort',$myServices)){{('checked')}}@endif>
                                <!-- <p class="ml-2">Escort</p> -->
                                <label for="escort" class="form-check-label">Escort</label>
                            </div>
                        </div>
                        @error('my_service')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    
                    <div class="form-group row">
                        @php $mySex = (old('sex') ?? []); @endphp
                        <div class="col-lg-12 d-flex flex-column">
                            <label class="" for="sex">Sex:</label>
                            <div class="d-flex">
                                <input id="lady" class="form-check-input d-none" type="checkbox" name="sex[]" value="lady" @if(in_array('lady',$mySex)){{('checked')}}@endif>
                                <!-- <p class="ml-2">Lady</p> -->
                                <label for="lady" class="form-check-label mr-2">Lady</label>
                                    &nbsp;
                                <input id="trans" class="form-check-input d-none" type="checkbox" name="sex[]" value="transsexual_TS" @if(in_array('transsexual_TS',$mySex)){{('checked')}}@endif>
                                <!-- <p class="ml-2">Transsexual TS</p> -->
                                <label for="trans" class="form-check-label">Transsexual TS</label>
                            </div>
                        </div>
                        @error('sex')<span class="text-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6 d-flex flex-column">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Age:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="ageFrom" id="ageFrom" class="sumoSelect form-control @error('ageFrom'){{('is-invalid')}}@enderror">
                                        <option value="18" @if(old('ageFrom') == 18){{('selected')}}@endif>{{('18')}} Years</option>
                                        @for($ageGroup = 20; $ageGroup <= 80; $ageGroup+=5)
                                            <option value="{{$ageGroup}}" @if(old('ageFrom') == $ageGroup){{('selected')}}@endif>{{$ageGroup}} Years</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-2"> to</div>
                                <div class="col-md-4">
                                    <select name="ageTo" id="ageTo" class="sumoSelect form-control @error('ageTo'){{('is-invalid')}}@enderror">
                                        @for($ageGroup = 20; $ageGroup <= 80; $ageGroup+=5)
                                            <option value="{{$ageGroup}}" @if(old('ageTo') == $ageGroup){{('selected')}}@elseif($ageGroup == 80){{('selected')}}@endif>{{$ageGroup}} Years</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6 d-flex flex-column">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Length:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="lengthFrom" id="lengthFrom" class="sumoSelect form-control @error('lengthFrom'){{('is-invalid')}}@enderror">
                                        @for($lengthGroup = 140; $lengthGroup <= 210; $lengthGroup+=5)
                                            <option value="{{$lengthGroup}}" @if(old('lengthFrom') == $lengthGroup){{('selected')}}@endif>{{$lengthGroup}} CM</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-2"> to</div>
                                <div class="col-md-4">
                                    <select name="lengthTo" id="lengthTo" class="sumoSelect form-control @error('lengthTo'){{('is-invalid')}}@enderror">
                                        @for($lengthGroup = 140; $lengthGroup <= 210; $lengthGroup+=5)
                                            <option value="{{$lengthGroup}}" @if(old('lengthTo') == $lengthGroup){{('selected')}}@elseif($lengthGroup == 210){{('selected')}}@endif>{{$lengthGroup}} CM</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6 d-flex flex-column">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Weight:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="weightFrom" id="weightFrom" class="sumoSelect form-control @error('weightFrom'){{('is-invalid')}}@enderror">
                                        @for($weightGroup = 45; $weightGroup <= 120; $weightGroup+=5)
                                            <option value="{{$weightGroup}}" @if(old('weightFrom') == $weightGroup){{('selected')}}@endif>{{$weightGroup}} KG</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-2"> to</div>
                                <div class="col-md-4">
                                    <select name="weightTo" id="weightTo" class="sumoSelect form-control @error('weightTo'){{('is-invalid')}}@enderror">
                                        @for($weightGroup = 45; $weightGroup <= 120; $weightGroup+=5)
                                            <option value="{{$weightGroup}}" @if(old('weightTo') == $weightGroup){{('selected')}}@elseif($weightGroup == 120){{('selected')}}@endif>{{$weightGroup}} KG</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        @php $cupSizeOLD = (old('cup_size') ?? []); @endphp
                        <label class="" for="cup_size">Cup Size:</label>
                        <div class="d-flex justify-content-start align-items-center option-cont">
                            @foreach($data->cup_size as $cupIndex => $cupSize)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="cup_size[]" type="checkbox" id="inlineCheckbox{{$cupIndex}}" value="{{$cupSize->size}}" @if(in_array($cupSize->size,$cupSizeOLD)){{('checked')}}@endif>
                                    <label class="form-check-label" for="inlineCheckbox{{$cupIndex}}">{{$cupSize->size}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        @php $bodySizeOLD = (old('body_size') ?? []); @endphp
                        <label class="" for="body_size">Body Size:</label>
                        <div class="d-flex justify-content-start align-items-center option-cont">
                            @foreach($data->body_size as $bodyIndex => $bodySize)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="body_size[]" type="checkbox" id="inlineCheckboxBodySize{{$bodyIndex}}" value="{{$bodySize->size}}" @if(in_array($bodySize->size,$bodySizeOLD)){{('checked')}}@endif>
                                    <label class="form-check-label" for="inlineCheckboxBodySize{{$bodyIndex}}">{{$bodySize->size}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        @php $decentOLD = (old('descent') ?? []); @endphp
                        <label class="" for="descent">Descent:</label>
                        <div class="d-flex justify-content-start align-items-center option-cont">
                            @foreach($data->descents as $descentIndex => $descentData)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="descent[]" type="checkbox" id="inlineCheckboxDescent{{$descentIndex}}" value="{{$descentData->title}}" @if(in_array($descentData->title,$decentOLD)){{('checked')}}@endif>
                                    <label class="form-check-label" for="inlineCheckboxDescent{{$descentIndex}}">{{$descentData->title}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        @php $languageOLD = (old('language') ?? []); @endphp
                        <label class="" for="length">Language:</label>
                        <div class="d-flex justify-content-start align-items-center option-cont">
                            @foreach($data->language as $languageIndex => $languageData)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="language[]" type="checkbox" id="inlineCheckboxLanguage{{$languageIndex}}" value="{{$languageData->id}}" @if(in_array($languageData->id,$languageOLD)){{('checked')}}@endif>
                                    <label class="form-check-label" for="inlineCheckboxLanguage{{$languageIndex}}">{{$languageData->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row">
                        @php $serviceExtraOLD = (old('services') ?? []); @endphp
                        <div class="col-sm-12">
                            <label>Services & Extras:</label>
                            <div class="row">
                                @foreach($data->servicesAndExtra as $indexServices => $services)
                                    <div class="col-md-4">
                                        <input class="form-check-input d-none" type="checkbox" name="services[]" value="{{$services->title}}" id="services{{$indexServices}}" @if(in_array($services->title,$serviceExtraOLD)){{('checked')}}@endif>&nbsp;
                                        <label for="services{{$indexServices}}" class="form-check-label">{{$services->title}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="searchTrue" value="true">
                    @error('searchTrue')<span class="text-danger">{{$message}}</span>@endif
                    <div class="col-12 mt-5">
                        <a href="{{url()->full()}}" class="btn">Reset</a>
                        <button type="submit" class="login-btn float-left">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="new_land">
    <div class="container-fluid p-0">
        <div class="row m-0 d-flex align-items-center justify-content-center">
            <!--<div class="card">
                <img src="{{asset('front/img/model_pic.png')}}" alt="">
            </div>-->
            <div class="col-4">
                <img src="{{asset('front/img/nLogo.jpg')}}" alt="" class="w-100">
            </div>
        </div>
    </div>
</section>

<footer class="bg-pink pt-4 pb-4 d-none">
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
    <script type="text/javascript" src="{{asset('front/js/lightbox.min.js')}}"></script>
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