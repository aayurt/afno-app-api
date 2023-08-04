<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JoinLeaveStudentHistory extends Model
{
    protected $fillable = [
        'status',
        'joining_date',
        'leaving_date',
        'student_id',
    
    ];
    
    
    protected $dates = [
        'joining_date',
        'leaving_date',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/join-leave-student-histories/'.$this->getKey());
    }
}
