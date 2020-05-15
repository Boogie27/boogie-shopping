<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_order extends Model
{
    //

    public function product(){
        return $this->belongsTo("App\product");
    }
}
