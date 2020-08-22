<?php

namespace App\Exports;

use App\Models\Tag;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TagsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return Tag::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            trans('admin.tag.columns.id'),
            trans('admin.tag.columns.title'),
        ];
    }

    /**
     * @param Tag $tag
     * @return array
     *
     */
    public function map($tag): array
    {
        return [
            $tag->id,
            $tag->title,
        ];
    }
}
