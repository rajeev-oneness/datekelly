<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\Advertise;
use Illuminate\Support\Facades\Storage;
use App\Models\UserVerification;
use Hash;

class LadiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ladies = User::with('country')->where('user_type', 1)->where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('admin.ladies.index', compact('ladies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $clubs = User::where('user_type', 2)->where('status', 1)->get();
        $countries = Country::with('city')->get();
        return view('admin.ladies.add', compact('countries', 'clubs'));
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
            'name' => 'required|string|max:200',
            'email' => 'required|string|email|unique:users',
            'phn_no' => 'required|numeric',
            'dob' => 'required|date',
            //'whatsapp_no' => 'required|numeric',
            //'age' => 'required|numeric|max:80',
            //'address' => 'required|string',
            //'assigned_club' => 'nullable|numeric|min:1',
            //'country_id' => 'required|numeric|min:1',
            //'city_id' => 'required|numeric|min:1',
            'password' => 'required|string|min:8|confirmed',
            //'about' => 'required|string',
            'profile_pic' => 'nullable|',
        ]);
        $ladies = new User;
        $ladies->user_type = 1;
        $ladies->name = $req->name;
        $ladies->email = $req->email;
        $ladies->phn_no = $req->phn_no;
        $ladies->password = Hash::make($req->password);
        $ladies->dob = emptyCheck($req->dob,true);
        $ladies->age = (date('Y') - date('Y',strtotime($ladies->dob)));
        $ladies->status = 1;

        /*if($req->assigned_club != '') {
            $ladies->assigned_club = $req->assigned_club;
        }
        $ladies->whatsapp_no = $req->whatsapp_no;
        $ladies->about = $req->about;
        $ladies->age = $req->age;
        $ladies->country_id = $req->country_id;
        $ladies->city_id = $req->city_id;
        $ladies->address = $req->address;*/
        if ($req->hasFile('profile_pic')) {
            $image = $req->file('profile_pic');
            $ladies->profile_pic = imageUpload($image, 'ladies');
        }else{
            $ladies->profile_pic = 'images/girlDefault.png';
        }
        $ladies->save();
        $UserVerification = new UserVerification;
        $UserVerification->user_id = $ladies->id;
        $UserVerification->save();
        $guard = get_guard();
        if($guard == '' && $guard != 'admin') {
            $user = User::where('email',$req->email)->first();
            auth()->guard($guard)->login($user);
            return redirect('/home');
        }
        return redirect()->route('admin.ladies')->with('Success','Lady Added SuccessFully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lady = User::where('id', decrypt($id))->first();
        return view('admin.ladies.details', compact('lady'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clubs = User::where('user_type', 2)->where('status', 1)->get();
        $countries = Country::all();
        $lady = User::where('id', decrypt($id))->with('country', 'city')->first();
        if(get_guard() == 'admin') {
            return view('admin.ladies.edit', compact('lady', 'countries', 'clubs'));
        } else {
            return view('front.ladies.edit-profile', compact('lady', 'countries', 'clubs'));
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
        $lady = User::findOrFail(decrypt($req->id));
        $req->validate([
            'id' => 'required',
            'name' => 'required|string|max:200',
            'phn_no' => 'nullable|numeric',
            'dob' => 'required|date',
            'email' => 'required|email|unique:users,email,'.$lady->id,
            'password' => 'nullable|string|min:5|confirmed',
        ]);
        $message = 'Profile updated successFully';
        $lady->dob = emptyCheck($req->dob,true);
        $lady->age = (date('Y') - date('Y',strtotime($lady->dob)));
        $lady->name = $req->name;
        $lady->phn_no = $req->phn_no;
        $lady->email = $req->email;
        if(!empty($req->password)){
            $lady->password = Hash::make($req->password);
            $message = 'Profile and Password updated successfully';
        }
        /*$lady->whatsapp_no = $req->whatsapp_no;
        $lady->about = $req->about;
        $lady->country_id = $req->country_id;
        $lady->city_id = $req->city_id;
        if($req->assigned_club != '') {
            $lady->assigned_club = $req->assigned_club;
        } else {
            $lady->assigned_club = 0;
        }
        $lady->address = $req->address;*/
        if ($req->hasFile('profile_pic')) {
            $image = $req->file('profile_pic');
            $lady->profile_pic = imageUpload($image, 'ladies');
        }
        $lady->save();
        if(get_guard() == 'admin') {
            return redirect()->route('admin.ladies')->with('Success','Lady Updated SuccessFully');
        } else {
            return back()->with('Success',$message);
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
        $lady = User::findOrFail(decrypt($id))->delete();
        return redirect()->route('admin.ladies')->with('Success','Lady Deleted SuccessFully');
    }

}
