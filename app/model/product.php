<?php

namespace App\model;
use App\model\review;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{//`name`, `detail`, `price`, `stock`, `discount`
    protected $fillable = ['name','detail','price','stock','discount','user_id'];
    public function reviews() 
    {
       return $this->hasMany(review::class); 
    }
}
