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
                <div class="col-12 col-md-9  mx-auto">
                    <div class="card-body shadow-sm">
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <label class="mt-3">Company Name:</label>
                                <input type="text" class="form-control mx377" name="name" placeholder="Enter name" value="{{old('name')}}" required/>
                                @error('name')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-12">
                                <label class="mt-3">Address:</label>
                                <input type="text" class="form-control mx377" name="address" placeholder="Address" value="{{old('address')}}">
                                @error('address')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-6">
                                <label class="mt-3">Country:</label>
                                <select name="country_id" id="country_id" class="form-control" required>
                                    <option value="">Select</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                                @error('country_id')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-6">
                                <label class="mt-3">City:</label>
                                <select name="city_id" id="city_id" class="form-control" required>
                                    <option value="">Select</option>
                                </select>
                                @error('city_id')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-12">
                                <label class="mt-3">Company Website:</label>
                                <input type="url" class="form-control mx377" name="website_address" placeholder="Enter website" value="{{old('website_address')}}" required />
                                @error('website_address')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-12">
                                <label class="mt-3">Company Phone No:</label>
                                <input type="text" class="form-control mx377" name="phn_no" placeholder="Enter Phone no" value="{{old('phn_no')}}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required/>
                                @error('phn_no')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-12">
                                <label class="mt-3">Company Email:</label>
                                <input type="email" class="form-control mx377" name="email" placeholder="Enter email" value="{{old('email')}}" required/>
                                @error('email')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-6">
                                <label class="mt-3">Password:</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password" required />
                                @error('password')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-6">
                                <label class="mt-3">Confirm Password:</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required >
                            </div>

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