@extends('admin.master')

@section('title')
	Transactions
@endsection

@section('content')
	<div class="container ">
		<div class="table-responsive bg-white p-5">
            <table id="customDataTable" class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($transactions as $key => $transaction)
                  <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$transaction->transaction_id}}</td>
                    <td>&dollar;{{$transaction->amount}}</td>
                    <td>{{date('d M, Y - H:i', strtotime($transaction->created_at))}}</td>
                    <td>
                        <a href="{{route('admin.transaction.delete', encrypt($transaction->id))}}" title="delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  @empty
                  <tr>
                      <td>N/A</td>
                      <td>N/A</td>
                      <td>N/A</td>
                      <td>N/A</td>
                      <td>N/A</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
        </div>
	</div>
@endsection