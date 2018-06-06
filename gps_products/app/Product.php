<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Nexmo\Laravel\Facade\Nexmo;

class Product extends Model
{
    //
    public $fillable = ['address', 'lat', 'lng', 'zipcode', 'precinct', 'sale', 'account', 'cause', 'judgment', 'tax_years', 'hcad', 'min_bid', 'adjudged_value', 'image_url', 'description', 'auction_start', 'auction_end', 'type', 'status'];

    public function favorite()
    {
        return $this->hasOne('App\Favorite');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }

    public function auctions()
    {
        return $this->hasMany('App\Auction')->orderBy('price', 'DESC');
    }

    /*public function scopeAlerts($favorites)
    {
        $nexmo_errors = [];
        $favourite_users = [];
        $first = 0;
        foreach ($favorites as $favorite) {
            $favourite_users [$favorite->user->id][] = $favorite;
        }
        return $nexmo_errors;
    }*/


}
