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

    function fileTypeCheck($file)
    {
        return $file->getClientOriginalExtension();
    }

    function emptyCheck($string, $date = false)
    {
        if ($date) {
            return !empty($string) ? $string : '0000-00-00';
        }
        return !empty($string) ? $string : '';
    }

    function numberCheck($number)
    {
        return !empty($number) ? $number : 0;
    }

?>