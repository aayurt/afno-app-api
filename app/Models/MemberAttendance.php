<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberAttendance extends Model
{
    protected $fillable = [
        'date',
        'clock_in',
        'clock_out',
        'early',
        'must_cin',
        'must_cout',
        'att_time',
        'member_id',

    ];


    protected $dates = [
        'date',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/member-attendances/' . $this->getKey());
    }

    public function members()
    {
        return $this->belongsTo(Member::class);
    }
}