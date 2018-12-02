<?php

namespace App\model;
use App\model\product;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    public function product() 
    {
        return $this->belongsTo(product::class);
    }
}
