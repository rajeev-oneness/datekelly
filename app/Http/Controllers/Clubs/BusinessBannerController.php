<?php

namespace App\Http\Controllers\Clubs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessBanner;

class BusinessBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = BusinessBanner::where('user_id', auth()->guard(get_guard())->user()->id)->get();
        return view('front.clubs.banner.list', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('front.clubs.banner.add');
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
            'images' => 'required|mimes:jpeg,jpg,png,svg,webp'
        ]);
        $userId = auth()->guard(get_guard())->user()->id;
        $banner = new BusinessBanner();
        $banner->user_id = $userId;
        $ext = '.'.$req->images->getClientOriginalExtension();
        $fileName = randomGenerator().$userId.$ext;
        $req->images->storeAs('business-banners', $fileName,'public');
        $banner->picture = 'storage/business-banners/'.$fileName;
        $banner->save();
        return redirect()->route('club.business.banner.list')->with('Success','Business Banner Added SuccessFully');
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
    public function destroy($id)
    {
        $banner = BusinessBanner::find(base64_decode($id));
        \File::delete(public_path($banner->picture));
        $banner->delete();
        return redirect()->route('club.business.banner.list')->with('Success','Premium Picture Deleted SuccessFully');
    }
}
