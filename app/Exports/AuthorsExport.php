<?php

namespace App\Exports;

use App\Models\Author;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AuthorsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return Author::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            trans('admin.author.columns.id'),
            trans('admin.author.columns.name'),
        ];
    }

    /**
     * @param Author $author
     * @return array
     *
     */
    public function map($author): array
    {
        return [
            $author->id,
            $author->name,
        ];
    }
}
