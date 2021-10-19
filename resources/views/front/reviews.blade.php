@extends('front.master')

@section('title')
    Reviews
@endsection

@section('content')
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9">
                <h4 class="mb-4">Latest reviews</h4>
            </div>
        </div>
        <div class="row m-0 justify-content-center review">
            <div class="col-12 col-md-9 p-0">
                @forelse ($reviews as $item)
                    <div class="card position-relative mb-5">
                        <div class="card-header border-0 pt-1 d-flex">
                            <p>
                                <span class="text-lblue">{{$item->user_details->name}}</span> review of <span class="textpink">{{$item->advertisement_details->title}}
                                </span>
                                <br>{{date('M Y', strtotime($item->advertisement_details->created_at))}}
                            </p>
                            <span class="r-review w-50 ml-0">{{$item->rating}} <i class="fas fa-star"></i></span>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex bodytext mb-3">
                                <i class="fas fa-plus-circle igreen"></i>
                                <p>
                                    {{$item->positive}}
                                </p>
                            </div>
                            <div class="d-flex bodytext mb-3">
                                <i class="fas fa-minus-circle ired"></i>
                                <p>
                                    {{$item->negative}}
                                </p>
                            </div>
                            <div class="d-flex bg-light-pink p-2 sub-text-review">
                                <div class="textpink">
                                    <i class="fas fa-heart pt-1"></i>
                                </div>
                                <p>
                                    @if ($item->reply_user)
                                        Reply from <span class="textpink">
                                            {{$item->reply_user->name}}    
                                        </span>
                                        <span class="d-block textpink">
                                            {{$item->reply}}
                                        </span>
                                    @else
                                        No replies!
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="like-section d-flex">
                            <p>
                                {{$item->likes}} <i class="far fa-thumbs-up"></i>
                            </p>
                            <p>
                                {{$item->dislikes}} <i class="far fa-thumbs-down"></i>
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="text-center">
                        <h4>Oops! No recent reviews found</h4>
                    </div>
                    @endforelse
            </div>
        </div>
    </div>
</section>

@endsection