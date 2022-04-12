@extends('front.layouts.master')

@section('dashboard-content')
<div class="col-12 col-md-7 p-0 pl-2 pl-md-5 rightpart">
    <div class="adv-title">
        <h4 class="mb-3">Edit Premium Pictures</h4>
        <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        </p>
        <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a <span class="textpink">type specimen book</span>.
        </p>
    </div>
    <div class="adv-title">
        <h4 class="mb-3">Change Premium Pictures</h4>
        <ul>
            <li>
                <span class="adv-li">Date : </span>
                <span class="text-right">18 Jan 2021</span>
            </li>
            <li>
                <span class="adv-li">Unlocked : </span>
                <span class="text-right">255K</span>
            </li>
            <li class="text-blue">
                <span class="adv-li">Price : </span>
                <span>20 DateKelly coins</span>
            </li>
            <li class="text-blue">
                <span class="adv-li">Total earned : </span>
                <span>5,100 DateKelly coins</span>
            </li>
            <li>
                <span class="adv-li">Comments : </span>
                <span class="textpink">5 new comments</span>
            </li>
        </ul>
    </div>
    <div class="mt-3 mb-3">
        <a href="{{route('lady.premium.picture.delete.set')}}" onclick="return confirm('Are you sure')" class="btn btn-upload">Remove this set of Premium Pictures</a>
    </div>
    <form action="{{route('lady.premium.picture.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row m-0 mt-5 creat_new_premium">
            <div class="col-12 col-md-8 p-0">
                <div class="form-group d-flex">
                    <label class="col-sm-4 p-0 pt-2">1) Select theme : </label>
                    <div class="col-sm-4 p-0">
                        <select class="form-control" name="theme" required>
                            <option value="Sexy">Sexy</option>
                            <option value="Naughty">Naughty</option>
                            <option value="Hardcore">Hardcore</option>
                            <option value="Fun">Fun</option>
                            <option value="Romantic">Romantic</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="pic-upload col-12 p-0">
                <label class="col-sm-12 p-0">2) Premium pictures : </label>
                <div class="row m-0">
                    @foreach ($pictures as $key => $picture)
                    <div class="col-6 col-md-3 plr mb-2 premium-p-t">
                        <div class="card border-0 text-center">
                            {{-- <div class="position-relative overflow-hidden">
                                <img src="{{asset($picture->picture)}}" class="card-img-top" alt="...">
                            </div> --}}
                            @php
                                $file_path = $picture->picture;
                                $file_extension= explode('.',$file_path)[1];
                                @endphp
                                @if ($file_extension === 'jpg' || $file_extension === 'jpeg' || $file_extension === 'png' || $file_extension === 'webp' || $file_extension === 'PNG')
                                <div class="position-relative model_ss_pic overflow-hidden">
                                    <img src="{{ asset($file_path) }}" alt="" class="card-img-top">
                                </div>
                                @else
                                <div class="position-relative overflow-hidden">
                                    <video class="card-img-top" controls>
                                        <source src="{{ asset($file_path) }}" type="video/{{ $file_extension }}">
                                    Your browser does not support the video tag.
                                    </video>
                                </div>
                            @endif

                            <div class="card-body p-1">
                                <p class="card-text">
                                    <b>Photo {{$key+1}}</b>
                                </p>
                                <a href="{{route('lady.premium.picture.delete', base64_encode($picture->id))}}" class="textpink">Remove</a>
                            </div>
                        </div>
                    </div> 
                    @endforeach
                    
                </div>
                <div class="form-group mt-4">
                    <label>3) Extra information about your premium pictures : </label>
                    <textarea class="form-control" rows="3" placeholder="Extra information" name="notes">{{$pictures[0]->notes}}</textarea>
                </div>
                <div class="form-group DKCoinblance col-12 col-md-8 p-0">
                    <label>4) Select Your price DateKelly Coin : </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend ">
                          <span class="input-group-text bg-dark-blue"><i class="fas fa-donate mr-1"></i> DK </span>
                        </div>
                        <select class="form-control coinbalance pl-5" name="price" required>
                            @for ($i = 1; $i <= 20; $i++)
                            <option value="{{$i}}" {{($pictures[0]->price == $i)? 'selected' : ''}}>{{$i}}</option>
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