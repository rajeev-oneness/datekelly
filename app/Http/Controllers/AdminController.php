<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\Admin;
use App\Models\User;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $ladies = User::where('user_type', 1)->get()->count();
        $men = User::where('user_type', 3)->get()->count();
        $clubs = User::where('user_type', 2)->get()->count();
        $date = \Carbon\Carbon::today()->subDays(10);
        $advertisements = Advertisement::where('created_at', '>=', $date)->get();
        $total_advertisements = Advertisement::get()->count();
        $active_advertisements = Advertisement::where('is_verified', 1)->count();
        $inactive_advertisements = Advertisement::where('is_verified', 0)->count();
        return view('admin.index', compact('ladies', 'men', 'clubs', 'advertisements', 'total_advertisements', 'active_advertisements', 'inactive_advertisements'));
    }
    public function siteSettingsEdit()
    {
        $settings = SiteSetting::first();
        return view('admin.settings.edit', compact('settings'));
    }
    public function siteSettingsUpdate(Request $req)
    {
        // dd($req->all());
        $admin = Admin::find(1);
        $admin->site_name = $req->site_name;
        $admin->site_email = $req->site_email;
        $settings = SiteSetting::find(1);
        $settings->site_name = $req->site_name;
        $settings->site_email = $req->site_email;
        $settings->phn_no = $req->phn_no;
        $settings->address = $req->address;
        $settings->copyright = $req->copyright;
        $settings->terms_conditons = $req->terms_conditons;
        $settings->cancellation_policy = $req->cancellation_policy;
        $settings->google_map = $req->google_map;
        if ($req->hasFile('site_logo')) {
            $image = $req->file('site_logo');
            $admin->logo = imageUpload($image, 'logo');
        }
        $settings->save();
        $admin->save();
        return redirect()->route('admin.site-settings.edit');
    }
    public function changeProfile()
    {
        $admin = Admin::find(1);
        return view('admin.profile.change', compact('admin'));
    }
    public function updateProfile(Request $req)
    {
        $admin = Admin::find(1);
        $admin->name = $req->name;
        $admin->email = $req->email;
        $admin->save();
        return back();
    }
}
