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
                            <div class="col-lg-4">
                                <label>Name:</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{old('name')}}"/>
                                @error('name')<span class="form-text text-muted">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-4">
                                <label>Email:</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{old('email')}}"/>
                                @error('email')<span class="form-text text-muted">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-4">
                                <label>Phone No:</label>
                                <input type="number" class="form-control" name="phn_no" placeholder="Enter Phone no" value="{{old('phn_no')}}"/>
                                @error('phn_no')<span class="form-text text-muted">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-4">
                                <label>Whtasapp No:</label>
                                <input type="number" class="form-control" name="whatsapp_no" placeholder="Enter whatsapp no" value="{{old('whatsapp_no')}}"/>
                                @error('whatsapp_no')<span class="form-text text-muted">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-4">
                                <label>Age:</label>
                                <input type="number" class="form-control" name="age" placeholder="Enter age" value="{{old('age')}}"/>
                                @error('age')<span class="form-text text-muted">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-4">
                                <label>Address:</label>
                                <textarea type="text" class="form-control" name="address" placeholder="Address">{{old('address')}}</textarea>
                                @error('address')<span class="form-text text-muted">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-4">
                                <label>Join Club( Not Mandatory):</label>
                                <select name="assigned_club" id="assigned_club" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($clubs as $club)
                                        <option value="{{$club->id}}">{{$club->name}}</option>
                                    @endforeach
                                </select>
                                @error('assigned_club')<span class="form-text text-muted">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-4">
                                <label>Country:</label>
                                <select name="country_id" id="country_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                                @error('country_id')<span class="form-text text-muted">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-4">
                                <label>City:</label>
                                <select name="city_id" id="city_id" class="form-control">
                                    <option value="">Select</option>
                                </select>
                                @error('city_id')<span class="form-text text-muted">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-6">
                                <label>Password:</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password" />
                                @error('password')<span class="form-text text-muted">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-6">
                                <label>Confirm Password:</label>
                                <input type="text" class="form-control" name="password_confirmation" placeholder="Confirm password" >
                                @error('password_confirmation')<span class="form-text text-muted">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-6">
                                <label>About:</label>
                                <textarea type="text" class="form-control" name="about" placeholder="About">{{old('about')}}</textarea>
                                @error('about')<span class="form-text text-muted">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-6">
                                <label>Profile Picture:</label>
                                <input type="file" class="form-control" name="profile_pic" accept=".png, .jpg, .jpeg" value="{{old('profile_pic')}}"/>
                            </div>
                            <div class="col-lg-2 mt-5 mx-auto">
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