<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    protected $fillable = [
        'restaurant_id',
        'title',
        'type',
        'tags',
        'price',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/food-items/' . $this->getKey());
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
