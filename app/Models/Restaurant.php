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


class Restaurant extends Model implements HasMedia
{
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    protected $fillable = [
        'title',
        'location',
        'sub_title',
        'description',
        'enabled',
        'phone_number',
        'alternate_phone_number',
        'link',
        'email',
        'instagram',
        'facebook',
        'youtube',
        'latitude',
        'longitude',
        'monday_open_time',
        'monday_close_time',
        'tuesday_open_time',
        'tuesday_close_time',
        'wednesday_open_time',
        'wednesday_close_time',
        'thursday_open_time',
        'thursday_close_time',
        'friday_open_time',
        'friday_close_time',
        'saturday_open_time',
        'saturday_close_time',
        'sunday_open_time',
        'sunday_close_time',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/restaurants/' . $this->getKey());
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery')->accepts('image/*')
            ->maxNumberOfFiles(20);
        ;

        $this->addMediaCollection('cover')
            ->accepts('image/*');

        $this->addMediaCollection('gallery')
            ->accepts('image/*')
            ->maxNumberOfFiles(20);

        $this->addMediaCollection('pdf')
            ->accepts('application/pdf');
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this->autoRegisterThumb200();

        $this->addMediaConversion('detail_hd')
            ->performOnCollections('gallery');
    }
}
