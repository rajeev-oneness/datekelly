<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('auth.passwords.change');
    }
    public function update(Request $req)
    {
        $req->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);
        if(get_guard() == 'admin') {
            $admin = Admin::find(1);
            if(Hash::check($req->old_pass, $admin->password)) {
                $admin->password = Hash::make($req->password);
                $admin->save();
            }
        }
        return redirect('/home');
    }
}
