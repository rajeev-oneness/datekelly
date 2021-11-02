@extends('admin.master')

@section('title')
{{$advertisement->title}}
@endsection

@section('content')
<div class="container ">
    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label"><a href="{{ route('admin.advertisement') }}"><i class="fas fa-arrow-left text-primary mr-2"></i>{{$advertisement->title}}</a></h3>
                @if ($advertisement->is_verified)
                    <span class="badge badge-primary ml-4">Verified <i class="fas fa-check text-success"></i></span>
                @endif
            </div>
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab_pane_1">Basic Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab_pane_2">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab_pane_3">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab_pane_4">Reviews</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab_pane_1" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row mb-3">
                                @if ($advertisement->lady)
                                <div class="col-3"><strong>Lady Name</strong></div>
                                <div class="col-9"><a href="{{route('admin.ladies.details', encrypt($advertisement->lady->id))}}">{{$advertisement->lady->name}}</a></div>
                                @elseif($advertisement->club)
                                <div class="col-3"><strong>Club Name</strong></div>
                                <div class="col-9"><a href="{{route('admin.clubs.details', encrypt($advertisement->club->id))}}">{{$advertisement->club->name}}</a></div>
                                @endif
                            </div>
                            <div class="row mb-3">
                                <div class="col-3"><strong>Rating</strong></div>
                                <div class="col-9">{{$advertisement->rating}}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-3"><strong>Loves</strong></div>
                                <div class="col-9">{{$advertisement->no_of_loves}}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-3"><strong>Sex</strong></div>
                                <div class="col-9">{{$advertisement->sex}}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-3"><strong>Age</strong></div>
                                <div class="col-9">{{$advertisement->age}}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-3"><strong>Length</strong></div>
                                <div class="col-9">{{$advertisement->length}} cm</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-3"><strong>Cup size</strong></div>
                                <div class="col-9">{{$advertisement->cup_size}}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-3"><strong>Weight</strong></div>
                                <div class="col-9">{{$advertisement->weight}}kg</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-3"><strong>Body size</strong></div>
                                <div class="col-9">{{$advertisement->body_size}}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-3"><strong>Descent</strong></div>
                                <div class="col-9">{{$advertisement->descent}}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-3"><strong>Language</strong></div>
                                <div class="col-9">
                                @php
                                    $langs = explode(',', $advertisement->language)
                                @endphp
                                @foreach ($langs as $lang)
                                    @foreach ($languages as $item)
                                        @if($item->id == $lang)
                                        {{$item->name}},
                                        @endif
                                    @endforeach
                                @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row mb-4">
                                <div class="col-12"><img src="{{asset($advertisement->image)}}" alt="Profile Picture" width="150px"></div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12"><strong>Message</strong></div>
                                <div class="col-12">{{$advertisement->message}}</div>
                            </div>
                            <div class="row">
                                <div class="col-12"><strong>About</strong></div>
                                <div class="col-12">{{$advertisement->about}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab_pane_2" role="tabpanel">
                    <div class="row text-center">
                    @foreach ($advertisement->advertisement_image as $key => $adImages)
                        <div class="col-3 m-4">
                            <img src="{{asset($adImages->img)}}" width="250px">
                        </div>
                    @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="tab_pane_3" role="tabpanel">
                    <h2 class="card-label mb-4">Services</h2>
                    @foreach ($advertisement->services as $item)
                    <div class="row mb-3">
                        <div class="col-5"><strong>{{$item->service_name}}</strong></div>
                        @if ($item->include == 1)
                        <div class="col-5">Included</div>
                        @else
                        <div class="col-5">&dollar;{{$item->price}}</div>
                        @endif
                    </div> 
                    @endforeach
                    <h2 class="card-label mb-4 mt-5">Services Duration</h2>
                    @foreach ($advertisement->service_duration as $item)
                    <div class="row mb-3">
                        <div class="col-5"><strong>{{$item->time}}</strong></div>
                        <div class="col-5"><b>&dollar;{{$item->price}}</b></div>
                    </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="tab_pane_4" role="tabpanel">
                    @foreach ($reviews as $item)
                    <div class="card mb-5">
                        <div class="card-header border-0 pt-4 d-flex">
                            <div class="row">
                                <div class="col-12">
                                    <span class="text-danger">{{$item->user_details->name}}</span> review of <span class="text-danger">
                                        @if ($advertisement->lady)
                                            {{$advertisement->lady->name}}
                                        @elseif($advertisement->club)
                                            {{$advertisement->club->name}}
                                        @endif
                                    </span>
                                </div>
                                <div class="col-12 my-3">
                                    {{date('M Y', strtotime($item->advertisement_details->created_at))}}
                                </div>
                                <div class="col-12 mb-3">
                                    Rating: <span class="text-danger">{{$item->rating}}</span><i class="fas fa-star text-danger pr-3"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex bg-success-o-50 mb-3 p-4">
                                <i class="fas fa-plus-circle pt-1 text-success pr-3"></i>
                                <p>
                                    {{$item->positive}}
                                </p>
                            </div>
                            <div class="d-flex bg-danger-o-50 mb-3 p-4">
                                <i class="fas fa-minus-circle pt-1 text-danger pr-3"></i>
                                <p>
                                    {{$item->negative}}
                                </p>
                            </div>
                            <div class="d-flex bg-primary-o-50 mb-3 p-4 sub-text-review">
                                <div class="text-danger">
                                    <i class="fas fa-heart pt-1 text-danger pr-3"></i>
                                </div>
                                <p>
                                    Reply from <span class="text-danger">
                                        {{$item->reply_user->name}}
                                    </span>
                                    <span class="d-block pt-3">
                                        {{$item->reply}}
                                    </span>
                                </p>
                            </div>
                            <div class="d-flex">
                                <div class="bg-primary-o-50 mr-3 p-3">
                                    {{$item->likes}} <i class="far fa-thumbs-up text-primary"></i>
                                </div>
                                <div class="bg-danger-o-50 p-3">
                                    {{$item->dislikes}} <i class="far fa-thumbs-down text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection