@extends('front.layouts.master')

@section('dashboard-content')

<div class="col-12 col-md-7 p-0 pl-2 pl-md-5 rightpart">
    <div class="adv-title">
        {{-- <h4 class="mb-3">Premium Picture ({{count($pictures)}})</h4> --}}
        <h4 class="mb-3">Premium Picture</h4>
    </div>
    <!-- <div class="row m-0 mt-5 add-pre-pic">
        <p>
            <span class="textpink">Lorem Ipsum is simply</span> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        </p>
        <p><b>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</b></p>
        <p>
            <span class="textpink">Lorem Ipsum has been</span> the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        </p>
    </div> -->
    <div class="row m-0 mt-5 add-pre-pic">
        <div class="col-12 p-0 mb-4 d-md-flex">
            <div class="col-12 col-md-6 text-left p-0">
                <h6 class="font-weight-bold">
                     Your unlocked Premium Pictures : <span class="textpink">{{count($pictures)}}</span>
                    {{-- <small class="form-text text-muted">Click on the premium pictures to download.</small> --}}
                </h6>
            </div>
            <div class="col-12 col-md-6 text-left text-md-right p-0 mt-md-0 mt-4">
                <a href="#">
                    {{-- <span class="bg-pink text-white p-2">Creat new premium pictures</span> --}}
                </a>
            </div>
        </div>
        <div class="row m-0">
            @forelse ($pictures as $picture)
            @if($picture->pictureDetails)
            <div class="col-6 col-md-3 plr mb-2 premium-p-t">
                <div class="card border-0 text-center">
                    <div class="position-relative overflow-hidden">
                        {{-- <a href="{{asset($picture->pictureDetails->picture)}}" download rel="noopener noreferrer" target="_blank"> --}}
                            <a href="#" onclick="purchaseCheckPremiumPicture('{{$picture->pictureDetails->picture}}')">
                                <img src="{{asset($picture->pictureDetails->picture)}}" class="card-img-top" alt="...">
                            </a>
                        
                    </div>
                    <div class="card-body p-1">
                        <p class="card-text">
                           <a href="{{ route('advertisement.detail',base64_encode(advertiseDetails($picture->from_user_id)->id)) }}" style="display: initial"> <span class="textpink font-weight-bold"> {{ advertiseDetails($picture->from_user_id)->title }}</span></a>
                             <br>
                            {{date('d/m/Y', strtotime($picture->created_at))}}
                        </p>
                        <p class="card-text">
                           {{-- Unlocked : <span> 120x</span> <br> --}}
                           <span> ‘{{$picture->pictureDetails->theme}}’</span> <br>
                           <span> {{ $picture->pictureDetails->no_of_purchase }}x</span> <br>
                           Price : <span> {{$picture->price}} coins</span>
                        </p>
                        {{-- <a href="#" class="textpink">5 New Comment</a> --}}
                    </div>
                </div>
            </div> 
            @endif
            @empty
                
            @endforelse
            
        </div>
    </div><!--creat_new-premium-->
</div>
<!-- Modal -->
<div class="modal fade" id="premiumPictureModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" id="premiumPictureImgSRC">
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
        var premiumPicClickedData = [];
    function purchaseCheckPremiumPicture(picture) {
        console.log(picture);
        $('#premiumPictureModalCenter #premiumPictureImgSRC').attr('src','{{asset('')}}'+picture);
        $('#premiumPictureModalCenter').modal('show');
    }
</script>
@endsection
@section('sub-script')
@endsection