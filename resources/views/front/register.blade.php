@extends('front.master')

@section('title')
    Register
@endsection

@section('content')
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9">
                <h4 class="mb-4">Register</h4>
            </div>
        </div>
        <div class="row justify-content-center login-body">
           
            <div class="col-12 col-md-3 log-r-card">
                <div class="card bg-light-blue p-0 rg-height230">
                    <div class="card-body">
                      <h5 class="card-title">Members</h5>
                      <ul>
                          <li><a href="">Contact the Ladies</a></li>
                          <li><a href="">Give Love</a></li>
                          <li><a href="">Write reviews</a></li>
                          <li><a href="">See Premium Pictures</a></li>
                          <li><a href="">Send Tips to the Ladies</a></li>
                      </ul>
                      <a href="{{route('user.mens.register')}}" class="regis-btn">Become a Member</a>
                    </div>
                  </div>
            </div>
            <div class="col-12 col-md-3 log-r-card">
                <div class="card p-0 rg-height230">
                    <div class="card-body">
                      <h5 class="card-title">Ladies / Transsexuals</h5>
                      <ul>
                          <li><a href="">Advertise on DateKelly</a></li>
                          <li><a href="">Receive Love</a></li>
                          <li><a href="">Reply on reviews</a></li>
                          <li><a href="">Add Premium Pictures</a></li>
                          <li><a href="">Receive Tips from members</a></li>
                      </ul>
                      <a href="{{route('user.ladies.register')}}" class="regis-btn">Become a Lady</a>
                    </div>
                  </div>
            </div>
            <div class="col-12 col-md-3 log-r-card">
                <div class="card bg-light-yellow p-0 rg-height230">
                    <div class="card-body">
                      <h5 class="card-title">Clubs / Agencies </h5>
                      <ul>
                          <li><a href="">You are a sex club, escort agency, massage studio, sex shop, cinema, etc. </a></li>
                          <li><a href="">Advertise your company, add Banners and add Ladies working in your company. </a></li>
                      </ul>
                      <a href="{{route('user.clubs.register')}}" class="regis-btn">Register your Club / Agency</a>
                    </div>
                  </div>
            </div>
            @include('front.faq')

        </div>
    </div>
</section>
@endsection