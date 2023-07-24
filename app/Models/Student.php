<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'ordination_name',
        'address',
        'dob',
        'gender',
        'email',
        'phone_no',
        'roll_no',
        'student_type_id',
        'student_class_id',
    
    ];
    
    
    protected $dates = [
        'dob',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/students/'.$this->getKey());
    }
}
