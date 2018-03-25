<?php

namespace App\Models\Products;

use App\MyModel as Model;

class Product extends Model
{
    protected $guarded = [
        'id','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by'
    ];
    protected $dates = [
        'created_at','updated_at','deleted_at'
    ];

    protected $casts = [
        'is_active' => 'boolean','options'=>'array','created_at' => 'datetime:Y-m-d H:00',
        'updated_at' => 'datetime:Y-m-d H:00','deleted_at' => 'datetime:Y-m-d H:00',
    ];

/*    protected $appends = ['pp'];*/

    public function prerequisites()
    {
        return  $this->hasMany('App\Models\Products\ProductPrerequisite','product_id');
    }

    public function subCategory()
    {
        return $this->belongsTo('App\Models\Products\SubCategory','sub_category_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Products\Brand','brand_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Products\ProductType','product_type_id');
    }

    public function uom()
    {
        return $this->belongsTo('App\Models\Products\Uom','uom_id');

    }

    public function getPpAttribute()
    {
        //$arr=[];
        $reslt = $this->prerequisites()->get()->pluck('prerequisites');
        $ar =  $reslt[0];
        $arr = Product::whereIn('id',$ar)->pluck('id','name');
/*        foreach($reslt as $r){
            $arr[] =$this->;
            }*/
        return $arr;
            /* seoUrl($this->post_title)*/;
    }

    public function scopeWithRels($query)
    {
        $query->leftJoin('sub_categories as sc','sc.id','=','products.sub_category_id')
            ->leftJoin('categories as c','c.id','=','sc.category_id')
            ->leftJoin('brands as b','b.id','=','products.brand_id')
            ->leftJoin('product_types as pt','pt.id','=','products.product_type_id')
            ->leftJoin('uoms as uo','uo.id','=','products.uom_id')
            ->leftJoin('product_prerequisites as pp','pp.product_id','=','products.id')
        ->addSelect('products.id','products.code','products.code','products.name',
            'products.description','products.model','products.is_active','products.options','products.updated_at as updated_at',
            'c.id as category_id','c.name as category','sc.id as sub_category_id','sc.name as sub_category',
            'b.id as brand_id','b.brand as brand','pt.id as type_id','pt.type as type',
            'uo.id as uom_id','uo.uom as uom','pp.id as prerequisite_id','pp.prerequisites as prerequisites'

        )->latest('products.created_at');



    }

    public function suppliers()
    {
        return $this->belongsToMany('App\Models\Suppliers\Supplier')->withTimestamps()->withPivot('created_by', 'updated_by','deleted_by');
    }
}
