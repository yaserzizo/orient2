<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {


        return [
            'type'          => 'articles',
            'id'            => (string)$this->id,


            'attributes'    => [
                'name' => $this->name,
                'code' => $this->code,
                'model' => $this->model,
                'brand_id' => $this->brand_id,
                'brand' => $this->brand,
                'sub_category_id' => $this->sub_category_id,
                'sub_category' => $this->sub_category,
                'category' => $this->category,
                'category_id' => $this->category_id,
                'uom_id'=> $this->uom_id,
                'uom'=> $this->uom,
                'is_active' => $this->is_active,
                'type_id' => $this->type_id,
                'type' => $this->type,
                'description' => $this->description,
                'updated_at' => $this->updated_at,



            ],
        ];
    }




}

