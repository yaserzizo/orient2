<?php

namespace App\Models\Suppliers;

use Illuminate\Database\Eloquent\Model;

class SupplierContact extends Model
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


    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
}
