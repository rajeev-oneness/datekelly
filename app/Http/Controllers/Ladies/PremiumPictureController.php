<?php

namespace App\Http\Controllers\Ladies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LadyPremiumPicture;
use App\Models\PremiumPicturePurchase;

class PremiumPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pictures = LadyPremiumPicture::where('user_id', auth()->guard(get_guard())->user()->id)->get();
        $purchase = PremiumPicturePurchase::where('from_user_id', auth()->guard(get_guard())->user()->id);
        $purachaseDetails = $purchase->get();
        $totalAmount = $purchase->sum('price');
        return view('front.ladies.premium-picture.list', compact('pictures', 'purachaseDetails', 'totalAmount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('front.ladies.premium-picture.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            'images' => 'required|array',
            'images.*' => 'required|mimes:jpeg,jpg,png,svg,webp,mp4|max:50000',
            'price' => 'required|numeric',
            'notes' => 'nullable',
            'theme' => 'required',
        ]);
        $userId = auth()->guard(get_guard())->user()->id;
        // Image upload
        if(!empty($req->images) && count($req->images) > 0) {
            foreach ($req->images as $imagekey => $imagevalue) {
                // Watermark image
                $stamp = imagecreatefrompng('front/img/watermark_logo.png');
                $extension = $imagevalue->getClientOriginalExtension();

                if ( $extension == 'png') {
                    $im = imagecreatefrompng($imagevalue);
                }
                if ($extension == 'jpeg' || $extension == 'jpg') {
                    $im = imagecreatefromjpeg($imagevalue);
                }

                if ($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg') {
                    // Set the margins for the stamp and get the height/width of the stamp image
                    $marge_right = 10;
                    $marge_bottom = 10;
                    $sx = imagesx($stamp);
                    $sy = imagesy($stamp);

                    // Copy the stamp image onto our photo using the margin offsets and the photo 
                    // width to calculate positioning of the stamp. 
                    $save_img = imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

                    //Saving the merged image into the destination folder
                    $random = randomGenerator();
                    $imageurl = 'upload/ladyPremiumPicture' . '/' . $random . '.' . $imagevalue->getClientOriginalExtension();
                    imagejpeg($im,  $imageurl,100);
                }else{
                    $imageurl = imageUpload($imagevalue,'ladyPremiumPicture');
                }


                $imagePath = $imageurl;
                $premiumPic = new LadyPremiumPicture();
                $premiumPic->user_id = $userId;
                $premiumPic->picture = $imagePath;
                $premiumPic->price = numberCheck($req->price);
                $premiumPic->notes = emptyCheck($req->notes);
                $premiumPic->theme = emptyCheck($req->theme);
                $premiumPic->save();
            }
        }
        return redirect()->route('lady.premium.picture.list')->with('Success','Premium Picture Added SuccessFully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $pictures = LadyPremiumPicture::where('user_id', auth()->guard(get_guard())->user()->id)->get();
        $purchase = PremiumPicturePurchase::where('from_user_id', auth()->guard(get_guard())->user()->id);
        $purachaseDetails = $purchase->get();
        $totalAmount = $purchase->sum('price');
        return view('front.ladies.premium-picture.edit', compact('pictures', 'purachaseDetails', 'totalAmount'));
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
        $userId = auth()->guard(get_guard())->user()->id;
        $guard = get_guard();
        $premiumPics = LadyPremiumPicture::where('user_id', auth()->guard($guard)->user()->id)->get();
        foreach ($premiumPics as $key => $premiumPic) {
            $premiumPic->user_id = $userId;
            $premiumPic->price = $req->price;
            $premiumPic->notes = $req->notes;
            $premiumPic->theme = $req->theme;
            $premiumPic->save();
        }
        return redirect()->route('lady.premium.picture.list')->with('Success','Premium Picture edited SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $premiumPic = LadyPremiumPicture::find(base64_decode($id))->delete();
        return redirect()->route('lady.premium.picture.list')->with('Success','Premium Picture Deleted SuccessFully');
    }
    
    public function setDelete()
    {
        LadyPremiumPicture::where('user_id', auth()->guard(get_guard())->user()->id)->delete();
        return redirect()->route('lady.premium.picture.list')->with('Success','Premium Picture Deleted SuccessFully');
    }
}
