<?php

    function get_guard()
    {
        if(auth()->guard('admin')->check()){
            return 'admin';
        }elseif(auth()->guard('web')->check()){
            return 'web';
        }else{
            return '';
        }
    }

    function successResponse($msg = '', $data = [], $status = 200)
    {
        return response()->json(['error' => false, 'status' => $status, 'message' => $msg, 'data' => $data]);
    }

    function errorResponse($msg = '', $data = [], $status = 200)
    {
        return response()->json(['error' => true, 'status' => 200, 'message' => $msg]);
        // return response()->json(['error'=>true,'status'=>$status,'message'=>$msg,'data'=>$data]);
    }

    function randomGenerator() {
        return uniqid().''.date('ymdhis').''.uniqid();
    }

    function totalCoinsCalculate($coinDetails) {
        $sum = 0;
        foreach ($coinDetails as $key => $value) {
            $sum += $value->coins;
        }
        return $sum;
    }

    function imageUpload($image, $folder = 'image')
    {
        $random = randomGenerator();
        $image->move('upload/' . $folder . '/', $random . '.' . $image->getClientOriginalExtension());
        $imageurl = 'upload/' . $folder . '/' . $random . '.' . $image->getClientOriginalExtension();
        return $imageurl;
    }

    function checkServicesTaken($selectedServicesList, $serviceObject)
    {
        $data = [];
        foreach ($selectedServicesList as $key => $value) {
            if($value->service_name == $serviceObject->title){
                $data['title'] = $serviceObject->title;
                $data['include'] = $value->include;
                $data['price'] = $value->price;
            }
        }
        return $data;
    }

    function checkWorkingDaysTaken($selectedDays, $daysObject)
    {
        $data = [];
        foreach($selectedDays as $key => $value){
            if($value->days == $daysObject){
                $data['day'] = true;
                $data['from'] = $value->from;
                $data['till'] = $value->till;
            }
        }
        return $data;
    }

    function checkPremiumPurchase($picId,$customerId)
    {
        $purchaseCheck = \App\Models\PremiumPicturePurchase::where('customer_id',$customerId)->where('picture_id',$picId)->first();
        if($purchaseCheck){
            return true;
        }else{
            return false;
        }
    }

    function fileTypeCheck($file)
    {
        return $file->getClientOriginalExtension();
    }

    function emptyCheck($string, $date = false)
    {
        if ($date) {
            return !empty($string) ? strQuotationCheck($string) : '0000-00-00';
        }
        return !empty($string) ? strQuotationCheck($string) : '';
    }

    function numberCheck($number)
    {
        return !empty($number) ? $number : 0;
    }

    function strQuotationCheck(string $string = "")
    {
        $returnString = '';
        for ($i = 0; $i < strlen($string); $i++) {
            if ($string[$i] == '"') {
                $returnString .= '&#34;';
            } else if ($string[$i] == "'") {
                $returnString .= '&#39;';
            } else {
                $returnString .= $string[$i];
            }
        }
        return $returnString;
    }

    function wordsLimit($str, $limit) {
        return \Str::words($str, $limit);
    }

?>