<?php

namespace App\Exports;

use App\Models\SubCategory;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SubCategoriesExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return SubCategory::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            trans('admin.sub-category.columns.id'),
            trans('admin.sub-category.columns.sub_title'),
            trans('admin.sub-category.columns.description'),
            trans('admin.sub-category.columns.category_id'),
        ];
    }

    /**
     * @param SubCategory $subCategory
     * @return array
     *
     */
    public function map($subCategory): array
    {
        return [
            $subCategory->id,
            $subCategory->sub_title,
            $subCategory->description,
            $subCategory->category_id,
        ];
    }
}
