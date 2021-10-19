<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\User;
use App\Models\Contact;
use App\Models\SiteSetting;
use App\Models\Advertisement;
use App\Models\AdvertisementReview;
use App\Models\BusinessBanner;
use App\Models\Conversation;
use App\Models\LadyPremiumPicture;
use App\Models\PremiumPicturePurchase;
use App\Models\LoveCount;
use App\Models\CoinsDetails;
use App\Models\Language;
use App\Models\Origin;
use App\Models\CupSize;
use App\Models\BodySize;

class FrontController extends Controller
{
    public function ladiesHome()
    {
        $advertisements = Advertisement::where('club_id', 0)->get();
        return view('front.ladies-home', compact('advertisements'));
    }
    public function clubAgenciesHome()
    {
        $advertisements = Advertisement::where('club_id', '!=', 0)->get();
        return view('front.club-agencies-home', compact('advertisements'));
    }
    public function getReviews()
    {
        $reviews = AdvertisementReview::where('created_at', '>', date('Y-m-d H:i:s', strtotime('-100 days')))->orderBy('id', 'DESC')->get();
        return view('front.reviews', compact('reviews'));
    }
    public function adCategoryList($id)
    {
        $advertisements = Advertisement::where('category', $id)->get();
        return view('front.advertisement-category-list', compact('advertisements'));
    }
    public function register()
    {
        return view('front.register');
    }
    public function login()
    {
        return view('front.login');
    }
    public function registerView()
    {
        $countries = Country::all();
        if(\Route::currentRouteName() == 'user.mens.register')
        {
            return view('front.register-mens', compact('countries'));
        } else if(\Route::currentRouteName() == 'user.ladies.register')
        {
            $clubs = User::where('user_type', 2)->where('status', 1)->get();
            return view('front.register-ladies', compact('countries', 'clubs'));
        } else if(\Route::currentRouteName() == 'user.clubs.register')
        {
            return view('front.register-clubs', compact('countries'));
        }
    }
    public function dashboard()
    {
        $guard = get_guard();
        $user = User::find(auth()->guard($guard)->user()->id);
        
        $messages = Conversation::where(function ($query) use (&$user) {
            $query->where('message_from', $user->id);
        })->orWhere(function($query) use (&$user) {
            $query->where('message_to', $user->id);
        })->count();
        
        $coinBalance = CoinsDetails::where('user_id', $user->id)->sum('coins');
        $coinSpent = CoinsDetails::where('user_id', $user->id)->where('coins', '<', 0)->sum('coins');
        
        $ads = Advertisement::where('club_id', $user->id)->orWhere('ladies_id', $user->id);
        $adsId = $ads->pluck('id')->toArray();
        $totalReviews = AdvertisementReview::whereIn('advertisement_id', $adsId)->count();
        $rating = AdvertisementReview::whereIn('advertisement_id', $adsId)->avg('rating');

        if(auth()->guard($guard)->user()->user_type == 1) {
            $premiumPic = LadyPremiumPicture::where('user_id', $user->id)->count();
            $premiumPicPurchase = PremiumPicturePurchase::where('from_user_id', $user->id)->sum('price');
            $loves = $ads->sum('no_of_loves');
            return view('front.ladies.dashboard', compact('user', 'premiumPic', 'premiumPicPurchase', 'messages', 'loves', 'rating', 'coinBalance', 'coinSpent', 'totalReviews'));
        } else if(auth()->guard($guard)->user()->user_type == 2) {
            $banners = BusinessBanner::where('user_id', $user->id)->count();
            $adCount = $ads->count();
            $loves = $ads->sum('no_of_loves');
            return view('front.clubs.dashboard', compact('user', 'banners', 'adCount', 'messages', 'loves', 'rating', 'coinBalance', 'coinSpent', 'totalReviews'));
        } else if(auth()->guard($guard)->user()->user_type == 3) {
            $totalReviews = AdvertisementReview::where('customer_id', $user->id)->count();
            $loveCount = LoveCount::where('from', $user->id)->count();
            $ppCount = PremiumPicturePurchase::where('customer_id', $user->id)->count();
            return view('front.mens.dashboard', compact('user', 'messages', 'loveCount', 'coinBalance', 'coinSpent', 'totalReviews', 'ppCount'));
        }
    }
    public function contactus()
    {
        return view('front.contact-us');
    }
    public function submitContact(Request $req)
    {
        $contact = new Contact;
        $contact->name = $req->name;
        $contact->email = $req->email;
        $contact->subject = $req->sub;
        $contact->message = $req->message;
        $contact->save();

        return response()->json(['error' => false, 'message' => 'contact form submitted']);
    }
    public function termsConditions()
    {
        $data = SiteSetting::first();
        return view('front.terms-conditions', compact('data'));
    }
    public function privacyPolicy()
    {
        $data = SiteSetting::first();
        return view('front.privacy-policy', compact('data'));
    }
    public function faq()
    {
        return view('front.faq-view');
    }
    public function aboutUs()
    {
        return view('front.about-us');
    }
    public function search()
    {
        $langs = Language::get();
        $origins = Origin::get();
        $cupSizes = CupSize::get();
        $bodySizes = BodySize::get();
        return view('front.search', compact('langs', 'origins', 'cupSizes', 'bodySizes'));
    }
    public function searchResult(Request $req)
    {
        return view('front.search-result');
    }
}
