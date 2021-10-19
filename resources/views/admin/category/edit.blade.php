@extends('admin.master')

@section('title')
	Edit Categories
@endsection

@section('content')
	<div class="container">
		<div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
            </div>
            <!--begin::Form-->
            <form class="form" method="POST" action="{{route('admin.category.update')}}">
                @csrf
				<input type="hidden" name="id" value="{{encrypt($category->id)}}" required/>

                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <label>Name:</label>
                            <input type="text" class="form-control" placeholder="Category Name" name="name" value="{{$category->name}}" required/>
                            {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                        </div>
                        <div class="col-lg-12">
                            <label>Description:</label>
                            <textarea type="text" class="form-control" placeholder="Category Description" name="description" required>{{$category->description}}</textarea>
                            {{-- <span class="form-text text-muted">Please enter your email</span> --}}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-color mr-2" >Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
	</div>
@endsection