<?php

namespace App\Imports;

use App\Models\FoodItemTag;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class FoodItemTagImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            FoodItemTag::updateOrCreate(
                ['id' => $row['id']],
                [
                    'tag' => $row['tag'],
                    'count' => $row['count'],
                ]
            );
        }
    }
}
