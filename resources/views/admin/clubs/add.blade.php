@extends('admin.master')

@section('title')
	Add Clubs
@endsection

@section('content')
	<div class="container">
		<div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Add Clubs</h3>
            </div>
            <!--begin::Form-->
            <form class="form" method="POST" action="{{route('admin.clubs.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{old('name')}}"/>
                            {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                        </div>
                        <div class="col-lg-4">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{old('email')}}"/>
                            {{-- <span class="form-text text-muted">Please enter your email</span> --}}
                        </div>
                        <div class="col-lg-4">
                            <label>Phone No:</label>
                            <input type="number" class="form-control" name="phn_no" placeholder="Enter Phone no" value="{{old('phn_no')}}"/>
                            {{-- <span class="form-text text-muted">Please enter your username</span> --}}
                        </div>
                        <div class="col-lg-4">
                            <label>Whtasapp No:</label>
                            <input type="number" class="form-control" name="whatsapp_no" placeholder="Enter whatsapp no" value="{{old('whatsapp_no')}}"/>
                            {{-- <span class="form-text text-muted">Please enter your username</span> --}}
                        </div>
                        <div class="col-lg-4">
                            <label>Age:</label>
                            <input type="number" class="form-control" name="age" placeholder="Enter age" value="{{old('age')}}"/>
                            {{-- <span class="form-text text-muted">Please enter your username</span> --}}
                        </div>
                        <div class="col-lg-4">
                            <label>Address:</label>
                            <textarea type="text" class="form-control" name="address" placeholder="Address">{{old('address')}}</textarea>
                            {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                        </div>
                        <div class="col-lg-6">
                            <label>Country:</label>
                            <select name="country_id" id="country_id" class="form-control">
                                <option value="">Select</option>
                                @foreach ($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                            {{-- <span class="form-text text-muted">Please enter your email</span> --}}
                        </div>
                        <div class="col-lg-6">
                            <label>City:</label>
                            <select name="city_id" id="city_id" class="form-control">
                                <option value="">Select</option>
                            </select>
                            {{-- <span class="form-text text-muted">Please enter your username</span> --}}
                        </div>
                        <div class="col-lg-6">
                            <label>Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password" />
                            {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                        </div>
                        <div class="col-lg-6">
                            <label>Confirm Password:</label>
                            <input type="text" class="form-control" name="password_confirmation" placeholder="Confirm password" >
                            {{-- <span class="form-text text-muted">Please enter your email</span> --}}
                        </div>
                        <div class="col-lg-4">
                            <label>About:</label>
                            <textarea type="text" class="form-control" name="about" placeholder="About">{{old('about')}}</textarea>
                            {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                        </div>
                        <div class="col-lg-4">
                            <label>Website:</label>
                            <input type="text" class="form-control" name="website_address" placeholder="Enter website" value="{{old('website_address')}}"/>
                            {{-- <span class="form-text text-muted">Please enter your username</span> --}}
                        </div>
                        <div class="col-lg-4">
                            <div class="gutter-b example example-compact">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-xl-4 col-lg-4 col-form-label text-right">Club Profile Picture</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="image-input image-input-outline" id="kt_image_1">
                                                <div class="image-input-wrapper" style="background-image: url()"></div>
                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                    <i class="fa fa-pen icon-sm text-muted" title="Add Profile Picture"></i>
                                                    <input type="file" name="profile_pic" accept=".png, .jpg, .jpeg" value="{{old('profile_pic')}}"/>
                                                    <input type="hidden" name="profile_avatar_remove" />
                                                </label>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                            <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: Example Code-->
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-color mr-2">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
	</div>
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