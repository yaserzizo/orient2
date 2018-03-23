<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class CategoriesResource extends ResourceCollection
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


        return ['columns'=>$this->indexColumns(),'data' => CategoryResource::collection($this->collection)];

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
                'defaultContent'=>null,
                'visible' =>true,
                'orderable' =>true,
                'data'=>[
                    '_'=>'attributes.updated_at.date',
                    'display' =>'attributes.updated',
                    'filter'=>'attributes.updated',
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
