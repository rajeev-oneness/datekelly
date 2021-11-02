@extends('front.layouts.master')

@section('dashboard-content')
<div class="col-12 col-md-9 pl-2 pl-md-5 rightpart">
    <div class="row mb-3 dashboard align-items-center">
    </div>
    <form class="form" method="POST" action="{{route('men.account.update')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{encrypt(auth()->guard(get_guard())->user()->id)}}">
        <div class="form-group row">
            <div class="col-lg-4">
                <label>Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{$men->name}}"/>
                {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
            </div>
            <div class="col-lg-4">
                <label>Phone No:</label>
                <input type="number" class="form-control" name="phn_no" placeholder="Enter Phone no" value="{{$men->phn_no}}"/>
                {{-- <span class="form-text text-muted">Please enter your username</span> --}}
            </div>
            <div class="col-lg-4">
                <label>Whtasapp No:</label>
                <input type="number" class="form-control" name="whatsapp_no" placeholder="Enter whatsapp no" value="{{$men->whatsapp_no}}"/>
                {{-- <span class="form-text text-muted">Please enter your username</span> --}}
            </div>
            <div class="col-lg-4">
                <label>Age:</label>
                <input type="number" class="form-control" name="age" placeholder="Enter age" value="{{$men->age}}"/>
                {{-- <span class="form-text text-muted">Please enter your username</span> --}}
            </div>
            <div class="col-lg-4">
                <label>Address:</label>
                <textarea type="text" class="form-control" name="address" placeholder="Address">{{$men->address}}</textarea>
                {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
            </div>
            <div class="col-lg-4">
                <label>Country:</label>
                <select name="country_id" id="country_id" class="form-control">
                    <option value="">Select</option>
                    @foreach ($countries as $country)
                        <option value="{{$country->id}}" {{($men->country_id == $country->id) ? 'selected' : ''}}>{{$country->name}}</option>
                    @endforeach
                </select>
                {{-- <span class="form-text text-muted">Please enter your email</span> --}}
            </div>
            <div class="col-lg-4">
                <label>City:</label>
                <select name="city_id" id="city_id" class="form-control">
                    <option value="{{$men->city->id}}">{{$men->city->name}}</option>
                </select>
                {{-- <span class="form-text text-muted">Please enter your username</span> --}}
            </div>
            <div class="col-lg-12">
                <label>About:</label>
                <textarea type="text" class="form-control" name="about" placeholder="About">{{$men->about}}</textarea>
                {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
            </div>
            <div class="p-3">
                <img src="{{asset($men->profile_pic)}}" alt="Profile Pic" width="100">
            </div>
            <div class="col-lg-6">
                <label>Profile Picture:</label>
                <input type="file" class="form-control" name="profile_pic" accept=".png, .jpg, .jpeg"/>
            </div>
            <div class="col-lg-12">
                <button type="submit" class="btn login-btn float-right">Update</button>
                {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
            </div>
        </div>
    </form>
</div>   
@endsection


@section('sub-script')
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