<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory,SoftDeletes;

    public function customerDetail()
    {
        return $this->belongsTo('App\Models\User', 'customer_id', 'id');
    }
    public function userDetail()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function serviceDuration()
    {
        return $this->belongsTo('App\Models\AdvertisementServiceDuration', 'duration_id', 'id');
    }
}
