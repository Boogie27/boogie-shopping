<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    public function category(){
       return  $this->belongsToMany("App\category");
    }

    public function order(){
        return  $this->belongsToMany("App\order");
     }

     public function product_order(){
        return  $this->hasMany("App\product_order");
     }
}
