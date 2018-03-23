<?php

namespace App\Models\Suppliers;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = [
        'id','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by'
    ];
    protected $dates = [
        'created_at','updated_at','deleted_at'
    ];

    protected $casts = [
      'created_at' => 'datetime:Y-m-d H:00',
        'updated_at' => 'datetime:Y-m-d H:00','deleted_at' => 'datetime:Y-m-d H:00',
    ];

    public function contacts()
    {
        return  $this->hasMany('App\Models\Suppliers\SupplierContact', 'supplier_id');
    }

}
