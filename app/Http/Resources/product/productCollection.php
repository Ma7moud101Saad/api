<?php

namespace App\Http\Resources\product;

use Illuminate\Http\Resources\Json\Resource;

class productCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return
        [
            'name'  => $this->name,
            'total price'   => round((1 - $this->discount/100) * $this->price ,2),
            'rate'          => $this->reviews->count()>0? round($this->reviews->sum('star')/$this->reviews->count())  :  'no rating yet',
            'href' =>
            [
                'link'=>route('products.show', $this->id)
            ]
        ];
    }
}
