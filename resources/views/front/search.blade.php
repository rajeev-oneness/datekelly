@extends('front.master')

@section('title')
    Search
@endsection

@section('content')
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center m-0 mb-4">
            <div class="col-12 col-md-10">
                <h4 class="mb-4">Search</h4>
            </div>
        </div>
        <div class="row m-0 justify-content-center">
            <div class="col-12 col-md-10 border p-0 pt-3 pb-3">
                <form action="{{route('get.search.results')}}" class="search-form">
                    <div class="row m-0">
                        <div class="col-md-6 col-12">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control form-control-sm" placeholder="Type City" name="city">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">+KM's</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control form-control-sm" placeholder="Add Value" value="50 KM">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-md-4 col-12 custom-ser-text">
                            <div class="custom-control form-control-lg custom-checkbox">
                                <input type="checkbox" class="custom-control-input mr-2" id="customCheck1" name="user_type" value="1">
                                <label class="custom-control-label pl-2" for="customCheck1">Ladies</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 custom-ser-text">
                            <div class="custom-control form-control-lg custom-checkbox">
                                <input type="checkbox" class="custom-control-input mr-2" id="customCheck2" name="transsexual">
                                <label class="custom-control-label pl-2" for="customCheck2">Transsexuals</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 custom-ser-text">
                            <div class="custom-control form-control-lg custom-checkbox">
                                <input type="checkbox" class="custom-control-input mr-2" id="customCheck3" name="user_type" value="2">
                                <label class="custom-control-label pl-2" for="customCheck3">Sex Club / Escort Agency / Other</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 custom-ser-text">
                            <div class="custom-control form-control-lg custom-checkbox">
                                <input type="checkbox" class="custom-control-input mr-2" id="customCheck4" name="verified">
                                <label class="custom-control-label pl-2" for="customCheck4">Verified by DateKelly</label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 mt-3 mb-3 ">
                        <div class="col-12 col-md-6 mb-2">
                            <div class="form-row mb-2">
                                <div class="col-2">
                                    <p>Age</p>
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="from_age" placeholder="Age">
                                </div>
                                <div class="col-2 text-center">
                                      <p>to</p>
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="to_age" placeholder="Age">
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-2">
                                    <p>Lenght</p>
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="from_length" placeholder="Type lenght">
                                </div>
                                <div class="col-2 text-center">
                                      <p>to</p>
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="to_length" placeholder="Type lenght">
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-2">
                                    <p>Weight</p>
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="from_weight" placeholder="Type weight">
                                </div>
                                <div class="col-2 text-center">
                                      <p>to</p>
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="to_weight" placeholder="Type weight">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 mb-3 m-0">
                        <h6 class="col-12">Cup Size</h6>
                        @foreach ($cupSizes as $cs)
                        <div class="col-md-2 col-6 custom-ser-text">
                            <div class="custom-control form-control-lg custom-checkbox">
                                <input type="checkbox" class="custom-control-input mr-2" id="{{$cs->size}}" name="cupSize" value="{{$cs->id}}">
                                <label class="custom-control-label pl-2" for="{{$cs->size}}">{{$cs->size}}</label>
                            </div>
                        </div> 
                        @endforeach
                    </div>
                    <div class="row mt-3 mb-3 m-0">
                        <h6 class="col-12">Body Size</h6>
                        @foreach ($bodySizes as $bs)
                        <div class="col-md-2 col-6 custom-ser-text">
                            <div class="custom-control form-control-lg custom-checkbox">
                                <input type="checkbox" class="custom-control-input mr-2" id="{{$bs->size}}" name="bodySize" value="{{$bs->id}}">
                                <label class="custom-control-label pl-2" for="{{$bs->size}}">{{$bs->size}}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row mt-3 mb-3 m-0">
                        <h6 class="col-12">Origin</h6>
                        @foreach ($origins as $os)
                        <div class="col-md-3 col-6 custom-ser-text">
                            <div class="custom-control form-control-lg custom-checkbox">
                                <input type="checkbox" class="custom-control-input mr-2" id="{{$os->origin_name}}" value="{{$os->id}}" name="origin">
                                <label class="custom-control-label pl-2" for="{{$os->origin_name}}">{{$os->origin_name}}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row mt-3 mb-3 m-0">
                        <h6 class="col-12">Language</h6>
                        @foreach ($langs as $lang)
                        <div class="col-md-3 col-6 custom-ser-text">
                            <div class="custom-control form-control-lg custom-checkbox">
                                <input type="checkbox" class="custom-control-input mr-2" id="{{$lang->name}}"  name="language" value="{{$lang->id}}">
                                <label class="custom-control-label pl-2" for="{{$lang->name}}">{{$lang->name}}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="text-right mt-4 col-12">
                        <button type="submit" class="btn btn-upload">Search <i class="fas fa-search ml-1"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection