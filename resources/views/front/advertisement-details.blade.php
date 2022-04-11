@extends('front.master')

@section('title')
    Advertisement Details
@endsection

@section('content')
<section class="position-relative">
    <div data-toggle="modal" data-target="#imagesSliderModal22">
        <div class="owl-carousel banner-pic">
            @foreach ($advertisement->advertisement_image as $adImageKey => $adImageValue)
                @if($adImageValue->type == 'Image')
                    <div class="item" data-hash="{{$adImageKey}}">
                        <img src="{{asset($adImageValue->img)}}">
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="image-sl-text">
        <div class="container">
            <div class="row m-0">
                <ul>
                    <li>
                    @if($advertisement->lady)
                        {{$advertisement->lady->name}}
                    @elseif($advertisement->club)
                        {{$advertisement->title}}
                        {{-- {{$advertisement->club->name}} --}}
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
                <div class="b-img-select owl-carousel sm_grl_pic">
                    @foreach ($advertisement->advertisement_image as $adImageKeyTwo => $adImageValueTwo)
                    <div class="item">
                        @if($adImageValueTwo->type == 'Image')
                            <a class="button secondary url" href="#{{$adImageKeyTwo}}"><img src="{{asset($adImageValueTwo->img)}}"></a>
                        @endif
                    </div>
                    @endforeach
                </div><!--slider-img-tigger-->

                <div class="row m-0 mt-5">
                    <div class="col-12 p-0 mb-5">
                        <div class="col-12 col-md-6 text-left p-0">
                            <h5>About Me</h5>
                        </div>
                        <div class="col-12 col-md-10 p-0 aboutme-text mt-4">
                            <p>
                                {{$advertisement->about}}
                            </p>
                            
                            <p>
                                <strong class="d-block mb-2">Phone No.</strong>
                                 {{$advertisement->phn_no}}
                                <span class="d-block mt-2"><strong class="d-block mb-2">Address : </strong>{{$advertisement->address}}</span>

                                @if($advertisement->club)
                                    {{-- {{$advertisement->address}}<br/> --}}
                                    {{$advertisement->club->website_address}}
                                @endif
                            </p>
                            
                        </div>
                    </div>
                </div><!--about-me-->
                
                <!-- Category -->
                {{-- @if(count($advertisement->ad_categories) > 0)
                    <div class="row m-0">
                        <div class="col-12 p-0 mb-4">
                            <div class="col-12 col-md-6 text-left p-0">
                                <h5 class="textpink">My Category</h5>
                            </div>
                        </div>
                        <div class="col-12 col-md-5 p-0">
                            <ul class="service-me">
                                @foreach ($advertisement->ad_categories as $item)
                                    @if($adcategory = $item->category)
                                        <li>
                                            <span class="serv-name"><a href="{{route('advertisement.category.list', [base64_encode($adcategory->id),$adcategory->name])}}">{{$adcategory->name}}</a></span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div><br>
                @endif --}}

                @if(count($advertisement->services) > 0)
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
                                    <span class="serv-name"><a href="{{route('advertisement.service.list', [$item->service_name])}}">{{$item->service_name}}</a></span>
                                    @if ($item->include == 1)
                                        <span class="serv-type">Included</span>
                                    @else
                                        <span class="serv-type">&euro; {{$item->price}}</span>
                                    @endif
                                </li> 
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="row m-0 mt-5">
                    @if ($ourLadies->count() > 0)
                        {{-- <div class="row m-0 mt-5">
                            <div class="col-12 p-0 mb-4 d-md-flex">
                                <div class="col-12 col-md-6 text-left p-0">
                                    <h5>Our Ladies</h5>
                                </div>
                            </div>

                            @foreach($ourLadies as $ourLady)
                            <div class="col-6 col-md-3 p-0 ledis-gl">
                                <a href="{{route('advertisement.detail', base64_encode($ourLady->id))}}">
                                    <div class="card border-0 text-center active">
                                        <h5 class="card-title mb-3">{{$ourLady->title}}</h5>
                                        <img src="{{asset($ourLady->image)}}" class="card-img-top" alt="...">
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div> --}}

                    @elseif($advertisement->lady && $advertisement->is_verified == 1)
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
                                    <div class="item" onclick="purchaseCheckPremiumPicture('{{json_encode($pics)}}')">
                                        @if (checkPremiumPictureOldOrNew($pics->created_at) == 1)
                                            <div class="mod_new">New</div>
                                        @endif

                                        @php
                                            $file_path = $pics->picture;
                                            $file_extension= explode('.',$file_path)[1];
                                            @endphp
                                            @if ($file_extension === 'jpg' || $file_extension === 'jpeg' || $file_extension === 'png' || $file_extension === 'webp' || $file_extension === 'PNG')
                                                <img src="{{ asset($file_path) }}" alt="">
                                            @else
                                                <video controls>
                                                    <source src="{{ asset($file_path) }}" type="video/{{ $file_extension }}">
                                                Your browser does not support the video tag.
                                                </video>
                                        @endif
                                        {{-- <img src="{{asset($pics->picture)}}"> --}}
                                        {{-- @if (checkPremiumPurchase($pics->id,Auth::user()->id)) --}}
                                            
                                        {{-- @else --}}
                                            <div class="unlock">
                                                <div>
                                                    <img src="{{asset('front/img/unlock-icon.png')}}" class="d-block">
                                                    <h6>Unlock</h6>
                                                </div>
                                            </div>
                                        {{-- @endif --}}
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
                       <div class="col-12 col-md-4 text-left p-0">
                           <h5>My Reviews</h5>
                       </div>
                       <div class="col-12 col-md-8 text-left text-md-right p-0 mt-md-0 mt-4">
                           <h6>
                                @php
                                    $guard = get_guard();
                                    $user = auth()->guard($guard)->user();
                                    $userId = ($advertisement->lady)? $advertisement->lady->id : $advertisement->club->id;
                                @endphp
                                @if(($user) && ($user->id != $userId))
                                    <a href="javascript:void(0);" class="p-2" data-toggle="modal" data-target="#addReviewModal">Write a Review</a>
                                @elseif(empty($user))
                                    <a href="{{route('user.login')}}" class="p-2">Login / Register to add review</a>
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
                        <div class="modal-dialog modal-dialog-centered reviewModal" role="document">
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
                                    <input type="hidden" name="advertisement_id" value="{{$advertisement->id}}" class="d-none">
                                    <label for="">Rating</label><br>
                                    @for ($i = 1; $i <= 10; $i++)
                                    <div class="form-check form-check-inline mb-2">
                                        <input class="form-check-input d-none" type="radio" name="rating" id="inlineRadio{{$i}}" value="{{$i}}">
                                        <label class="form-check-label" for="inlineRadio{{$i}}">{{$i}}</label>
                                    </div>
                                    @endfor
                                    <div class="mb-4 mt-3 positive">
                                        <label for="" class="mb-3">Positive</label>
                                        <textarea class="form-control" name="positive" id="" cols="100" rows="3" required></textarea>
                                    </div>
                                        
                                    <div class="mb-4">
                                        <label for="" class="mb-3">Negative</label>
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
                        <div class="card position-relative mb-5 w-100">
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
                                    <p>{{$item->positive}}</p>
                                </div>
                                <div class="d-flex bodytext mb-3">
                                    <i class="fas fa-minus-circle ired"></i>
                                    <p>{{$item->negative}}</p>
                                </div>
                                <div class="d-flex bg-light-pink p-2 sub-text-review">
                                    <div class="textpink">
                                        <i class="fas fa-heart pt-1"></i>
                                    </div>
                                    @if ($item->reply != '' && $item->reply_user)
                                        <p>
                                            Reply from <span class="textpink">
                                                {{$item->reply_user->name}}
                                            </span>
                                            <span class="d-block textpink">
                                                {{$item->reply}}
                                            </span>
                                        </p>
                                    @else
                                        <p><span class="d-block textpink">No reply by user!</span></p>
                                    @endif
                                </div>
                            </div>
                            <div class="like-section d-flex">
                                <p id="reviewLike" data-total="{{$item->likes}}" onclick="likeDislikeCount(this.id)" style="cursor: pointer;">{{$item->likes}} <i class="far fa-thumbs-up"></i></p>
                                <p id="reviewDislike" data-total="{{$item->dislikes}}" onclick="likeDislikeCount(this.id)" style="cursor: pointer;">{{$item->dislikes}} <i class="far fa-thumbs-down"></i></p>
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
                        <div class="col-6 col-md-3 plr mb-2 premium-p-t" onclick="purchaseCheckPremiumPicture('{{ json_encode($pics)}} ')">
                            <div class="card border-0 text-center">
                                <div class="position-relative unlock-cont">
                                    @if (checkPremiumPictureOldOrNew($pics->created_at) == 1)
                                            <div class="mod_new">New</div>
                                    @endif

                                    @php
                                        $file_path = $pics->picture;
                                        $file_extension= explode('.',$file_path)[1];
                                        @endphp
                                        @if ($file_extension === 'jpg' || $file_extension === 'jpeg' || $file_extension === 'png' || $file_extension === 'webp' || $file_extension === 'PNG')
                                            <img src="{{ asset($file_path) }}" alt="" class="card-img-top">
                                        @else
                                            <video controls class="card-img-top">
                                                <source src="{{ asset($file_path) }}" type="video/{{ $file_extension }}">
                                            Your browser does not support the video tag.
                                            </video>
                                    @endif

                                    {{-- <img src="{{asset($pics->picture)}}" class="card-img-top" alt="..."> --}}
                                    @if($guard == 'web' && $user && checkPremiumPurchase($pics->id,$user->id))
                                        
                                    @else
                                        <div class="unlock">
                                            <div>
                                                <img src="{{asset('front/img/unlock-icon.png')}}">
                                                <br/>
                                                <h6>Unlock</h6>
                                            </div>
                                            @if ($pics->notes != '')
                                                <div class="I_hover">
                                                    <a href="">
                                                        <i class="fas fa-info-circle"></i>
                                                        <br/>
                                                        <h6>Info</h6>
                                                    </a>
                                                    <div class="infoText">
                                                        <p>
                                                            {!! $pics->notes !!}
                                                        </p>
                                                    </div>
                                                </div>
                                                
                                            @endif
                                            
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body p-1">
                                    @if($guard == 'web' && $user && checkPremiumPurchase($pics->id,$user->id))
                                    <p class="card-text">
                                        Purchased
                                    </p>
                                    @else
                                    <p class="card-text">
                                       Locked
                                    </p>
                                    @endif
                                    <p class="card-text">
                                        {{-- {{(date('d/m/Y', strtotime($pics->created_at)))}}<br/> --}}
                                        {{-- 3x<br/> --}}
                                        ‘{{$pics->theme}}’
                                    </p>
                                    <p class="card-text">
                                        {{-- Unlocked : <span> {{$pics->no_of_purchase}}x</span> <br/> --}}
                                        Price : <span> {{$pics->price}} coins</span><br/>
                                        Upload date : {{ date('d/m/y',strtotime($pics->created_at)) }}
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
                          <span class="input-group-text bg-dark-blue"><i class="fas fa-donate mr-1"></i> Tip </span>
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
                    <input type="hidden" name="bookingForm" value="bookingStart">
                    <div class="row mt-5 m-0 lady_manage_bottom">
                        <div class="search-form col-12 mb-3 p-0">
                            <h6 class="p-0">Online Booking request - 
                                <span class="textpink">{{$adUser->name}}</span>
                            </h6>
                        </div>
                        <div class="col-md-2 col-12">
                            <p><b>Short : </b></p>
                        </div>
                        <div class="col-md-3 col-12 custom-ser-text">
                            <div class="custom-control custom-checkbox">
                                <input type="radio" class="custom-control-input mr-2" id="customCheck1" name="visit_type" value="0" @if(old('visit_type') == 0){{('checked')}}@endif>
                                <label class="custom-control-label pl-2" for="customCheck1">Private Visit</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 custom-ser-text">
                            <div class="custom-control custom-checkbox">
                                <input type="radio" class="custom-control-input mr-2" id="customCheck2" name="visit_type" value="1" @if(old('visit_type') == 1){{('checked')}}@endif>
                                <label class="custom-control-label pl-2" for="customCheck2">Escort (Lady will visit you)</label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 mt-4">
                        <p><b>Fill in your address where the client visit you</b></p>
                        <table class="table table-sm table-borderless aprovial-table">
                            <tr>
                                <td>Address Line 1</td>
                                <td>
                                    <input class="form-control form-control-sm" type="text" placeholder="Address line 1" name="customer_address_1" value="{{old('customer_address_1')}}">
                                    @error('customer_address_1')<span class="text-danger">{{$message}}</span>@enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Address Line 2</td>
                                <td>
                                    <input class="form-control form-control-sm" type="text" placeholder="Address line 2" name="customer_address_2" value="{{old('customer_address_2')}}">
                                    @error('customer_address_2')<span class="text-danger">{{$message}}</span>@enderror
                                </td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td>
                                    <input class="form-control form-control-sm" type="text" placeholder="City" name="customer_city" value="{{old('customer_city')}}">
                                    @error('customer_city')<span class="text-danger">{{$message}}</span>@enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Your Telephone number:</td>
                                <td>
                                    <input class="form-control form-control-sm" type="number" placeholder="Telephone number" name="customer_telephone" value="{{old('customer_telephone')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10">
                                    @error('customer_telephone')<span class="text-danger">{{$message}}</span>@enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Extra information:</td>
                                <td>
                                    <input class="form-control form-control-sm" type="text" placeholder="Extra information" name="extra_info" value="{{old('extra_info')}}">
                                    @error('extra_info')<span class="text-danger">{{$message}}</span>@enderror
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="pt-3 pb-3">
                                    <b>Private visit :</b>  When Alexandra confirms the Online Booking request, you will receive her address to visit her.
                                </td>
                            </tr>
                            <tr>
                                <td>Date:</td>
                                <th class="textpink">
                                    <input type="date" name="date" id="date" class="form-control form-control-sm" value="{{old('date')}}" min="{{date('Y-m-d',strtotime('+1 day'))}}">
                                    @error('date')<span class="text-danger">{{$message}}</span>@enderror
                                </th>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <th class="textpink">
                                    <input type="time" name="time" id="time" class="form-control form-control-sm" value="{{old('time')}}">
                                    @error('time')<span class="text-danger">{{$message}}</span>@enderror
                                </th>
                            </tr>
                            <tr>
                                <td>Duration:</td>
                                <th class="textpink">
                                    <select name="duration_id" class="form-control form-control-sm">
                                        <option value="" hidden>-select duration-</option>
                                        @foreach ($advertisement->service_duration as $item)
                                            <option value="{{$item->id}}" @if(old('duration_id') == $item->id){{('selected')}}@endif>{{$item->time}} - &euro; {{$item->price}}</option>
                                        @endforeach
                                    </select>
                                    @error('duration_id')<span class="text-danger">{{$message}}</span>@enderror
                                </th>
                            </tr>
                        </table>
                    </div>
                    <div class="row m-0 mt-4 lady_manage_bottom">
                        <p class="col-12 p-0 mb-3"><b>Select Service and Extra’s:</b></p>
                        <div class="col-12 col-md-5 p-0">
                            @php $selectedService = (old('service_id') ?? []); @endphp
                            @foreach ($advertisement->services as $key => $item)
                                <div class="d-flex">
                                    <div class="custom-ser-text">
                                        <div class="custom-control form-control-lg custom-checkbox pt-0 pb-0 h-30">
                                            <input type="checkbox" class="custom-control-input mr-2 servicesSelection" id="service{{$key}}" name="service_id[]" data-details="{{json_encode($item)}}" value="{{$item->id}}" @if(in_array($item->id,$selectedService) || $item->include == 1){{('checked')}}@endif>
                                            <label class="custom-control-label pl-2 textpink" for="service{{$key}}">{{$item->service_name}}</label>
                                        </div>
                                    </div>
                                    @if ($item->include == 1)
                                        <p class="textpink ml-auto mb-0"><b>Included</b></p>
                                    @else
                                        <p class="textpink ml-auto mb-0"><b>{{$item->price}} Coins</b></p>
                                    @endif
                                </div>
                            @endforeach
                        </div> 
                    </div>
                    <input type="hidden" name="selectedPrice" id="selectedPriceInput" value="{{(old('selectedPrice') ?? 100)}}">
                    @error('selectedPrice')<span class="text-danger">{{$message}}</span>@enderror
                    <div class="row m-0 mt-4">
                        <div class="col-12 col-md-7 p-0">
                            <!-- <p>Estimated price based on the duration of the date: <span class="float-right textpink"><b>£100,-</b></span></p> -->
                            <p>Extra services selected by Client:<span class="float-right textpink"><b class="extraSelected">0</b></span></p>
                            <!-- <p>Extra for Escort: <span class="float-right textpink"><b>£100,-</b></span></p> -->
                            <!-- <p>Deposit by Client: <span class="float-right textpink"><span class="text-blue"><span class="totalPoints">120</span> DateKelly coins</span> <b>(£30-),</b></span></p> -->
                            <p><b>To be paid on the date by Client:</b> <span class="float-right textpink"><b><span class="totalPoints">100</span> DateKelly coins</b></span></p>
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
                                    I agree that DateKelly will take <span class="text-lblue"><span class="totalPoints">100</span> DateKelly coins</span> as a deposit for the Online Booking. Alexandra will receive this deposit at the date. Please give her the code that is sent to your e-mail. By giving the code to Alexandra, you allow Alexandra to claim your 120 DateKelly coins in the deposit.
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
                    @if($advertisement->country && $advertisement->city)
                        <h6>
                            {{ $advertisement->country->name }}
                            <small class="d-block"> {{ $advertisement->city->name }}</small>
                        </h6>
                    @endif
                    <p>
                        {{-- my services checkbox --}}
                        @php
                            $advMyServices = explode(',', $advertisement->my_service);
                            foreach ($advMyServices as $services) {
                                if ($services == 'private_visit') {
                                    echo '<span class="d-block mb-0 mt-3">You can visit me - <b>Private visit</b></span>';
                                } elseif ($services == 'escort') {
                                    echo '<span class="d-block">I will visit you - <b>Escort</b></span>';
                                } else {
                                    echo '';
                                }
                            }
                        @endphp

                        {{-- my services radio --}}
                        {{-- @if($advertisement->my_service == 'private_visit')
                            <span class="d-block mb-0 mt-3">You can visit me - <b>Private visit</b></span>
                        @elseif($advertisement->my_service == 'escort')
                            <span class="d-block">I will visit you - <b>Escort</b></span>
                        @endif --}}
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
                        <p class="mb-0"><a href="tel:{{$advertisement->phn_no}}" target="_blank"><img src="{{asset('front/img/adv_call-icon.png')}}"> <b>Call Me</b></a></p>
                    </div>
                    <div class="col-md-6 col-12 call-adv-r border-right-0">
                        <p class="mb-0"><a href="https://wa.me/{{$advertisement->whatsapp}}" target="_blank"><img src="{{asset('front/img/whatsap_icon.png')}}"> <b>Whatsapp</b> </a></p>
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
                            {{-- descents checkbox --}}
                            <td><b>
                            @php
                                $adv_descents = explode(',', $advertisement->descent)
                            @endphp
                            @foreach ($descents as $item)
                                @if(in_array($item->id,$adv_descents))
                                    {{$item->title}}{{$loop->last ? '' : ', '}}
                                @endif
                            @endforeach
                            </b></td>
                            {{-- descents radio --}}
                            {{-- <th>{{$advertisement->descent}}</th> --}}
                        </tr>
                        <tr>
                            <td>Language: </td>
                            <td><b>
                            @php
                                $langs = explode(',', $advertisement->language)
                            @endphp
                            @foreach ($languages as $item)
                                @if(in_array($item->id,$langs))
                                    {{$item->name}}{{$loop->last ? '' : ', '}}
                                @endif
                            @endforeach
                            </b></td>
                        </tr>
                    </table>
                </div>
                @if(count($advertisement->service_duration) > 0)
                    <div class="lady-data bg-light-pink mb-2">
                        <table class="table table-sm table-borderless">
                            @foreach ($advertisement->service_duration as $item)
                                <tr>
                                    <td>{{$item->time}}</td>
                                    <td><b>&euro; {{$item->price}}</b></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @endif

                @if(count($advertisement->service_working_days) > 0)
                    <div class="lady-data bg-light-pink mb-2">
                        <h6>Working hours</h6>
                        <table class="table table-sm table-borderless pt-3 m-0 d-block">
                            @php
                                $weeks = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
                            @endphp
                            @foreach ($advertisement->service_working_days as $workingDays)
                                <tr>
                                    <td>{{$workingDays->days}}</td>
                                    <td><b>{{date('H:i',strtotime($workingDays->from))}} to {{date('H:i',strtotime($workingDays->till))}}</b></td>
                                </tr>
                            @endforeach
                            @if (!$advertisement->service_working_days->contains('days', 'Monday'))
                                <tr>
                                    <td>Monday</td>
                                    <td><b>Closed</b></td>
                                </tr>
                            @endif
                            @if (!$advertisement->service_working_days->contains('days', 'Tuesday'))
                                <tr>
                                    <td>Tuesday</td>
                                    <td><b>Closed</b></td>
                                </tr>
                            @endif
                            @if (!$advertisement->service_working_days->contains('days', 'Wednesday'))
                                <tr>
                                    <td>Wednesday</td>
                                    <td><b>Closed</b></td>
                                </tr>
                            @endif
                            @if (!$advertisement->service_working_days->contains('days', 'Thursday'))
                                <tr>
                                    <td>Thursday</td>
                                    <td><b>Closed</b></td>
                                </tr>
                            @endif
                            @if (!$advertisement->service_working_days->contains('days', 'Friday'))
                                <tr>
                                    <td>Friday</td>
                                    <td><b>Closed</b></td>
                                </tr>
                            @endif
                            @if (!$advertisement->service_working_days->contains('days', 'Saturday'))
                                <tr>
                                    <td>Saturday</td>
                                    <td><b>Closed</b></td>
                                </tr>
                            @endif
                            @if (!$advertisement->service_working_days->contains('days', 'Sunday'))
                                <tr>
                                    <td>Sunday</td>
                                    <td><b>Closed</b></td>
                                </tr>
                            @endif
                        </table>
                    </div>
                @endif
                <div class="bg-light-pink lady-data">
                    @if ($advertisement->lady)
                        <p class="mb-0"><b>{{$advertisement->lady->name}}</b> is a member since <br><b>{{date('d M, Y', strtotime($advertisement->lady->created_at))}}</b></p>
                        <p class="mb-0">Views on her profile : &nbsp; <b>{{date('Y') + date('m') + date('d')}}</b></p>
                        {{-- <p class="mb-0">Last time online : &nbsp; <b>{{date('d M, Y')}}</b></p> --}}
                    @elseif($advertisement->club)
                    <p class="mb-0">
                    
                    <b>
                    
                    @if($advertisement->lady)
                        {{$advertisement->lady->name}}
                    @elseif($advertisement->club)
                        {{$advertisement->title}}
                        {{-- {{$advertisement->club->name}} --}}
                    @endif</b> 
                    
                    is a member of <b>{{$advertisement->club->name}}</b> since <br><b>{{date('d/M/Y', strtotime($advertisement->created_at))}}</b></p>
                        <p class="mb-0">Views on profile : &nbsp; <b>{{date('Y') + date('m') + date('d')}}</b></p>
                        {{-- <p class="mb-0">Last time online: &nbsp; <b>{{date('d M, Y')}}</b></p> --}}
                    @endif
                </div>
                <div class="row m-0 text-center">
                    <div class="col-4 bg-pink p-1" data-id="{{$userId}}" data-customer="{{($user)?$user->id:''}}" data-ad="{{$advertisement->id}}" id="loveButton" onclick="loveCount()" style="cursor: pointer;"> 
                        <h6 class="text-white alart-adv-text"><i class="fas fa-heart"></i> Love</h6>
                    </div>
                    <div class="col-4 bg-dark-blue text-white p-1" id="tipButton" onclick="ladyTip()" style="cursor: pointer;">
                        <h6 class="text-white alart-adv-text"><i class="fas fa-donate"></i> Tip </h6>
                    </div>
                    <div class="col-4 bg-report p-1">
                        <h6 class="text-dark alart-adv-text"><i class="fas fa-exclamation-triangle"></i> Report </h6>
                    </div>
                </div>
            </div>
            <!--right-part END-->
        </div>
    </div>
</section><!--advertisement_lady_body-->


<!-- Images slider modal  -->

<div class="modal fade" id="imagesSliderModal22" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-body p-0">
    <div class="owl-carousel imagesSliderModal"  data-toggle="modal" data-target="#imagesSliderModal">
            @foreach ($advertisement->advertisement_image as $adImageKey => $adImageValue)
                @if($adImageValue->type == 'Image')
                    <div class="item" data-hash="{{$adImageKey}}">
                        <img src="{{asset($adImageValue->img)}}">
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="premiumPictureModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row m-0 ">
                    <div class="col-12 col-lg-8 mod_Image">
                        <div class="watermark">
                            <a  download id="premiumPictureImgDownloadSrc" class="float-right">
                                <i class="fas fa-download" title="Download Image"></i> Download
                            </a>
                        </div> 
                        <img src="" id="premiumPictureImgSRC" class="w-100">
                        <video controls id="premiumPictureVideo" width="320" height="240">
                            <source src="" id="premiumPictureVideoSRC" type="">
                        Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="col-12 col-lg-4 border-left pl-4 mod_Review">
                        <form action="{{ route('premium.picture.comment.store') }}" method="POST" id="men_comment_section">
                            @csrf
                            <div class="form-group">
                                <label>Add Comment</label>
                                <textarea class="form-control" rows="3" placeholder="Add Comment" name="comment" id="pp_comment"></textarea>
                                <input type="hidden" id="premium_picture_id">
                                <span class="text-danger" id="pp_cmd_err">
                                </span>
                                <div class="col-12 p-0 text-right">
                                    <button class="btn bg-pink text-white mt-3 text-right" type="submit" id="btn_submit">Submit</button>
                                </div>
                            </div>
                        </form>
                        <p>All available comments</p>
                        <div class="comment_list" id="comment_section">
                            {{-- <div class="c_list">
                                <div class="c_img"></div>
                                <div class="c_text">
                                    <p><span>Comment Name</span>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    </p>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    
<script>

    var premiumPicClickedData = [];
    function purchaseCheckPremiumPicture(primuimPics) {
        premiumPicClickedData = JSON.parse(primuimPics);
        @auth
            purchasePrimiumPricture(premiumPicClickedData);
        @endauth
        @guest
            swal('Oops!', 'You need to login/register first', 'error');
        @endguest
    }

    @auth
    $('#btn_submit').on('click',function(e){
        e.preventDefault();
        var customerId = {{ Auth::user()->id }};
        var comment = $('#pp_comment').val();
        var premium_picture_id = $('#premium_picture_id').val();
        if (comment == '') {
            $('#pp_cmd_err').text('This field can not be empty');
            setTimeout(() => {
                $('#pp_cmd_err').text('');
            }, 5000);
        }
        else if (comment.length > 266) {
            $('#pp_cmd_err').text('Maximum word reached');
            setTimeout(() => {
                $('#pp_cmd_err').text('');
            }, 5000);
        }
        else{
            $.ajax({
            url : "{{route('premium.picture.comment.store')}}",
            type : 'POST',
            dataType : 'JSON',
            data : {
                pictureId : premium_picture_id,
                customerId : customerId,
                comment : comment,
                _token : '{{csrf_token()}}',
            },
            success:function(response){
                swal({
                        text: "Comment added successfully",
                        icon: 'success',
                     })
                    setTimeout(() => {
                        location.reload(); 
                    }, 3000);
            }
        });
        }
    });
    @endauth

    @auth
        @if($guard = 'web')
            @php
                $user = auth()->guard($guard)->user();
            @endphp
            
            function purchasePrimiumPricture(primuimPicsData,price='') {
                $('.loading-data').show();
                $.ajax({
                    url : "{{route('user.premium.purchase_check')}}",
                    type : 'POST',
                    dataType : 'JSON',
                    data : {
                        ladiesId : primuimPicsData.user_id,
                        pictureId : primuimPicsData.id,
                        customerId : '{{$user->id}}',
                        price : price,
                        _token : '{{csrf_token()}}',
                    },
                    success:function(response){
                        if(response.error == false){
                            if(response.data?.purchase == true){
                                var img = '';
                                var comment = "";
                                $('#premiumPictureVideo').show();
                                $('#premiumPictureImgSRC').show();
                                var file_extension = primuimPicsData.picture.split(".")[1];
                                var file_name = '{{asset('')}}'+primuimPicsData.picture;
                                if (file_extension === 'jpg' || file_extension === 'jpeg' || file_extension === 'png' || file_extension === 'webp' || file_extension === 'PNG'){
                                    $('#premiumPictureVideo').hide();
                                    $('#premiumPictureModalCenter #premiumPictureImgSRC').attr('src','{{asset('')}}'+primuimPicsData.picture);
                                }else{
                                    $('#premiumPictureImgSRC').hide();
                                    $('#premiumPictureModalCenter #premiumPictureVideoSRC').attr('src','{{asset('')}}'+primuimPicsData.picture);
                                    $('#premiumPictureModalCenter #premiumPictureVideoSRC').attr('type','video/'+file_extension);
                                } 
                                
                                $('#premiumPictureImgDownloadSrc').attr('href','{{asset('')}}'+primuimPicsData.picture);
                                
                                $('#premiumPictureModalCenter').modal('show');
                                $('#premium_picture_id').val(primuimPicsData.id);
                                if (response.data?.specific_user_comment == 0) {
                                    $("#men_comment_section").css("display", "block");
                                }else{
                                    $("#men_comment_section").css("display", "none");
                                }
                                $("#comment_section").empty();
                                $.each(response.data?.comments, function(index, value) {
                                    imgSrc = `{{ asset('') }}${value.user_details.profile_pic}`;
                                    comment += `<div class="c_list">
                                                    <div class="c_img">
                                                        <img src="${imgSrc}" alt="">    
                                                    </div>
                                                    <div class="c_text">
                                                        <p><span>${value.user_details.name}</span>
                                                            ${value.comment}
                                                        </p>
                                                    </div>
                                                </div>`;
                                });
                                $("#comment_section").append(comment);
                            }else{
                                var userTotalCoin = {{totalCoinsCalculate($user->coins)}};
                                if(userTotalCoin >= primuimPicsData.price){
                                    swal({
                                        title: "Are you sure?",
                                        text: "Once purchase, Your point "+primuimPicsData.price+ " will be deducted",
                                        icon: "warning",
                                        buttons: true,
                                        dangerMode: true,
                                    })
                                    .then((willDelete) => {
                                        if (willDelete) {
                                            purchasePrimiumPricture(premiumPicClickedData,primuimPicsData.price);
                                        }
                                    });
                                }else{
                                    alert('Please add coin to purchase this picture');
                                }
                            }
                        }else{
                            alert('Something went wrong please try after sometime');
                        }
                        $('.loading-data').hide();
                    }
                });
            }
        @endif
    @endauth
    
    var extraSelected = 0,totalPoints = 100;
    $(document).on('click','.servicesSelection',function(){
        var thisCliked = $(this);
        var data = JSON.parse(thisCliked.attr('data-details'));
        console.log(data);
        if(data.include != 1){
            extraSelected += parseInt(data.price);
            totalPoints += parseInt(data.price);
        }
        $('#selectedPriceInput').val(totalPoints);
        $('.totalPoints').html(totalPoints);
        $('.extraSelected').html(extraSelected);
    });

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

    @if(old('bookingForm'))
        showBookingSection();
    @endif
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

    // lady
    function ladyTip() {
        if (customerId != '') {
            swal({
                    title: "Are you sure?",
                    text: "Once provide tip, Your point 10 will be deducted",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
             })
             .then((willDelete) => {
                $.ajax({
                    url: "{{route('lady.tip')}}",
                    type: "POST",
                    data: {customerId: customerId, userId: userId, adId: adId, _token: "{{csrf_token()}}"},
                    success:function(data) {
                        swal({
                            text: "Tip spend successfully",
                            icon: 'success',
                        })
                    }
                })
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