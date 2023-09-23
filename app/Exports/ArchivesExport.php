<?php

namespace App\Exports;

use App\Models\Archive;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ArchivesExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return Archive::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            trans('admin.archive.columns.id'),
            trans('admin.archive.columns.title'),
            trans('admin.archive.columns.body'),
            trans('admin.archive.columns.archive_subcategory_id'),
            trans('admin.archive.columns.enabled'),
            trans('admin.archive.columns.public'),
        ];
    }

    /**
     * @param Archive $archive
     * @return array
     *
     */
    public function map($archive): array
    {
        return [
            $archive->id,
            $archive->title,
            $archive->body,
            $archive->archive_subcategory_id,
            $archive->enabled,
            $archive->public,
        ];
    }
}
