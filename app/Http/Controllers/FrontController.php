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
use App\Models\Conversation,App\Models\AdvertisementServices;
use App\Models\LadyPremiumPicture,App\Models\Service;
use App\Models\PremiumPicturePurchase,App\Models\Descent;
use App\Models\LoveCount,App\Models\CoinsDetails;
use App\Models\Language,App\Models\Origin;
use App\Models\CupSize,App\Models\BodySize;

class FrontController extends Controller
{
    public function ladiesHome()
    {
        $advertisement = Advertisement::where('club_id', 0)->get();
        return view('front.ladies-home', compact('advertisement'));
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

    public function search(Request $req)
    {
        $data = (object)[];
        $data->cup_size = CupSize::select('*')->get();
        $data->body_size = BodySize::select('*')->get();
        $data->descents = Descent::select('*')->get();
        $data->language = Language::select('*')->get();
        $data->servicesAndExtra = Service::select('*')->get();
        return view('front.search', compact('data'));
    }

    public function searchResult(Request $req)
    {
        $req->validate([
            'searchTrue' => 'nullable|string|in:true',
            'address' => 'nullable|string',
            'distance' => 'nullable',
            'my_service' => 'nullable|array',
            'my_service.*' => 'required|string|in:private_visit,escort',
            'sex' => 'nullable|array',
            'sex.*' => 'required|string|in:lady,transsexual_TS',
            'ageFrom' => 'nullable|numeric|min:1',
            'ageTo' => 'nullable|numeric|gte:ageFrom',
            'lengthFrom' => 'nullable|numeric|min:1',
            'lengthTo' => 'nullable|numeric|gte:lengthFrom',
            'weightFrom' => 'nullable|numeric|min:1',
            'weightTo' => 'nullable|numeric|gte:weightFrom',
            'cup_size' => 'nullable|array',
            'cup_size.*' => 'required|string',
            'body_size' => 'nullable|array',
            'body_size.*' => 'required|string',
            'descent' => 'nullable|array',
            'descent.*' => 'required|string',
            'language' => 'nullable|array',
            'language.*' => 'required|string',
            'services' => 'nullable|array',
            'services.*' => 'required|string',
        ]);
        $advertisement = Advertisement::select('*')->where('ladies_id','>',0);
        if(!empty($req->address) ){
            $advertisement = $advertisement->whereIn('address',$req->address);
        }
        if(!empty($req->my_service) && count($req->my_service) > 0){
            $advertisement = $advertisement->whereIn('my_service',$req->my_service);
        }
        if(!empty($req->sex) && count($req->sex) > 0){
            $advertisement = $advertisement->whereIn('sex',$req->sex);
        }
        if(!empty($req->ageFrom) && !empty($req->ageTo)){
            $advertisement = $advertisement->whereBetween('age',[$req->ageFrom,$req->ageTo]);
        }
        if(!empty($req->lengthFrom) && !empty($req->lengthTo)){
            $advertisement = $advertisement->whereBetween('length',[$req->lengthFrom,$req->lengthTo]);
        }
        if(!empty($req->weightFrom) && !empty($req->weightTo)){
            $advertisement = $advertisement->whereBetween('weight',[$req->weightFrom,$req->weightTo]);
        }
        if(!empty($req->cup_size) && count($req->cup_size) > 0){
            $advertisement = $advertisement->whereIn('cup_size',$req->cup_size);
        }
        if(!empty($req->body_size) && count($req->body_size) > 0){
            $advertisement = $advertisement->whereIn('body_size',$req->body_size);
        }
        if(!empty($req->descent) && count($req->descent) > 0){
            $advertisement = $advertisement->whereIn('descent',$req->descent);
        }
        if(!empty($req->language) && count($req->language) > 0){
            $advertisement = $advertisement->where(function ($query) use ($req){
                $query->whereRaw('FIND_IN_SET("'.$req->language[0].'",language)');
                foreach ($req->language as $langKey => $langValue) {
                    if($langKey >= 1){
                        $query->orWhereRaw('FIND_IN_SET("'.$langValue.'",language)');
                    }
                }
            });
        }
        if(!empty($req->services) && count($req->services) > 0){
            $services = AdvertisementServices::select('advertisement_id')->whereIn('service_name',$req->services)->groupBy('advertisement_id')->pluck('advertisement_id')->toArray();
            if(count($services) > 0){
                $advertisement = $advertisement->whereIn('id',$services);
            }else{
                $advertisement = $advertisement->where('id',0);
            }
        }
        if(!empty($req->distance) && $req->distance > 0){

        }
        $advertisement = $advertisement->latest()->get();
        if(count($advertisement) > 0){
            return view('front.search-result',compact('advertisement','req'));
        }
        $errors['searchTrue'] = 'Oops! Data not found';
        return redirect(route('search.home'))->withInput($req->all())->withErrors($errors);
    }
}
