@extends('front.layouts.master')

@section('dashboard-content')

<div class="col-12 col-md-9 pl-2 pl-md-5 rightpart favorites">
    <div class="fav-title">
        <h4 class="mb-3">Favorites</h4>
        <h5 class="bg-pink">{{$totalLove}} <i class="fas fa-heart"></i></h5>
        <p class="mt-2">You gave {{$totalLove}}x <span class="textpink">Love</span>
            <br/> Here you will find all your Favorites
        </p>
    </div>
    <div class="row m-0 mt-3 women-List">
        @foreach ($advertisements as $ad)    
        <div class="col-12 col-md-4 pl-md-0 plr" style="cursor: pointer;" onclick="location.href='{{route('advertisement.detail', base64_encode($ad->id))}}'">
            <div class="card shadow-sm bg-light-pink">
                <div class="card-header p-2 border-0">
                    <h5 class="card-title m-0">{{$ad->title}}
                        <span>{{$ad->city->name}}</span>
                    </h5>
                </div>
                <div class="position-relative">
                    <img src="{{asset('storage/advertiseImages/'.$ad->image)}}" class="card-img-top" alt="...">
                    <div class="verified-sec">
                        @if ($ad->is_verified == 1)
                        <p>Verified <i class="fas fa-check"></i></p>
                        @endif
                        <h2>{{$ad->rating}}</h2>
                        <div class="mt-1 text-center bg-pink w-40"><img src="{{asset('front/img/camera_icon.png')}}"></div>
                    </div>
                    <div class="price">&dollar; {{$ad->price}}</div>
                </div>
                <div class="card-body p-2">
                  <div class="row m-0">
                    <div class="col-6 col-md-6 text-md-left text-left p-0">
                        <p class="loves"><i class="fas fa-heart"></i> &nbsp; {{$ad->no_of_loves}} Loves</p>
                    </div>
                    <div class="col-6 col-md-6 text-md-right text-right p-0 contacticon">
                        <a href="tel:{{($ad->country)? '+'.$ad->country->phone_code : ''}}{{$ad->phn_no}}"><img src="{{asset('front/img/call-icon.png')}}"></a>
                        <a href="https://wa.me/{{$ad->whatsapp}}"><img src="{{asset('front/img/whatsap_icon.png')}}"></a>
                    </div>
                  </div>
                  <p class="subtext">
                    {{$ad->title}} : 
                      <span>{{$ad->message}}</span>
                  </p>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>

@endsection


@section('sub-script')
@endsection