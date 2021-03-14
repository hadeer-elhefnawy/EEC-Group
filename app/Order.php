<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable = ['id','user_id','department_id','section_id','create_at','updated_at','total_price'];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
    public function department() {
        return $this->belongsTo(Department::class);
    }
    public function section() {
        return $this->belongsTo(Section::class);
    }
    public function items() {
        return $this->belongsToMany('App\Product','order_product')->withPivot(['quantity', 'comment','price']);
    }

}
