@extends('front.layouts.master')

@section('dashboard-content')
<div class="col-12 col-md-9 pl-2 pl-md-5 rightpart">
    <div class="row m-0 dashboard align-items-center">
        <div class="col-12 col-md-4 p-0">
            <div class="card text-center p-0">
                <div class="card-body">
                  <div class="tag-sec mb-4">
                      <h5 class="bg-dark-blue">King <i class="fas fa-crown"></i></h5>
                  </div>
                  <div class="dashboard-text">
                    <h6>Free account</h6>
                    <p class="m-0">
                        Upgrade to <a href="">King</a>
                    </p>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 p-0">
            <div class="card text-center p-0">
                <div class="card-body">
                  <div class="tag-sec mb-4">
                      <h5 class="bg-pink">Verified <i class="fas fa-check text-green"></i></h5>
                  </div>
                  <div class="dashboard-text">
                    <h6><span>NOT  </span>verified</h6>
                    <p class="m-0">
                        Verify your account
                    </p>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 p-0">
            <div class="card text-center p-0">
                <div class="card-body">
                  <div class="tag-sec mb-4">
                      <h5 class="bg-pink">{{$ppCount}} <img src="{{asset('front/img/camera_icon.png')}}" class="ml-1"></h5>
                  </div>
                  <div class="dashboard-text">
                    <h6><span>{{$ppCount}} Premium Pictures</span></h6>
                    <p class="m-0">
                       <a href="{{route('men.premium.picture')}}"> View purchased Premium Pictures</a>
                    </p>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 p-0">
            <div class="card text-center p-0">
                <div class="card-body">
                  <div class="tag-sec mb-4">
                      <h5 class="bg-pink">{{$messages}} <img src="{{asset('front/img/chat-icon.png')}}" class="ml-1"></h5>
                  </div>
                  <div class="dashboard-text">
                    <h6>You have <span>{{$messages}} Messages</span></h6>
                    <p class="m-0">
                       <a href="{{route('message.list')}}"> Reply on Messages</a>
                    </p>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 p-0">
            <div class="card text-center p-0">
                <div class="card-body">
                  <div class="tag-sec mb-4">
                      <h5 class="bg-dark-blue"><i class="fas fa-donate"></i> DK </h5>
                  </div>
                  <div class="dashboard-text">
                    <h5>Balance:  <span>{{$coinBalance}} DateKelly coins</span></h5>
                    <p class="m-0">
                        <a href="{{route('coins.buy')}}">Buy more DateKelly coins</a>
                    </p>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 p-0">
            <div class="card text-center p-0">
                <div class="card-body">
                  <div class="tag-sec mb-4">
                      <h5 class="bg-pink">{{$loveCount}} <i class="fas fa-heart"></i></h5>
                  </div>
                  <div class="dashboard-text">
                    <h6>You gave <span>{{$loveCount}} Love</span></h6>
                    <p class="m-0">
                        <a href="{{route('men.favourite.list')}}">View my Favorites</a>
                    </p>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 p-0">
            <div class="card text-center p-0">
                <div class="card-body">
                  <div class="tag-sec mb-4">
                      <h5 class="bg-pink">{{$totalReviews}}</h5>
                  </div>
                  <div class="dashboard-text">
                    <h6>You wrote <span>{{$totalReviews}} Reviews</span></h6>
                    <p class="m-0">
                        <a href="{{route('review.list')}}">View my Reviews</a>
                    </p>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 p-0">
            <div class="card text-center p-0">
                <div class="card-body">
                  <div class="tag-sec mb-4">
                      <h5 class="bg-dark-blue"><i class="fas fa-donate"></i> Tip </h5>
                  </div>
                  <div class="dashboard-text">
                    <h5>Coins sent : <span>{{$coinSpent}} DateKelly coins</span></h5>
                    <p class="m-0">
                        Send DateKelly coins <br/> to another Lady 
                    </p>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection