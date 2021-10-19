@extends('front.master')

@section('title')
    Club / Agencies
@endsection

@section('content')

@include('front.categories')

<section class="pt-5 pb-5">
    <div class="container">
        
        <div class="row m-0 women-List">
            @forelse ($advertisements as $advertisement)
            <div class="col-12 col-md-3 plr" style="cursor: pointer;" onclick="location.href='{{route('advertisement.detail', base64_encode($advertisement->id))}}'">
                <div class="card shadow-sm {{($advertisement->club_id == 0)? 'bg-light-pink' : ''}}">
                    <div class="card-header p-2 border-0">
                        <h5 class="card-title m-0">
                            <a href="{{route('advertisement.detail', base64_encode($advertisement->id))}}" style="color: #e91482;">{{$advertisement->title}}</a>
                            <span>{{($advertisement->city)? $advertisement->city->name : ''}}</span>
                        </h5>
                    </div>
                    <div class="position-relative">
                        {{-- <img src="{{asset('front/img/club.jpg')}}" class="card-img-top" alt="..."> --}}
                        <img src="{{asset('storage/advertiseImages').'/'.$advertisement->image}}" class="card-img-top" alt="...">
                        
                        <div class="verified-sec">
                            @if ($advertisement->is_verified == 1)
                                <p>Verified <i class="fas fa-check"></i></p>
                            @endif
                            <p> {{$advertisement->rating}} <i class="fas fa-star"></i></p>
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
                            <a href="https://wa.me/{{$advertisement->whatsapp}}" target="_blank"><img src="{{asset('front/img/whatsap_icon.png')}}"></a>
                        </div>
                      </div>
                      <p class="subtext">
                        {{$advertisement->title}} : 
                          <span>
                            {{$advertisement->message}}
                          </span>
                      </p>
                    </div>
                  </div>
            </div>
            @empty
            <h2>No Data!</h2>
            @endforelse
        </div>
    </div>
</section><!--List-section-->
@endsection