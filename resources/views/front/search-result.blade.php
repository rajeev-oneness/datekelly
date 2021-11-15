@extends('front.master')
@section('title','Search Result')
@section('content')
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-12">
                <h4>({{count($advertisement)}}) Result Found <a href="{{route('search.home')}}" class="btn float-right"><i class="fas fa-arrow-left"></i>&nbsp;Back</a></h4>
            </div>
        </div>
        <div class="row m-0 women-List">
            @forelse($advertisement as $advert)
                <div class="col-12 col-md-4 plr" style="cursor: pointer;" onclick="location.href='{{route('advertisement.detail', base64_encode($advert->id))}}'">
                    <div class="card shadow-sm {{($advert->club_id == 0)? 'bg-light-pink' : ''}}">
                        <div class="card-header p-2 border-0">
                            <h5 class="card-title m-0">
                                <a href="{{route('advertisement.detail', base64_encode($advert->id))}}" style="color: #e91482;">{{$advert->title}}</a>
                                <span>{{($advert->city)? $advert->city->name : ''}}</span>
                            </h5>
                        </div>
                        <div class="position-relative">
                            <img src="{{asset($advert->image)}}"  class="card-img-top" alt="...">
                            <div class="verified-sec">
                                @if ($advert->is_verified == 1)
                                    <p>Verified <i class="fas fa-check"></i></p>
                                @endif
                                <p> {{$advert->rating}} <i class="fas fa-star"></i></p>
                            </div>  
                            <div class="price">&euro; {{($advert->price != '' ? $advert->price : 0)}}</div>
                        </div>
                        <div class="card-body p-2">
                            <div class="row m-0">
                                <div class="col-6 col-md-6 text-md-left text-left p-0">
                                    <p class="loves"><i class="fas fa-heart"></i> &nbsp; {{$advert->no_of_loves}} Loves</p>
                                </div>
                                <div class="col-6 col-md-6 text-md-right text-right p-0 contacticon">
                                    <a href="tel:{{($advert->country)? '+'.$advert->country->phone_code : ''}}{{$advert->phn_no}}"><img src="{{asset('front/img/call-icon.png')}}"></a>
                                    <a href="https://wa.me/{{$advert->whatsapp}}"><img src="{{asset('front/img/whatsap_icon.png')}}"></a>
                                </div>
                            </div>
                            <p class="subtext">{{$advert->title}} : <span>{{$advert->message}}</span></p>
                        </div>
                    </div>
                </div>
            @empty
                <h2>No Data!</h2>
            @endforelse
        </div>
    </div>
</section>
@endsection