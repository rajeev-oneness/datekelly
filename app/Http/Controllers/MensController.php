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
use App\Models\UserVerification;
use Hash;
 
class MensController extends Controller
{
    public function index()
    {
        $mens = User::where('user_type', 3)->latest()->get();
        return view('admin.mens.index', compact('mens'));
    }

    public function add()
    {
        return view('admin.mens.add');
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:200',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|string|email|unique:users',
            'dob' => 'required|date',
        ]);
        $mens = new User;
        $mens->user_type = 3;
        $mens->name = $req->name;
        $mens->email = $req->email;
        $mens->dob = emptyCheck($req->dob,true);
        $mens->age = (date('Y') - date('Y',strtotime($mens->dob)));
        $mens->password = Hash::make($req->password);
        $mens->status = 1;
        if ($req->hasFile('profile_pic')) {
            $image = $req->file('profile_pic');
            $mens->profile_pic = imageUpload($image, 'mens');
        }else{
            $mens->profile_pic = 'images/default_image.png';
        }
        $mens->save();
        $UserVerification = new UserVerification;
        $UserVerification->user_id = $mens->id;
        $UserVerification->save();
        $guard = get_guard();
        if($guard == '' && $guard != 'admin') {
            $user = User::where('email',$req->email)->first();
            auth()->guard($guard)->login($user);
            return redirect('/home');
        }
        return redirect()->route('admin.mens')->with('Success','Men Added SuccessFully');
    }

    public function show($id)
    {
        $men = User::where('id', decrypt($id))->first();
        return view('admin.mens.details', compact('men'));
    }

    public function edit($id)
    {
        $countries = Country::all();
        $men = User::where('id', decrypt($id))->first();
        if(get_guard() == 'admin') {
            return view('admin.mens.edit', compact('men', 'countries'));
        } else {
            return view('front.mens.edit-profile', compact('men', 'countries'));
        }
    }

    public function update(Request $req)
    {
        $men = User::findOrFail(decrypt($req->id));
        $req->validate([
            'id' => 'required',
            'name' => 'required|string|max:200',
            'phn_no' => 'nullable|numeric',
            'dob' => 'required|date',
            'email' => 'required|email|unique:users,email,'.$men->id,
            'password' => 'nullable|string|min:5|confirmed',
        ]);
        $message = 'Profile updated successFully';
        $men->dob = emptyCheck($req->dob,true);
        $men->age = (date('Y') - date('Y',strtotime($men->dob)));
        $men->name = $req->name;
        $men->phn_no = $req->phn_no;
        $men->email = $req->email;
        if(!empty($req->password)){
            $men->password = Hash::make($req->password);
            $message = 'Profile and Password updated successfully';
        }
        if ($req->hasFile('profile_pic')) {
            $image = $req->file('profile_pic');
            $men->profile_pic = imageUpload($image, 'men');
        }
        $men->save();
        if(get_guard() == 'admin') {
            return redirect()->route('admin.mens')->with('Success','Men Updated SuccessFully');
        } else {
            return back()->with('Success',$message);
        }
    }

    public function delete($id)
    {
        $men = User::findOrFail(decrypt($id))->delete();
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
        $advertisements = Advertisement::whereIn('id', $adIds)->get();
        return view('front.mens.favourites', compact('totalLove', 'advertisements'));
    }
}
