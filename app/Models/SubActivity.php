<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubActivity extends Model
{
    protected $fillable = [
        'activity_id',
        'title',
        'subtitle',
        'body',
        'link',
        'fullWidth',
        'enabled',
        'textTop',
        'textDark',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/sub-activities/'.$this->getKey());
    }
}
