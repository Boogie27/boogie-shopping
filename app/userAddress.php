<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userAddress extends Model
{
    public function user(){
        return $this->belongsTo("App\user");
    }
}
