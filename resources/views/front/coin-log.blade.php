@extends('front.layouts.master')

@section('dashboard-content')
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

    @if(count($points) > 0)
        <h4>Coins Logs</h4>
        <table class="table" id="customDataTable">
            <thead>
                <tr>
                    <th>#sr No</th>
                    <th>Point</th>
                    <th>Remarks</th>
                </tr>
                <tbody>
                    @foreach($points as $index => $po)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$po->coins}}</td>
                            <td>{{$po->remarks}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </thead>
        </table>
    @endif
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