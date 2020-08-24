<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    
    protected $fillable = ['img', 'name','price', 'description', 'category_id'];
    
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
    
    public function bills(){
        return $this->belongsToMany('App\Bill','details','product_id','bill_id');
    }
}
