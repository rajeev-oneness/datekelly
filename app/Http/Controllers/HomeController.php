<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User, App\Models\Advertisement;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $guard = get_guard();
        switch($guard){
            case 'admin': return redirect()->route('admin.dashboard');break;
            case 'web': return redirect()->route('user.dashboard');break;
            default: return view('home');break;
        }
    }

    /*public function deleteMyAccount(Request $req,$userId)
    {
        $user = User::findOrFail($userId);
        Advertisement::where('ladies_id',$user->id)->orWhere('club_id',$user->id)->delete();
        $user->delete();
        return back()->with('Success','Account Deleted SuccessFully');
    }*/
}
