<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class PremiumPicturePurchase extends Model
{
    use HasFactory,softDeletes;
    
    public function userDetails()
    {
        return $this->belongsTo('App\Models\User', 'from_user_id', 'id');
    }
    
    public function customerDetails()
    {
        return $this->belongsTo('App\Models\User', 'customer_id', 'id');
    }

    public function pictureDetails()
    {
        return $this->belongsTo('App\Models\LadyPremiumPicture', 'picture_id', 'id');
    }
}
