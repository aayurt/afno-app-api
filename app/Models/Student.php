<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'address',
        'student_type_id',
        'student_class_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/students/' . $this->getKey());
    }

    public function types()
    {
        return $this->belongsTo(StudentType::class);
    }
    public function classes()
    {
        return $this->belongsTo(StudentClass::class);
    }
}