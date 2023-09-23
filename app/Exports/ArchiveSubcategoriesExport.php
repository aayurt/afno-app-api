<?php

namespace App\Exports;

use App\Models\ArchiveSubcategory;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ArchiveSubcategoriesExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return ArchiveSubcategory::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            trans('admin.archive-subcategory.columns.id'),
            trans('admin.archive-subcategory.columns.title'),
            trans('admin.archive-subcategory.columns.description'),
            trans('admin.archive-subcategory.columns.archive_category_id'),
        ];
    }

    /**
     * @param ArchiveSubcategory $archiveSubcategory
     * @return array
     *
     */
    public function map($archiveSubcategory): array
    {
        return [
            $archiveSubcategory->id,
            $archiveSubcategory->title,
            $archiveSubcategory->description,
            $archiveSubcategory->archive_category_id,
        ];
    }
}
