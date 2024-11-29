<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodItemTag extends Model
{
    protected $fillable = [
        'tag',
        'count',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/food-item-tags/'.$this->getKey());
    }
}
