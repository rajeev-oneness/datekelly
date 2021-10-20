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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = User::with('country')
                    ->where('user_type', 2)
                    ->where('status', 1)
                    ->orderBy('created_at', 'DESC')->get();
        return view('admin.clubs.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $countries = Country::with('city')->get();
        return view('admin.clubs.add', compact('countries'));
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
        $clubs = new User;
        $clubs->user_type = 2;
        $clubs->name = $req->name;
        $clubs->email = $req->email;
        $clubs->phn_no = $req->phn_no;
        $clubs->whatsapp_no = $req->whatsapp_no;
        $clubs->password = Hash::make($req->password);
        $clubs->about = $req->about;
        $clubs->age = $req->age;
        $clubs->country_id = $req->country_id;
        $clubs->city_id = $req->city_id;
        $clubs->address = $req->address;
        $clubs->website_address = $req->website_address;
        $clubs->status = 1;
        
        if($req->hasFile('profile_pic')) {
            // if($clubs->profile_pic != '') {
            //     Storage::delete('public/clubs/profile_pic/'.$clubs->logo);
            // }
            $ext = '.'.$req->profile_pic->getClientOriginalExtension();
            $time = time();
            $fileName = hash('ripemd128', $time).$ext;
            $clubs->profile_pic = $fileName;
            $req->profile_pic->storeAs('clubs/profile_pic', $fileName,'public');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $club = User::where('id', decrypt($id))->first();
        return view('admin.clubs.details', compact('club'));
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
        $club = User::where('id', decrypt($id))->with('country', 'city')->first();
        // dd($club);
        if(get_guard() == 'admin') {
            return view('admin.clubs.edit', compact('club', 'countries'));
        } else {
            return view('front.clubs.edit-profile', compact('club', 'countries'));
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
        $club = User::findOrFail(decrypt($req->id));
        // dd($club);
        $club->name = $req->name;
        $club->phn_no = $req->phn_no;
        $club->whatsapp_no = $req->whatsapp_no;
        $club->about = $req->about;
        $club->age = $req->age;
        $club->country_id = $req->country_id;
        $club->city_id = $req->city_id;
        $club->address = $req->address;
        $club->website_address = $req->website_address;
        
        if($req->hasFile('profile_pic')) {
            if($club->profile_pic != '') {
                Storage::delete('public/clubs/profile_pic/'.$club->profile_pic);
            }
            $ext = '.'.$req->profile_pic->getClientOriginalExtension();
            $time = time();
            $fileName = hash('ripemd128', $time).$ext;
            $club->profile_pic = $fileName;
            $req->profile_pic->storeAs('clubs/profile_pic', $fileName,'public');
        }
        
        $club->save();
        if(get_guard() == 'admin') {
            return redirect()->route('admin.clubs')->with('Success','Club Updated SuccessFully');
        } else {
            return redirect()->route('user.dashboard')->with('Success','Club Updated SuccessFully');
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
        $club = User::findOrFail(decrypt($id));
        if($club->profile_pic != '') {
            Storage::delete('public/clubs/profile_pic/'.$club->profile_pic);
        }
        $club->delete();
        return redirect()->route('admin.clubs')->with('Success','Club Deleted SuccessFully');
    }
}
