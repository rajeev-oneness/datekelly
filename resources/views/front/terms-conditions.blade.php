@extends('front.master')

@section('title')
    Terms & Conditions
@endsection

@section('content')
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9">
                <h4 class="mb-4">Terms & Conditions</h4>
            </div>
        </div>
        <div class="row justify-content-center login-body">
            <div class="col-12 col-md-9">
                <div class="card shadow-sm">
                    <div class="card-body">
                        {!!$data->terms_conditons!!}
                    </div>
                </div>
            </div>
            @include('front.faq')
        </div>
    </div>
</section>
@endsection