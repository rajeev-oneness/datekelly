<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoveCount extends Model
{
    use HasFactory;

    public function adDetail()
    {
        return $this->belongsTo('App\Models\Advertisement', 'advertisement_id', 'id');
    }
    
    public function fromUserDetail()
    {
        return $this->belongsTo('App\Models\User', 'from', 'id');
    }
    
    public function toUserDetail()
    {
        return $this->belongsTo('App\Models\User', 'to', 'id');
    }
}
