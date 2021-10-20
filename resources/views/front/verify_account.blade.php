@extends('front.layouts.master')

@section('dashboard-content')
@if ($UserVerification->id_card && $UserVerification->id_card_with_user && $UserVerification->newspaper_with_user && $UserVerification->user_img)
<div class="col-12 col-md-9 pl-2 pl-md-5 rightpart veryfybody">
    <div>
        <h4 class="mb-3">Verify my account</h4>
        <p>
            <span class="badge bg-pink">Verified!<i class="fas fa-check text-green ml-1"></i></span>
        </p>
    </div>
</div>
@else
<div class="col-12 col-md-9 pl-2 pl-md-5 rightpart veryfybody">
    <div>
        <h4 class="mb-3">Verify my account</h4>
        <p>
            We always recommend to verify your account on DateKelly, because it gives trust to your clients when they know that DateKelly has checked and approved your advertisement. Your clients will know that you are real and sincere and that the pictures in the advertisement match with reality. Verified advertisements receive on average 175% more interest from clients.
        </p>
        <p>
            It’s mandatory to verify your account on DateKelly if:
            <br/> - Your age is between 18 - 21 years old.
            <br/> - DateKelly has doubts about your account.
            <br/> - You want to post <span class="textpink">Premium Pictures</span> in your advertisement and earn DateKelly credits.
        </p>
        <p>
            So verify your DateKelly account today and receive that trusted Verified Icon in your advertisement!
            <span class="badge bg-pink">Verified!<i class="fas fa-check text-green ml-1"></i></span>
        </p>
    </div>
    <div class="row mt-4 ml-0 mr-0">
        <h6 class="col-12 p-0">Upload these 4 photos to verify your account:</h6>
        <div class="col-12 col-md-6 p-0 mt-4 mb-4">
            <div class="card border-0 p-0">
                <p>1) A photo of your ID card / Pasport or Drivers License.</p>
                <img src="{{asset('front/img/id-card.png')}}" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col-12 col-md-6 p-0 mt-4 mb-4">
            <div class="card border-0 p-0">
                <p>2) A photo of you holding your ID card.</p>
                <img src="{{asset('front/img/id-2.png')}}" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col-12 col-md-6 p-0 mt-4 mb-4">
            <div class="card border-0 p-0">
                <p class="pr-0 pr-md-4">3) A photo of you holding a newspaper of the country where you advertise
                    so we know you are in that country. Make sure we can read the date of 
                    the newspaper.</p>
                <img src="{{asset('front/img/id-news.png')}}" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col-12 col-md-6 p-0 mt-4 mb-4">
            <div class="card border-0 p-0">
                <p>4) A clear photo/selfie of you and upper body.</p>
                <img src="{{asset('front/img/id-lady.png')}}" class="card-img-top mt-5" alt="...">
            </div>
        </div>
    </div>
    <div class="mt-4 upload-section">
        <form method="POST" action="{{route('verify.account.submit')}}" enctype="multipart/form-data">
            @csrf
            @if (!$UserVerification->id_card)
            <div class="row m-0 justify-content-start">
                <div class="col-12 col-md-4 p-0"><h6>1) Photo of ID Card</h6></div>
                <div class="chosefile col-6 col-md-3 p-0 mt-md-0 mt-3">
                    <input type="file" id="real-file" name="id_card"/>
                    
                </div>
                <div class="col-6 col-md-2 p-0 mt-md-0 mt-3">
                    <button type="submit" class="btn btn-upload mx-sm-2 mb-2">Upload now</button>
                </div>
            </div>
            @endif
            @if (!$UserVerification->id_card_with_user)
            <div class="row m-0 justify-content-start">
                <div class="col-12 col-md-4 p-0">
                    <h6>2) Photo of you and ID Card</h6>
                </div>
                <div class="chosefile col-6 col-md-3 p-0 mt-md-0 mt-3">
                    <input type="file" id="real-file" name="id_card_with_user"/>
                    
                </div>
                <div class="col-6 col-md-2 p-0 mt-md-0 mt-3">
                    <button type="submit" class="btn btn-upload mx-sm-2 mb-2">Upload now</button>
                </div>
            </div>
            @endif
            @if (!$UserVerification->newspaper_with_user)
            <div class="row m-0 justify-content-start">
                <div class="col-12 col-md-4 p-0">
                    <h6>3) Photo of you and newspaper </h6>
                </div>
                <div class="chosefile col-6 col-md-3 p-0 mt-md-0 mt-3">
                    <input type="file" id="real-file" name="newspaper_with_user"/>
                    
                </div>
                <div class="col-6 col-md-2 p-0 mt-md-0 mt-3">
                    <button type="submit" class="btn btn-upload mx-sm-2 mb-2">Upload now</button>
                </div>
            </div>
            @endif
            @if (!$UserVerification->user_img)
            <div class="row m-0 justify-content-start">
                <div class="col-12 col-md-4 p-0">
                    <h6>4) Photo of you with upper body</h6>
                </div>
                <div class="chosefile col-6 col-md-3 p-0 mt-md-0 mt-3">
                    <input type="file" id="real-file" name="user_img"/>
                    
                </div>
                <div class="col-6 col-md-2 p-0 mt-md-0 mt-3">
                    <button type="submit" class="btn btn-upload mx-sm-2 mb-2">Upload now</button>
                </div>
            </div>
            @endif
        </form>
        <p class="pt-3">
            After receiving all 4 photos we will verify your account as soon as possible.
        </p>
    </div>

</div>
@endif

@endsection

@section('sub-script')

@endsection