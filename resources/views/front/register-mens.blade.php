@extends('front.master')

@section('title')
    Mens Registration
@endsection

@section('content')
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9">
                <h4 class="mb-4">Mens Registration</h4>
            </div>
        </div>
        <div class="row justify-content-center login-body">
            <!--begin::Form-->
            <form class="form" method="POST" action="{{route('mens.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="card-body shadow-sm">
                        <div class="form-group row">
                            <div class="col-lg-12 ">
                                <label class="mt-3">Name:</label>
                                <input type="text" class="form-control f-input" name="name" placeholder="Enter name" value="{{old('name')}}" required />
                                @error('name')<span class="text-danger">{{$message}}</span>@enderror
                            </div>

                            <div class="col-lg-4">
                                <label class="mt-3">Date of Birth:</label>
                                <input type="date" class="form-control" name="dob" value="{{old('dob')}}" required max="{{date('Y-m-d',strtotime('- 18 years'))}}" />
                                @error('dob')<span class="text-danger">{{$message}}</span>@enderror
                            </div>

                            <div class="col-lg-12">
                                <label class="mt-3">Email:</label>
                                <input type="email" class="form-control f-input" name="email" placeholder="Enter email" value="{{old('name')}}" required />
                                @error('email')<span class="text-danger">{{$message}}</span>@enderror
                            </div>

                            <div class="col-lg-6">
                                <label class="mt-3">Password:</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password" required />
                                @error('password')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-6">
                                <label class="mt-3">Confirm Password:</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required>
                            </div>
                            <div class="col-lg-6 pl-0 py-3">
                                <span>We will send as email with a registration link to your e-mail address.</span><br>
                                <span>Please click on the link in the e-mail to finalize the registration</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <input class="form-check-input d-none" type="checkbox" name="privacy" id="tnc" required>
                                <label class="form-check-label" for="tnc"> I agree with the <a href="{{route('terms.conditions')}}" target="_blank">Terms & Condition</a> of datekelly</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <input class="form-check-input d-none" type="checkbox" name="robot" id="robot" required>
                                <label class="form-check-label" for="robot">I am not a robot</label>
                            </div>

                            <div class="col-lg-12 mt-5 text-center">
                                <button type="submit" class="btn login-btn">Submit</button>
                            </div>
                        </div>
                        <!-- end: Example Code-->
                    </div>
                </div>
            </form>
            <!--end::Form-->
            @include('front.faq')

        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $("#country_id").on('change', function() {
        var country_id = $("#country_id").val();
        $.ajax({
            url: "{{route('get.country-wise.city')}}",
            method: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                'country_id': country_id
            },
            success:function(data) {
                console.log(data);
                var city = '';
                $("#city_id").empty();
                $.each(data.data, function(index, value) {
                    city += "<option value='"+value.id+"'>"+value.name+"</option>"
                });
                $("#city_id").append(city);
            }
        });
    });
</script>
@endsection