<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, DB;
use App\Models\User, App\Models\Advertisement;
use App\Models\AdvertisementReview, App\Models\AdvertisementServices;
use App\Models\AdvertisementServiceDuration, App\Models\AdvertisementWorkingDays;
use App\Models\AdvertisementsImage,App\Models\Booking;
use App\Models\LadyPremiumPicture, App\Models\LoveCount;
use App\Models\ReviewLikeDislike, App\Models\UserVerification;

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

    // Delete User Account Permanently
    public function deleteMyAccount(Request $req,$userId)
    {
        DB::beginTransaction();
        try {
            $user = User::where('id',$userId)->first();
            if($user){
                $advertisement = Advertisement::where('ladies_id',$user->id)->orWhere('club_id',$user->id)->get();
                foreach ($advertisement as $key => $adv) {
                    AdvertisementReview::where('advertisement_id',$adv->id)->delete();
                    AdvertisementServices::where('advertisement_id',$adv->id)->delete();
                    AdvertisementServiceDuration::where('advertisement_id',$adv->id)->delete();
                    AdvertisementWorkingDays::where('advertisement_id',$adv->id)->delete();
                    AdvertisementsImage::where('advertisement_id',$adv->id)->delete();
                    Booking::where('advertisement_id',$adv->id)->delete();
                    ReviewLikeDislike::where('advertisement_id',$adv->id)->delete();
                    LoveCount::where('advertisement_id',$adv->id)->delete();
                }
                LadyPremiumPicture::where('user_id',$user->id)->delete();
                UserVerification::where('user_id',$user->id)->delete();
                $user->status = 0;$user->save();
                $user->delete();
                DB::commit();
                return response()->json(['error' => false,'message' => 'Account Deleted Success','data' => $req->all()]);
            }
            return response()->json(['error' => true,'message' => 'Invalid Information Detected','data' => $req->all()]);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['error' => true,'message' => 'Something went wrong please try after sometime']);
        }
    }

    public function logout(Request $req)
    {
        auth()->guard()->logout();
        $req->session()->invalidate();
        return redirect(route('homepage'));
    }
}
