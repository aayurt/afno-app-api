<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveSubcategory extends Model
{
    protected $fillable = [
        'title',
        'description',
        'archive_category_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/archive-subcategories/' . $this->getKey());
    }
    public function archiveCategories()
    {
        return $this->belongsTo(ArchiveCategory::class);
    }
    public function archives()
    {
        return $this->hasMany(Archive::class);
    }
}