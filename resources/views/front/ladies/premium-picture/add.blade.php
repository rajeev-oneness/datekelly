@extends('front.layouts.master')

@section('dashboard-content')
<div class="col-12 col-md-7 p-0 pl-2 pl-md-5 rightpart">
    <div class="adv-title">
        <h4 class="mb-3">Create New Premium Pictures</h4>
        <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        </p>
        <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a <span class="textpink">type specimen book</span>.
        </p>
    </div>
    <form action="{{route('lady.premium.picture.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row m-0 mt-5 creat_new_premium">
            <div class="col-12 col-md-8 p-0">
                <div class="form-group d-flex">
                    <label class="col-sm-4 p-0 pt-2">1) Select theme : </label>
                    <div class="col-sm-4 p-0">
                        <select class="form-control" name="theme" required>
                            <option value="Sexy">Sexy</option>
                            <option value="Romantic">Romantic</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="pic-upload col-12 p-0">
                <label class="col-sm-12 p-0">2) Select Your Premium pictures : </label>
                <small class="text-muted">
                    Tip : Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                </small>
                <div class="pl-0 pl-md-4 mt-4">
                    <div class="row mb-1 justify-content-start">
                        <div class="col-12 col-md-2 p-0"><h6>Photos</h6></div>
                        <div class="chosefile col-6 col-md-3 p-0 mt-md-0 mt-3">
                            <input type="file" id="real-file" hidden="hidden" name="images[]" multiple required>
                            <button type="button" id="custom-button">Select file / files</button>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <label>3) Extra information about your premium pictures : </label>
                    <textarea class="form-control" rows="3" placeholder="Extra information" name="notes"></textarea>
                </div>
                <div class="form-group DKCoinblance col-12 col-md-8 p-0">
                    <label>4) Select Youe price DateKelly Coin : </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend ">
                          <span class="input-group-text bg-dark-blue"><i class="fas fa-donate mr-1"></i> DK </span>
                        </div>
                        <select class="form-control coinbalance pl-5" name="price" required>
                            @for ($i = 1; $i <= 5; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white text-blue datText">DateKelly Coin</span>
                        </div>
                    </div>
                    <small class="text-muted">
                        Tip : Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    </small>
                </div>
                <div class="mt-3">
                    <div class="form d-flex">
                        <span>5) Agree with our User Agreement & Terms &nbsp;</span>
                        <input type="checkbox" id="check" required>
                        <label for="check" style="--d: 25px">
                          <svg viewBox="-6,0,46,48">
                            <path d="M5 20 L 10 33 L 28 17"></path>
                          </svg>
                        </label>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label>6) Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </label>
                </div>
            </div>
            <div class="float-left">
                <button class="btn btn-upload">Post Premium Pictures</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('sub-script')

@endsection