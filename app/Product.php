<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $with = ['image'];

    public function image()
    {
        return $this->belongsTo('App\Image');
    }

    public function getPriceAttribute($value)
    {
        return trim($value);
    }
}
