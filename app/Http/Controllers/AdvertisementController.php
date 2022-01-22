<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User,DB;
use App\Models\Advertisement,App\Models\Descent;
use App\Models\AdvertisementsImage;
use App\Models\AdvertisementServices,App\Models\BodySize;
use App\Models\AdvertisementServiceDuration;
use App\Models\AdvertisementReview,App\Models\CupSize;
use App\Models\Language,App\Models\Category,App\Models\Country;
use App\Models\LadyPremiumPicture,App\Models\PremiumPicturePurchase;
use App\Models\LoveCount,App\Models\ReviewLikeDislike;
use App\Models\AdvertisementWorkingDays;
use App\Models\Service, App\Models\AdvertisementCategory;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guard = get_guard();
        if($guard == 'admin') {
            $advertisements = Advertisement::get();
            return view('admin.advertisement.index', compact('advertisements'));
        } elseif($guard == 'web') {
            if(auth()->guard($guard)->user()->user_type == 1) {
                $advertisements = Advertisement::where('club_id', 0)->where('ladies_id', auth()->guard($guard)->user()->id)->get();
            }
            if(auth()->guard($guard)->user()->user_type == 2) {
                $advertisements = Advertisement::where('user_type', 0)->where('club_id', auth()->guard($guard)->user()->id)->get();
            }
            return view('front.advertisement.list', compact('advertisements'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $data = (object)[];
        $guard = get_guard();
        $data->clubDetails = '';
        $data->guard = $guard;
        $data->user_type = auth()->guard($data->guard)->user()->user_type;

        if ($guard == 'web') {
            if(auth()->guard($guard)->user()->user_type == 2) {
                $data->clubDetails = User::findOrFail(auth()->guard($guard)->user()->id);
            }
        }
        // dd($data->clubDetails);
        
        $data->countries = Country::select('*')->orderBy('name')->get();
        $data->firstCountryId = 0;
        foreach ($data->countries as $key => $value) {
            $data->firstCountryId = $value->id;break;
        }
        // $data->category = Category::select('*')->latest()->get();
        $data->cup_size = CupSize::select('*')->latest()->get();
        $data->body_size = BodySize::select('*')->latest()->get();
        $data->descents = Descent::select('*')->latest()->get();
        $data->language = Language::select('*')->latest()->get();
        $data->time = ['15 Min', '30 Min','45 Min','1 Hour','2 Hour', '4 Hour', '8 Hour','12 Hour'];
        $data->servicesAndExtra = Service::select('*')->latest()->get();
        $data->workingDays = ['Monday','Tuesday','Wednesday','Thrusday','Friday','Saturday','Sunday'];
        return view('front.advertisement.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        // dd($req->all());
        $req->validate([
            'country' => 'nullable|min:1|numeric',
            'city' => 'nullable|min:1|numeric',
            'address' => 'nullable|string|max:200',
            'telephone_number' => 'nullable|numeric',
            'whatsapp_number' => 'nullable|numeric',
            'my_service' => 'nullable|string|max:255',
            'my_working_name' => 'nullable|string|max:200',
            'sex' => 'nullable|string',
            'age' => 'nullable|numeric',
            'length' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'cup_size' => 'nullable|string',
            'body_size' => 'nullable|string',
            // descents checkbox
            'descent' => 'nullable|array',
            'descent.*' => 'nullable|min:1|numeric',
            // descents radio
            // 'descent' => 'nullable|string',
            'language' => 'nullable|array',
            'language.*' => 'nullable|min:1|numeric',
            'advertisement_text' => 'nullable|string',
            'time' => 'nullable|array',
            'time.*' => 'nullable|string',
            'price' => 'nullable|array',
            'price.*' => 'nullable|numeric',
            'extraprice_for_escort' => 'nullable|min:1|numeric',
            'workingDays' => 'nullable|array',
            'workingDays.*' => 'nullable|string',
            'workingTimeFrom' => 'nullable|array',
            'workingTimeFrom.*' => 'nullable|string',
            'workingTimeTill' => 'nullable|array',
            'workingTimeTill.*' => 'nullable|string',
            'terms_and_condition' => 'required|min:1',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image',
            'video' => 'nullable|array',
            'video.*' => 'nullable',
            'categories' => 'nullable|array',
            'categories.*' => 'required|numeric|min:1',
            'services' => 'nullable|array',
            'services.*' => 'nullable|string',
            'servicesInclude' => 'nullable|array',
            'servicesInclude.*' => 'nullable|string|in:0,1',
            'servicesPrice' => 'nullable|array',
            'servicesPrice.*' => 'nullable|string',
            'lat' => 'nullable|string',
            'lng' => 'nullable|string',
            'advertisement_price' => 'required|min:1|numeric',
            'port_folio_image' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $newAdvertisement = new Advertisement();
            $newAdvertisement->title = emptyCheck($req->my_working_name);
            $newAdvertisement->country_id = numberCheck($req->country);
            $newAdvertisement->city_id = numberCheck($req->city);
            $newAdvertisement->phn_no = emptyCheck($req->telephone_number);
            $newAdvertisement->whatsapp = emptyCheck($req->whatsapp_number);
            $newAdvertisement->about = emptyCheck($req->advertisement_text);
            if(auth()->guard()->user()->user_type == 1) {
                $newAdvertisement->ladies_id = auth()->guard()->user()->id;
            } elseif(auth()->guard()->user()->user_type == 2) {
                $newAdvertisement->club_id = auth()->guard()->user()->id;
            }
            $newAdvertisement->sex = emptyCheck($req->sex);
            $newAdvertisement->age = numberCheck($req->age);
            $newAdvertisement->length = numberCheck($req->length);
            $newAdvertisement->weight = numberCheck($req->weight);
            $newAdvertisement->cup_size = emptyCheck($req->cup_size);
            $newAdvertisement->body_size = emptyCheck($req->body_size);
            // descents checkbox
            $newAdvertisement->descent = (!empty($req->descent) ? implode(',',$req->descent) : '');
            // descents radio
            // $newAdvertisement->descent = emptyCheck($req->descent);
            $newAdvertisement->language = (!empty($req->language) ? implode(',',$req->language) : '');
            $newAdvertisement->address = emptyCheck($req->address);
            $newAdvertisement->my_service = emptyCheck($req->my_service);
            $newAdvertisement->extraprice_for_escort = numberCheck($req->extraprice_for_escort);
            $newAdvertisement->lat = emptyCheck($req->lat);
            $newAdvertisement->lng = emptyCheck($req->lng);
            $newAdvertisement->price = $req->advertisement_price;
            $newAdvertisement->save();

            // Port Folio Image Upload
            if($req->hasFile('port_folio_image')){
                $image = $req->file('port_folio_image');
                $newAdvertisement->image = imageUpload($image,'port_folio_image/image');
            }

            // Advertisement Categories
            if(!empty($req->categories) && count($req->categories) > 0){
                $advertisementCategory = [];
                foreach ($req->categories as $keyCate => $valueCate) {
                    $advertisementCategory[] = [
                        'advertisement_id' => $newAdvertisement->id,
                        'category_id' => $valueCate,
                    ];
                }
                if(count($advertisementCategory) > 0){
                    AdvertisementCategory::insert($advertisementCategory);
                }
            }

            // Advertisement Services
            if(!empty($req->services) && count($req->services) > 0){
                $advertisementServices = [];
                foreach ($req->services as $keyService => $valueServices) {
                    if($valueServices != ''){
                        $serviceInclude = numberCheck($req->servicesInclude[$keyService]);
                        $priceForService = 0;
                        if($serviceInclude == 0){
                            $priceForService = numberCheck($req->servicesPrice[$keyService]);
                        }
                        $advertisementServices[] = [
                            'advertisement_id' => $newAdvertisement->id,
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
            
            // Image upload
            if(!empty($req->images) && count($req->images) > 0) {
                $advertisementImages = [];
                foreach ($req->images as $imagekey => $imagevalue) {
                    $imagePath = imageUpload($imagevalue, 'ladyAdvertisement');
                    $advertisementImages[] = [
                        'advertisement_id' => $newAdvertisement->id,
                        'img' => $imagePath,
                        'type' => 'Image',
                    ];
                }
                if(count($advertisementImages) > 0){
                    AdvertisementsImage::insert($advertisementImages);
                }
            }
            
            // Video Upload
            if(!empty($req->video) && count($req->video) > 0) {
                $advertisementVideos = [];
                foreach ($req->video as $videokey => $videovalue) {
                    $advertisementVideos[] = [
                        'advertisement_id' => $newAdvertisement->id,
                        'img' => imageUpload($videovalue, 'ladyAdvertisement'),
                        'type' => 'Video',
                    ];
                }
                if(count($advertisementVideos) > 0){
                    AdvertisementsImage::insert($advertisementVideos);
                }
            }
            
            // Time and Price
            if((!empty($req->time) && !empty($req->price)) && (count($req->time) > 0 && count($req->price) > 0)){
                $advertiseMentServiceDuration = [];
                foreach ($req->time as $timePriceIndex => $timePricevalue) {
                    if($timePricevalue != '' && ($req->price[$timePriceIndex] != '' && $req->price[$timePriceIndex] > 0)){
                        $advertiseMentServiceDuration[] = [
                            'advertisement_id' => $newAdvertisement->id,
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
                    }elseif($dayValue == 'Thrusday' || $dayValue == 'Thu'){
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
                            'advertisement_id' => $newAdvertisement->id,
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
            $newAdvertisement->save();
            DB::commit();
            return redirect()->route('advertisement.list')->with('Success','Advertisement Added SuccessFully');
        } catch (Exception $e) {
            DB::rollback();
        }
        $errors['terms_and_condition'] = 'Something went wrong please try after sometime';
        return back()->withInput($req)->withErrors($errors);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guard = get_guard();
        $languages = Language::all();
        $descents = Descent::all();
        $reviews = AdvertisementReview::where('advertisement_id', base64_decode($id))->get();
        $ad = Advertisement::where('id', base64_decode($id));
        $advertisement = $ad->first();
        $ourLadies = Advertisement::where([['ladies_id', 0], ['club_id', $advertisement->club_id]])->get();
        // dd($ourLadies);
        $lady_id = $ad->get()->pluck('ladies_id')->toArray();
        if($lady_id != 0) {
            $premium_pics = LadyPremiumPicture::where('user_id', $lady_id)->get();
        } else {
            $premium_pics = (object)[];
        }
        if(!empty(auth()->guard($guard)->user()) && auth()->guard($guard)->user()->is_admin_access == 1) {
            return view('admin.advertisement.details', compact('advertisement','languages','reviews', 'premium_pics', 'ourLadies'));
        }
        if(empty(auth()->guard($guard)->user()) || !empty(auth()->guard($guard)->user())) {
            return view('front.advertisement-details', compact('advertisement','languages','descents','reviews', 'premium_pics', 'ourLadies'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = (object)[];
        $data->info = Advertisement::findOrFail(base64_decode($id));
        $data->selectedCategory = AdvertisementCategory::select('category_id')->where('advertisement_id',$data->info->id)->groupBy('category_id')->pluck('category_id')->toArray();;
        $data->countries = Country::select('*')->orderBy('name')->get();
        $data->firstCountryId = $data->info->country_id;
        $data->cup_size = CupSize::select('*')->latest()->get();
        $data->body_size = BodySize::select('*')->latest()->get();
        $data->descents = Descent::select('*')->latest()->get();
        // $data->category = Category::select('*')->latest()->get();
        $data->language = Language::select('*')->latest()->get();
        $data->time = ['15 Min', '30 Min','45 Min','1 Hour','2 Hour', '4 Hour', '8 Hour','12 Hour'];
        $data->servicesAndExtra = Service::select('*')->latest()->get();
        $data->workingDays = ['Monday','Tuesday','Wednesday','Thrusday','Friday','Saturday','Sunday'];
        return view('front.advertisement.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req,$advertisementId)
    {
        $req->validate([
            'advertisementId' => 'required|min:1|numeric',
            'country' => 'nullable|min:1|numeric',
            'city' => 'nullable|min:1|numeric',
            'address' => 'nullable|string|max:200',
            'telephone_number' => 'nullable|numeric',
            'whatsapp_number' => 'nullable|numeric',
            'my_service' => 'nullable|string|max:255',
            'my_working_name' => 'nullable|string|max:200',
            'sex' => 'nullable|string',
            'age' => 'nullable|numeric',
            'length' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'cup_size' => 'nullable|string',
            'body_size' => 'nullable|string',
            // descents checkbox
            'descent' => 'nullable|array',
            'descent.*' => 'nullable|min:1|numeric',
            // descents radio
            // 'descent' => 'nullable|string',
            'language' => 'nullable|array',
            'language.*' => 'nullable|min:1|numeric',
            'advertisement_text' => 'nullable|string',
            'time' => 'nullable|array',
            'time.*' => 'nullable|string',
            'price' => 'nullable|array',
            'price.*' => 'nullable|numeric',
            'extraprice_for_escort' => 'nullable|min:1|numeric',
            'workingDays' => 'nullable|array',
            'workingDays.*' => 'nullable|string',
            'workingTimeFrom' => 'nullable|array',
            'workingTimeFrom.*' => 'nullable|string',
            'workingTimeTill' => 'nullable|array',
            'workingTimeTill.*' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image',
            'video' => 'nullable|array',
            'video.*' => 'nullable',
            'categories' => 'nullable|array',
            'categories.*' => 'required|numeric|min:1',
            'services' => 'nullable|array',
            'services.*' => 'nullable|string',
            'servicesInclude' => 'nullable|array',
            'servicesInclude.*' => 'nullable|string|in:0,1',
            'servicesPrice' => 'nullable|array',
            'servicesPrice.*' => 'nullable|string',
            'lat' => 'nullable|string',
            'lng' => 'nullable|string',
            'advertisement_price' => 'required|min:1|numeric',
            'port_folio_image' => 'nullable',
        ]);
        DB::beginTransaction();
        try {
            $newAdvertisement = Advertisement::findOrFail($advertisementId);
            $newAdvertisement->title = emptyCheck($req->my_working_name);
            $newAdvertisement->country_id = numberCheck($req->country);
            $newAdvertisement->city_id = numberCheck($req->city);
            $newAdvertisement->phn_no = emptyCheck($req->telephone_number);
            $newAdvertisement->whatsapp = emptyCheck($req->whatsapp_number);
            $newAdvertisement->about = emptyCheck($req->advertisement_text);
            if(auth()->guard()->user()->user_type == 1) {
                $newAdvertisement->ladies_id = auth()->guard()->user()->id;
            } elseif(auth()->guard()->user()->user_type == 2) {
                $newAdvertisement->club_id = auth()->guard()->user()->id;
            }
            $newAdvertisement->sex = emptyCheck($req->sex);
            $newAdvertisement->age = numberCheck($req->age);
            $newAdvertisement->length = numberCheck($req->length);
            $newAdvertisement->weight = numberCheck($req->weight);
            $newAdvertisement->cup_size = emptyCheck($req->cup_size);
            $newAdvertisement->body_size = emptyCheck($req->body_size);
            // descents checkbox
            $newAdvertisement->descent = (!empty($req->descent) ? implode(',',$req->descent) : '');
            // descents radio
            // $newAdvertisement->descent = emptyCheck($req->descent);
            $newAdvertisement->language = (!empty($req->language) ? implode(',',$req->language) : '');
            $newAdvertisement->address = emptyCheck($req->address);
            $newAdvertisement->my_service = emptyCheck($req->my_service);
            $newAdvertisement->extraprice_for_escort = numberCheck($req->extraprice_for_escort);
            $newAdvertisement->lat = emptyCheck($req->lat);
            $newAdvertisement->lng = emptyCheck($req->lng);
            $newAdvertisement->price = $req->advertisement_price;
            // Port Folio Image Upload
            if($req->hasFile('port_folio_image')){
                $image = $req->file('port_folio_image');
                $newAdvertisement->image = imageUpload($image,'port_folio_image/image');
            }
            $newAdvertisement->save();

            // Advertisement Categories
            if(!empty($req->categories) && count($req->categories) > 0){
                $advertisementCategory = [];
                foreach ($req->categories as $keyCate => $valueCate) {
                    $advertisementCategory[] = [
                        'advertisement_id' => $newAdvertisement->id,
                        'category_id' => $valueCate,
                    ];
                }
                if(count($advertisementCategory) > 0){
                    AdvertisementCategory::where('advertisement_id',$newAdvertisement->id)->delete();
                    AdvertisementCategory::insert($advertisementCategory);
                }
            }

            // Advertisement Services
            if(!empty($req->services) && count($req->services) > 0){
                $advertisementServices = [];
                foreach ($req->services as $keyService => $valueServices) {
                    if($valueServices != ''){
                        $serviceInclude = numberCheck($req->servicesInclude[$keyService]);
                        $priceForService = 0;
                        if($serviceInclude == 0){
                            $priceForService = numberCheck($req->servicesPrice[$keyService]);
                        }
                        $advertisementServices[] = [
                            'advertisement_id' => $newAdvertisement->id,
                            'service_name' => $valueServices,
                            'include' => $serviceInclude,
                            'price' => $priceForService,
                        ];
                    }
                }
                if(count($advertisementServices) > 0){
                    AdvertisementServices::where('advertisement_id',$newAdvertisement->id)->delete();
                    AdvertisementServices::insert($advertisementServices);
                }
            }
            
            // Image upload
            if(!empty($req->images) && count($req->images) > 0) {
                $advertisementImages = [];
                foreach ($req->images as $imagekey => $imagevalue) {
                    $imagePath = imageUpload($imagevalue, 'ladyAdvertisement');
                    $advertisementImages[] = [
                        'advertisement_id' => $newAdvertisement->id,
                        'img' => $imagePath,
                        'type' => 'Image',
                    ];
                }
                if(count($advertisementImages) > 0){
                    AdvertisementsImage::insert($advertisementImages);
                }
            }
            
            // Video Upload
            if(!empty($req->video) && count($req->video) > 0) {
                $advertisementVideos = [];
                foreach ($req->video as $videokey => $videovalue) {
                    $advertisementVideos[] = [
                        'advertisement_id' => $newAdvertisement->id,
                        'img' => imageUpload($videovalue, 'ladyAdvertisement'),
                        'type' => 'Video',
                    ];
                }
                if(count($advertisementVideos) > 0){
                    AdvertisementsImage::insert($advertisementVideos);
                }
            }
            
            // Time and Price
            if((!empty($req->time) && !empty($req->price)) && (count($req->time) > 0 && count($req->price) > 0)){
                $advertiseMentServiceDuration = [];
                foreach ($req->time as $timePriceIndex => $timePricevalue) {
                    if($timePricevalue != '' && ($req->price[$timePriceIndex] != '' && $req->price[$timePriceIndex] > 0)){
                        $advertiseMentServiceDuration[] = [
                            'advertisement_id' => $newAdvertisement->id,
                            'time' => $timePricevalue,
                            'price' => $req->price[$timePriceIndex],
                        ];
                    }
                }
                if(count($advertiseMentServiceDuration) > 0){
                    AdvertisementServiceDuration::where('advertisement_id',$newAdvertisement->id)->delete();
                    AdvertisementServiceDuration::insert($advertiseMentServiceDuration);
                }
            }
            
            // Working Duration
            if(!empty($req->workingDays) && count($req->workingDays) > 0){
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
                    }elseif($dayValue == 'Thrusday' || $dayValue == 'Thu'){
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
                            'advertisement_id' => $newAdvertisement->id,
                            'days' => $dayValue,
                            'from' => $fromTime,
                            'till' => $toTime,
                        ];
                    }
                }
                if(count($advertisementWorkingDays) > 0){
                    AdvertisementWorkingDays::where('advertisement_id',$newAdvertisement->id)->delete();
                    AdvertisementWorkingDays::insert($advertisementWorkingDays);
                }
            }
            DB::commit();
            return redirect()->route('advertisement.list')->with('Success','Advertisement updated SuccessFully');
        } catch (Exception $e) {
            DB::rollback();
        }
        $errors['terms_and_condition'] = 'Something went wrong please try after sometime';
        return back()->withInput($req)->withErrors($errors);
    }

    public function deleteAdvertisementImage(Request $req)
    {
        $rules = [
            'advertisement_id' => 'required|min:1|numeric',
            'imageId' => 'required|min:1|numeric',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $image = AdvertisementsImage::where('id',$req->imageId)->where('advertisement_id',$req->advertisement_id)->first();
            if($image){
                $image->delete();
                return response()->json(['error' => false,'message' => 'deleted Success']);
            }
            return response()->json(['error' => true,'message' => 'Invalid Object Detected']);
        }
        return response()->json(['error' => true,'message' => $validator->errors()->first()]);
    }

    public function updateold(Request $req)
    {
        $ad = Advertisement::find(base64_decode($req->advertisement_id));
        $ad->title = $req->title;
        $ad->price = $req->price;
        $ad->category = $req->category;
        if($req->hasFile('image')) {
            $ext = '.'.$req->image->getClientOriginalExtension();
            $fileName = randomGenerator().$ext;
            $ad->image = $fileName;
            $req->image->storeAs('advertiseImages', $fileName,'public');
        }
        $ad->phn_no = $req->phn_no;
        $ad->whatsapp = $req->whatsapp;
        $ad->sex = $req->sex;
        $ad->country_id = $req->country_id;
        $ad->city_id = $req->city_id;
        $ad->age = $req->age;
        $ad->length = $req->length;
        $ad->cup_size = $req->cup_size;
        $ad->weight = $req->weight;
        $ad->body_size = $req->body_size;
        $ad->descent = $req->descent;
        $ad->language = $req->language;
        $ad->about = $req->about;
        $ad->message = $req->message;
        $ad->save();

        $adId = base64_decode($req->advertisement_id);

        //images
        if($req->ad_imgs) {
            $adImg = AdvertisementsImage::where('advertisement_id', $adId)->first();
            $adImg->advertisement_id = $adId;
            $imageArray = [];
            foreach ($req->ad_imgs as $key => $val) {
                $ext = '.'.$val->getClientOriginalExtension();
                $fileName = randomGenerator().$ext;
                $val->storeAs('advertiseImages', $fileName,'public');
                array_push($imageArray, $fileName);
            }
            $adImg->img = implode(',', $imageArray);
            $adImg->save();
        }
        
        //service
        $services = AdvertisementServices::where('advertisement_id', $adId)->pluck('advertisement_id')->toArray();
        if(!empty($services)) {
            AdvertisementServices::whereIn('advertisement_id', $services)->delete();
        }
        foreach ($req->service_name as $key => $val) {
            if($val != '') {
                $adService = new AdvertisementServices();
                $adService->advertisement_id = $adId;
                $adService->service_name = $val;
                $adService->include = $req->include[$key];
                $adService->price = ($req->service_incl_price[$key] == '')? 0: $req->service_incl_price[$key];
                $adService->save();
            }
        }

        //duration
        $durations = AdvertisementServiceDuration::where('advertisement_id', $adId)->pluck('advertisement_id')->toArray();
        if(!empty($durations)) {
            AdvertisementServiceDuration::whereIn('advertisement_id', $durations)->delete();
        }
        foreach ($req->duration as $key => $val) {
            if($val != '') {
                $adDurations = new AdvertisementServiceDuration();
                $adDurations->advertisement_id = $adId;
                $adDurations->time = $val;
                $adDurations->price = ($req->duration_price[$key] == '')? 0: $req->duration_price[$key];
                $adDurations->save();
            }
        }
        return redirect()->route('advertisement.list')->with('Success','Advertisement Updated SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $advertisement = Advertisement::findOrFail(decrypt($id))->delete();
        $guard = get_guard();
        if($guard == 'admin') {
            return redirect()->route('admin.advertisement')->with('Success','Advertisement Deleted SuccessFully');
        } else {
            return redirect()->route('advertisement.list')->with('Success','Advertisement Deleted SuccessFully');
        }
    }

    /**
     * Change the verification status.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verify($id)
    {
        $advertisement = Advertisement::findOrFail(decrypt($id));
        if($advertisement->is_verified == 0) {
            $advertisement->is_verified = 1;
        } else {
            $advertisement->is_verified = 0;
        }
        $advertisement->save();
        return redirect()->route('admin.advertisement');
    }

    //love section
    public function checkLove(Request $req)
    {
        $loveCount = LoveCount::where('from', $req->customerId)->where('to', $req->userId)->where('advertisement_id', $req->adId)->first();
        if($loveCount) {
            return response()->json(['error' => false, 'love' => true]);
        } else {
            return response()->json(['error' => false, 'love' => false]);
        }
    }

    public function countLove(Request $req)
    {
        // dd($req->all());
        $loveCount = LoveCount::where('from', $req->customerId)->where('to', $req->userId)->where('advertisement_id', $req->adId)->first();
        $ad = Advertisement::find($req->adId);
        if($loveCount) {
            $loveCount->delete();
            $ad->no_of_loves -= 1;
            $ad->save();
            return response()->json(['error' => false, 'message' => 'Love removed']);
        } else {
            $love = new LoveCount();
            $love->from = $req->customerId;
            $love->to = $req->userId;
            $love->advertisement_id = $req->adId;
            $love->save();
            $ad->no_of_loves += 1;
            $ad->save(); 
            return response()->json(['error' => false, 'message' => 'Loved']);
        }
    }

    //review like dislike section
    public function checkLikeDislike(Request $req)
    {
        $likeDislikeCount = ReviewLikeDislike::where('from', $req->customerId)->where('to', $req->userId)->where('advertisement_id', $req->adId)->first();
        $adRev = AdvertisementReview::where('advertisement_id', $req->adId)->first();

        $total = [
            'totalLike' => ($adRev ? $adRev->likes : []),
            'totalDislike' => ($adRev ? $adRev->dislikes : []),
        ];

        // dd($likeDislikeCount);
        $data = [];

        if($likeDislikeCount) {
            if(($likeDislikeCount->like == 0) && ($likeDislikeCount->dislike == 1)) {
                $data = [
                    'error' => false,
                    'like' => false,
                    'dislike' => true,
                    'total' => $total
                ];
            } elseif(($likeDislikeCount->like == 1) && ($likeDislikeCount->dislike == 0)) {
                $data = [
                    'error' => false,
                    'like' => true,
                    'dislike' => false,
                    'total' => $total
                ];
            } else {
                $data = [
                    'error' => false,
                    'like' => false,
                    'dislike' => false,
                    'total' => $total
                ];
            }
        } else {
            $data = [
                'error' => false,
                'like' => false,
                'dislike' => false,
                'total' => $total
            ];
        }
        return response()->json($data);
    }

    public function countLikeDislike(Request $req)
    {
        // dd($req->all());
        $revCount = ReviewLikeDislike::where('from', $req->customerId)->where('to', $req->userId)->where('advertisement_id', $req->adId)->first();
        $adRev = AdvertisementReview::where('advertisement_id', $req->adId)->first();
        if($revCount) {
            if ($req->option == 'reviewLike') {
                if ($revCount->like == 0) {
                    $revCount->like = 1;
                    $revCount->dislike = 0;
                    $revCount->save();
                    $adRev->likes += 1;
                    $adRev->dislikes -= 1;
                } else {
                    $revCount->delete();
                    $adRev->likes -= 1;
                }
            }
            if ($req->option == 'reviewDislike') {
                if ($revCount->dislike == 0) {
                    $revCount->like = 0;
                    $revCount->dislike = 1;
                    $revCount->save();
                    $adRev->likes -= 1;
                    $adRev->dislikes += 1;
                } else {
                    $revCount->delete();
                    $adRev->dislikes -= 1;
                }
            }
            $adRev->save();
            return response()->json(['error' => false, 'like' => $adRev->likes , 'dislike' => $adRev->dislikes]);
        } else {
            $rev = new ReviewLikeDislike();
            $rev->from = $req->customerId;
            $rev->to = $req->userId;
            $rev->advertisement_id = $req->adId;
            if ($req->option == 'reviewLike') {
                $rev->like = 1;
                $rev->dislike = 0;
                $adRev->likes += 1;
            }
            if ($req->option == 'reviewDislike') {
                $rev->like = 0;
                $rev->dislike = 1;
                $adRev->dislikes += 1;
            }
            $rev->save();
            $adRev->save(); 
            return response()->json(['error' => false, 'like' => $adRev->likes , 'dislike' => $adRev->dislikes]);
        }
    }

    public function clubDetail($id)
    {
        $languages = Language::all();
        $data = User::findOrFail(base64_decode($id));
        $advertisement = Advertisement::where('user_type', 2)->where('club_id', base64_decode($id))->first();
        $ourLadies = Advertisement::where([['ladies_id', 0], ['club_id', base64_decode($id)], ['user_type', 0]])->get();

        // $reviews = User::select('advertisement_reviews.*')->join('advertisements', 'advertisements.club_id', '=', 'users.id')
        //         ->join('advertisement_reviews', 'advertisement_reviews.advertisement_id', '=', 'advertisements.id')
        //         ->where('users.id', base64_decode($id))
        //         ->where('advertisements.user_type', 2)
                // ->get();
        // dd($reviews);
        $reviews = AdvertisementReview::select('advertisement_reviews.*')
        ->join('advertisements', 'advertisements.id', '=', 'advertisement_reviews.advertisement_id')
        ->where('advertisements.club_id', base64_decode($id))
        ->where('user_type', 2)
        ->with('user_details', 'advertisement_details', 'reply_user')
        ->get();
        // $reviews = AdvertisementReview::where('advertisement_id', base64_decode($id))->get();

        return view('front.club-details', compact('data', 'ourLadies', 'advertisement', 'languages', 'reviews'));

        // $guard = get_guard();
        // $languages = Language::all();
        // $reviews = AdvertisementReview::where('advertisement_id', base64_decode($id))->get();
        // $ad = Advertisement::where('id', base64_decode($id));
        // $advertisement = $ad->first();
        // $ourLadies = Advertisement::where([['ladies_id', 0], ['club_id', $advertisement->club_id]])->get();
        // // dd($ourLadies);
        // $lady_id = $ad->get()->pluck('ladies_id')->toArray();
        // if($lady_id != 0) {
        //     $premium_pics = LadyPremiumPicture::where('user_id', $lady_id)->get();
        // } else {
        //     $premium_pics = (object)[];
        // }
        // if(!empty(auth()->guard($guard)->user()) && auth()->guard($guard)->user()->is_admin_access == 1) {
        //     return view('admin.advertisement.details', compact('advertisement','languages','reviews', 'premium_pics', 'ourLadies'));
        // }
        // if(empty(auth()->guard($guard)->user()) || !empty(auth()->guard($guard)->user())) {
        //     return view('front.advertisement-details', compact('advertisement','languages','reviews', 'premium_pics', 'ourLadies'));
        // }
    }

    // club count like dislike
    public function clubCountLikeDislike(Request $req)
    {
        // dd($req->all());
        $revCount = ReviewLikeDislike::where('from', $req->customerId)->where('to', $req->userId)->where('advertisement_id', $req->adId)->first();
        $adRev = AdvertisementReview::where('id', $req->adRevId)->first();
        if($revCount) {
            if ($req->option == 'reviewLike') {
                if ($revCount->like == 0) {
                    $revCount->like = 1;
                    $revCount->dislike = 0;
                    $revCount->save();
                    $adRev->likes += 1;
                    $adRev->dislikes -= 1;
                } else {
                    $revCount->delete();
                    $adRev->likes -= 1;
                }
            }
            if ($req->option == 'reviewDislike') {
                if ($revCount->dislike == 0) {
                    $revCount->like = 0;
                    $revCount->dislike = 1;
                    $revCount->save();
                    $adRev->likes -= 1;
                    $adRev->dislikes += 1;
                } else {
                    $revCount->delete();
                    $adRev->dislikes -= 1;
                }
            }
            $adRev->save();
            return response()->json(['error' => false, 'like' => $adRev->likes , 'dislike' => $adRev->dislikes, 'advReviewId' => (int)$req->adRevId]);
        } else {
            $rev = new ReviewLikeDislike();
            $rev->from = $req->customerId;
            $rev->to = $req->userId;
            $rev->advertisement_id = $req->adId;
            if ($req->option == 'reviewLike') {
                $rev->like = 1;
                $rev->dislike = 0;
                $adRev->likes += 1;
            }
            if ($req->option == 'reviewDislike') {
                $rev->like = 0;
                $rev->dislike = 1;
                $adRev->dislikes += 1;
            }
            $rev->save();
            $adRev->save(); 
            return response()->json(['error' => false, 'like' => $adRev->likes , 'dislike' => $adRev->dislikes, 'advReviewId' => (int)$req->adRevId]);
        }
    }

    //club review like dislike section
    public function clubCheckLikeDislike(Request $req)
    {
        $likeDislikeCount = ReviewLikeDislike::where('from', $req->customerId)->where('to', $req->userId)->where('advertisement_id', $req->adId)->first();
        $adRev = AdvertisementReview::where('id', $req->adRevId)->first();

        $total = [
            'totalLike' => ($adRev ? $adRev->likes : []),
            'totalDislike' => ($adRev ? $adRev->dislikes : []),
        ];

        // dd($likeDislikeCount);
        $data = [];

        if($likeDislikeCount) {
            if(($likeDislikeCount->like == 0) && ($likeDislikeCount->dislike == 1)) {
                $data = [
                    'error' => false,
                    'like' => false,
                    'dislike' => true,
                    'total' => $total
                ];
            } elseif(($likeDislikeCount->like == 1) && ($likeDislikeCount->dislike == 0)) {
                $data = [
                    'error' => false,
                    'like' => true,
                    'dislike' => false,
                    'total' => $total
                ];
            } else {
                $data = [
                    'error' => false,
                    'like' => false,
                    'dislike' => false,
                    'total' => $total
                ];
            }
        } else {
            $data = [
                'error' => false,
                'like' => false,
                'dislike' => false,
                'total' => $total
            ];
        }
        return response()->json($data);
    }
}
