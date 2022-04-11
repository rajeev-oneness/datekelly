@extends('admin.master')

@section('title')
	Add mens
@endsection

@section('content')
	<div class="container">
		<div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Add mens</h3>
            </div>
            <!--begin::Form-->
            <form class="form" method="POST" action="{{route('admin.mens.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="card-body shadow-sm">
                        <div class="form-group row">
                            <div class="col-lg-6 ">
                                <label class="mt-3">Name:</label>
                                <input type="text" class="form-control f-input" name="name" placeholder="Enter name" value="{{old('name')}}" required />
                                @error('name')<span class="text-danger">{{$message}}</span>@enderror
                            </div>

                            <div class="col-lg-6">
                                <label class="mt-3">Email:</label>
                                <input type="email" class="form-control f-input" name="email" placeholder="Enter email" value="{{old('email')}}" required />
                                @error('email')<span class="text-danger">{{$message}}</span>@enderror
                            </div>

                            <div class="col-lg-6">
                                <label class="mt-3">Date of Birth:</label>
                                <input type="date" class="form-control" name="dob" value="{{old('dob')}}" max="{{date('Y-m-d',strtotime('- 18 years'))}}" onkeypress="return false;" />
                                @error('dob')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-lg-6">
                                <label class="mt-3">Password:</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password" required />
                                @error('password')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="col-lg-6">
                                <label class="mt-3">Confirm Password:</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12 mt-5 text-center">
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