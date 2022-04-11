@extends('front.master')
@section('title','Verify my Account')
@section('content')
    <section class="pt-5 pb-5" style="min-height:65vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 text-center">
                    @if($user->email_verified_at != null)
                        <h4>Your email has already verified</h4>
                        <a class="btn login-btn mt-3" href="{{url('/')}}">Go to Home</a>
                    @else
                        <h4 class="mb-4">Verify your Account</h4>
                        <p class="py-3"></p>
                        @if(request()->resend_email == 'resend')
                            <p class="py-3">A verification link has been sent to your email</p>
                        @endif
                        <a class="btn login-btn" href="{{route('verify.user.account',['resend_email' => 'resend'])}}">Resend Verification Link</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection