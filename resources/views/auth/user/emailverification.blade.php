@extends('front.master')
@section('title','Verify my Account')
@section('content')
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9">
                    @if($user->email_verified_at != null)
                        <h4>Your email has already verified</h4>
                        <a class="btn" href="{{url('/')}}">Go to Home</a>
                    @else
                        <h4 class="mb-4">Verify your Account</h4>
                        <a href="{{route('verify.user.account',['resend_email' => 'resend'])}}">Resend Verification Link</a><br>
                        @if(request()->resend_email == 'resend')
                            <a href="javascript:void(0)">Check your mail to see the verification link</a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection