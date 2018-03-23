<?php

namespace App\Models\Products;

use App\MyModel as Model;

class Uom extends Model
{
    protected $guarded = [
        'id','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by'
    ];
    protected $dates = [
        'created_at','updated_at','deleted_at'
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Products\Product');
    }


}
