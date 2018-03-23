<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class SupplierResource extends JsonResource
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
            'type'          => 'Suppliers',
            'id'            => (string)$this->id,


            'attributes'    => [
                'name' => $this->name,
                'address'=>$this->address,
                'notes' => $this->notes,
                'updated_at' =>$this->updated_at,
                'updated' => Carbon::parse($this->updated_at)->format('d-m-Y')



            ],
        ];
    }
}
