@extends('front.master')

@section('title')
    Ladies/Transsexuals Registration
@endsection

@section('content')
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9">
                <h4 class="mb-4">Ladies/Transsexuals Registration</h4>
            </div>
        </div>
        <div class="row justify-content-center login-body">
           
            <!--begin::Form-->
            <form class="form" method="POST" action="{{route('ladies.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-md-9  mx-auto">
                    <div class="card-body shadow-sm">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label class="mt-3">Name:</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{old('name')}}"/>
                                @error('name')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-6">
                                <label class="mt-3">Phone No:</label>
                                <input type="text" class="form-control" name="phn_no" placeholder="Enter Phone no" value="{{old('phn_no')}}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
                                @error('phn_no')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-12">
                                <label class="mt-3">Date of Birth:</label>
                                <input type="date" class="form-control mx377" name="dob" value="{{old('dob')}}" required max="{{date('Y-m-d',strtotime('- 18 years'))}}" />
                                @error('dob')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-12">
                                <label class="mt-3">Email:</label>
                                <input type="email" class="form-control mx377" name="email" placeholder="Enter email" value="{{old('email')}}"/>
                                @error('email')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-6">
                                <label class="mt-3">Password:</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password" />
                                @error('password')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-6">
                                <label class="mt-3">Confirm Password:</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" >
                                @error('password_confirmation')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <br>
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
                        </div>
                        <div class="col-lg-2 mt-5 mx-auto">
                            <button type="submit" class="btn login-btn">Submit</button>
                        </div>
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