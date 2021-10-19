<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\PremiumPicturePurchase;
use App\Models\LoveCount;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Storage;
use Hash;
 
class MensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mens = User::with('country')
                    ->where('user_type', 3)
                    ->where('status', 1)
                    ->orderBy('created_at', 'DESC')->get();
        return view('admin.mens.index', compact('mens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $countries = Country::with('city')->get();
        return view('admin.mens.add', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        // dd($req->all());
        $req->validate([
            'password' => 'required|string|min:8|confirmed',
            'email' => 'email|unique:users'
        ]);
        $mens = new User;
        $mens->user_type = 3;
        $mens->name = $req->name;
        $mens->email = $req->email;
        $mens->phn_no = $req->phn_no;
        $mens->whatsapp_no = $req->whatsapp_no;
        $mens->password = Hash::make($req->password);
        $mens->about = $req->about;
        $mens->age = $req->age;
        $mens->country_id = $req->country_id;
        $mens->city_id = $req->city_id;
        $mens->address = $req->address;
        $mens->status = 1;
        
        if($req->hasFile('profile_pic')) {
            // if($mens->profile_pic != '') {
            //     Storage::delete('public/mens/profile_pic/'.$mens->logo);
            // }
            $ext = '.'.$req->profile_pic->getClientOriginalExtension();
            $time = time();
            $fileName = hash('ripemd128', $time).$ext;
            $mens->profile_pic = $fileName;
            $req->profile_pic->storeAs('mens/profile_pic', $fileName,'public');
        }
        
        $mens->save();
        $guard = get_guard();
        if($guard == '' && $guard != 'admin') {
            $user = User::where('email',$req->email)->first();
            auth()->guard($guard)->login($user);
            return redirect('/home');
        }
        return redirect()->route('admin.mens')->with('Success','Men Added SuccessFully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $men = User::where('id', decrypt($id))->first();
        return view('admin.mens.details', compact('men'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $men = User::where('id', decrypt($id))->with('country', 'city')->first();
        // dd($men);
        if(get_guard() == 'admin') {
            return view('admin.mens.edit', compact('men', 'countries'));
        } else {
            return view('front.mens.edit-profile', compact('men', 'countries'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $men = User::findOrFail(decrypt($req->id));
        $men->name = $req->name;
        $men->phn_no = $req->phn_no;
        $men->whatsapp_no = $req->whatsapp_no;
        $men->about = $req->about;
        $men->age = $req->age;
        $men->country_id = $req->country_id;
        $men->city_id = $req->city_id;
        $men->address = $req->address;
        
        if($req->hasFile('profile_pic')) {
            if($men->profile_pic != '') {
                Storage::delete('public/mens/profile_pic/'.$men->profile_pic);
            }
            $ext = '.'.$req->profile_pic->getClientOriginalExtension();
            $time = time();
            $fileName = hash('ripemd128', $time).$ext;
            $men->profile_pic = $fileName;
            $req->profile_pic->storeAs('mens/profile_pic', $fileName,'public');
        }
        
        $men->save();
        if(get_guard() == 'admin') {
            return redirect()->route('admin.mens')->with('Success','Men Updated SuccessFully');
        } else {
            return redirect()->route('user.dashboard')->with('Success','Men Updated SuccessFully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $men = User::findOrFail(decrypt($id));
        if($men->profile_pic != '') {
            Storage::delete('public/mens/profile_pic/'.$men->profile_pic);
        }
        $men->delete();
        return redirect()->route('admin.mens')->with('Success','Men Deleted SuccessFully');
    }

    public function purchaedPremiumPictures(Request $req)
    {
        $pictures = PremiumPicturePurchase::where('customer_id', auth()->guard(get_guard())->user()->id)->get();
        return view('front.mens.premium-picture', compact('pictures'));
    }

    public function favourites(Request $req)
    {
        $loves = LoveCount::where('from', auth()->guard(get_guard())->user()->id);
        $totalLove = $loves->count();
        $adIds = $loves->pluck('advertisement_id')->toArray();
        // dd($adIds);
        $advertisements = Advertisement::whereIn('id', $adIds)->get();
        return view('front.mens.favourites', compact('totalLove', 'advertisements'));
    }
}
