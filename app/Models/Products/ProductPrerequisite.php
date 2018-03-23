<?php

namespace App\Models\Products;

use App\MyModel as Model;

class ProductPrerequisite extends Model
{
    protected $guarded = [
        'id','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by'
    ];
    protected $dates = [
        'created_at','updated_at','deleted_at'
    ];

    protected $casts = [
        'prerequisites'=>'array'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Products\Product');
    }
}
