@extends('front.layouts.master')

@section('dashboard-content')

<div class="col-12 col-md-7 p-0 pl-2 pl-md-5 rightpart">
    <div class="adv-title">
        <h4 class="mb-3">Premium Picture ({{count($pictures)}})</h4>
    </div>
    <!-- <div class="row m-0 mt-5 add-pre-pic">
        <p>
            <span class="textpink">Lorem Ipsum is simply</span> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        </p>
        <p><b>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</b></p>
        <p>
            <span class="textpink">Lorem Ipsum has been</span> the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        </p>
    </div> -->
    <div class="row m-0 mt-5 add-pre-pic">
        <div class="col-12 p-0 mb-4 d-md-flex">
            <div class="col-12 col-md-6 text-left p-0">
                <h6>
                    <!-- Premium Pictures : <span class="textpink">{{count($pictures)}}</span> -->
                    <small class="form-text text-muted">Click on the premium pictures to download.</small>
                </h6>
            </div>
            <div class="col-12 col-md-6 text-left text-md-right p-0 mt-md-0 mt-4">
                <a href="#">
                    {{-- <span class="bg-pink text-white p-2">Creat new premium pictures</span> --}}
                </a>
            </div>
        </div>
        <div class="row m-0">
            @forelse ($pictures as $picture)
            <div class="col-6 col-md-3 plr mb-2 premium-p-t">
                <div class="card border-0 text-center">
                    <div class="position-relative overflow-hidden">
                        <a href="{{asset($picture->pictureDetails->picture)}}" download rel="noopener noreferrer" target="_blank">
                            <img src="{{asset($picture->pictureDetails->picture)}}" class="card-img-top" alt="...">
                        </a>
                    </div>
                    <div class="card-body p-1">
                        <p class="card-text">
                            {{date('d/m/Y', strtotime($picture->created_at))}}
                        </p>
                        <p class="card-text">
                           {{-- Unlocked : <span> 120x</span> <br> --}}
                           Price : <span> {{$picture->price}} coins</span>
                        </p>
                        {{-- <a href="#" class="textpink">5 New Comment</a> --}}
                    </div>
                </div>
            </div> 
            @empty
                
            @endforelse
            
        </div>
    </div><!--creat_new-premium-->
</div>

@endsection

@section('sub-script')
@endsection