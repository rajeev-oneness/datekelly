@extends('front.master')

@section('title')
    Club Details
@endsection

@section('content')
<section class="position-relative">
    <div data-toggle="modal" data-target="#imagesSliderModal22">
        <div class="owl-carousel banner-pic">
            <div class="item" data-hash="0">
                <img src="{{asset($data->profile_pic)}}">
            </div>
            
            @if($advertisement != null)
            @foreach ($advertisement->advertisement_image as $adImageKey => $adImageValue)
                @if($adImageValue->type == 'Image')
                    <div class="item" data-hash="{{$adImageKey + 1}}">
                        <img src="{{asset($adImageValue->img)}}">
                    </div>
                @endif
            @endforeach
            @endif
        </div>
    </div>
    <div class="image-sl-text">
        <div class="container">
            <div class="row m-0">
                <ul>
                    <li>{{$data->name}}</li>
                    <li>@if($advertisement != null){{$advertisement->rating}}@endif <i class="fas fa-star"></i></li>
                    <li>@if($advertisement != null){{$advertisement->no_of_loves}}@endif <i class="fas fa-heart"></i></li>
                    @if ($data->is_verified)
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
                    <div class="item">
                        <a class="button secondary url" href="#0"><img src="{{asset($data->profile_pic)}}"></a>
                    </div>
                    @if($advertisement != null)
                    @foreach ($advertisement->advertisement_image as $adImageKeyTwo => $adImageValueTwo)
                    <div class="item">
                        @if($adImageValueTwo->type == 'Image')
                            <a class="button secondary url" href="#{{$adImageKeyTwo + 1}}"><img src="{{asset($adImageValueTwo->img)}}"></a>
                        @endif
                    </div>
                    @endforeach
                    @endif
                </div><!--slider-img-tigger-->

                <div class="row m-0 mt-5">
                    <div class="col-12 p-0 mb-5">
                        <div class="col-12 col-md-6 text-left p-0">
                            <h5>About Us</h5>
                        </div>
                        <div class="col-12 col-md-10 p-0 aboutme-text mt-4">
                            <div class="mb-3" style="white-space: pre;">{!!$data->about!!}</div>
                            <p>
                                <strong class="d-block mb-2">Phone No.</strong>
                                {{$data->phn_no}}
                                <span class="d-block mt-2"><strong class="d-block mb-2">Address : </strong>{{$data->address}}</span>

                                @if($data->club)
                                    {{$data->address}}<br/>
                                    {{$data->club->website_address}}
                                @endif
                            </p>
                        </div>
                    </div>
                </div><!--about-me-->
                @if($advertisement != null)
                @if(count($advertisement->services) > 0)
                    <div class="row m-0">
                        <div class="col-12 p-0 mb-4">
                            <div class="col-12 col-md-6 text-left p-0">
                                <h5 class="textpink">Our services & facilities</h5>
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
                @endif

                <div class="row m-0 mt-5">
                    @if ($ourLadies->count() > 0)
                        <div class="row m-0 mt-5">
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
                        </div>
                    @endif
                </div><!--picture-slid-->


                {{-- REVIEWS --}}
                <div class="row m-0 review mt-5">
                   <div class="col-12 p-0 mb-4 d-md-flex">
                       <div class="col-12 col-md-4 text-left p-0">
                           <h5>Our Reviews</h5>
                       </div>
                       <div class="col-12 col-md-8 text-left text-md-right p-0 mt-md-0 mt-4">
                           <h6>
                                {{-- @php
                                    $guard = get_guard();
                                    $user = auth()->guard($guard)->user();
                                    $userId = ($advertisement->lady)? $advertisement->lady->id : $advertisement->club->id;
                                @endphp --}}

                                @php
                                $guard = get_guard();
                                $user = auth()->guard($guard)->user();
                                $userId = $data->id;
                                @endphp

                                @if(($user) && ($user->id != $userId))
                                    <a href="javascript:void(0);" class="p-2" data-toggle="modal" data-target="#addReviewModal">Write a Review</a>
                                @elseif(empty($user))
                                    <a href="{{route('user.login')}}" class="p-2">Login / Register to add review</a>
                                @endif

                                <span class="bg-pink text-white p-2">
                                    {{$data->name}}
                                </span>
                                <span class="bg-pink text-white p-2">{{$advertisement ? $advertisement->rating : ''}} <i class="fas fa-star"></i></span>
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
                                    <input type="hidden" name="advertisement_id" value="{{$advertisement ? $advertisement->id : ''}}" class="d-none">
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
                                        {{$data->name}}
                                    </span>
                                    <br>{{date('M Y', strtotime($item->advertisement_details->created_at))}}
                                </p>
                                <span class="r-review w-50 ml-0">{{$item->rating}}</span>
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
                </div>

            </div><!--details-left-part-->

            <!--right-part START-->
            <div class="col-12 col-md-3 ml-auto p-0 order-1 order-md-12 mb-4 mb-md-0">
                <div class="bg-light-pink p-2 mb-2 text-center">
                    @if($data->country && $data->city)
                        <h6>
                            {{ $data->country->name }}
                            <small class="d-block"> {{ $data->city->name }}</small>
                        </h6>
                    @endif
                    <p>
                        @if($advertisement != null)
                        @if($advertisement->my_service == 'private_visit')
                            <span class="d-block mb-0 mt-3">You can visit us - <b>Private visit</b></span>
                        @elseif($advertisement->my_service == 'escort')
                            <span class="d-block">Our ladies visit you - <b>Escort</b></span>
                        @endif
                        @endif
                    </p>
                </div>


                <div class="row m-0 bg-light-pink mb-2">
                    <div class="col-md-12 col-12 call-adv-r">
                        <h6 class="font-weight-bold">{{$data->name}}</h6>
                    </div>
                    <div class="col-md-6 col-12 call-adv-r">
                        <h6>{{$data->phn_no}}</h6>
                    </div>
                    <div class="col-md-6 col-12 call-adv-r border-right-0" data-toggle="modal" data-target="#sendMessageModal" style="cursor: pointer;">
                        <p class="mb-0"><img src="{{asset('front/img/adv_chat-icon.png')}}"> <b>Message us</b></p>
                    </div>
                    <div class="col-md-6 col-12 call-adv-r">
                        <p class="mb-0"><a href="tel:{{$data->phn_no}}" target="_blank" class="text-dark"><img src="{{asset('front/img/adv_call-icon.png')}}"> <b>Call Me</b></a></p>
                    </div>
                    <div class="col-md-6 col-12 call-adv-r border-right-0">
                        <p class="mb-0"><a href="https://wa.me/{{$data->whatsapp_no}}" target="_blank" class="text-dark"><img src="{{asset('front/img/whatsap_icon.png')}}"> <b>Whatsapp</b> </a></p>
                    </div>
                    <div class="col-md-12 col-12 call-adv-r">
                        <p class="mb-0"><a href="{{$data->website_address}}" target="_blank" class="text-dark"><img src="{{asset('front/img/rev-home.png')}}"> <b>Visit our homepage</b></a></p>
                    </div>
                    {{-- <div class="bg-light-pink p-2 my-2 justify-content-center row m-0" onclick="showBookingSection()" style="cursor: pointer;">
                        <div class="col-2"><img src="{{asset('front/img/online_book.png')}}" class="mr-2 pl-4"></div>
                        <div class="col-10 pl-5">
                            <h6>
                                <span class="textpink">Online Booking</span>
                                <small class="d-block"> <b>Escort & Private visit</b></small>
                            </h6>
                        </div>
                    </div> --}}
                </div>

                {{-- language --}}
                @if($advertisement != null)
                <div class="lady-data bg-light-pink mb-2">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td>We speak: </td>
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
                @endif

                @if($advertisement != null)
                @if(count($advertisement->service_duration) > 0)
                    <div class="lady-data bg-light-pink mb-2">
                        <table class="table table-sm table-borderless">
                            @foreach ($advertisement->service_duration as $item)
                                <tr>
                                    <td>{{$item->time}}</td>
                                    <td><b>&euro; {{$item->price}}</b></td>
                                </tr>
                            @endforeach
                            @if (!empty($advertisement->extraprice_for_escort))
                            <tr>
                                <td>Escort extra</td>
                                <td><b>&euro; {{$advertisement->extraprice_for_escort}}</b></td>
                            </tr>
                            @endif
                        </table>
                    </div>
                @endif
                @endif

                @if($advertisement != null)
                @if(count($advertisement->service_working_days) > 0)
                    <div class="lady-data bg-light-pink mb-2">
                        <h6>Working hours</h6>
                        <table class="table table-sm table-borderless pt-3 m-0 d-block">
                            @foreach ($advertisement->service_working_days as $workingDays)
                                <tr>
                                    <td>{{$workingDays->days}}</td>
                                    <td><b>{{date('H:i',strtotime($workingDays->from))}} hrs to {{date('H:i',strtotime($workingDays->till))}} hrs</b></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @endif
                @endif

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

                            {{-- @php
                                $guard = get_guard();
                                $user = auth()->guard($guard)->user();
                                $userId = $data->id;
                            @endphp --}}

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

                <div class="bg-light-pink lady-data">
                    <p class="mb-0"><b>{{$data->name}}</b> is a member since <br><b>{{date('d/M/Y', strtotime($data->created_at))}}</b></p>
                    <p class="mb-0">Views on profile : &nbsp; <b>{{date('Y') + date('m') + date('d')}}</b></p>
                </div>
                <div class="row m-0 text-center">
                    @if($advertisement != null)
                    <div class="col-4 bg-pink p-1" data-id="{{$userId}}" data-customer="{{($user)?$user->id:''}}" data-ad="{{$advertisement->id}}" id="loveButton" onclick="loveCount()" style="cursor: pointer;"> 
                        <h6 class="text-white alart-adv-text"><i class="fas fa-heart"></i> Love</h6>
                    </div>
                    @endif
                    {{-- <div class="col-4 bg-pink p-1">
                        <h6 class="text-white alart-adv-text"><i class="fas fa-heart"></i> Love</h6>
                    </div> --}}
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


<!-- Images slider modal  -->

<div class="modal fade" id="imagesSliderModal22" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
      <div class="owl-carousel imagesSliderModal"  data-toggle="modal" data-target="#imagesSliderModal">
            <div class="item" data-hash="0">
                <img src="{{asset($data->profile_pic)}}">
            </div>
            @if($advertisement != null)
            @foreach ($advertisement->advertisement_image as $adImageKey => $adImageValue)
                @if($adImageValue->type == 'Image')
                    <div class="item" data-hash="{{$adImageKey + 1}}">
                        <img src="{{asset($adImageValue->img)}}">
                    </div>
                @endif
            @endforeach
            @endif
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
                <img src="" id="premiumPictureImgSRC">
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
    }

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
                                $('#premiumPictureModalCenter #premiumPictureImgSRC').attr('src','{{asset('')}}'+primuimPicsData.picture);
                                $('#premiumPictureModalCenter').modal('show');
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