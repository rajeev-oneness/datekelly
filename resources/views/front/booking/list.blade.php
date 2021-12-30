@extends('front.layouts.master')

@section('dashboard-content')
<div class="col-12 col-md-9 pl-2 pl-md-5 rightpart">
    <div class="adv-title">
        <h4 class="mb-3">Online bookings</h4>
    </div>
    <div class="adv-title">
        <p>
           <span>New Online booking requests to approve :</span> <span class="textpink">{{count($notConfirmedBookings)}}</span>
        </p>
    </div>
    <div class="row m-0 mt-3">
    @forelse ($notConfirmedBookings as $key => $booking)
        <div class="col-12 col-md-5 mb-3 plr online-book">
            <a href="{{route('advertisement.detail',base64_encode($booking->advertisement_id))}}">
                <div class="card shadow-sm bg-light-{{($userType == 3)? 'pink' : 'blue'}}">
                    <div class="card-header p-2 border-0 text-center">
                        <h5 class="card-title m-0">
                            @if (($userType == 1) || ($userType == 2))
                                {{$booking->customerDetail->name}}
                            @elseif($userType == 3)
                                {{$booking->userDetail->name}}
                            @endif
                        <span class="d-block">{{($booking->visit_type == 0)? 'Private Visit' : 'Escort'}} <small class="d-block">{{$booking->customer_city}}</small></span>
                        </h5>
                    </div>

                    <div class="position-relative lady-card-img">
                        @if($advertiseemnt = $booking->advertisement_details)
                            <img src="{{asset($advertiseemnt->image)}}" class="card-img-top" alt="Profile Picture">
                        @else
                            @if (($userType == 1) || ($userType == 2))
                                <img src="{{asset($booking->customerDetail->profile_pic)}}" class="card-img-top" alt="Profile Picture">
                            @elseif(($userType == 3) && ($booking->userDetail->user_type == 1))
                                <img src="{{asset($booking->userDetail->profile_pic)}}" class="card-img-top" alt="Profile Picture">
                            @elseif(($userType == 3) && ($booking->userDetail->user_type == 2))
                                <img src="{{asset($booking->userDetail->profile_pic)}}" class="card-img-top" alt="Profile Picture">
                            @endif
                        @endif
                    </div>
                    <div class="card-body p-2 text-center">
                        <p class="subtext mb-0">
                            {{date('d M Y', strtotime($booking->date))}}<br/>
                            {{date('H:i', strtotime($booking->time)).' - '.$booking->serviceDuration->time}} 
                                <span class="d-block">$250 - </span>
                        </p>
                        @if (($userType == 1) || ($userType == 2))
                        <p>
                            <a href="{{route('booking.confirmation', ['bookingId' => base64_encode($booking->id)])}}">Approve</a>
                        </p>
                        @endif
                    </div>
                </div>
            </a>
        </div>
    @empty
        <div class="adv-title">
            <p>
               <span>No pending booking confirmation!</span>
            </p>
        </div>
    @endforelse
</div>
<div class="row m-0 mt-5">
    <div class="col-12 mb-3 d-flex">
        <p>
            <span>Your coming Dates :</span> <span class="textpink">{{count($confirmedBookings)}}</span>
        </p>
        <!-- <a href="javascript:void(0);" class="ml-auto textpink" ><b>View Archieved Online Bookings</b></a> -->
    </div>
    @forelse ($confirmedBookings as $key => $booking)
        <div class="col-12 col-md-4 mb-3 plr online-book">
            <a href="{{route('advertisement.detail',base64_encode($booking->advertisement_id))}}">
                <div class="card shadow-sm bg-light-{{($userType == 3)? 'pink' : 'blue'}}">
                    <div class="card-header p-2 border-0 text-center">
                        <h5 class="card-title m-0">
                            @if (($userType == 1) || ($userType == 2))
                                {{$booking->customerDetail->name}}
                            @elseif($userType == 3)
                                {{$booking->userDetail->name}}
                            @endif
                        <span class="d-block">{{($booking->visit_type == 0)? 'Private Visit' : 'Escort'}} <small class="d-block">{{$booking->customer_city}}</small></span>
                        </h5>
                    </div>
                    <div class="position-relative lady-card-img">
                        @if($advertiseemnt = $booking->advertisement_details)
                            <img src="{{asset($advertiseemnt->image)}}" class="card-img-top" alt="Profile Picture">
                        @else
                            @if (($userType == 1) || ($userType == 2))
                                <img src="{{asset($booking->customerDetail->profile_pic)}}" class="card-img-top" alt="Profile Picture">
                            @elseif(($userType == 3) && ($booking->userDetail->user_type == 1))
                                <img src="{{asset($booking->userDetail->profile_pic)}}" class="card-img-top" alt="Profile Picture">
                            @elseif(($userType == 3) && ($booking->userDetail->user_type == 2))
                                <img src="{{asset($booking->userDetail->profile_pic)}}" class="card-img-top" alt="Profile Picture">
                            @endif
                        @endif
                    </div>
                    <div class="card-body p-2 text-center">
                        <p class="subtext mb-0">
                            {{date('d M Y', strtotime($booking->date))}}<br/>
                            {{date('H:i', strtotime($booking->time)).' - '.$booking->serviceDuration->time}} 
                            <span class="d-block">$250 - </span>
                        </p>
                    </div>
                </div>
            </a>
        </div>
    @empty
    <div class="adv-title">
        <p>
           <span>No confirmed bookings!</span>
        </p>
    </div>
    @endforelse
</div>
    
</div>
@endsection