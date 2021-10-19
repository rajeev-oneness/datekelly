<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
