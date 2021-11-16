<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserVerification;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerifyAccountController extends Controller
{
    use VerifiesEmails;

    public function index(Request $req)
    {
        $guard = get_guard();
        $user = auth()->guard($guard)->user();
        $userId = $user->id;
        $userType = $user->user_type;
        $UserVerification = UserVerification::where('user_id', $userId)->first();
        return view("front.verify_account", compact("UserVerification"));
    }

    public function emailverification(Request $req)
    {
        $user = $req->user();
        if(!empty($req->resend_email) && $req->resend_email == 'resend'){
            $this->sendOrResendEmailVerificationLink($req);
        }
        return view('auth.user.emailverification',compact('user'));
    }

    public function submitImages(Request $req)
    {
        $guard = get_guard();
        $user = auth()->guard($guard)->user();
        $userId = $user->id;
        $userType = $user->user_type;
        $userVerify = array();

        $UserVerification = UserVerification::where('user_id', $userId)->first();

        $req->validate([
            "id_card" => "mimes:jpg,jpeg,png",
            "id_card_with_user" => "mimes:jpg,jpeg,png",
            "newspaper_with_user" => "mimes:jpg,jpeg,png",
            "user_img" => "mimes:jpg,jpeg,png",
        ]);
        if($req->hasFile('id_card')) {
            $ext = '.'.$req->id_card->getClientOriginalExtension();
            $time = time();
            $fileName = hash('ripemd128', $time).$ext;
            $userVerify["id_card"] = 'user/verification/'.$userId.'/'.$fileName;
            $req->id_card->storeAs('user/verification/'.$userId.'/', $fileName,'public');
        }
        if($req->hasFile('id_card_with_user')) {
            $ext = '.'.$req->id_card_with_user->getClientOriginalExtension();
            $time = time();
            $fileName = hash('ripemd128', $time).$ext;
            $userVerify["id_card_with_user"] = 'user/verification/'.$userId.'/'.$fileName;
            $req->id_card_with_user->storeAs('user/verification/'.$userId.'/', $fileName,'public');
        }
        if($req->hasFile('newspaper_with_user')) {
            $ext = '.'.$req->newspaper_with_user->getClientOriginalExtension();
            $time = time();
            $fileName = hash('ripemd128', $time).$ext;
            $userVerify["newspaper_with_user"] = 'user/verification/'.$userId.'/'.$fileName;
            $req->newspaper_with_user->storeAs('user/verification/'.$userId.'/', $fileName,'public');
        }
        if($req->hasFile('user_img')) {
            $ext = '.'.$req->user_img->getClientOriginalExtension();
            $time = time();
            $fileName = hash('ripemd128', $time).$ext;
            $userVerify["user_img"] = 'user/verification/'.$userId.'/'.$fileName;
            $req->user_img->storeAs('user/verification/'.$userId.'/', $fileName,'public');
        }
        if($UserVerification) {
            $UserVerification = UserVerification::where('user_id', $userId)->update($userVerify);

        } else {
            $userVerify["user_id"] = $userId;
            $UserVerification = UserVerification::create($userVerify);
        }

        return redirect()->back();
    }
}
