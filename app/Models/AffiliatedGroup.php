<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;


class AffiliatedGroup extends Model
{
    use HasTranslations;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    protected $fillable = [
        'title',
        'short_description',
        'description',
        'enabled',
        'affiliated_group_category_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];
    public $translatable = [
        'title',
        'short_description',
        'description',
    ];
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/affiliated-groups/' . $this->getKey());
    }
    public function affiliatedCategories()
    {
        return $this->belongsTo(AffiliatedCategory::class);
    }
}