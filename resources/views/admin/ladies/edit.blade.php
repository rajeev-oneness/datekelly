@extends('admin.master')

@section('title')
	Edit Ladies
@endsection

@section('content')
	<div class="container">
		<div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Edit Ladies</h3>
            </div>
            <!--begin::Form-->
            <form class="form" method="POST" action="{{route('admin.ladies.update')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{encrypt($lady->id)}}">
                <div class="form-group row align-items-center">
                    <div class="col-lg-6">
                        <label class="mt-3">Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{$lady->name}}"/>
                        @error('name')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    
                    <div class="col-lg-6">
                        <label class="mt-3">Telephone No:</label>
                        <input type="text" class="form-control" name="phn_no" placeholder="Enter Phone no" value="{{$lady->phn_no}}"/>
                        @error('phn_no')<span class="text-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="col-lg-6">
                        <label class="mt-3">Date of Birth:</label>
                        <input type="date" class="form-control" name="dob" value="{{$lady->dob}}" required max="{{date('Y-m-d',strtotime('- 18 years'))}}" />
                        @error('dob')<span class="text-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="col-lg-6">
                        <label class="mt-5">&nbsp;</label>
                        <span class="pl-0">Age: {{date('Y') - date('Y',strtotime($lady->dob))}}</span>
                    </div>

                    <div class="col-lg-6">
                        <label class="mt-3">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter name" value="{{$lady->email}}"/>
                        @error('email')<span class="text-danger">{{$message}}</span>@enderror
                    </div>

                </div>

                <div class="form-group row">
                    <div class="p-3">
                        <img src="{{asset($lady->profile_pic)}}" alt="Profile Pic" width="200">
                    </div>
                    
                    <div class="col-lg-6">
                        <label class="mt-3">Update Profile Picture:</label>
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