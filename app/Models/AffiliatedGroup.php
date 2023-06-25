<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliatedGroup extends Model
{
    protected $fillable = [
        'title',
        'short_description',
        'description',
        'enabled',
        'affiliated_group_category_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/affiliated-groups/'.$this->getKey());
    }
}
