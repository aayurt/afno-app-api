<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentType extends Model
{
    protected $fillable = [
        'title',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/student-types/'.$this->getKey());
    }
}
