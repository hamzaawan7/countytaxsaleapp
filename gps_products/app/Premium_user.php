<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premium_user extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
}
