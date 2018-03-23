<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class ProductsResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    private $reslt;
    public function toArray($request)
    {
        //   return $this->collection->pluck('id')->all();


      //  return ['data' => ProductResource::collection($this->collection)];

    }

    public function indexData()
    {
        //   return $this->collection->pluck('id')->all();


        return ['columns'=>$this->indexColumns(),'data' => ProductResource::collection($this->collection)];

    }
    public function indexColumns(){
        return [

            'index'        =>[
                'type'=>'num',
                'name'=>'id',
                'title' =>'#',
                'searchable' =>false,
                'defaultContent'=>'',
                'visible' =>true,
                'orderable' =>false,
                'data'=>null

            ],
            'id'        =>[
                'type'=>'num',
                'name'=>'id',
                'title' =>'ID',
                'searchable' =>false,
                'defaultContent'=>'',
                'visible' =>false,
                'orderable' =>false,
                'data'=>[
                    '_'=>'id',
                    'display' =>'id',
                    'filter'=>'id'
                ]

            ],
            'name'       => [
                'type'=>'string',
                'name'=>'name',
                'title' =>'Name',
                'searchable' =>true,
                'defaultContent'=>'',
                'visible' =>true,
                'orderable' =>true,
                'data'=>[
                    '_'=>'attributes.name',
                    'display' =>'attributes.name',
                    'filter'=>'attributes.name',
                    'sort' =>'attributes.name'
                ]


            ],
            'category'       => [
                'type'=>'string',
                'name'=>'category',
                'title' =>'Category',
                'searchable' =>true,
                'defaultContent'=>'',
                'visible' =>true,
                'orderable' =>true,
                'data'=>[
                    '_'=>'attributes.category_id',
                    'display' =>'attributes.category',
                    'filter'=>'attributes.category',
                    'sort' =>'attributes.category'
                ]


            ],
            'sub_category'       => [
                'type'=>'string',
                'name'=>'sub_category',
                'title' =>'Sub Category',
                'searchable' =>true,
                'defaultContent'=>'',
                'visible' =>true,
                'orderable' =>true,
                'data'=>[
                    '_'=>'attributes.sub_category_id',
                    'display' =>'attributes.sub_category',
                    'filter'=>'attributes.sub_category',
                    'sort' =>'attributes.sub_category'
                ]


            ],
            'model'       => [
                'type'=>'string',
                'name'=>'model',
                'title' =>'Model',
                'searchable' =>true,
                'defaultContent'=>'',
                'visible' =>true,
                'orderable' =>true,
                'data'=>[
                    '_'=>'attributes.model',
                    'display' =>'attributes.model',
                    'filter'=>'attributes.model',
                    'sort' =>'attributes.model'
                ]


            ],
            'brand'       => [
                'type'=>'string',
                'name'=>'brand',
                'title' =>'Brand',
                'searchable' =>true,
                'defaultContent'=>'',
                'visible' =>true,
                'orderable' =>true,
                'data'=>[
                    '_'=>'attributes.brand_id',
                    'display' =>'attributes.brand',
                    'filter'=>'attributes.brand',
                    'sort'=>'attributes.brand'
                ]


            ],
            'uom'       => [
                'type'=>'string',
                'name'=>'uom',
                'title' =>'Unit of Measure',
                'searchable' =>true,
                'defaultContent'=>'',
                'visible' =>true,
                'orderable' =>true,
                'data'=>[
                    '_'=>'attributes.uom_id',
                    'display' =>'attributes.uom',
                    'filter'=>'attributes.uom',
                    'sort' =>'attributes.uom'
                ]


            ],
            'type'       => [
                'type'=>'string',
                'name'=>'type',
                'title' =>'Type',
                'searchable' =>true,
                'defaultContent'=>'',
                'visible' =>true,
                'orderable' =>true,
                'data'=>[
                    '_'=>'attributes.type_id',
                    'display' =>'attributes.type',
                    'filter'=>'attributes.type',
                    'sort' =>'attributes.type'
                ]


            ],
            'description'       => [
                'type'=>'string',
                'name'=>'description',
                'title' =>'Description',
                'searchable' =>true,
                'defaultContent'=>'',
                'visible' =>true,
                'orderable' =>true,
                'data'=>[
                    '_'=>'attributes.description',
                    'display' =>'attributes.description',
                    'filter'=>'attributes.description',
                    'sort' =>'attributes.description'
                ]


            ],
            'updated_at'       => [
                'type'=>'date',
                'name'=>'updated_at',
                'title' =>'Last Update',
                'searchable' =>true,
                'defaultContent'=>'55',
                'visible' =>false,
                'orderable' =>true,
                'data'=>[
                    '_'=>'attributes.updated_at.date',
                    'display' =>'attributes.updated_at.date',
                    'filter'=>'attributes.updated_at.date',
                    'type' =>'date'
                ]


            ],
            'actions'        =>[
                'type'=>'string',
                'name'=>'id',
                'title' =>'Actions',
                'searchable' =>false,
                'defaultContent'=>'',
                'visible' =>true,
                'orderable' =>false,
                'data'=>null

            ],



        ];
    }

    public function getReslt()
    {
        return $this->reslt;
    }
}
