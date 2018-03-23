<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SubCategoryResource extends JsonResource
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
            'type'          => 'Categories',
            'id'            => (string)$this->id,


            'attributes'    => [
                'name' => $this->name,
                'description' => $this->description,
                'updated_at' =>$this->updated_at,
                'updated' => Carbon::parse($this->updated_at)->format('d-m-Y')



            ],
        ];
    }




}

