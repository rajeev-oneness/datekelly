<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, VerifiesEmails;

    public function sendOrResendEmailVerificationLink(Request $req)
    {
        $user = $req->user();
        if($user->email_verified_at != null){}
        else{$this->resend($req);}
    }
}
