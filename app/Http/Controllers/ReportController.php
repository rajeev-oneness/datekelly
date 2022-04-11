<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Advertisement;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reports.index');
    }

    /**
     * getting transactions
     *
     * @return \Illuminate\Http\Response
     */
    public function getTransactionReport(Request $req)
    {
        // dd($req->all());
        $trans_data = Transaction::whereBetween('created_at', [$req->trans_from, $req->trans_to])->get();
        return response()->json(['error' => false, 'msg' => 'Transaction Data', 'data' => $trans_data]);
    }

    /**
     * getting advertisements
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAdvertisementReport(Request $req)
    {
        $ads_data = Advertisement::whereBetween('created_at', [$req->ads_from, $req->ads_to])->get();
        return response()->json(['error' => false, 'msg' => 'Advertisement Data', 'data' => $ads_data]);
    }

    
}
