<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;

class MemberCategory extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];
    public $translatable = [
        'title',

    ];
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/member-categories/' . $this->getKey());
    }
    public function member()
    {
        return $this->hasMany(Member::class);
    }
}