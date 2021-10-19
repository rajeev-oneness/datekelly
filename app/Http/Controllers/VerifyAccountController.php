<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifyAccountController extends Controller
{
    public function index(Request $req)
    {
        return view("front.verify_account");
    }
}
