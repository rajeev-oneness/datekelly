@extends('front.layouts.master')

@section('dashboard-content')

{{-- <div class="col-12 col-md-6 p-0 pl-2 pl-md-5 rightpart advertisment"> --}}
<div class="col-12 col-md-6 p-0 pl-2 pl-md-5 rightpart">
    <div class="adv-title">
        <h4 class="mb-3">Buy DateKelly Coins</h4>
    </div>
    <div class="row m-0 mt-5 DKCoinblance">
        <h6 class="mb-3">Youe DateKelly Coin balance</h6>
        <div class="input-group mb-3">
            <div class="input-group-prepend ">
              <span class="input-group-text bg-dark-blue"><i class="fas fa-donate mr-1"></i> DK </span>
            </div>
            <input type="text" class="form-control coinbalance" readonly value="{{$totalCoin}} DateKelly Coin">
        </div>
    </div><!--coins balance-->
    <div class="row m-0 mt-3">
        <div class="col-12 col-md-4 p-0">
            <p><b>Buy DateKelly Coins to :</b></p>
        </div>
        <div class="col-12 col-md-8 p-0 buy_dkpr">
            <p class="textpink">
                <span>- Upgrade your advertisement to Princess or Queen</span>
                <span>- Push advertisement to top</span>
                <span>- Highlight your advertisement</span>
                <span>- Send DateKelly Coins to outher lady</span>
            </p>
        </div>
    </div>
    <div class="row m-0 mt-3 justify-content-center">
        <div class="col-12 p-0">
            <p><b>Choose your amount of DateKelly Coins</b></p>
        </div>
        <div class="col-12 p-0">
            <table class="table table-sm table-bordered table-hover coinprice">
                
                @foreach ($rates as $key => $rate)
                <tr id="coin-{{$key}}" data-id="{{$rate->id}}">
                    <td class="text-center">DateKelly Coins {{$rate->coin}}</td>
                    <td class="text-center">&euro; {{$rate->price}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="row m-0 mt-3 justify-content-center">
        <div class="col-12 p-0">
            <p><b>Select a payment method</b></p>
        </div>
        <div class="col-12 p-0">
            <ul class="pay-type">
                <li><a href="javaxript:void(0);" id="ideal"><span class="d-block"><img src="{{asset('front/img/ideal.png')}}"></span>Ideal</a></li>
                <li><a href="javaxript:void(0);" id="paysafecard"><span class="d-block"><img src="{{asset('front/img/pay-safe.png')}}"></span>Paysafecard</a></li>
                <li><a href="javaxript:void(0);" id="btc"><span class="d-block"><img src="{{asset('front/img/bit-coin.png')}}"></span>BTC</a></li>
            </ul>
        </div>
        <div class="col-12 p-0 text-right mt-3">
            <button class="btn btn-upload" onclick="submitForm()">Buy Now</button>
        </div>
    </div>
</div>

@endsection

@section('sub-script')

<script>
    $("button").click(function(){
        $("p:first").addClass("intro");
    });

    let rate = '';
    let paymentType = '';
    $('table tr'). click(function(){
        rate = $(this).data('id');
        $('table tr'). removeClass("adv-t-seclect");
        $(this). addClass("adv-t-seclect");
    });

    $('li a'). click(function(){
        paymentType = $(this).attr('id');
        $('li a'). removeClass("active");
        $(this). addClass("active");
    });

    function submitForm() {
        $.ajax({
            url: "{{route('coins.purchase')}}",
            method: "post",
            data: { rate: rate, paymentType: paymentType, _token: "{{csrf_token()}}" },
            success: function(data) {
                alert(data.message);
                location.reload();
            }
        })
    }
</script>

@endsection