@extends('admin.master')

@section('title')
	Edit men
@endsection

@section('content')
	<div class="container">
		<div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Edit men</h3>
            </div>
            <!--begin::Form-->
            <form class="form" method="POST" action="{{route('admin.mens.update')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{encrypt($men->id)}}">
                <div class="card-body">
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
                        <div class="col-lg-6">
                            <label>Country:</label>
                            <select name="country_id" id="country_id" class="form-control">
                                @foreach ($countries as $country)
                                    <option value="{{$country->id}}" {{($country->id == $men->country->id)? 'selected': ''}}>{{$country->name}}</option>
                                @endforeach
                            </select>
                            {{-- <span class="form-text text-muted">Please enter your email</span> --}}
                        </div>
                        <div class="col-lg-6">
                            <label>City:</label>
                            <select name="city_id" id="city_id" class="form-control">
                                <option value="{{$men->city->id}}">{{$men->city->name}}</option>
                            </select>
                            {{-- <span class="form-text text-muted">Please enter your username</span> --}}
                        </div>
                        <div class="col-lg-6">
                            <label>About:</label>
                            <textarea type="text" class="form-control" name="about" placeholder="About">{{$men->about}}</textarea>
                            {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                        </div>
                        <div class="col-lg-6">
                            <div class="gutter-b example example-compact">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right">Profile Picture</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="image-input image-input-outline" id="kt_image_1">
                                                <div class="image-input-wrapper" style="background-image: url({{asset($men->profile_pic)}})"></div>
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
        })
    </script>
@endsection