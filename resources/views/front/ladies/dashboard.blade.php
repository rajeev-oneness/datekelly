@extends('front.layouts.master')
@section('dashboard-content')
<div class="col-12 col-md-9 pl-2 pl-md-5 rightpart">
    <div class="row m-0 dashboard align-items-center">
        <div class="col-12 col-md-4 p-0">
            <div class="card text-center p-0">
                <div class="card-body">
                  <div class="tag-sec mb-4">
                      <h5 class="bg-dark-yellow">Queen <i class="fas fa-crown"></i></h5>
                      <br/>
                      <h5 class="bg-pink">Princess <i class="fas fa-crown"></i></h5>
                  </div>
                  <div class="dashboard-text">
                    <h6><span>Lady </span>advertisement (Free)</h6>
                    <p class="m-0">
                        Upgrade to <span>Princess</span>
                    </p>
                    <p>or <span>Queen</span></p>
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
                        Verify your account to earn from Premium Pictures!
                    </p>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 p-0">
            <div class="card text-center p-0">
                <div class="card-body">
                  <div class="tag-sec mb-4">
                      <h5 class="bg-pink">{{$premiumPic}} <img src="{{asset('front/img/camera_icon.png')}}" class="ml-1"></h5>
                  </div>
                  <div class="dashboard-text">
                    <h6><span>{{$premiumPic}} Premium Pictures</span></h6>
                    <h5>Earned : <span>{{$premiumPicPurchase}} DateKelly coins</span></h5>
                    <p class="m-0">
                       <a href="{{route('lady.premium.picture.add')}}">Add more Premium Pictures</a>
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
                        <a href="{{route('message.list')}}">Reply on Messages</a>
                    </p>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 p-0">
            <div class="card text-center p-0">
                <div class="card-body">
                  <div class="tag-sec mb-4">
                      <h5 class="bg-dark-blue"><i class="fas fa-donate"></i> TK </h5>
                  </div>
                  <div class="dashboard-text">
                    <h5>Coin Balance :  <span>{{$coinBalance}} DateKelly coins</span></h5>
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
                      <h5 class="bg-pink">{{$loves}} <i class="fas fa-heart"></i></h5>
                  </div>
                  <div class="dashboard-text">
                    <h6>You have <span>{{$loves}} Love</span></h6>
                    <p class="m-0">
                        Profile views : <span>63.749</span>
                    </p>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 p-0">
            <div class="card text-center p-0">
                <div class="card-body">
                  <div class="tag-sec mb-4">
                      <h5 class="bg-pink">{{round($rating, 1)}} <i class="fas fa-star"></i></h5>
                  </div>
                  <div class="dashboard-text">
                    <h6>You have  <span>{{$totalReviews}} Reviews</span></h6>
                    <p class="m-0">
                        <a href="{{route('review.list')}}">Reply On Reviews</a>
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
                    <h5>Tips received : <span>15 DateKelly coins</span></h5>
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