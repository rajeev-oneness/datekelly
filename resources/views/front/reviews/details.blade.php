@extends('front.layouts.master')

@section('dashboard-content')
<div class="col-12 col-md-9 pl-2 pl-md-5 rightpart">
    <div class="row mb-3 dashboard align-items-center">
        {{-- <div class="col-12"><a href="{{route('review.add')}}" class="login-btn float-right">Add <i class="fas fa-plus"></i></a></div> --}}
    </div>
    <div class="row m-0 dashboard align-items-center">
        <div class="row m-0 review mt-5">
             {{-- @foreach ($reviews as $review) --}}
             <div class=" mb-5">
                 <div class="border-1 d-flex">
                     <p>
                         <span class="text-lblue">{{$review->user_details->name}}</span> review of <span class="textpink">
                             @if ($advertisement->lady)
                                 {{$advertisement->lady->name}}
                             @elseif($advertisement->club)
                                 {{$advertisement->club->name}}
                             @endif
                         </span>
                         <br>{{date('M Y', strtotime($review->advertisement_details->created_at))}}
                     </p>
                 </div>
                 <hr>
                 <div class="pt-2">
                     @if (auth()->guard(get_guard())->user()->user_type == 3)
                     <form action="{{route('review.positive.negative')}}" method="POST">
                        @csrf
                        <label for="">Positive</label>
                        <input type="hidden" name="review_id" value="{{$review->id}}">
                        <textarea class="form-control" name="positive" id="" cols="100" rows="3">{{($review->positive)? $review->positive : old('positive')}}</textarea>
                        <label for="">Negative</label>
                        <textarea class="form-control" name="negative" id="" cols="100" rows="3">{{($review->negative)? $review->negative : old('negative')}}</textarea>
                        <button type="submit" class="login-btn my-2">Add poisitive & negative</button>
                     </form>
                     @endif
                     <div class="d-flex bg-light-pink p-2 sub-text-review">
                         <div class="textpink">
                             <i class="fas fa-heart pt-1"></i>
                         </div>
                         <p>
                             Reply from <span class="textpink">
                                 {{($review->reply_user)? $review->reply_user->name : ''}}
                             </span>
                             @if (auth()->guard(get_guard())->user()->user_type == 3)
                             <span class="d-block textpink">{{($review->reply)? $review->reply : old('reply')}}</span>
                             @endif
                         </p>
                     </div>
                 </div>
             </div>
             {{-- @endforeach --}}
        </div>
    </div>
</div>   
@endsection

@section('sub-script')
    
@endsection