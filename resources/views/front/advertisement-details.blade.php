@extends('front.master')

@section('title')
    Advertisement Details
@endsection

@section('content')
<section class="position-relative">
    <div class="owl-carousel banner-pic">
        @foreach ($advertisement->advertisement_image as $adImageKey => $adImageValue)
            @if($adImageValue->type == 'Image')
                <div class="item" data-hash="{{$adImageKey}}">
                    <img src="{{asset($adImageValue->img)}}">
                </div>
            @endif
        @endforeach
    </div>
    <div class="image-sl-text">
        <div class="container">
            <div class="row m-0">
                <ul>
                    <li>
                    @if ($advertisement->lady)
                        {{$advertisement->lady->name}}
                    @elseif($advertisement->club)
                        {{$advertisement->club->name}}
                    @endif
                    </li>
                    <li>{{$advertisement->rating}} <i class="fas fa-star"></i></li>
                    <li>{{$advertisement->no_of_loves}} <i class="fas fa-heart"></i></li>
                    <li>{{count($premium_pics)}} <img src="{{asset('front/img/camera_icon.png')}}" class="ml-1"></li>
                    @if ($advertisement->is_verified)
                        <li>Verified <i class="fas fa-check text-green"></i></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row m-0 mt-3 mb-5">
            <div class="col-12 col-md-8 p-0 pr-0 pr-md-5 order-12 order-md-1" id="adDetailsSection">
                <div class="b-img-select">
                    @foreach ($advertisement->advertisement_image as $adImageKeyTwo => $adImageValueTwo)
                        @if($adImageValueTwo->type == 'Image')
                            <a class="button secondary url" href="#{{$adImageKeyTwo}}"><img src="{{asset($adImageValueTwo->img)}}"></a>
                        @endif
                    @endforeach
                </div><!--slider-img-tigger-->

                <div class="row m-0 mt-5">
                    <div class="col-12 p-0 mb-5">
                        <div class="col-12 col-md-6 text-left p-0">
                            <h5>About Me</h5>
                        </div>
                        <div class="col-12 col-md-10 p-0 aboutme-text mt-4">
                            <p>
                                @if ($advertisement->lady)
                                    {{$advertisement->lady->about}}
                                @elseif($advertisement->club)
                                    {{$advertisement->club->about}}
                                @endif
                            </p>
                            <p>
                                TEL: {{$advertisement->phn_no}}<br/>
                                @if ($advertisement->lady)
                                    {{$advertisement->lady->address}}
                                @elseif($advertisement->club)
                                    {{$advertisement->club->address}}
                                <br/>
                                {{$advertisement->club->website_address}}
                                @endif
                            </p>
                            
                        </div>
                    </div>
                </div><!--about-me-->

                <div class="row m-0">
                    <div class="col-12 p-0 mb-4">
                        <div class="col-12 col-md-6 text-left p-0">
                            <h5 class="textpink">My services & extra’s</h5>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 p-0">
                        <ul class="service-me">
                            @foreach ($advertisement->services as $item)
                            <li>
                                <span class="serv-name">{{$item->service_name}}</span>
                                @if ($item->include == 1)
                                    <span class="serv-type">Included</span>
                                @else
                                    <span class="serv-type">&dollar;{{$item->price}}</span>
                                @endif
                            </li> 
                            @endforeach
                        </ul>
                    </div>
                </div><!--my-services-row-->
                
                <div class="row m-0 mt-5">
                    @if ($advertisement->club)
                    <div class="row m-0 mt-5">
                        <div class="col-12 p-0 mb-4 d-md-flex">
                            <div class="col-12 col-md-6 text-left p-0">
                                <h5>Our Ladies</h5>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 p-0 ledis-gl">
                            <div class="card border-0 text-center active">
                                <h5 class="card-title mb-3">Kelly</h5>
                                <img src="{{asset('front/img/gl-1.jpg')}}" class="card-img-top" alt="...">
                            </div>
                        </div>
                        <div class="col-6 col-md-3 p-0 ledis-gl">
                            <div class="card border-0 text-center active">
                                <h5 class="card-title mb-3"> Bella</h5>
                                <img src="{{asset('front/img/gl-2.jpg')}}" class="card-img-top" alt="...">
                            </div>
                        </div>
                        <div class="col-6 col-md-3 p-0 ledis-gl">
                            <div class="card border-0 text-center active">
                                <h5 class="card-title mb-3">Wendy</h5>
                                <img src="{{asset('front/img/gl-3.jpg')}}" class="card-img-top" alt="...">
                            </div>
                        </div>
                        <div class="col-6 col-md-3 p-0 ledis-gl">
                            <div class="card border-0 text-center active">
                                <h5 class="card-title mb-3">Amy</h5>
                                <img src="{{asset('front/img/gl-4.jpg')}}" class="card-img-top" alt="...">
                            </div>
                        </div>
                        <div class="col-6 col-md-3 p-0 ledis-gl">
                            <div class="card border-0 text-center active">
                                <h5 class="card-title mb-3">Gina</h5>
                                <img src="{{asset('front/img/gl-5.jpg')}}" class="card-img-top" alt="...">
                            </div>
                        </div>
                    </div>
                    @elseif($advertisement->lady)
                    <div class="col-12 p-0 mb-4 d-md-flex">
                        <div class="col-12 col-md-6 text-left p-0">
                            <h5>My Premium Pictures</h5>
                        </div>
                        <div class="col-12 col-md-5 text-right p-0 mt-md-0 mt-4">
                            <h6>
                                <a href="javascript:void(0);" onclick="showPremiumPics()" class="p-2 textpink">View all({{count($premium_pics)}})</a>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-11 p-0">
                        <div class="owl-carousel premium-pic">
                            @forelse ($premium_pics as $pics)
                                <div class="item">
                                    <img src="{{asset($pics->picture)}}">
                                    <div class="unlock">
                                        <img src="{{asset('front/img/unlock-icon.png')}}">
                                        <h6>Unlock</h6>
                                    </div>
                                </div>
                            @empty
                                No Pics!
                            @endforelse
                        </div>
                    </div>
                    @endif
                </div><!--picture-slid-->

               <div class="row m-0 review mt-5">
                   <div class="col-12 p-0 mb-4 d-md-flex">
                       <div class="col-12 col-md-6 text-left p-0">
                           <h5>My Reviews</h5>
                       </div>
                       <div class="col-12 col-md-6 text-left text-md-right p-0 mt-md-0 mt-4">
                           <h6>
                                @php
                                    $guard = get_guard();
                                    $user = auth()->guard($guard)->user();
                                    $userId = ($advertisement->lady)? $advertisement->lady->id : $advertisement->club->id;
                                @endphp
                                @if(($user) && ($user->id != $userId))
                                    <a href="javascript:void(0);" class="p-2" data-toggle="modal" data-target="#addReviewModal">Write a Review</a>
                                @elseif(empty($user))
                                    <a href="javascript:void(0);" class="p-2">Login / Registe to add review</a>
                                @endif
                                <span class="bg-pink text-white p-2">
                                    @if ($advertisement->lady)
                                        {{$advertisement->lady->name}}
                                    @elseif($advertisement->club)
                                        {{$advertisement->club->name}}
                                    @endif
                                </span>
                                <span class="bg-pink text-white p-2">{{$advertisement->rating}} <i class="fas fa-star"></i></span>
                            </h6>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="addReviewModal" tabindex="-1" role="dialog" aria-labelledby="addReviewModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('review.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="advertisement_id" value="{{$advertisement->id}}">
                                    <label for="">Rating</label><br>
                                    @for ($i = 1; $i <= 10; $i++)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rating" id="inlineRadio{{$i}}" value="{{$i}}">
                                        <label class="form-check-label" for="inlineRadio{{$i}}">{{$i}}</label>
                                    </div>
                                    @endfor
                                    <div>
                                        <label for="">Positive</label>
                                        <textarea class="form-control" name="positive" id="" cols="100" rows="3" required></textarea>
                                        <label for="">Negative</label>
                                        <textarea class="form-control" name="negative" id="" cols="100" rows="3" required></textarea>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                    <button type="submit" class="login-btn">Add Review</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    @foreach ($reviews as $item)
                    <div class="card position-relative mb-5">
                        <div class="card-header border-0 pt-1 d-flex">
                            <p>
                                <span class="text-lblue">{{$item->user_details->name}}</span> review of <span class="textpink">
                                    @if ($advertisement->lady)
                                        {{$advertisement->lady->name}}
                                    @elseif($advertisement->club)
                                        {{$advertisement->club->name}}
                                    @endif
                                </span>
                                <br>{{date('M Y', strtotime($item->advertisement_details->created_at))}}
                            </p>
                            <sapn class="r-review w-50 ml-0">{{$item->rating}}</sapn>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex bodytext mb-3">
                                <i class="fas fa-plus-circle igreen"></i>
                                <p>
                                    {{$item->positive}}
                                </p>
                            </div>
                            <div class="d-flex bodytext mb-3">
                                <i class="fas fa-minus-circle ired"></i>
                                <p>
                                    {{$item->negative}}
                                </p>
                            </div>
                            <div class="d-flex bg-light-pink p-2 sub-text-review">
                                <div class="textpink">
                                    <i class="fas fa-heart pt-1"></i>
                                </div>
                                @if ($item->reply != '')
                                <p>
                                    Reply from <span class="textpink">
                                        {{$item->reply_user->name}}
                                    </span>
                                    <span class="d-block textpink">
                                        {{$item->reply}}
                                    </span>
                                </p>
                                @else
                                <p>
                                    <span class="d-block textpink">
                                        No reply by user!
                                    </span>
                                </p>
                                @endif
                                
                            </div>
                        </div>
                        <div class="like-section d-flex">
                            <p id="reviewLike" data-total="{{$item->likes}}" onclick="likeDislikeCount(this.id)" style="cursor: pointer;">
                                {{$item->likes}} <i class="far fa-thumbs-up"></i>
                            </p>
                            <p id="reviewDislike" data-total="{{$item->dislikes}}" onclick="likeDislikeCount(this.id)" style="cursor: pointer;">
                                {{$item->dislikes}} <i class="far fa-thumbs-down"></i>
                            </p>
                        </div>
                    </div>
                    @endforeach
               </div><!--review-row-->
            </div><!--details-left-part-->

            <!--premium-pics-left-part START-->
            <div class="col-12 col-md-8 p-0 pr-0 pr-md-5 order-12 order-md-1" id="premiumPictureList" style="display: none;">
                <div class="col-12 p-0 mb-4 d-md-flex">
                    <div class="col-12 col-md-6 text-left p-0">
                        <h5>My Premium Pictures</h5>
                    </div>
                    <div class="col-12 col-md-6 text-right p-0 mt-md-0 mt-4">
                        <h6>
                            <a href="javascript:void(0);" onclick="hidePremiumPics()" class="p-2 textpink">Back <i class="fas fa-chevron-right ml-1 pt-1"></i></a>
                        </h6>
                    </div>
                </div><!--title-->

                <div class="row m-0">
                    @forelse ($premium_pics as $key => $pics)
                        <div class="col-6 col-md-2 plr mb-2 premium-p-t">
                            <div class="card border-0 text-center">
                                <div class="position-relative overflow-hidden">
                                    <img src="{{asset($pics->picture)}}" class="card-img-top" alt="...">
                                    <div class="unlock">
                                        <img src="{{asset('front/img/unlock-icon.png')}}">
                                        <h6>Unlock</h6>
                                    </div>
                                </div>
                                <div class="card-body p-1">
                                    <p class="card-text">
                                        {{(date('d/m/Y', strtotime($pics->created_at)))}}<br/>
                                        3x<br/>
                                        ‘{{$pics->theme}}’
                                    </p>
                                    <p class="card-text">
                                        Unlocked : <span> {{$pics->no_of_purchase}}x</span> <br/>
                                        Price : <span> {{$pics->price}} coins</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        No Pics!
                    @endforelse
                </div>
            </div>
            <!--premium-pics-left-part END-->

            <!--bookin-left-part START-->
            @php
                if ($advertisement->lady) {
                    $adUser = $advertisement->lady;
                }
                elseif($advertisement->club) {
                    $adUser = $advertisement->club;
                }
            @endphp
            <div class="col-12 col-md-8 p-0 pr-0 pr-md-5 order-12 order-md-1" id="bookingSection" style="display: none;">
                <div class="col-12 p-0 mb-4 d-md-flex">
                    <div class="col-12 col-md-6 text-left p-0">
                        <h5>Online Booking with <span class="textpink">{{$adUser->name}}</span></h5>
                    </div>
                    <div class="col-12 col-md-6 text-right p-0 mt-md-0 mt-4">
                        <h6>
                            <a href="javascript:void(0);" onclick="hidePremiumPics()" class="p-2 textpink">Back <i class="fas fa-chevron-right ml-1 pt-1"></i></a>
                        </h6>
                    </div>
                </div>
                @guest
                <div class="row m-0 mt-5"><p class="textpink">You need to login/register to book this service</p></div>
                @endguest
                @auth
                <div class="row m-0 mt-5">
                    <p class="mt-2">
                        Welcome to the Online Booking tool of DateKelly where you can easily create a date with your favorite Lady!
                    </p>
                    <p>
                        Please note that you need <span class="text-lblue">120 DateKelly Coins</span> as down payment for the Online Booking.
                        Your Lady will only receive your 120 DateKelly Coins when you meet her at your date.
                    </p>
                </div>
                <div class="row m-0 mt-4">
                    <h6 class="mb-3 col-12 p-0">Youe DateKelly Coin balance</h6>
                    <div class="input-group mb-3 col-12 col-md-9 p-0">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-dark-blue"><i class="fas fa-donate mr-1"></i> DK </span>
                        </div>
                        <input type="text" class="form-control coinbalance" readonly="" value="{{totalCoinsCalculate(auth()->guard(get_guard())->user()->coins)}} Datekelly Coins">
                        <div class="input-group-append">
                            <button class="btn btn-upload mt-0" onclick="location.href='{{route('coins.buy')}}'" type="button">Buy DateKelly Coin</button>
                        </div>
                        <p class="pt-1">Read our <a href="#" class="textpink">FAQ</a> for more infomation about an Online Booking.</p>
                    </div>
                </div>
                <form action="{{route('booking.create')}}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$adUser->id}}">
                    <input type="hidden" name="advertisement_id" value="{{$advertisement->id}}">
                    <div class="row mt-5 m-0 lady_manage_bottom">
                        <div class="search-form col-12 mb-3 p-0">
                            <h6 class="p-0">Online Booking request - <span class="textpink">
                                {{$adUser->name}}
                            </span></h6>
                        </div>
                        <div class="col-md-2 col-12">
                            <p><b>Short : </b></p>
                        </div>
                        <div class="col-md-3 col-12 custom-ser-text">
                            <div class="custom-control custom-checkbox">
                                <input type="radio" class="custom-control-input mr-2" id="customCheck1" name="visit_type" value="0" selected>
                                <label class="custom-control-label pl-2" for="customCheck1">Private Visit</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 custom-ser-text">
                            <div class="custom-control custom-checkbox">
                                <input type="radio" class="custom-control-input mr-2" id="customCheck2" name="visit_type" value="1">
                                <label class="custom-control-label pl-2" for="customCheck2">Escort (Lady will visit you)</label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 mt-4">
                        <p><b>Fill in your address where the client visit you</b></p>
                        <table class="table table-sm table-borderless aprovial-table">
                            <tr>
                                <td>Address Line 1</td>
                                <td><input class="form-control form-control-sm" type="text" placeholder="Address line 1" name="customer_address_1"></td>
                            </tr>
                            <tr>
                                <td>Address Line 2</td>
                                <td><input class="form-control form-control-sm" type="text" placeholder="Address line 2" name="customer_address_2"></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td><input class="form-control form-control-sm" type="text" placeholder="City" name="customer_city"></td>
                            </tr>
                            <tr>
                                <td>Your Telephone number:</td>
                                <td><input class="form-control form-control-sm" type="number" placeholder="Telephone number" name="customer_telephone"></td>
                            </tr>
                            <tr>
                                <td>Extra information:</td>
                                <td><input class="form-control form-control-sm" type="text" placeholder="Extra information" name="extra_info"></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="pt-3 pb-3">
                                    <b>Private visit :</b>  When Alexandra confirms the Online Booking request, you will receive her address to visit her.
                                </td>
                            </tr>
                            <tr>
                                <td>Date:</td>
                                <th class="textpink"><input type="date" name="date" id="date" class="form-control form-control-sm"></th>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <th class="textpink"><input type="time" name="time" id="time" class="form-control form-control-sm"></th>
                            </tr>
                            <tr>
                                <td>Duration:</td>
                                <th class="textpink">
                                    <select name="duration_id" class="form-control form-control-sm" id="">
                                        <option value="" hidden>-select duration-</option>
                                        @foreach ($advertisement->service_duration as $item)
                                        <option value="{{$item->id}}">{{$item->time}} - &dollar; {{$item->price}}</option>
                                        @endforeach
                                    </select>
                                </th>
                            </tr>
                        </table>
                    </div>
                    <div class="row m-0 mt-4 lady_manage_bottom">
                        <p class="col-12 p-0 mb-3"><b>Select Service and Extra’s:</b></p>
                        <div class="col-12 col-md-5 p-0">
                            @foreach ($advertisement->services as $key => $item)
                            <div class="d-flex">
                                <div class="custom-ser-text">
                                    <div class="custom-control form-control-lg custom-checkbox pt-0 pb-0 h-30">
                                        <input type="checkbox" class="custom-control-input mr-2" id="service{{$key}}" name="service_id[]" value="{{$item->id}}">
                                        <label class="custom-control-label pl-2 textpink" for="service{{$key}}">{{$item->service_name}}</label>
                                    </div>
                                </div>
                                @if ($item->include == 1)
                                    <p class="textpink ml-auto mb-0"><b>Included</b></p>
                                @else
                                    <p class="textpink ml-auto mb-0"><b>&dollar;{{$item->price}}</b></p>
                                @endif
                            </div>
                            @endforeach
                        </div> 
                    </div>
                    <div class="row m-0 mt-4">
                        <div class="col-12 col-md-7 p-0">
                            <p>Estimated price based on the duration of the date: <span class="float-right textpink"><b>£100,-</b></span></p>
                            <p>Extra services selected by Client:<span class="float-right textpink"><b>£100,-</b></span></p>
                            <p>Extra for Escort: <span class="float-right textpink"><b>£100,-</b></span></p>
                            <p>Deposit by Client: <span class="float-right textpink"><span class="text-blue">120 DateKelly coins</span> <b>(£30-),</b></span></p>
                            <p><b>To be paid on the date by Client:</b> <span class="float-right textpink"><b>£220,-</b></span></p>
                        </div>
                    </div>
                    <div class="row m-0 pt-4 pb-4 lady_manage_bottom">
                        <div class="custom-ser-text">
                            <div class="custom-control form-control-lg custom-checkbox pb-0">
                                <input type="checkbox" class="custom-control-input mr-2" id="customCheck3" required>
                                <label class="custom-control-label pl-2" for="customCheck3">
                                    I agree with the Terms and Conditions of DateKelly.
                                </label>
                            </div>
                        </div>
                        <div class="custom-ser-text">
                            <div class="custom-control form-control-lg custom-checkbox pb-0">
                                <input type="checkbox" class="custom-control-input mr-2" id="customCheck4" required>
                                <label class="custom-control-label pl-2" for="customCheck4">
                                    I agree that DateKelly will take <span class="text-lblue">120 DateKelly coins</span> as a deposit for the Online Booking. Alexandra will receive this deposit at the date. Please give her the code that is sent to your e-mail. By giving the code to Alexandra, you allow Alexandra to claim your 120 DateKelly coins in the deposit.
                                </label>
                            </div>
                        </div>
                        <div class="mt-5 mb-4">
                            <button type="submit" class="btn btn-upload">Approve Online Booking Request</button>
                        </div>
                        <p>
                            The Online Booking will be final when Alexandra confirms the Online Booking. You will receive a confirmation of the Online Booking in your Dashboard and by e-mail.
                        </p>
                    </div>
                </form> 
                @endauth
            </div>
            <!--bookin-left-part END-->

            <!--right-part START-->
            <div class="col-12 col-md-3 ml-auto p-0 order-1 order-md-12 mb-4 mb-md-0">
                <div class="bg-light-pink p-2 mb-2 text-center">
                    <h6>
                        {{($advertisement->country)? $advertisement->country->name : ''}}
                        <small class="d-block"> {{($advertisement->city)? $advertisement->city->name : ''}}</small>
                    </h6>
                    <p>
                        <span class="d-block mb-0 mt-3">{{$advertisement->message}}</span>
                    </p>
                </div>
                <div class="row m-0 bg-light-pink mb-2">
                    <div class="col-md-6 col-12 call-adv-r">
                        <h6>{{$advertisement->phn_no}}</h6>
                    </div>
                    <div class="col-md-6 col-12 call-adv-r border-right-0" data-toggle="modal" data-target="#sendMessageModal" style="cursor: pointer;">
                        <p class="mb-0"><img src="{{asset('front/img/adv_chat-icon.png')}}"> <b>Message</b></p>
                    </div>
                    <div class="col-md-6 col-12 call-adv-r">
                        <p class="mb-0"><a href="tel:{{$advertisement->phn_no}}"><img src="{{asset('front/img/adv_call-icon.png')}}"> <b>Call Me</b></a></p>
                    </div>
                    <div class="col-md-6 col-12 call-adv-r border-right-0">
                        <p class="mb-0"><a href="https://wa.me/{{$advertisement->whatsapp}}"><img src="{{asset('front/img/whatsap_icon.png')}}"> <b>Whatsapp</b> </a></p>
                    </div>
                    <div class="bg-light-pink p-2 my-2 justify-content-center row m-0" onclick="showBookingSection()" style="cursor: pointer;">
                        <div class="col-2"><img src="{{asset('front/img/online_book.png')}}" class="mr-2 pl-4"></div>
                        <div class="col-10 pl-5">
                            <h6>
                                <span class="textpink">Online Booking</span>
                                <small class="d-block"> <b>Escort & Private visit</b></small>
                            </h6>
                        </div>
                    </div>
                </div>
                <!-- Send Message Modal -->
                <div class="modal fade" id="sendMessageModal" tabindex="-1" role="dialog" aria-labelledby="sendMessageModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="sendMessageModalLabel">Send Message</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @if (($guard == 'web') && ($userId != auth()->guard($guard)->user()->id))
                                <div class="modal-body">
                                    
                                    <input type="hidden" id="userId" value="{{$userId}}">
                                    <textarea id="message" class="form-control" rows="5" placeholder="Your Message ..."></textarea>
                                    <div id="status"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="messageSendingButton" class="login-btn">Send Message</button>
                                </div>
                            @elseif (($guard == 'web') && ($userId == auth()->guard($guard)->user()->id))
                                <div class="modal-body">Oops ! You can not send message to yourself</div>
                            @else
                                <div class="modal-body">Login/Register to send messages.</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="lady-data bg-light-pink mb-2">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td>Sex: </td>
                            <th>{{$advertisement->sex}}</th>
                        </tr>
                        <tr>
                            <td>Age: </td>
                            <th>{{$advertisement->age}}</th>
                        </tr>
                        <tr>
                            <td>Length: </td>
                            <th>{{$advertisement->length}} cm</th>
                        </tr>
                        <tr>
                            <td>Cup size: </td>
                            <th>{{$advertisement->cup_size}}</th>
                        </tr>
                        <tr>
                            <td>Weight: </td>
                            <th>{{$advertisement->weight}}kg</th>
                        </tr>
                        <tr>
                            <td>Body size: </td>
                            <th>{{$advertisement->body_size}}</th>
                        </tr>
                        <tr>
                            <td>Descent: </td>
                            <th>{{$advertisement->descent}}</th>
                        </tr>
                        <tr>
                            <td>Language: </td>
                            <td><b>
                            @php
                                $langs = explode(',', $advertisement->language)
                            @endphp

                            @foreach ($languages as $item)
                                @if(in_array($item->id,$langs))
                                    {{$item->name}},
                                @endif
                            @endforeach
                            </b></td>
                        </tr>
                    </table>
                </div>
                <div class="lady-data bg-light-pink mb-2">
                    <table class="table table-sm table-borderless">
                        @foreach ($advertisement->service_duration as $item)
                        <tr>
                            <td>{{$item->time}}</td>
                            <td><b>&dollar; {{$item->price}}</b></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="bg-light-pink p-2 pt-3 pb-3">
                    @if ($advertisement->lady)
                        <p class="mb-0"><b>{{$advertisement->lady->name}}</b> is a member since <b>{{date('d/M/Y', strtotime($advertisement->lady->created_at))}}</b></p>
                        <p class="mb-0">Views on her profile &nbsp; <b>23.548</b></p>
                        {{-- <p class="mb-0">Last time online &nbsp; <b>12/Apr/2021</b></p> --}}
                    @elseif($advertisement->club)
                    <p class="mb-0"><b>{{$advertisement->club->name}}</b> is a member since <b>{{date('d/M/Y', strtotime($advertisement->club->created_at))}}</b></p>
                        <p class="mb-0">Views on profile &nbsp; <b>23.548</b></p>
                        {{-- <p class="mb-0">Last time online &nbsp; <b>12/Apr/2021</b></p> --}}
                    @endif
                    
                </div>
                <div class="row m-0 text-center">
                    <div class="col-4 bg-pink p-1" data-id="{{$userId}}" data-customer="{{($user)?$user->id:''}}" data-ad="{{$advertisement->id}}" id="loveButton" onclick="loveCount()" style="cursor: pointer;"> 
                        <h6 class="text-white alart-adv-text"><i class="fas fa-heart"></i> Love</h6>
                    </div>
                    <div class="col-4 bg-dark-blue text-white p-1">
                        <h6 class="text-white alart-adv-text"><i class="fas fa-donate"></i> DK </h6>
                    </div>
                    <div class="col-4 bg-warning p-1">
                        <h6 class="text-white alart-adv-text"><i class="fas fa-exclamation-triangle"></i> Report </h6>
                    </div>
                </div>
            </div>
            <!--right-part END-->
        </div>
    </div>
</section><!--advertisement_lady_body-->



@endsection

@section('script')
    
<script>

    function showPremiumPics() {
        $("#premiumPictureList").show();
        $("#adDetailsSection").hide();
        $("#bookingSection").hide();
        window.scroll({
            top: 0, 
            left: 0, 
            behavior: 'smooth' 
        });
    }
    function hidePremiumPics() {
        $("#premiumPictureList").hide();
        $("#adDetailsSection").show();
        $("#bookingSection").hide();
    }
    function showBookingSection() {
        $("#premiumPictureList").hide();
        $("#adDetailsSection").hide();
        $("#bookingSection").show();
    }
    $(document).on('click','#messageSendingButton',function(){
        var submitBtn = $(this);
        $('#status').empty();
        var message = $('#message').val();
        var userId = $('#userId').val();
        if(message == ''){
            $('#status').empty().append('<div class="alert alert-danger mt-2" role="alert">Please type your message</div>');
        }else{
            submitBtn.attr('disabled',true);
            $.ajax({
                url: "{{route('message.from.front')}}",
                type: 'post',
                data: {message:message, userId:userId, '_token':'{{csrf_token()}}'},
                success:function(data){
                    if(data.error == true){
                        $('#status').empty().append('<div class="alert alert-danger mt-2" role="alert">'+data.message+'</div>');
                        submitBtn.attr('disabled',false);
                    }else{
                        $('#status').empty().append('<div class="alert alert-success mt-2" role="alert">'+data.message+'</div>');
                    }
                }
            });
        }
    });

    customerId = $("#loveButton").data("customer");
    userId = $("#loveButton").data("id");
    adId = $("#loveButton").data("ad");

    //love
    function loveCount() {
        if (customerId != '') {
            $.ajax({
                url: "{{route('count.love')}}",
                type: "POST",
                data: {customerId: customerId, userId: userId, adId: adId, _token: "{{csrf_token()}}"},
                success:function(data) {
                    loveChecking();
                }
            })
        } else {
            swal('Oops!', 'You need to login/register first', 'error');
        }
    }
    function loveChecking() {
        if(customerId != '') {
            $.ajax({
                url: "{{route('check.love')}}",
                type: "POST",
                data: {customerId: customerId, userId: userId, adId: adId, _token: "{{csrf_token()}}"},
                success:function(data) {
                    $("#loveButton").empty();
                    if(data.error == false && data.love == false) {
                        $("#loveButton").append('<h6 class="text-white alart-adv-text"><i class="fas fa-heart"></i> Love</h6>');
                    }
                    if(data.error == false && data.love == true) {
                        $("#loveButton").append('<h6 class="text-white alart-adv-text"><i class="fas fa-heart"></i> Loved!</h6>');
                    }
                }
            })
        }
    }
    loveChecking()

    //like dislike on review
    function likeDislikeCount(id) {
        if (customerId != '') {
            $.ajax({
                url: "{{route('count.like.dislike')}}",
                type: "POST",
                data: {customerId: customerId, userId: userId, adId: adId, option: id, _token: "{{csrf_token()}}"},
                success:function(data) {
                    likeDislikeChecking();
                }
            })
        } else {
            swal('Oops!', 'You need to login/register first', 'error');
        }
    }
    function likeDislikeChecking() {
        if(customerId != '') {
            $.ajax({
                url: "{{route('check.like.dislike')}}",
                type: "POST",
                data: {customerId: customerId, userId: userId, adId: adId, _token: "{{csrf_token()}}"},
                success:function(data) {
                    console.log(data);
                    $("#reviewLike").empty();
                    $("#reviewDislike").empty();
                    let likerow = data.total.totalLike;
                    let dislikerow = data.total.totalDislike;
                    if(data.error == false && ((data.like == false) && (data.dislike == true))) {
                        likerow += ' <i class="far fa-thumbs-up"></i>';
                        dislikerow += ' <i class="fas fa-thumbs-down"></i>';
                    }
                    if(data.error == false && ((data.like == true) && (data.dislike == false))) {
                        likerow += ' <i class="fas fa-thumbs-up"></i>';
                        dislikerow += ' <i class="far fa-thumbs-down"></i>';
                    }
                    if(data.error == false && ((data.like == false) && (data.dislike == false))) {
                        likerow += ' <i class="far fa-thumbs-up"></i>';
                        dislikerow += ' <i class="far fa-thumbs-down"></i>';
                    }
                    $("#reviewLike").append(likerow);
                    $("#reviewDislike").append(dislikerow);
                }
            })
        }
    }
    likeDislikeChecking()
</script>

@endsection