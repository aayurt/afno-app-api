<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;

class Category extends Model
{
    use HasTranslations;
    protected $fillable = [
        'title',
        'description',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];
    // these attributes are translatable
    public $translatable = [
        'title',
        'description',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/categories/' . $this->getKey());
    }
    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }
    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
