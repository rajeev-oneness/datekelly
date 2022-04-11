@extends('front.layouts.master')

@section('dashboard-content')
<div class="col-12 col-md-9 p-0 pl-2 pl-md-5 rightpart">
    <div class="adv-title">
        <h4 class="mb-3">Online Booking Request</h4>
    </div>
    <form action="{{route('booking.confirmed')}}" method="POST">
        @csrf
        <input type="hidden" name="bookingId" value="{{base64_encode($booking->id)}}">
        <div class="row m-0">
            <div class="col-md-8 col-12 p-0">
                <p>
                    Online booking request from : <span class="text-blue">{{$booking->customerDetail->name}}</span>
                </p>
                <p><b>Fill in your address where the client visit you</b></p>
                <table class="table table-sm table-borderless aprovial-table">
                    <tr>
                        <td>Address Line 1</td>
                        <td><input class="form-control form-control-sm" type="text" placeholder="Address line 1" name="user_address_1"></td>
                    </tr>
                    <tr>
                        <td>Address Line 2</td>
                        <td><input class="form-control form-control-sm" type="text" placeholder="Address line 2" name="user_address_2"></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><input class="form-control form-control-sm" type="text" placeholder="City" name="user_city"></td>
                    </tr>
                    <tr>
                        <td>Your Telephone number:</td>
                        <td><input class="form-control form-control-sm" type="number" placeholder="Telephone number" name="user_telephone"></td>
                    </tr>
                    <tr>
                        <td>Extra information:</td>
                        <td><input class="form-control form-control-sm" type="text" placeholder="Extra information" name="user_extra_info"></td>
                    </tr>
                </table>

            </div>
            <div class="col-md-3 col-12 p-0 ml-auto">
                <div class="online-book shadow-lg">
                    <div class="card shadow-sm bg-light-blue">
                        <div class="card-header p-2 border-0 text-center">
                            <h5 class="card-title m-0"><a href="#">{{$booking->customerDetail->name}}</a>
                                <span class="d-block">{{($booking->visit_type == 0)? 'Private Visit' : 'Escort'}} <small class="d-block">{{$booking->customer_city}}</small></span>
                            </h5>
                        </div>
                        <div class="position-relative">
                            <img src="{{asset($booking->customerDetail->profile_pic)}}" class="card-img-top" alt="Profile Picture">
                        </div>
                        <div class="card-body p-2">
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
            <div class="row m-0 pt-4 pb-4">
                <div class="col-12 col-md-6 p-0">
                    <div class="custom-ser-text">
                        <div class="custom-control form-control-lg custom-checkbox pb-0">
                            <input type="checkbox" class="custom-control-input mr-2" id="customCheck1" required>
                            <label class="custom-control-label pl-2" for="customCheck1">
                                I agree with the Terms and Conditions of DateKelly.
                            </label>
                        </div>
                    </div>
                    <div class="mt-3 mb-3">
                        <button class="btn btn-upload" type="submit">Approve Online Booking Request</button>
                    </div>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection