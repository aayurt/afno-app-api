<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;

class Post extends Model
{
use HasTranslations;
    protected $fillable = [
        'title',
        'location',
        'body',
        'published_at',
        'enabled',
        'popularity',
        'category_id',
        'author_id',
    
    ];
    
    
    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
    
    ];
    // these attributes are translatable
    public $translatable = [
        'title',
        'location',
        'body',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/posts/'.$this->getKey());
    }
}
