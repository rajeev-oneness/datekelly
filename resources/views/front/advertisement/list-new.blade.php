@extends('front.layouts.master')

@section('dashboard-content')
<div class="col-12 col-md-9 pl-2 pl-md-5 rightpart">
    <div class="row mb-3 dashboard align-items-center">
        <div class="col-12"><a href="{{route('advertisement.add')}}" class="login-btn float-right">Add <i class="fas fa-plus"></i></a></div>
    </div>
    <div class="row m-0 dashboard align-items-center">
        @forelse($advertisements as $advertisement)
        <div class="col-12 col-md-4 pl-md-0 plr">
            <div class="card shadow-sm bg-light-pink">
                <div class="card-header p-2 border-0">
                    <h5 class="card-title m-0">{{$advertisement->title}}
                        <span>{{($advertisement->city)? $advertisement->city->name : ''}}</span>
                    </h5>
                </div>
                <div class="position-relative">
                    <img src="{{asset($advertisement->image)}}" class="card-img-top" alt="...">
                    <div class="verified-sec">
                        <p>Verified <i class="fas fa-check"></i></p>
                        <h2>{{$advertisement->rating}}</h2>
                        <div class="mt-1 text-center bg-pink w-40"><img src="./img/camera_icon.png"></div>
                    </div>
                    <div class="price">&dollar; {{$advertisement->price}}</div>
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
                      <span>{{$advertisement->message}}</span>
                  </p>
                </div>
            </div>
        </div>
        @empty
            <h2>No Data!</h2>
        @endforelse
    </div>
</div>
@endsection

