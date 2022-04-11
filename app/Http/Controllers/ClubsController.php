<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\Service;
use App\Models\ClubService;
use App\Models\Language;
use Illuminate\Support\Facades\Storage;
use App\Models\UserVerification;
use DB;
use App\Models\Advertisement,App\Models\Descent;
use App\Models\AdvertisementsImage;
use App\Models\AdvertisementServices,App\Models\BodySize;
use App\Models\AdvertisementServiceDuration;
use App\Models\AdvertisementReview,App\Models\CupSize;
use App\Models\Category;
use App\Models\LadyPremiumPicture,App\Models\PremiumPicturePurchase;
use App\Models\LoveCount,App\Models\ReviewLikeDislike;
use App\Models\AdvertisementWorkingDays;
use App\Models\AdvertisementCategory;
use Hash;

class ClubsController extends Controller
{
    public function index()
    {
        $clubs = User::where('user_type', 2)->latest()->get();
        return view('admin.clubs.index', compact('clubs'));
    }

    public function add()
    {
        $countries = Country::with('city')->get();
        return view('admin.clubs.add', compact('countries'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|string|email|unique:users',
            'phn_no' => 'required|string',
            'address' => 'nullable|string|max:230',
            'country_id' => 'required|min:1|numeric',
            'city_id' => 'required|min:1|numeric',
            'website_address' => 'nullable|string',
            'password' => 'required|string|min:5|confirmed',
        ]);
        $clubs = new User;
        $clubs->user_type = 2;
        $clubs->name = $req->name;
        $clubs->email = $req->email;
        $clubs->phn_no = $req->phn_no;
        $clubs->password = Hash::make($req->password);
        $clubs->country_id = $req->country_id;
        $clubs->city_id = $req->city_id;
        $clubs->address = emptyCheck($req->address);
        $clubs->website_address = emptyCheck($req->website_address);
        $clubs->status = 1;
        if ($req->hasFile('profile_pic')) {
            $image = $req->file('profile_pic');
            $clubs->profile_pic = imageUpload($image, 'club');
        } else {
            $clubs->profile_pic = 'images/defaultClub.jpg';
        }
        $clubs->save();

        // new club entry into advertisement
        $newAdvertisement = new Advertisement();
        $newAdvertisement->user_type = 2;
        $newAdvertisement->club_id = $clubs->id;
        $newAdvertisement->save();

        $UserVerification = new UserVerification;
        $UserVerification->user_id = $clubs->id;
        $UserVerification->save();
        $guard = get_guard();
        if($guard == '' && $guard != 'admin') {
            $user = User::where('email',$req->email)->first();
            auth()->guard($guard)->login($user);
            return redirect('/home');
        }
        return redirect()->route('admin.clubs')->with('Success','Club Added SuccessFully');
    }

    public function show($id)
    {
        $club = User::where('id', decrypt($id))->first();
        return view('admin.clubs.details', compact('club'));
    }

    // club profile edit
    public function edit($id)
    {
        $data = (object)[];
        $countries = Country::get();
        $club = User::where('id', decrypt($id))->with('country', 'city')->first();
        $data->time = ['15 Min', '30 Min','45 Min','1 Hour','2 Hour', '4 Hour', '8 Hour','12 Hour'];
        $data->info = Advertisement::where('user_type', 2)->where('club_id', decrypt($id))->first();
        $data->language = Language::select('*')->latest()->get();
        $data->servicesAndExtra = ClubService::select('*')->latest()->get();
        $data->workingDays = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
        if($club->city_id != 0 && $club->country_id != 0){
            $club->cities = City::where('country_id',$club->country_id)->get();
        }
        if(get_guard() == 'admin') {
            return view('admin.clubs.edit', compact('club', 'countries'));
        } else {
            return view('front.clubs.edit-profile', compact('club', 'countries', 'data'));
        }
    }

    // club profile update
    public function update(Request $req)
    {
        $clubs = User::findOrFail(decrypt($req->id));
        $req->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|email|unique:users,email,'.$clubs->id,
            'phn_no' => 'required|string',
            'address' => 'nullable|string|max:230',
            'country_id' => 'required|min:1|numeric',
            'city_id' => 'required|min:1|numeric',
            'website' => 'nullable|string',
            'about' => 'required|string|max:240',
            'password' => 'nullable|string|min:5|confirmed',
            // my services
            'my_service' => 'nullable|string|max:255',
            // language
            'language' => 'required|array',
            'language.*' => 'required|min:1|numeric',
            // images
            'images' => 'nullable|array',
            'images.*' => 'nullable|image',
            // time & price
            'time' => 'nullable|array',
            'time.*' => 'nullable|string',
            'price' => 'nullable|array',
            'price.*' => 'nullable|numeric',
            'extraprice_for_escort' => 'nullable|min:1|numeric',
            // services
            'services' => 'nullable|array',
            'services.*' => 'nullable|string',
            'servicesInclude' => 'nullable|array',
            'servicesInclude.*' => 'nullable|string|in:0,1',
            'servicesPrice' => 'nullable|array',
            'servicesPrice.*' => 'nullable|string',
            // working days
            'workingDays' => 'nullable|array',
            'workingDays.*' => 'nullable|string',
            'workingTimeFrom' => 'nullable|array',
            'workingTimeFrom.*' => 'nullable|string',
            'workingTimeTill' => 'nullable|array',
            'workingTimeTill.*' => 'nullable|string',
        ]);
        $message = 'Profile updated successFully';
        $clubs->name = $req->name;
        $clubs->email = $req->email;
        $clubs->phn_no = $req->phn_no;        
        if(!empty($req->password)){
            $clubs->password = Hash::make($req->password);
            $message = 'Profile and Password updated successfully';
        }
        $clubs->country_id = $req->country_id;
        $clubs->city_id = $req->city_id;
        $clubs->address = emptyCheck($req->address);
        $clubs->website_address = emptyCheck($req->website);
        $clubs->about = emptyCheck($req->about);
        if ($req->hasFile('profile_pic')) {
            $image = $req->file('profile_pic');
            $clubs->profile_pic = imageUpload($image, 'club');
        }else{
            $clubs->profile_pic = 'images/defaultClub.jpg';
        }

        $clubs->save();

        // adding other clubs details to advertisement starts
        $chkAdvertisement = Advertisement::where('user_type', 2)->where('club_id', decrypt($req->id))->first();

        if ($chkAdvertisement) {
            // Advertisement::where('id', $chkAdvertisement->id)->delete();

            $update = DB::table('advertisements')
                        ->where('id', $chkAdvertisement->id)
                        ->update([
                            'my_service' => emptyCheck($req->my_service),
                            'language' => (!empty($req->language) ? implode(',',$req->language) : ''),
                            'extraprice_for_escort' => numberCheck($req->extraprice_for_escort)
                        ]);

            // dd($chkAdvertisement->id);

            $advertisement_id = $chkAdvertisement->id;
        } else {
            $newAdvertisement = new Advertisement();
            $newAdvertisement->user_type = 2;
            $newAdvertisement->club_id = $clubs->id;
            $newAdvertisement->my_service = emptyCheck($req->my_service);
            $newAdvertisement->language = (!empty($req->language) ? implode(',',$req->language) : '');
            $newAdvertisement->extraprice_for_escort = numberCheck($req->extraprice_for_escort);

            $newAdvertisement->save();

            $advertisement_id = $newAdvertisement->id;
        }

        // Image upload
        if(!empty($req->images) && count($req->images) > 0) {
            $advertisementImages = [];
            foreach ($req->images as $imagekey => $imagevalue) {
                $imagePath = imageUpload($imagevalue, 'ladyAdvertisement');
                $advertisementImages[] = [
                    'advertisement_id' => $advertisement_id,
                    'img' => $imagePath,
                    'type' => 'Image',
                ];
            }
            if(count($advertisementImages) > 0){
                AdvertisementsImage::insert($advertisementImages);
            }
        }

        // Time and Price
        if((!empty($req->time) && !empty($req->price)) && (count($req->time) > 0 && count($req->price) > 0)){

            // trying to delete any previous entries
            AdvertisementServiceDuration::where('advertisement_id', $advertisement_id)->forceDelete();

            $advertiseMentServiceDuration = [];
            foreach ($req->time as $timePriceIndex => $timePricevalue) {
                if($timePricevalue != '' && ($req->price[$timePriceIndex] != '' && $req->price[$timePriceIndex] > 0)){
                    $advertiseMentServiceDuration[] = [
                        'advertisement_id' => $advertisement_id,
                        'time' => $timePricevalue,
                        'price' => $req->price[$timePriceIndex],
                    ];
                }
            }
            if(count($advertiseMentServiceDuration) > 0){
                AdvertisementServiceDuration::insert($advertiseMentServiceDuration);
            }
        }

        // Working Duration
        if(!empty($req->workingDays) && count($req->workingDays) > 0){

            // trying to delete any previous entries
            AdvertisementWorkingDays::where('advertisement_id', $advertisement_id)->forceDelete();

            $advertisementWorkingDays = [];
            foreach ($req->workingDays as $dayIndex => $dayValue) {
                $fromTime = ''; $toTime = '';
                if($dayValue == 'Monday' || $dayValue == 'Mon'){
                    $fromTime = $req->workingTimeFrom[0];
                    $toTime = $req->workingTimeTill[0];
                }elseif($dayValue == 'Tuesday' || $dayValue == 'Tue'){
                    $fromTime = $req->workingTimeFrom[1];
                    $toTime = $req->workingTimeTill[1];
                }elseif($dayValue == 'Wednesday' || $dayValue == 'Wed'){
                    $fromTime = $req->workingTimeFrom[2];
                    $toTime = $req->workingTimeTill[2];
                }elseif($dayValue == 'Thursday' || $dayValue == 'Thu'){
                    $fromTime = $req->workingTimeFrom[3];
                    $toTime = $req->workingTimeTill[3];
                }elseif($dayValue == 'Friday' || $dayValue == 'Fri'){
                    $fromTime = $req->workingTimeFrom[4];
                    $toTime = $req->workingTimeTill[4];
                }elseif($dayValue == 'Saturday' || $dayValue == 'Sat'){
                    $fromTime = $req->workingTimeFrom[5];
                    $toTime = $req->workingTimeTill[5];
                }elseif($dayValue == 'Sunday' || $dayValue == 'Sun'){
                    $fromTime = $req->workingTimeFrom[6];
                    $toTime = $req->workingTimeTill[6];
                }
                if($fromTime != '' && $toTime != ''){
                    $advertisementWorkingDays[] = [
                        'advertisement_id' => $advertisement_id,
                        'days' => $dayValue,
                        'from' => $fromTime,
                        'till' => $toTime,
                    ];
                }
            }
            if(count($advertisementWorkingDays) > 0){
                AdvertisementWorkingDays::insert($advertisementWorkingDays);
            }
        }

        // Advertisement Categories
        if(!empty($req->categories) && count($req->categories) > 0){
            $advertisementCategory = [];
            foreach ($req->categories as $keyCate => $valueCate) {
                $advertisementCategory[] = [
                    'advertisement_id' => $advertisement_id,
                    'category_id' => $valueCate,
                ];
            }
            if(count($advertisementCategory) > 0){
                AdvertisementCategory::insert($advertisementCategory);
            }
        }

        // Advertisement Services
        if(!empty($req->services) && count($req->services) > 0){

            // trying to delete any previous entries
            AdvertisementServices::where('advertisement_id', $advertisement_id)->forceDelete();

            $advertisementServices = [];
            foreach ($req->services as $keyService => $valueServices) {
                if($valueServices != ''){
                    $serviceInclude = numberCheck($req->servicesInclude[$keyService]);
                    $priceForService = 0;
                    if($serviceInclude == 0){
                        $priceForService = numberCheck($req->servicesPrice[$keyService]);
                    }
                    $advertisementServices[] = [
                        'advertisement_id' => $advertisement_id,
                        'service_name' => $valueServices,
                        'include' => $serviceInclude,
                        'price' => $priceForService,
                    ];
                }
            }
            if(count($advertisementServices) > 0){
                AdvertisementServices::insert($advertisementServices);
            }
        }

        if(get_guard() == 'admin') {
            return redirect()->route('admin.clubs')->with('Success','Club '.$message);
        } else {
            return back()->with('Success',$message);
        }
    }

    public function delete($id)
    {
        $club = User::findOrFail(decrypt($id))->delete();
        return redirect()->route('admin.clubs')->with('Success','Club Deleted SuccessFully');
    }
}
