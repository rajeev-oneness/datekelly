<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User,DB;
use App\Models\Booking;
use App\Models\CoinsDetails;
use App\Models\Transaction;
use App\Models\AdvertisementServices;
use App\Models\PremiumPicturePurchase;
use App\Models\LadyPremiumPicture;
use App\Models\AdvertisementServiceDuration;
class BookingController extends Controller
{
    public function book(Request $req)
    {
        $req->validate([
            'bookingForm' => 'required|string|in:bookingStart',
            'customer_address_1' => 'required|string|max:255',
            'customer_address_2' => 'nullable|string|max:255',
            'customer_city' => 'required|string|max:200',
            'customer_telephone' => 'nullable|string',
            'user_id' => 'required|numeric|min:1',
            'advertisement_id' => 'required|numeric|min:1',
            'visit_type' => 'required|numeric',
            'date' => 'required',
            'time' => 'required',
            'duration_id' => 'nullable|numeric|min:1',
            'service_id' => 'required',
            'selectedPrice' => 'required|min:1|numeric'
        ]);
        $guard = get_guard();
        $user = auth()->guard($guard)->user();
        $userId = $user->id;
        DB::beginTransaction();
        try {
            if($req->user_id != $user->id){
                if(totalCoinsCalculate($user->coins) >= $req->selectedPrice) {
                    $booking = new Booking;
                    $booking->customer_id = $userId;
                    $booking->user_id = $req->user_id;
                    $booking->advertisement_id = $req->advertisement_id;
                    $booking->visit_type = $req->visit_type;
                    $booking->customer_address_1 = $req->customer_address_1;
                    $booking->customer_address_2 = emptyCheck($req->customer_address_2);
                    $booking->customer_city = $req->customer_city;
                    $booking->customer_telephone = emptyCheck($req->customer_telephone);
                    $booking->extra_info = emptyCheck($req->extra_info);
                    $booking->date = $req->date;
                    $booking->time = $req->time;
                    $booking->duration_id = numberCheck($req->duration_id);
                    $booking->service_id = !empty($req->service_id) ? implode(",", $req->service_id) : '';
                    $booking->down_payment = $req->selectedPrice;
                    $booking->save();

                    $transaction = new Transaction;
                    $transaction->user_id = $userId;
                    $transaction->amount = $req->selectedPrice;
                    $transaction->transaction_id = 'trans_'.randomgenerator();
                    $transaction->save();

                    $coinDetail = new CoinsDetails();
                    $coinDetail->user_id = $userId;
                    $coinDetail->coins = '-'.$req->selectedPrice;
                    $coinDetail->transaction_id = $transaction->id;
                    $coinDetail->remarks = 'User '.$userId.' booked service from '.$req->user_id.' using '.$req->selectedPrice.' coins';
                    $coinDetail->save();
                    DB::commit();
                    return redirect(route('booking.list'))->with('Success','Service booked successfully');
                }
                return back()->with('Errors','You do not have enough coins!')->withInput($req->all());
            }
            return back()->with('Errors','You can`t book your self!')->withInput($req->all());
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('Errors','Something went wrong please try after some time')->withInput($req->all());
        }
    }

    public function list(Request $req)
    {
        $guard = get_guard();
        $user = auth()->guard($guard)->user();
        $userId = $user->id;
        $userType = $user->user_type;
        $confirmedBookings = [];$notConfirmedBookings = [];
        if($userType == 2) {
            $confirmedBookings = Booking::select('*')->with('customerDetail')->where('user_id', $userId)->where('date', '>=', date('Y-m-d'))->where('is_confirmed', 1)->latest()->get();
            $notConfirmedBookings = Booking::select('*')->with('customerDetail')->where('user_id', $userId)->where('date', '>=', date('Y-m-d'))->where('is_confirmed', 0)->where('is_visited', 0)->latest()->get();
        }
        if($userType == 3) {
            $confirmedBookings = Booking::with('userDetail')->where('customer_id', $userId)->where('date', '>=', date('Y-m-d'))->where('is_confirmed', 1)->latest()->get();
            $notConfirmedBookings = Booking::with('userDetail')->where('customer_id', $userId)->where('date', '>=', date('Y-m-d'))->where('is_confirmed', 0)->where('is_visited', 0)->latest()->get();
        }
        return view('front.booking.list', compact('confirmedBookings', 'notConfirmedBookings', 'userType'));
    }

    public function confirmation(Request $req, $bookingId)
    {
        $booking = Booking::where('id', base64_decode($req->bookingId))->with('customerDetail')->first();
        $serviceIds = explode(",", $booking->service_id);
        $services = AdvertisementServices::whereIn('id', $serviceIds)->get();
        return view('front.booking.confirmation', compact('booking', 'services'));
    }
    
    public function manage(Request $req, $bookingId)
    {
        $guard = get_guard();
        $user = auth()->guard($guard)->user();
        $userId = $user->id;
        $userType = $user->user_type;
        $booking = Booking::where('id', base64_decode($req->bookingId))->with('customerDetail')->first();
        $serviceIds = explode(",", $booking->service_id);
        $services = AdvertisementServices::whereIn('id', $serviceIds)->get();
        $duration = AdvertisementServiceDuration::where('id', $booking->duration_id)->first();
        // dd($services);
        return view('front.booking.manage', compact('booking', 'services', 'userType', 'duration'));
    }

    public function premiumPicturePurchaseCheck(Request $req)
    {
        $rules = [
            'ladiesId' => 'required|min:1|numeric',
            'customerId' => 'required|min:1|numeric',
            'pictureId' => 'required|min:1|numeric',
            'price' => 'nullable|string',
        ];
        $validator = validator()->make($req->all(),$rules);
        if(!$validator->fails()){
            $purchase = true;
            $picture = LadyPremiumPicture::where('id',$req->pictureId)->first();
            if($picture){
                $purchaseCheck = PremiumPicturePurchase::where('from_user_id',$req->ladiesId)->where('customer_id',$req->customerId)->where('picture_id',$req->pictureId)->first();
                if(!$purchaseCheck){
                    if(!empty($req->price)){
                        DB::beginTransaction();
                        try {
                            $transaction = new \App\Models\Transaction;
                                $transaction->user_id = $req->customerId;
                                $transaction->amount = $req->price;
                                $transaction->transaction_id = 'trans_'.randomgenerator();
                            $transaction->save();
                            /********** Minusing the Customer Point **************/
                            $coinsMinusCustomer = new \App\Models\CoinsDetails;
                                $coinsMinusCustomer->user_id = $req->customerId;
                                $coinsMinusCustomer->coins = '-'.$transaction->amount;
                                $coinsMinusCustomer->transaction_id = $transaction->id;
                                $coinsMinusCustomer->remarks = 'You have purchased premium picture';
                            $coinsMinusCustomer->save();
                            /********** Adding the Point from Customer to ladies account **************/
                            $coinsAddedLady = new \App\Models\CoinsDetails;
                                $coinsAddedLady->user_id = $req->ladiesId;
                                $coinsAddedLady->coins = $transaction->amount;
                                $coinsAddedLady->transaction_id = $transaction->id;
                                $coinsAddedLady->remarks = 'Your Premium Picture Purchased by Customer';
                            $coinsAddedLady->save();
                            /*************** Making as Purchased Picture **************/
                            $premiumPurchase = new PremiumPicturePurchase;
                                $premiumPurchase->from_user_id = $req->ladiesId;
                                $premiumPurchase->customer_id = $req->customerId;
                                $premiumPurchase->picture_id = $req->pictureId;
                                $premiumPurchase->price = $transaction->amount;
                            $premiumPurchase->save();
                            $picture->no_of_purchase += 1;
                            $picture->save();
                            $purchase = true;
                            DB::commit();
                        } catch (Exception $e) {
                            DB::rollback();
                            return errorResponse('Something went wrong please try after sometime');
                        }
                    }else{
                        $purchase = false;
                    }
                }
                $data['purchase'] = $purchase;
                return successResponse('Premium Picture',$data);
            }
            return errorResponse('Invalid Image Clicked');
        }
        return errorResponse($validator->errors()->first());
    }

    public function confirmed(Request $req)
    {
        $booking = Booking::find(base64_decode($req->bookingId));
        $booking->user_address_1 = $req->user_address_1;
        $booking->user_address_2 = $req->user_address_2;
        $booking->user_city = $req->user_city;
        $booking->user_telephone = $req->user_telephone;
        $booking->user_extra_info = $req->user_extra_info;
        $booking->is_confirmed = 1;
        $booking->save();
        return redirect()->route('booking.list')->with('Success','You have confirm this booking');
    }
}
