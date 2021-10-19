@extends('front.layouts.master')

@section('dashboard-content')
<div class="col-12 col-md-9 pl-2 pl-md-5 rightpart">
    <div class="row mb-3 dashboard align-items-center">
        <div class="col-12"><a href="{{route('club.business.banner.list')}}" class="login-btn float-right">Back <i class="fas fa-step-backward"></i></a></div>
    </div>
    <div class="row m-0 dashboard align-items-center">
        <form action="{{route('club.business.banner.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h5>Add Banner</h5>
            <hr>
            <div class="form-row">
                <div class="col-sm-12">
                    <label>Banner:</label>
                    <input type="file" class="form-control" required name="images">
                    @error('images')
                        <span class="text-danger"><small>{{$message}}</small></span>
                    @enderror
                </div>
            </div>
            <div class="col-12 mt-5">
                <button type="submit" class="login-btn float-right">Add Banner</button>
            </div>
        </form>
    </div>
</div>   
@endsection

@section('sub-script')

@endsection