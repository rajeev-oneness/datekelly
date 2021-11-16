@extends('front.master')
@php
    $guard = get_guard();
@endphp
@section('title')
@if (auth()->guard($guard)->user()->user_type == 1)
    Ladies Dashboard
@elseif (auth()->guard($guard)->user()->user_type == 2)
    Clubs Dashboard
@elseif (auth()->guard($guard)->user()->user_type == 3)
    Mens Dashboard
@endif
@endsection

@section('css')
    @yield('sub-css')
@endsection

@section('content')
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center m-0">
            <div class="col-12 ">
                <h4 class="mb-4 admin-title">My account - Hello<a href="{{route('user.dashboard')}}" class="admin-title"><span> {{auth()->guard($guard)->user()->name}}</span></a></h4>
            </div>
        </div>
        <div class="row m-0">
            <div class="col-12 col-md-3">
                @if (auth()->guard($guard)->user()->user_type == 1)
                <div class="leftpart bg-light-pink">
                    <img src="{{asset(auth()->guard($guard)->user()->profile_pic)}}" class="ledies_pic">
                    <ul>
                        <li><a href="{{route('verify.account.view')}}" class="{{request()->routeIs('verify.account.*')?'active':''}}">Verify my account</a></li>
                        <li><a href="{{route('lady.premium.picture.list')}}" class="{{request()->routeIs('lady.premium.picture.*')?'active':''}}">Premium Pictures</a></li>
                        <li><a href="{{route('booking.list')}}" class="{{request()->routeIs('booking.*')?'active':''}}">Online Booking</a></li>
                        <li><a href="">Upgrade advertisement</a></li>
                        <li><a href="{{route('advertisement.list')}}" class="{{request()->routeIs('advertisement.*')?'active':''}}">View advertisement</a></li>
                        <li><a href="{{route('lady.account.edit', encrypt(auth()->guard(get_guard())->user()->id))}}" class="{{request()->routeIs('lady.account.*')?'active':''}}">Edit Profile</a></li>
                        <li><a href="{{route('message.list')}}" class="{{request()->routeIs('message.*')?'active':''}}">Messages</a></li>
                        <li><a href="{{route('review.list')}}" class="{{request()->routeIs('review.*')?'active':''}}">Reviews</a></li>
                        <li><a href="{{route('coins.buy')}}" class="{{request()->routeIs('coins.*')?'active':''}}">Buy DateKelly coins</a></li>
                        <li><a href="">Received Tips</a></li>
                        <li><a href="{{route('transaction.history')}}" class="{{request()->routeIs('transaction.*')?'active':''}}">My purchases</a></li>
                        <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
                @endif
                @if (auth()->guard($guard)->user()->user_type == 2)
                <div class="leftpart bg-light-yellow">
                    <img src="{{asset(auth()->guard($guard)->user()->profile_pic)}}" class="ledies_pic">
                    <ul>
                        <li><a href="{{route('verify.account.view')}}" class="{{request()->routeIs('verify.account.*')?'active':''}}">Verify my account</a></li>
                        <li><a href="{{route('advertisement.list')}}" class="{{request()->routeIs('advertisement.*')?'active':''}}">View advertisement</a></li>
                        <li><a href="{{route('booking.list')}}" class="{{request()->routeIs('booking.*')?'active':''}}">Online Booking</a></li>
                        <li><a href="">Upgrade advertisement</a></li>
                        <li><a href="{{route('club.business.banner.list')}}" class="{{request()->routeIs('club.business.banner.*')?'active':''}}">Banners</a></li>
                        <li><a href="{{route('club.account.edit', encrypt(auth()->guard(get_guard())->user()->id))}}" class="{{request()->routeIs('club.account.*')?'active':''}}">Edit Club</a></li>
                        <li><a href="{{route('message.list')}}" class="{{request()->routeIs('message.*')?'active':''}}">Messages</a></li>
                        <li><a href="{{route('review.list')}}" class="{{request()->routeIs('review.*')?'active':''}}">Reviews</a></li>
                        <li><a href="{{route('coins.buy')}}" class="{{request()->routeIs('coins.*')?'active':''}}">Buy DateKelly coins</a></li>
                        <li><a href="{{route('transaction.history')}}" class="{{request()->routeIs('transaction.*')?'active':''}}">My purchases</a></li>
                        <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
                @endif
                @if (auth()->guard($guard)->user()->user_type == 3)
                <div class="leftpart bg-light-blue">
                    <img src="{{asset(auth()->guard($guard)->user()->profile_pic)}}" class="ledies_pic">
                    <ul>
                        <li><a href="">Upgrade my account</a></li>
                        <li><a href="{{route('verify.account.view')}}" class="{{request()->routeIs('verify.account.*')?'active':''}}">Verify my account</a></li>
                        <li><a href="{{route('men.premium.picture')}}" class="{{request()->routeIs('men.premium.picture.*')?'active':''}}">Premium Pictures</a></li>
                        <li><a href="{{route('booking.list')}}" class="{{request()->routeIs('booking.*')?'active':''}}">Online Booking</a></li>
                        <li><a href="{{route('men.account.edit', encrypt(auth()->guard(get_guard())->user()->id))}}" class="{{request()->routeIs('men.account.*')?'active':''}}">Edit Profile</a></li>
                        <li><a href="{{route('message.list')}}" class="{{request()->routeIs('message.*')?'active':''}}">Messages</a></li>
                        <li><a href="{{route('review.list')}}" class="{{request()->routeIs('review.*')?'active':''}}">Reviews</a></li>
                        <li><a href="{{route('men.favourite.list')}}" class="{{request()->routeIs('men.favourite.*')?'active':''}}">Favorites</a></li>
                        <li><a href="{{route('coins.buy')}}" class="{{request()->routeIs('coins.*')?'active':''}}">Buy DateKelly coins</a></li>
                        <li><a href="{{route('transaction.history')}}" class="{{request()->routeIs('transaction.*')?'active':''}}">My purchases</a></li>
                        <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
                @endif
            </div>
            
            @yield('dashboard-content')

        </div>
    </div>
</section>
@endsection
@section('script')
<script type="text/javascript">
    $(document).on('click','.deleteMyAccount',function(){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover your account!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                deleteMyAccount();
            }
        });
    });

    function deleteMyAccount(){
        $.ajax({
            url : "{{route('user.account.delete',[auth()->guard($guard)->user()->id])}}",
            type : 'POST',
            dataType : 'JSON',
            data : {userId : '{{auth()->guard($guard)->user()->id}}',_token:'{{csrf_token()}}'},
            success:function(response){
                if(response.error == true){
                    swal('Error',response.message);
                }else{
                    swal('Success',response.message);
                    window.location.href="";
                }
                console.log(response);
            }
        });
    }
</script>
    @yield('sub-script')
@endsection