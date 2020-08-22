<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;

class SubCategory extends Model
{
    use HasTranslations;
    protected $fillable = [
        'sub_title',
        'description',
        'category_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];
    // these attributes are translatable
    public $translatable = [
        'sub_title',
        'description',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/sub-categories/' . $this->getKey());
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
