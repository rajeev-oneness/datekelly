@extends('front.layouts.master')

@section('dashboard-content')
<div class="col-12 col-md-9 pl-2 pl-md-5 rightpart">
    <div class="row mb-3 dashboard align-items-center">
        @if( $user_type == 1 )
            @if ($advertisements->count() > 0)
                <div class="col-12 col-md-12 pl-md-0 plr">
                    You already added one advertisement
                </div>
            @else
                <div class="col-12"><a href="{{route('advertisement.add')}}" class="login-btn float-right">Add <i class="fas fa-plus"></i></a></div>
            @endif
        @else
            <div class="col-12"><a href="{{route('advertisement.add')}}" class="login-btn float-right">Add <i class="fas fa-plus"></i></a></div>
        @endif
    </div>
    <div class="row m-0 mt-3 women-List">
        @forelse ($advertisements as $ad)
            <div class="col-12 col-md-4 pl-md-0 plr">
                <div class="card shadow-sm bg-light-pink" style="cursor: pointer;">
                    <div class="card-header p-2 border-0" onclick="location.href='{{route('advertisement.show', base64_encode($ad->id))}}'">
                        <h5 class="card-title m-0">{{$ad->title}}</h5>
                        <span class="text-blue">{{($ad->city)?$ad->city->name : ''}}</span>
                    </div>
                    <div class="position-relative" onclick="location.href='{{route('advertisement.show', base64_encode($ad->id))}}'">
                        <div class="lady-card-img">
                            <img src="{{asset($ad->image)}}" class="card-img-top" alt="...">
                        </div>
                        
                        <div class="verified-sec">
                            @if ($ad->is_verified == 1)
                                <p>Verified <i class="fas fa-check"></i></p>
                            @endif
                            <h2>{{$ad->rating}}</h2>
                        </div>
                        <div class="price">&euro; {{($ad->price != '' ? $ad->price : 0)}}</div>
                    </div>
                    <div class="card-body p-2">
                      <div class="row m-0">
                        <div class="col-6 col-md-6 text-md-left text-left p-0">
                            <p class="loves"><i class="fas fa-heart"></i> &nbsp; {{$ad->no_of_loves}} {{ ($ad->no_of_loves > 1) ? ' Loves' : 'Love' }}</p>
                        </div>
                        <div class="col-6 col-md-6 text-md-right text-right p-0 contacticon">
                            <a href="tel:{{($ad->country)? '+'.$ad->country->phone_code : ''}}{{$ad->phn_no}}" target="_blank"><img src="{{asset('front/img/call-icon.png')}}"></a>
                            <a href="https://wa.me/{{$ad->whatsapp}}" target="_blank"><img src="{{asset('front/img/whatsap_icon.png')}}"></a>
                        </div>
                      </div>
                      <p class="subtext">
                        {{$ad->title}} : <span>{{$ad->message}}</span>
                      </p>
                    </div>
                </div>
                <a href="{{route('advertisement.edit', base64_encode($ad->id))}}" title="Edit"><i class="fas fa-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;
                <a href="{{route('advertisement.delete', encrypt($ad->id))}}" title="delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete</a>
            </div>
        @empty
        <div class="col-12 col-md-12 pl-md-0 plr">
            Advertisement not Found. {{ ($user_type == 1) ? 'You can add only one advertisement' : '' }}
        </div>
        @endforelse
    </div>
</div>   
@endsection