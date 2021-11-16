<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use Illuminate\Support\Facades\Storage;
use App\Models\UserVerification;
use Hash;

class ClubsController extends Controller
{
    public function index()
    {
        $clubs = User::where('user_type', 2)->latest()->get();
        return view('admin.clubs.index', compact('clubs'));
    }

    public function add()
    {
        $countries = Country::with('city')->get();
        return view('admin.clubs.add', compact('countries'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|string|email|unique:users',
            'phn_no' => 'required|string',
            'address' => 'nullable|string|max:230',
            'country_id' => 'required|min:1|numeric',
            'city_id' => 'required|min:1|numeric',
            'website_address' => 'nullable|string',
            'password' => 'required|string|min:5|confirmed',
        ]);
        $clubs = new User;
        $clubs->user_type = 2;
        $clubs->name = $req->name;
        $clubs->email = $req->email;
        $clubs->phn_no = $req->phn_no;        
        $clubs->password = Hash::make($req->password);
        $clubs->country_id = $req->country_id;
        $clubs->city_id = $req->city_id;
        $clubs->address = emptyCheck($req->address);
        $clubs->website_address = emptyCheck($req->website_address);
        $clubs->status = 1;
        if ($req->hasFile('profile_pic')) {
            $image = $req->file('profile_pic');
            $clubs->profile_pic = imageUpload($image, 'club');
        }else{
            $clubs->profile_pic = 'images/defaultClub.jpg';
        }
        $clubs->save();
        $UserVerification = new UserVerification;
        $UserVerification->user_id = $clubs->id;
        $UserVerification->save();
        $guard = get_guard();
        if($guard == '' && $guard != 'admin') {
            $user = User::where('email',$req->email)->first();
            auth()->guard($guard)->login($user);
            return redirect('/home');
        }
        return redirect()->route('admin.clubs')->with('Success','Club Added SuccessFully');
    }

    public function show($id)
    {
        $club = User::where('id', decrypt($id))->first();
        return view('admin.clubs.details', compact('club'));
    }

    public function edit($id)
    {
        $countries = Country::get();
        $club = User::where('id', decrypt($id))->with('country', 'city')->first();
        if($club->city_id != 0 && $club->country_id != 0){
            $club->cities = City::where('country_id',$club->country_id)->get();
        }
        if(get_guard() == 'admin') {
            return view('admin.clubs.edit', compact('club', 'countries'));
        } else {
            return view('front.clubs.edit-profile', compact('club', 'countries'));
        }
    }

    public function update(Request $req)
    {
        $clubs = User::findOrFail(decrypt($req->id));
        $req->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|email|unique:users,email,'.$clubs->id,
            'phn_no' => 'required|string',
            'address' => 'nullable|string|max:230',
            'country_id' => 'required|min:1|numeric',
            'city_id' => 'required|min:1|numeric',
            'website' => 'nullable|string',
            'password' => 'nullable|string|min:5|confirmed',
        ]);
        $message = 'Profile updated successFully';
        $clubs->name = $req->name;
        $clubs->email = $req->email;
        $clubs->phn_no = $req->phn_no;        
        if(!empty($req->password)){
            $clubs->password = Hash::make($req->password);
            $message = 'Profile and Password updated successfully';
        }
        $clubs->country_id = $req->country_id;
        $clubs->city_id = $req->city_id;
        $clubs->address = emptyCheck($req->address);
        $clubs->website_address = emptyCheck($req->website);
        if ($req->hasFile('profile_pic')) {
            $image = $req->file('profile_pic');
            $clubs->profile_pic = imageUpload($image, 'club');
        }else{
            $clubs->profile_pic = 'images/defaultClub.jpg';
        }
        $clubs->save();
        if(get_guard() == 'admin') {
            return redirect()->route('admin.clubs')->with('Success','Club '.$message);
        } else {
            return back()->with('Success',$message);
        }
    }

    public function delete($id)
    {
        $club = User::findOrFail(decrypt($id))->delete();
        return redirect()->route('admin.clubs')->with('Success','Club Deleted SuccessFully');
    }
}
