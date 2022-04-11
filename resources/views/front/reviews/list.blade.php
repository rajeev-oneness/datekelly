@extends('front.layouts.master')

@section('dashboard-content')
<div class="col-12 col-md-9 pl-2 pl-md-5 rightpart">
    <div class="row mb-3 dashboard align-items-center">
        {{-- <div class="col-12"><a href="{{route('review.add')}}" class="login-btn float-right">Add <i class="fas fa-plus"></i></a></div> --}}
    </div>
    <div class="row m-0 dashboard align-items-center">
        <div class="table-responsive bg-white">
            <table id="customDataTable" class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Advertisement</th>
                    <th scope="col">Positive</th>
                    <th scope="col">Negative</th>
                    <th scope="col">Reply</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Likes</th>
                    <th scope="col">Dislikes</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                {{-- {{dd($reviews);}} --}}
                @foreach ($reviews as $key => $review)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>
                        @if($review->advertisement_details->title != null)
                            {{-- model adverstisement --}}
                            <a href="{{route('advertisement.show', base64_encode($review->advertisement_details->id))}}">{{$review->advertisement_details->title}}</a>
                        @else
                            {{-- club details --}}
                            <a href="{{route('club.detail', base64_encode($review->club_details->club->id))}}">{{$review->club_details->club->name}}</a>
                        @endif
                    </td>
                    <td>{{substr($review->positive, 0,25).'...'}}</td>
                    <td>{{substr($review->negative, 0,25).'...'}}</td>
                    <td>{{substr($review->reply, 0,25).'...'}}</td>
                    <td>{{$review->rating}}</td>
                    <td>{{$review->likes}}</td>
                    <td>{{$review->dislikes}}</td>
                    <td>
                        <a href="{{route('review.show', base64_encode($review->id))}}" title="Show"><i class="fas fa-eye"></i></a>
                        {{-- <a href="{{route('review.edit', base64_encode($review->id))}}" title="Edit"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                        <a href="{{route('review.delete', encrypt($review->id))}}" title="delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a> --}}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>   
@endsection

@section('sub-script')
    
@endsection