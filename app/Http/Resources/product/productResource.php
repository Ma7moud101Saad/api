<?php

namespace App\Http\Resources\product;

use Illuminate\Http\Resources\Json\JsonResource;

class productResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return
        [
        //`id`, `name`, `detail`, `price`, `stock`, `discount`, `created_at`, `updated_at`SELECT * FROM `products` WHERE 1
            'name'          =>   $this->name,
            'descreaption'   =>   $this->detail,
            'price'         =>   $this->price,
            'stock'         =>   $this->stock,
            'discount'      => $this->discount
            
        ];
    }
}
