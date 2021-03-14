<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name','price'];


    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
