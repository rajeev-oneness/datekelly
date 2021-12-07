<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\CoinsRate;
use App\Models\CoinsDetails;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::get();
        return view('admin.transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Transaction::find(decrypt($id))->delete();
        return redirect()->route('admin.transaction');
    }

    public function getUserTransactions(Request $request)
    {
        $transactions = Transaction::where('user_id', auth()->guard(get_guard())->user()->id)->latest('id')->get();
        return view('front.purchase.list', compact('transactions'));
    }

    public function buyCoins(Request $req)
    {
        $rates = CoinsRate::select('*')->get();
        $totalCoin = CoinsDetails::where('user_id', auth()->guard(get_guard())->user()->id);
        $points = $totalCoin->latest('id')->get();
        $totalCoin = $totalCoin->sum('coins');
        return view('front.buy-coin', compact('rates', 'totalCoin','points'));
    }
    
    public function purchaseCoins(Request $req)
    {
        $req->validate([
            'rate' => 'required|numeric|min:1'
        ]);
        $rates = CoinsRate::find($req->rate);
        // dd($rates);
        if ($rates) {
            $guard = get_guard();
            $userId = auth()->guard($guard)->user()->id;
            $transaction = new Transaction;
            $transaction->user_id = $userId;
            $transaction->amount = $rates->price;
            $transaction->transaction_id = 'trans_'.randomgenerator();
            $transaction->save();

            $coinDetail = new CoinsDetails();
            $coinDetail->user_id = $userId;
            $coinDetail->coins = $rates->coin;
            $coinDetail->transaction_id = $transaction->id;
            $coinDetail->remarks = 'User '.$userId.' purchased '.$rates->coin.' coins of $'.$rates->price;
            $coinDetail->save();

            return response()->json([
                'error' => false, 
                'message' => 'Coins purchased succesfully!',
                // 'data' => $coinDetail
            ]);
        } else {
            return response()->json([
                'error' => true, 
                'message' => 'Something went wrong!'
            ]);
        }   
    }
}
