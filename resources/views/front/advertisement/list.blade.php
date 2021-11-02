@extends('front.layouts.master')

@section('dashboard-content')
<div class="col-12 col-md-9 pl-2 pl-md-5 rightpart">
    <div class="row mb-3 dashboard align-items-center">
        <div class="col-12"><a href="{{route('advertisement.add')}}" class="login-btn float-right">Add <i class="fas fa-plus"></i></a></div>
    </div>
    <div class="row m-0 mt-3 women-List">
        @foreach ($advertisements as $ad)
        <div class="col-12 col-md-4 pl-md-0 plr">
            <div class="card shadow-sm bg-light-pink" style="cursor: pointer;" onclick="location.href='{{route('advertisement.show', base64_encode($ad->id))}}'">
                <div class="card-header p-2 border-0">
                    <h5 class="card-title m-0">{{$ad->title}}
                        <span>{{($ad->city)?$ad->city->name : ''}}</span>
                    </h5>
                </div>
                <div class="position-relative">
                    <img src="{{asset($ad->image)}}" class="card-img-top" alt="...">
                    <div class="verified-sec">
                        @if ($ad->is_verified == 1)
                            <p>Verified <i class="fas fa-check"></i></p>
                        @endif
                        <h2>{{$ad->rating}}</h2>
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
            <a href="{{route('advertisement.edit', base64_encode($ad->id))}}" title="Edit"><i class="fas fa-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;
            <a href="{{route('advertisement.delete', encrypt($ad->id))}}" title="delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete</a>
        </div>
        
        @endforeach
    </div>
</div>   
@endsection