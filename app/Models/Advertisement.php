<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model
{
    use HasFactory,SoftDeletes;
    public function country()
    {
        return $this->hasOne('App\Models\Country', 'id', 'country_id');
    }
    public function city()
    {
        return $this->hasOne('App\Models\City', 'id', 'city_id');
    }
    public function club()
    {
        return $this->hasOne('App\Models\User', 'id', 'club_id');
    }
    public function lady()
    {
        return $this->hasOne('App\Models\User', 'id', 'ladies_id');
    }
    public function category_name()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category');
    }
    public function services()
    {
        return $this->hasMany('App\Models\AdvertisementServices', 'advertisement_id', 'id');
    }
    public function service_duration()
    {
        return $this->hasMany('App\Models\AdvertisementServiceDuration', 'advertisement_id', 'id');
    }
    public function image_gallery()
    {
        return $this->hasOne('App\Models\AdvertisementsImage', 'advertisement_id', 'id');
    }
    public function ratings()
    {
        return $this->hasMany('App\Models\AdvertisementReview', 'advertisement_id', 'id');
    }

    public function advertisement_image()
    {
        return $this->hasMany('App\Models\AdvertisementsImage','advertisement_id','id');
    }

    public function service_working_days()
    {
        return $this->hasMany('App\Models\AdvertisementWorkingDays','advertisement_id','id');
    }
}
