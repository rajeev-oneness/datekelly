<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\CoinsDetails;
use App\Models\Transaction;
use App\Models\AdvertisementServices;
use App\Models\AdvertisementServiceDuration;
class BookingController extends Controller
{
    public function book(Request $req)
    {
        // dd($req->all());
        $guard = get_guard();
        $user = auth()->guard($guard)->user();
        $userId = $user->id;
        $req->validate([
            'user_id' => 'required|numeric|min:1',
            'advertisement_id' => 'required|numeric|min:1',
            'visit_type' => 'required|numeric',
            'date' => 'required',
            'time' => 'required',
            'duration_id' => 'required|numeric|min:1',
            'service_id' => 'required',
        ]);

        if(totalCoinsCalculate($user->coins) >= 120) {
            $booking = new Booking;
            $booking->customer_id = $userId;
            $booking->user_id = $req->user_id;
            $booking->advertisement_id = $req->advertisement_id;
            $booking->visit_type = $req->visit_type;
            $booking->customer_address_1 = $req->customer_address_1;
            $booking->customer_address_2 = $req->customer_address_2;
            $booking->customer_city = $req->customer_city;
            $booking->customer_telephone = $req->customer_telephone;
            $booking->extra_info = $req->extra_info;
            $booking->date = $req->date;
            $booking->time = $req->time;
            $booking->duration_id = $req->duration_id;
            $booking->service_id = implode(",", $req->service_id);
            $booking->down_payment = 120;
            $booking->save();

            $transaction = new Transaction;
            $transaction->user_id = $userId;
            $transaction->amount = 30;
            $transaction->transaction_id = 'trans_'.randomgenerator();
            $transaction->save();

            $coinDetail = new CoinsDetails();
            $coinDetail->user_id = $userId;
            $coinDetail->coins = -120;
            $coinDetail->transaction_id = $transaction->id;
            $coinDetail->remarks = 'User '.$userId.' booked service from'.$req->user_id.' using '.'120'.' coins';
            $coinDetail->save();
        } else {
            return redirect()->route('coins.buy')->with('Error','You do not have enough coins!');
        }
        return redirect()->route('booking.list')->with('Success','Service booked successfully');
    }

    public function list(Request $req)
    {
        $guard = get_guard();
        $user = auth()->guard($guard)->user();
        $userId = $user->id;
        $userType = $user->user_type;
        $confirmedBookings = [];$notConfirmedBookings = [];
        if($userType == 2) {
            $confirmedBookings = Booking::select('*')->with('customerDetail')->where('user_id', $userId)->where('date', '>=', date('Y-m-d'))->where('is_confirmed', 1)->orderBy('created_at', 'DESC')->get();
            $notConfirmedBookings = Booking::select('*')->with('customerDetail')->where('user_id', $userId)->where('date', '>=', date('Y-m-d'))->where('is_confirmed', 0)->where('is_visited', 0)->orderBy('created_at', 'DESC')->get();
        }
        if($userType == 3) {
            $confirmedBookings = Booking::with('userDetail')->where('customer_id', $userId)->where('date', '>=', date('Y-m-d'))->where('is_confirmed', 1)->orderBy('created_at', 'DESC')->get();
            $notConfirmedBookings = Booking::with('userDetail')->where('customer_id', $userId)->where('date', '>=', date('Y-m-d'))->where('is_confirmed', 0)->where('is_visited', 0)->orderBy('created_at', 'DESC')->get();
        }
        return view('front.booking.list', compact('confirmedBookings', 'notConfirmedBookings', 'userType'));
    }

    public function confirmation(Request $req, $bookingId)
    {
        $booking = Booking::where('id', base64_decode($req->bookingId))->with('customerDetail')->first();
        $serviceIds = explode(",", $booking->service_id);
        $services = AdvertisementServices::whereIn('id', $serviceIds)->get();
        // dd($services);
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
