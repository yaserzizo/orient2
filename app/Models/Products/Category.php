<?php

namespace App\Models\Products;

use App\MyModel as Model;
use Carbon\Carbon;
use Wildside\Userstamps\Userstamps;


class Category extends Model
{
    use Userstamps;
    //
    protected $table = 'categories';
    protected $guarded = [
        'id','created_at','updated_at','deleted_at','created_by','updated_by','deleted_by'
    ];
    protected $dates = [
        'created_at','updated_at','deleted_at'
    ];
    protected $appends = ['sc'];
/*    public function getUpdatedAtAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }*/

    public function subCategories()
    {
       return $this->hasMany('App\Models\Products\SubCategory','category_id','id');
    }

    public function products()
    {
      return  $this->hasManyThrough('App\Models\Products\Product', 'App\Models\Products\SubCategory');
    }

    public function getScAttribute()
    {
        return $this->subCategories()->pluck('name','id');
    }


}
