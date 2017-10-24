<?php

namespace App;

use App\Facades\Alert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $with = ['image'];

    public function image()
    {
        return $this->belongsTo('App\Image');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function getPriceAttribute($value)
    {
        return trim($value);
    }

    public function takeFromStock(int $takeCount)
    {
        $stockCount = $this->count;
        if($stockCount >= $takeCount){ //Check the number of products in stock
            $this->count = $stockCount - $takeCount;
            $this->save();

            if ($stockCount == $takeCount){ //If stock is empty
                $this->delete();
                Alert::reload(true);
            }
            $status = true;
        } else {
            $status = false;
        }

        return $status;
    }
}
