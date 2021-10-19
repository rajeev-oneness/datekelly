@extends('admin.master')

@section('title')
	Edit Country
@endsection

@section('content')
	<div class="container">
		<div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Edit Country</h3>
            </div>
            <!--begin::Form-->
            <form class="form" method="POST" action="{{route('admin.country.update')}}">
                @csrf
                <input type="hidden" name="id" value="{{encrypt($country->id)}}"/>

                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{$country->name}}"/>
                            {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                        </div>
                        <div class="col-lg-4">
                            <label>Country Code:</label>
                            <input type="text" class="form-control" name="country_code" placeholder="Enter country code" value="{{$country->country_code}}"/>
                            {{-- <span class="form-text text-muted">Please enter your email</span> --}}
                        </div>
                        <div class="col-lg-4">
                            <label>Phone Code:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                </div>
                                <input type="number" class="form-control" placeholder="(eg: 91)" name="phone_code" value="{{$country->phone_code}}"/>
                            </div>
                            <span class="form-text text-muted">Please enter your username</span>
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