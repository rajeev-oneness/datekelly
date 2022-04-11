@extends('admin.master')

@section('title')
	Admin Profile
@endsection

@section('content')
	<div class="container">
		<div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Admin Profile</h3>
            </div>
            <!--begin::Form-->
            <form class="form" method="POST" action="{{route('admin.update.profile')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label>Name:</label>
                            <input type="text" class="form-control" placeholder="Admin Name" name="name" value="{{$admin->name}}" required/>
                            {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                        </div>
                        <div class="col-lg-4">
                            <label>Email:</label>
                            <input type="email" class="form-control" placeholder="Admin Email" name="email" value="{{$admin->email}}" required/>
                            {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-color mr-2" >Update Profile</button>
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

@endsection