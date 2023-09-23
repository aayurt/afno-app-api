<?php

namespace App\Exports;

use App\Models\ArchiveCategory;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ArchiveCategoriesExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return ArchiveCategory::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            trans('admin.archive-category.columns.id'),
            trans('admin.archive-category.columns.title'),
            trans('admin.archive-category.columns.description'),
        ];
    }

    /**
     * @param ArchiveCategory $archiveCategory
     * @return array
     *
     */
    public function map($archiveCategory): array
    {
        return [
            $archiveCategory->id,
            $archiveCategory->title,
            $archiveCategory->description,
        ];
    }
}
