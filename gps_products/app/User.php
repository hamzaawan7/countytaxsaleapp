<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function routeNotificationForNexmo(){

        return $this->phone_number;
    }

    public function payment(){
        return $this->hasOne('App\Payment');
    }
    public function Premium_user(){
        return $this->hasOne('App\Premium_user');
    }

    /*public function favorite(){
        return $this->hasOne('App\Payment');
    }*/

    public function products(){

        return $this->belongsToMany('App\Product','favorites','user_id','product_id');
        
    }

}
