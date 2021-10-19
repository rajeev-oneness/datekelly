<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdvertisementReview;
use App\Models\Advertisement;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guard = get_guard();
        $userId = auth()->guard($guard)->user()->id;
        if(auth()->guard($guard)->user()->user_type == 3) {
            $reviews = AdvertisementReview::where('customer_id', $userId)->get();
            return view('front.reviews.list', compact('reviews'));

        } else {
            $ad = Advertisement::where('ladies_id', $userId)->orWhere('club_id', $userId);
            $adIds = $ad->pluck('id')->toArray();
            $reviews = AdvertisementReview::whereIn('advertisement_id', $adIds)->get();
            return view('front.ladies.review', compact('reviews'));
        }
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
    public function store(Request $req)
    {
        $req->validate([
            'advertisement_id' => 'required|numeric|min:1',
            'positive' => 'required',
            'negative' => 'required',
            'rating' => 'required|numeric|min:1'
        ]);
        $rev = new AdvertisementReview();
        $rev->customer_id = auth()->guard(get_guard())->user()->id;
        $rev->advertisement_id = $req->advertisement_id;
        $rev->positive = $req->positive;
        $rev->negative = $req->negative;
        $rev->rating = $req->rating;
        $rev->save();
        return redirect()->back()->with('Success','Review Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $r = AdvertisementReview::where('id',base64_decode($id));
        $adId = $r->pluck('advertisement_id')->toArray();
        $advertisement = Advertisement::where('id', $adId)->first();
        // dd($advertisement);
        $review = $r->first();
        return view('front.reviews.details', compact('review', 'advertisement'));
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
    public function destroy($id)
    {
        //
    }

    /**
     * Add reply to the specific review.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $req)
    {
        $req->validate([
            'review_id' => 'required|numeric|min:1',
            'reply' => 'required'
        ]);
        $rev = AdvertisementReview::find($req->review_id);
        $rev->reply_by = auth()->guard(get_guard())->user()->id;
        $rev->reply = $req->reply;
        $rev->save();
        return redirect()->route('review.list')->with('Success','Reply Added SuccessFully');
    }
    
    public function positiveNegative(Request $req)
    {
        $req->validate([
            'review_id' => 'required|numeric|min:1',
            'positive' => 'required',
            'negative' => 'required'
        ]);
        $rev = AdvertisementReview::find($req->review_id);
        $rev->positive = $req->positive;
        $rev->negative = $req->negative;
        $rev->save();
        return redirect()->route('review.list')->with('Success','Positive negative view added successFully');
    }
}
