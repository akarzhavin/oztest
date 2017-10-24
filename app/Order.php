<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_id', 'product_id', 'count'];

    public function customer()
    {
        return $this->belongsTo('App\User', 'customer_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id')->withTrashed();
    }

    public function getTotalPriceAttribute()
    {
        return $this->count * $this->product->price;
    }
}
