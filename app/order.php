<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function user(){
        return $this->belongsTo("App\user");
    }

    public function product(){
        return $this->belongsToMany("App\product");
    }

    protected $fillable = [
        "user_id" ,"name","address" ,"state" ,"country" ,"phone","billing_total",
    ];

    
}
