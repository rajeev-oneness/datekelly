<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Advertisement;
use App\Models\AdvertisementsImage;
use App\Models\AdvertisementServices;
use App\Models\AdvertisementServiceDuration;
use App\Models\AdvertisementReview;
use App\Models\Language;
use App\Models\Category;
use App\Models\Country;
use App\Models\LadyPremiumPicture;
use App\Models\PremiumPicturePurchase;
use App\Models\LoveCount;
use App\Models\ReviewLikeDislike;

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
                $advertisements = Advertisement::where('club_id', auth()->guard($guard)->user()->id)->get();
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
        $categories = Category::get();
        $countries = Country::with('city')->get();
        $languages = Language::get();
        return view('front.advertisement.add', compact('categories', 'countries', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $ad = new Advertisement();
        if(auth()->guard()->user()->user_type == 1) {
            $ad->ladies_id = auth()->guard()->user()->id;
        } elseif(auth()->guard()->user()->user_type == 2) {
            $ad->club_id = auth()->guard()->user()->id;
        }
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

        if($req->ad_imgs) {
            $adImg = new AdvertisementsImage();
            $adImg->advertisement_id = $ad->id;
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
        
        foreach ($req->service_name as $key => $val) {
            if($val != '') {
                $adService = new AdvertisementServices();
                $adService->advertisement_id = $ad->id;
                $adService->service_name = $val;
                $adService->include = $req->include[$key];
                $adService->price = ($req->service_incl_price[$key] == '')? 0: $req->service_incl_price[$key];
                $adService->save();
            }
        }
        
        foreach ($req->duration as $key => $val) {
            if($val != '') {
                $adDurations = new AdvertisementServiceDuration();
                $adDurations->advertisement_id = $ad->id;
                $adDurations->time = $val;
                $adDurations->price = ($req->duration_price[$key] == '')? 0: $req->duration_price[$key];
                $adDurations->save();
            }
        }
        return redirect()->route('advertisement.list')->with('Success','Advertisement Added SuccessFully');
        // dd($req->all());
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
        $reviews = AdvertisementReview::where('advertisement_id', base64_decode($id))->get();
        $ad = Advertisement::where('id', base64_decode($id));
        $advertisement = $ad->first();
        $lady_id = $ad->get()->pluck('ladies_id')->toArray();
        if($lady_id != 0) {
            $premium_pics = LadyPremiumPicture::where('user_id', $lady_id)->get();
            // dd($ppp[3]);
        } else {
            $premium_pics = (object)[];
        }
        if(!empty(auth()->guard($guard)->user()) && auth()->guard($guard)->user()->is_admin_access == 1) {
            return view('admin.advertisement.details', compact('advertisement','languages','reviews', 'premium_pics'));
        }
        if(empty(auth()->guard($guard)->user()) || !empty(auth()->guard($guard)->user())) {
            return view('front.advertisement-details', compact('advertisement','languages','reviews', 'premium_pics'));
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
        $guard = get_guard();
        $languages = Language::all();
        $categories = Category::all();
        $countries = Country::all();
        $advertisement = Advertisement::findOrFail(base64_decode($id));
        if(empty(auth()->guard($guard)->user()) || !empty(auth()->guard($guard)->user())) {
            return view('front.advertisement.edit', compact('advertisement','languages','categories','countries'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
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
        // dd($adrev);
        $total = [
            'totalLike' => $adRev->likes,
            'totalDislike' => $adRev->dislikes,
        ];
        if($likeDislikeCount) {
            if(($likeDislikeCount->like == 0) && ($likeDislikeCount->dislike == 1)) {
                $data = [
                    'error' => false,
                    'like' => false,
                    'dislike' => true,
                    'total' => $total
                ];
            }
            if(($likeDislikeCount->like == 1) && ($likeDislikeCount->dislike == 0)) {
                $data = [
                    'error' => false,
                    'like' => true,
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
}
