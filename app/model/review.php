<?php

namespace App\model;
use App\model\product;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $fillable = ['customer', 'review','star'];
    public function product() 
    {
        return $this->belongsTo(product::class);
    }
}
