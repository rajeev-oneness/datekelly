@extends('front.layouts.master')

@section('dashboard-content')

<div class="col-12 col-md-9 p-0 pl-2 pl-md-5 rightpart">
    <div class="row m-0">
        <div class="col-md-8 col-12 p-0">
            <div class="adv-title">
                <h4 class="mb-3">Manage Online Booking</h4>
            </div>
            <h6 class="mb-3">
                New Online booking requests to approve : <span class="text-blue">
                    @if (($userType == 1) || ($userType == 2))
                    {{$booking->customerDetail->name}}
                    @elseif($userType == 3)
                    {{$booking->userDetail->name}}
                    @endif
                </span>
            </h6>
            <table class="table table-sm table-borderless lady_manage">
                @if (($userType == 1) || ($userType == 2))
                {{$booking->customerDetail->name}}
                @elseif($userType == 3)
                {{$booking->userDetail->name}}
                @endif
                <tr>
                    <td>Sort date:</td>
                    <th class="textpink">{{($booking->visit_type == 0)? 'Private Visit' : 'Escort'}}</th>
                </tr>
                <tr>
                    <td>Address:</td>
                    <th>{{$booking->customer_address_1}}</th>
                </tr>
                <tr>
                    <td>City</td>
                    <th>{{$booking->customer_city}}</th>
                </tr>
                <tr>
                    <td>Telephone number:</td>
                    <th>{{$booking->customer_telephone}}</th>
                </tr>
                <tr>
                    <td>Extra information:</td>
                    <th>{{$booking->extra_info}}</th>
                </tr>
                
                <tr>
                    <td>Date:</td>
                    <th class="textpink">{{date('D d M Y', strtotime($booking->date))}}</th>
                </tr>
                <tr>
                    <td>Time</td>
                    <th class="textpink">{{$booking->time}}</th>
                </tr>
                <tr>
                    <td>Duration:</td>
                    <th class="textpink">{{$duration->time .' - $ '. $duration->price}}</th>
                </tr>
            </table>
        </div>
        <div class="col-md-3 col-12 p-0 ml-auto">
            <div class="online-book shadow-lg">
                {{-- <div class="card shadow-sm bg-light-blue">
                    <div class="card-header p-2 border-0 text-center">
                        <h5 class="card-title m-0"><a href="#">John1991</a>
                            <span class="d-block">Escort <small class="d-block">Rotterdam</small></span>
                        </h5>
                    </div>
                    <div class="position-relative">
                        <img src="./img/men_1.jpg" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body p-2">
                      <p class="subtext mb-0">
                          17 September 2021 </br>
                          18:00 - 2 Hours 
                          <span class="d-block">$250 - </span>
                      </p>
                    </div>
                </div> --}}
                <div class="card shadow-sm bg-light-{{($userType == 3)? 'pink' : 'blue'}}">
                    <div class="card-header p-2 border-0 text-center">
                        <h5 class="card-title m-0"><a href="#">
                            @if (($userType == 1) || ($userType == 2))
                            {{$booking->customerDetail->name}}
                            @elseif($userType == 3)
                            {{$booking->userDetail->name}}
                            @endif
                        </a>
                            <span class="d-block">{{($booking->visit_type == 0)? 'Private Visit' : 'Escort'}} <small class="d-block">{{$booking->customer_city}}</small></span>
                        </h5>
                    </div>
                    <div class="position-relative">
                        @if ((($userType == 1) || $userType == 2) && ($booking->customerDetail->user_type == 3))
                        <img src="{{asset($booking->customerDetail->profile_pic)}}" class="card-img-top" alt="Profile Picture">
                        @elseif(($userType == 3) && ($booking->userDetail->user_type == 1))
                        <img src="{{asset($booking->userDetail->profile_pic)}}" class="card-img-top" alt="Profile Picture">
                        @elseif(($userType == 3) && ($booking->userDetail->user_type == 2))
                        <img src="{{asset($booking->userDetail->profile_pic)}}" class="card-img-top" alt="Profile Picture">
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
            </div>
        </div>
    </div>
    <div class="lady_manage_bottom">
        <div class="pt-3 pb-3 col-12 p-0">
            <p><b>Selected Service and extra’s:</b></p>
        </div>
        <div class="row m-0">
            <table class="table table-sm table-borderless lady_manage2 col-12 col-md-6 p-0"> 
                @forelse ($services as $service)
                    <tr>
                        <td>{{$service->service_name}}</td>
                        <td>{{($service->include == 1)? 'Included' : '$ '.$service->price}}</td>
                    </tr> 
                @empty
                    <tr>
                        <td>N/A</td>
                        <td>N/A</td>
                    </tr>
                @endforelse
            </table>
        </div>
        <div class="row m-0">
            <div class="col-12 col-md-6">
                <p>Estimated price based on the duration of the date: <span class="float-right textpink"><b>&pound;100,-</b></span></p>
                <p>Extra services selected by Client:<span class="float-right textpink"><b>&pound;100,-</b></span></p>
                <p>Extra for Escort: <span class="float-right textpink"><b>&pound;100,-</b></span></p>
                <p>Deposit by Client: <span class="float-right textpink"><span class="text-blue">120 DateKelly coins</span> <b>(&pound;30-),</b></span></p>
                <p><b>To be paid on the date by Client:</b> <span class="float-right textpink"><b>&pound;220,-</b></span></p>
            </div>
        </div>
        <div class="form-group mt-4">
            <div class="custom-ser-text">
                <div class="custom-control form-control-lg custom-checkbox pb-0">
                    <input type="checkbox" class="custom-control-input mr-2" id="customCheck1">
                    <label class="custom-control-label pl-2" for="customCheck1">
                        The date is a success and I have met the client! Enter the Online Booking Code from the client to receive the deposit for the date: <span class="text-blue"><b>120 DateKelly coins</b></span> 
                    </label>
                </div>
            </div>
            <div class="w-50 booking_quote">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="5QWER8AZER">
                    <div class="input-group-append">
                      <button class="btn btn-upload mt-0" type="button">Accept Online Booking Code</button>
                    </div>
                  </div>
            </div>
        </div>
        <div class="form-group mt-4">
            <div class="custom-ser-text">
                <div class="custom-control form-control-lg custom-checkbox pb-0">
                    <input type="checkbox" class="custom-control-input mr-2" id="customCheck1">
                    <label class="custom-control-label pl-2" for="customCheck1">
                        Unfortunately I can’t continue the date. You have until <b>17:00 on Friday 17 September 2022 </b>to cancel the date.
                    </label>
                </div>
            </div>
            <div class="w-545">
                <textarea class="form-control" rows="3"  placeholder="Message to client..."></textarea>
                <div class="text-right ml-auto">
                    <button class="btn btn-upload">Cancel Online Booking</button>
                </div>
            </div>
        </div>
        <div class="form-group mt-4">
            <div class="custom-ser-text">
                <div class="custom-control form-control-lg custom-checkbox pb-0">
                    <input type="checkbox" class="custom-control-input mr-2" id="customCheck1">
                    <label class="custom-control-label pl-2" for="customCheck1">
                        I run a little bit late and need extra time. You have until <b>18:20 on Friday 17 September 2022</b> to arrive.
                    </label>
                </div>
            </div>
            <div class="w-545">
                <textarea class="form-control" rows="3"  placeholder="Message to client..."></textarea>
                <div class="text-right ml-auto">
                    <button class="btn btn-upload">I’m 20 minutes late</button>
                </div>
            </div>
        </div>
        <div class="form-group mt-4">
            <div class="custom-ser-text">
                <div class="custom-control form-control-lg custom-checkbox pb-0">
                    <input type="checkbox" class="custom-control-input mr-2" id="customCheck1">
                    <label class="custom-control-label pl-2" for="customCheck1">
                        Unfortunately, the client did not show up. I waited for nothing/I went to the address and the client was not there.
                    </label>
                </div>
            </div>
            <div class="w-545">
                <textarea class="form-control" rows="3"  placeholder="Describe the situation as detailed as possible..."></textarea>
                <div class="text-right ml-auto">
                    <button class="btn btn-upload">Start dispute</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection