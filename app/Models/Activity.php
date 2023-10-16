<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Activity extends Model implements HasMedia
{
    use HasTranslations;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    protected $fillable = [
        'link',
        'sortNumber',
        'fullWidth',
        'enabled',
        'textTop',
        'textDark',

    ];
    public $translatable = [
        'title',
        'subtitle',
        'body',
    ];

    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/activities/' . $this->getKey());
    }
    public function registerMediaCollections()
    {
        $this->addMediaCollection('gallery')->accepts('image/*')
            ->maxNumberOfFiles(20);
        ;

        $this->addMediaCollection('cover')->accepts('image/*');

        $this->addMediaCollection('gallery')
            ->accepts('image/*')
            ->maxNumberOfFiles(20);

        $this->addMediaCollection('pdf')
            ->accepts('application/pdf');
    }
    public function registerMediaConversions(Media $media = null)
    {
        $this->autoRegisterThumb200();
        $this->addMediaConversion('detail_hd')
            ->width(1920)
            ->height(1080)
            ->performOnCollections('gallery');
    }

    public function subActivities()
    {
        return $this->hasMany(SubActivity::class);
    }
}