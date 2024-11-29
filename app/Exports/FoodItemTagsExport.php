<?php

namespace App\Exports;

use App\Models\FoodItemTag;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FoodItemTagsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return FoodItemTag::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            trans('admin.food-item-tag.columns.id'),
            trans('admin.food-item-tag.columns.tag'),
            trans('admin.food-item-tag.columns.count'),
        ];
    }

    /**
     * @param FoodItemTag $foodItemTag
     * @return array
     *
     */
    public function map($foodItemTag): array
    {
        return [
            $foodItemTag->id,
            $foodItemTag->tag,
            $foodItemTag->count,
        ];
    }
}
