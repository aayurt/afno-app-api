<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;

class AffiliatedCategory extends Model
{
    use HasTranslations;
    protected $fillable = [
        'title',

    ];
    public $translatable = [
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
        return url('/admin/affiliated-categories/' . $this->getKey());
    }
}