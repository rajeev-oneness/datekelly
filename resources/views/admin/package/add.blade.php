@extends('admin.master')

@section('title')
	Add Package
@endsection

@section('content')
	<div class="container">
		<div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Add Package</h3>
            </div>
            <!--begin::Form-->
            <form class="form" method="POST" action="{{route('admin.package.store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name" />
                            {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                        </div>
                        <div class="col-lg-4">
                            <label>Price:</label>
                            <input type="number" class="form-control" name="price" placeholder="Enter price" />
                            {{-- <span class="form-text text-muted">Please enter your email</span> --}}
                        </div>
                        <div class="col-lg-4">
                            <label>Offer Price:</label>
                            <input type="number" class="form-control" name="offer_price" placeholder="Enter offer price" />
                            {{-- <span class="form-text text-muted">Please enter your username</span> --}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label>Coin:</label>
                            <input type="number" class="form-control" name="coin" placeholder="Enter coin" />
                            {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                        </div>
                        <div class="col-lg-8">
                            <label>Description:</label>
                            <textarea type="text" class="form-control" name="description" placeholder="Package Description" ></textarea>
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