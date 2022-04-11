<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LadyPremiumPicture extends Model
{
    use HasFactory,SoftDeletes;

    public function picturePurchaseDetails(Request $req)
    {
        return $this->hasMany('App\Models\PremiumPicturePurchase', 'picture_id', 'id');
    }
}
