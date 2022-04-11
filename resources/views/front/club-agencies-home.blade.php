@extends('front.master')

@section('title')
    Club / Agencies
@endsection

@section('content')

@include('front.categories')

<section class="pt-5 pb-5">
    <div class="container">

        <div class="row m-0 women-List">
            {{-- @forelse ($advertisements as $advertisement)
                <div class="col-12 col-md-3 plr" onclick="location.href='{{route('advertisement.detail', base64_encode($advertisement->id))}}'">
                    <div class="card shadow-sm {{($advertisement->club_id == 0)? 'bg-light-pink' : ''}}">
                        <div class="card-header p-2 border-0">
                            <h5 class="card-title m-0">
                                {{$advertisement->title}}
                                <span>{{($advertisement->city)? $advertisement->city->name : ''}}</span>
                            </h5>
                        </div>
                        <div class="position-relative">
                            <img src="{{asset($advertisement->image)}}" class="card-img-top" alt="..." style="height:300px">
                            <div class="verified-sec">
                                @if ($advertisement->is_verified == 1)
                                    <p>Verified <i class="fas fa-check"></i></p>
                                @endif
                                <h2>{{$advertisement->rating}}</h2>
                            </div>
                        </div>
                        <div class="card-body p-2">
                        <div class="row m-0">
                            <div class="col-6 col-md-6 text-md-left text-left p-0">
                                <p class="loves"><i class="fas fa-heart"></i> &nbsp; {{$advertisement->no_of_loves}} Loves</p>
                            </div>
                            <div class="col-6 col-md-6 text-md-right text-right p-0 contacticon">
                                <a href="tel:{{($advertisement->country)? '+'.$advertisement->country->phone_code : ''}}{{$advertisement->phn_no}}"><img src="{{asset('front/img/call-icon.png')}}"></a>
                                <a href="https://wa.me/{{$advertisement->whatsapp}}"><img src="{{asset('front/img/whatsap_icon.png')}}"></a>
                            </div>
                        </div>
                        <p class="subtext">
                            {{$advertisement->title}} : 
                            <span>{{wordsLimit($advertisement->about, 10)}}</span>
                        </p>
                        </div>
                    </div>
                </div>
            @empty
                <h2>No Data!</h2>
            @endforelse --}}

            @forelse ($clubs as $club)
                <div class="col-12 col-md-3 plr" onclick="location.href='{{route('club.detail', base64_encode($club->id))}}'">
                    <div class="card shadow-sm">
                        <div class="card-header p-2 border-0">
                            <h5 class="card-title m-0">
                                {{$club->name}}
                                <span>{{($club->city)? $club->city->name : ''}}</span>
                            </h5>
                        </div>
                        <div class="position-relative">
                            <img src="{{asset($club->profile_pic)}}" class="card-img-top" alt="..." style="height:300px">
                            <div class="verified-sec">
                                @if ($club->is_verified == 1)
                                    <p>Verified <i class="fas fa-check"></i></p>
                                @endif
                                {{-- <h2>{{$club->rating}}</h2> --}}
                            </div>
                        </div>
                        <div class="card-body p-2">
                        <div class="row m-0">
                            <div class="col-6 col-md-6 text-md-left text-left p-0">
                                <p class="loves"><i class="fas fa-heart"></i> &nbsp; {{($club->clubDetails) ? (($club->clubDetails->no_of_loves > 1) ? $club->clubDetails->no_of_loves.' Loves' : $club->clubDetails->no_of_loves.' Love') : ''}}</p>
                            </div>
                            <div class="col-6 col-md-6 text-md-right text-right p-0 contacticon">
                                <a href="tel:{{($club->country)? '+'.$club->country->phone_code : ''}}{{$club->phn_no}}"><img src="{{asset('front/img/call-icon.png')}}"></a>
                                <a href="https://wa.me/{{$club->whatsapp_no}}"><img src="{{asset('front/img/whatsap_icon.png')}}"></a>
                            </div>
                        </div>
                        <p class="subtext">
                            {{$club->name}} : 
                            <span>{{wordsLimit($club->about, 10)}}</span>
                        </p>
                        </div>
                    </div>
                </div>
            @empty
                <h2>No data</h2>
            @endforelse
        </div>
    </div>
</section><!--List-section-->
@endsection