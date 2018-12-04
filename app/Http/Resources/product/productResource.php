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
            'stock'         =>   $this->stock == 0 ? 'no result': $this->stock ,
            'discount'      => $this->discount,
            'total price'   => round((1 - $this->discount/100) * $this->price ,2),
            'rate'          => $this->reviews->count()>0? round($this->reviews->sum('star')/$this->reviews->count())  :  'no rating yet',
            'href'          =>[
                'reviews'   => route('reviews.index', $this->id)// go to review.index
            ]       
          
        ];
    }
}
