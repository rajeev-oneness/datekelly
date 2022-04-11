@extends('front.master')

@section('title')
    Login
@endsection

@section('content')
<section class="pt-5 pb-5 page_height">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9">
                <h4 class="mb-4">Login</h4>
            </div>
        </div>
        <div class="row justify-content-center login-body">
            <div class="col-12 col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row m-0 mb-4">
                                <label class="col-sm-4">Email / Username</label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email">
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row m-0 mb-4">
                                <label class="col-sm-4">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                                    @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="form-group row m-0">
                                <div class="col-sm-9"><a href="">I forgot my password</a></div>
                                <div class="col-sm-3">
                                    <button class="btn login-btn">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 log-r-card">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Register</h5>
                      <ul>
                          <li><a href="javasript:void(0)">You want to advertise?</a></li>
                          <li><a href="javasript:void(0)">You want to give likes?</a></li>
                          <li><a href="javasript:void(0)">You want to leave a review?</a></li>
                          <li><a href="javasript:void(0)">You want to become a member?</a></li>
                      </ul>
                      <a href="{{route('user.register')}}" class="regis-btn">Register for FREE!</a>
                    </div>
                  </div>
            </div>
            @include('front.faq')

        </div>
    </div>
</section>
@endsection