<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremiumPictureComment extends Model
{
    use HasFactory;
    protected $table='premium_picture_comments';
    public function userDetails()
    {
        return $this->belongsTo('App\Models\User','customer_id');
    }
}
