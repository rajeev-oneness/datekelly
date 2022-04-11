@extends('admin.master')

@section('title')
	Edit Club
@endsection
@section('content')
	<div class="container">
		<div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Edit Club</h3>
            </div>
            <!--begin::Form-->
            <form class="form" method="POST" action="{{route('admin.clubs.update')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{encrypt($club->id)}}">
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{$club->name}}" required/>
                        @error('name')<span class="text-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="col-lg-6">
                        <label>Address + House Number:</label>
                        <textarea type="text" class="form-control" name="address" placeholder="Address">{{$club->address}}</textarea>
                        @error('address')<span class="text-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="col-lg-6">
                        <label>Country:</label>
                        <select name="country_id" id="country_id" class="form-control">
                            <option value="">Select</option>
                            @foreach ($countries as $country)
                                <option value="{{$country->id}}" {{($club->country_id == $country->id) ? 'selected' : ''}}>{{$country->name}}</option>
                            @endforeach
                        </select>
                        @error('country_id')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="col-lg-6">
                        <label>City:</label>
                        <select name="city_id" id="city_id" class="form-control">
                            <option value="{{$club->city->id}}">{{$club->city->name}}</option>
                        </select>
                        @error('city_id')<span class="text-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="col-lg-6">
                        <label>Email:</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Phone no" value="{{$club->email}}" required/>
                        @error('email')<span class="text-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="col-lg-6">
                        <label>Phone No:</label>
                        <input type="text" class="form-control" name="phn_no" placeholder="Enter Phone no" value="{{$club->phn_no}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required/>
                        @error('phn_no')<span class="text-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="col-lg-6">
                        <label>Website:</label>
                        <input type="text" class="form-control" name="website" placeholder="Club Website" value="{{$club->website_address}}"/>
                        @error('website')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="p-3">
                        <img src="{{asset($club->profile_pic)}}" alt="Profile Pic" width="200">
                    </div>
                    
                    <div class="col-lg-6">
                        <label>Update picture:</label>
                        <input type="file" class="form-control" name="profile_pic" accept=".png, .jpg, .jpeg"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn login-btn float-right">Update</button>
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