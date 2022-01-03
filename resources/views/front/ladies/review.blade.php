@extends('front.layouts.master')

@section('dashboard-content')
<div class="col-12 col-md-9 pl-2 pl-md-5 rightpart review">
    <div>
        <h4 class="mb-3">Reviews</h4>
        {{-- <p>You have <span class="textpink">1</span> unreplied review</p> --}}
    </div>
    @foreach ($reviews as $review)
    <div class="card position-relative mb-5">
        <div class="card-header border-0 pt-1 d-flex">
            <p>
                <span class="text-lblue">{{$review->user_details->name}}</span> review of <span class="textpink">{{$review->advertisement_details->title}}</span>
                <br>{{date('M Y', strtotime($review->advertisement_details->created_at))}}
            </p>
            <span class="r-review w-50 ml-0">{{$review->rating}}</span>
        </div>
        <div class="card-body pt-0">
            <div class="d-flex bodytext mb-3">
                <i class="fas fa-plus-circle igreen"></i>
                <p>
                    {{$review->positive}}
                </p>
            </div>
            <div class="d-flex bodytext mb-3">
                <i class="fas fa-minus-circle ired"></i>
                <p>
                    {{$review->negative}}
                </p>
            </div>
            <div class="d-flex bg-light-pink p-2 sub-text-review">
                <div class="textpink">
                    <i class="fas fa-heart pt-1"></i>
                </div>
                <div class="rep-rev">
                    <form action="{{route('review.reply')}}" method="POST">
                        @csrf
                        <input type="hidden" name="review_id" value="{{$review->id}}">
                        <p class="pl-0">Reply from <span class="textpink">Alexandra</span></p>
                        <textarea class="form-control" rows="2" name="reply" placeholder="Reply here">{{($review->reply)? $review->reply : old('reply')}}</textarea>
                        <button type="submit" class="btn replybtn">Send Reply</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="like-section d-flex">
            <p>
                {{$review->likes}} <i class="far fa-thumbs-up"></i>
            </p>
            <p>
                {{$review->dislikes}} <i class="far fa-thumbs-down"></i>
            </p>
        </div>
    </div>
    @endforeach
    
</div>   
@endsection


@section('sub-script')
<script>
    $("#country_id").on('change', function() {
        var country_id = $("#country_id").val();
        $.ajax({
            url: "{{route('get.country-wise.city')}}",
            method: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                'country_id': country_id
            },
            success:function(data) {
                console.log(data);
                var city = '';
                $("#city_id").empty();
                $.each(data.data, function(index, value) {
                    city += "<option value='"+value.id+"'>"+value.name+"</option>"
                });
                $("#city_id").append(city);
            }
        });
    });
</script>
@endsection