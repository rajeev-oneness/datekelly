<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvertisementReview extends Model
{
    use HasFactory,SoftDeletes;

    public function advertisement_details() 
    {
        return $this->belongsTo('App\Models\Advertisement', 'advertisement_id', 'id');
    }
    public function club_details()
    {
        return $this->belongsTo('App\Models\Advertisement', 'advertisement_id', 'id')->where('user_type', 2);
    }
    public function user_details() 
    {
        return $this->hasOne('App\Models\User', 'id', 'customer_id');
    }
    public function reply_user()
    {
        return $this->hasOne('App\Models\User', 'id', 'reply_by');
    }
}
