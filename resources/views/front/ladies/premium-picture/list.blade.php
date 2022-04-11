@extends('front.layouts.master')

@section('dashboard-content')

<div class="col-12 col-md-7 p-0 pl-2 pl-md-5 rightpart">
    <div class="adv-title">
        <h4 class="mb-3">Premium Picture</h4>
    </div>
    <div class="row m-0 mt-4 DKCoinblance">
        <div class="col-md-7 col-12 p-0">
            <h6 class="mb-3">Earned DateKelly coins:</h6>
            <div class="input-group mb-3">
                <div class="input-group-prepend ">
                  <span class="input-group-text bg-dark-blue text-white"><i class="fas fa-donate mr-1"></i> DK </span>
                </div>
                <input type="text" class="form-control coinbalance" readonly value="{{$totalAmount}} DateKelly Coin">
            </div>
        </div>
        <div class="col-12 p-0 m-0 mt-3">
            <h6 class="mb-3">Earned DateKelly coins:</h6>
            <div class="table-responsive tiptable">
                <table class="table table-sm table-hover">
                    <thead>
                        <tr>
                        <th>Date</th>
                        <th>From User</th>
                        <th>Comment</th>
                        <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($purachaseDetails as $key => $item)
                        @php
                            $comments = premiumPictureComment($item->customer_id,$item->picture_id);
                        @endphp
                        <tr class="accordion-toggle collapsed{{($key == 0)? ' adv-t-seclect' : ''}}" id="accordion2" data-toggle="collapse" data-parent="#accordion2" href="#collapse-{{$key}}">
                            <td class="expand-button">{{date('d M Y', strtotime($item->created_at))}}</td>
                            <td>{{$item->customerDetails->name}}</td>
                            <td>
                                @if ($comments->count() > 0)
                                    <td>
                                        @foreach ($comments as $comment)
                                            <span>{{ $comment->comment }}</span>
                                        @endforeach
                                    </td>
                                @else
                                    <td>N/A</td>
                                {{-- <td><span>{{substr($item->note, 0, 20).' ...'}}</span></td> --}}
                                @endif
                            </td>
                            <td>{{$item->price}}DK</td>
                        </tr>
                        <tr class="hide-table-padding">
                            <td colspan="4">
                                <div id="collapse{{$key}}" class="collapse p-3 td-detail-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>Comment : </h6>
                                            <p>
                                                {{$item->note}}
                                            </p>
                                            <form class="mt-2">
                                                <h6>Your Reply</h6>
                                                <textarea class="form-control" rows="2" placeholder="Reply here">{{$item->reply}}</textarea>
                                                <button class="btn replybtn">Send Reply</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                            
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div><!--Earned_coins-->
    <div class="row m-0 mt-5 add-pre-pic">
        <p>
            <span class="textpink">Lorem Ipsum is simply</span> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        </p>
        <p><b>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</b></p>
        <p>
            <span class="textpink">Lorem Ipsum has been</span> the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        </p>
    </div>
    <div class="row m-0 mt-5 add-pre-pic">
        <div class="col-12 p-0 mb-4 d-md-flex">
            <div class="col-12 col-md-6 text-left p-0">
                <h6>
                    Premium Pictures : <span class="textpink">{{count($pictures)}}</span>
                    <small class="form-text text-muted">Click on the premium pictures to download.</small>
                </h6>
            </div>
            <div class="col-12 col-md-6 text-left text-md-right p-0 mt-md-0 mt-4">
                @if (count($pictures) > 0)
                    <a href="{{route('lady.premium.picture.edit')}}">
                        <span class="bg-pink text-white p-2">Edit <i class="fas fa-edit"></i></span>
                    </a>
                @endif
                <a href="{{route('lady.premium.picture.add')}}">
                    <span class="bg-pink text-white p-2">Create new premium pictures</span>
                </a>
            </div>
        </div>
    </div><!--creat_new-premium-->
    <div class="row m-0">
        @forelse ($pictures as $picture)
            <div class="col-6 col-md-3 plr mb-2 premium-p-t">
                <div class="card border-0 text-center">
                    
                    @php
                        $file_path = $picture->picture;
                        $file_extension= explode('.',$file_path)[1];
                        @endphp
                        @if ($file_extension === 'jpg' || $file_extension === 'jpeg' || $file_extension === 'png' || $file_extension === 'webp' || $file_extension === 'PNG')
                        <div class="position-relative overflow-hidden lst_img">
                            <img src="{{ asset($file_path) }}" alt="" class="card-img-top">
                        </div>
                        @else
                        <div class="position-relative overflow-hidden lst_img">
                            <video class="card-img-top" controls>
                                <source src="{{ asset($file_path) }}" type="video/{{ $file_extension }}">
                            Your browser does not support the video tag.
                            </video>
                        </div>
                    @endif


                    {{-- <div class="position-relative overflow-hidden lst_img">
                        <img src="{{asset($picture->picture)}}" class="card-img-top" alt="...">
                    </div> --}}
                    <div class="card-body p-1">
                        <p class="card-text">
                            {{date('d/m/Y', strtotime($picture->created_at))}}
                        </p>
                        <p class="card-text">
                        {{-- Unlocked : <span> 120x</span> <br> --}}
                        Price : <span> {{$picture->price}} coins</span>
                        </p>
                        <a href="{{route('lady.premium.picture.delete', base64_encode($picture->id))}}" class="textpink" onclick="return confirm('Are you sure?')">Remove</a>
                    </div>
                </div>
            </div> 
        @empty
        
        @endforelse
    </div>
</div>

@endsection

@section('sub-script')
@endsection