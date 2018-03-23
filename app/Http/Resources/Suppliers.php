<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Suppliers extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
    public function indexData()
    {
        //   return $this->collection->pluck('id')->all();


        return ['columns'=>$this->indexColumns(),'data' => SupplierResource::collection($this->collection->sortByDesc('created_at'))];

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
            'address'       => [
                'type'=>'string',
                'name'=>'address',
                'title' =>'Address',
                'searchable' =>true,
                'defaultContent'=>'',
                'visible' =>true,
                'orderable' =>true,
                'data'=>[
                    '_'=>'attributes.address',
                    'display' =>'attributes.address',
                    'filter'=>'attributes.address',
                    'sort' =>'attributes.address'
                ]


            ],
            'notes'       => [
                'type'=>'string',
                'name'=>'notes',
                'title' =>'Notes',
                'searchable' =>true,
                'defaultContent'=>'',
                'visible' =>true,
                'orderable' =>true,
                'data'=>[
                    '_'=>'attributes.notes',
                    'display' =>'attributes.notes',
                    'filter'=>'attributes.notes',
                    'sort' =>'attributes.notes'
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


