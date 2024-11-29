<?php

namespace App\Imports;

use App\Models\FoodItem;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class FoodItemImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            FoodItem::updateOrCreate(
                ['id' => $row['id']],
                [
                    'restaurant_id' => $row['restaurant_id'],
                    'title' => $row['title'],
                    'type' => $row['type'],
                    'tags' => $row['tags'],
                    'price' => $row['price'],
                ]
            );
        }
    }
}
