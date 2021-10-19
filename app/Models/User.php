<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes,HasFactory, Notifiable;

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
    //  */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    // /**
    //  * The attributes that should be hidden for arrays.
    //  *
    //  * @var array
    //  */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast to native types.
    //  *
    //  * @var array
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
    public function country()
    {
        return $this->hasOne('App\Models\Country', 'id', 'country_id');
    }
    public function city()
    {
        return $this->hasOne('App\Models\City', 'id', 'city_id');
    }
    public function lady_club()
    {
        // return $this->hasOne('App\Models\User', 'assigned_club', 'id');
    }
    public function ladies_ad()
    {
        return $this->hasMany('App\Models\Advertisement', 'ladies_id', 'id');
    }
    public function clubs_ad()
    {
        return $this->HasMany('App\Models\Advertisement', 'club_id', 'id');
    }
    public function coins()
    {
        return $this->hasMany('App\Models\CoinsDetails', 'user_id', 'id');
    }
}
