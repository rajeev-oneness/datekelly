@extends('admin.master')

@section('title')
	Edit City
@endsection

@section('content')
	<div class="container">
		<div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Edit City</h3>
            </div>
            <!--begin::Form-->
            <form class="form" method="POST" action="{{route('admin.city.update')}}">
                @csrf
                <input type="hidden" name="id" value="{{encrypt($city->id)}}" />
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{$city->name}}"/>
                            {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                        </div>
                        <div class="col-lg-6">
                            <label>Country name:</label>
                            {{-- <input type="text" class="form-control" name="country_id" placeholder="Enter country code" /> --}}
                            <select name="country_id" id="country_id" class="form-control">
                                <option value="{{$city->country->id}}">{{$city->country->name}}</option>
                            </select>
                            {{-- <span class="form-text text-muted">Please enter your email</span> --}}
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
        $("#country_id").one('focus', function() {
            // alert('hi');
            $.ajax({
                url: "{{route('get.country')}}",
                method: 'POST',
                data:{'_token': '{{csrf_token()}}'},
                success: function(data) {
                    $("#country_id").empty();
                    var country = '';
                    $.each(data.data, function(index, val) {
                        country += "<option value='"+val.id+"'>"+val.name+"</option>";
                    });
                    $("#country_id").append(country);
                }
            })
        });
    </script>
@endsection