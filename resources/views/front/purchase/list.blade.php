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
                      <th scope="col">Transaction ID</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $key => $transaction)
                    <tr>
                      <th scope="row">{{$key+1}}</th>
                      <td>{{$transaction->transaction_id}}</td>
                      <td>&dollar;{{$transaction->amount}}</td>
                      <td>{{date('d M, Y - H:i', strtotime($transaction->created_at))}}</td>
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