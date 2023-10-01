<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveCategory extends Model
{
    protected $fillable = [
        'title',
        'description',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/archive-categories/' . $this->getKey());
    }
    public function archiveSubcategories()
    {
        return $this->hasMany(ArchiveSubcategory::class);
    }
}