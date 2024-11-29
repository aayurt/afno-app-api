<?php

namespace App\Exports;

use App\Models\FoodItem;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RestaurantFoodItemExport implements FromCollection, WithMapping, WithHeadings
{

    protected $restaurant_id;

    function __construct($restaurant_id)
    {
        $this->restaurant_id = $restaurant_id;
    }

    /**
     * @return Collection
     */
    public function collection()
    {
        return FoodItem::where('restaurant_id', $this->restaurant_id)->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'id',
            'restaurant_id',
            'title',
            'type',
            'tags',
            'price',
        ];
    }

    /**
     * @param FoodItem $foodItem
     * @return array
     *
     */
    public function map($foodItem): array
    {
        return [
            $foodItem->id,
            $foodItem->restaurant_id,
            $foodItem->title,
            $foodItem->type,
            $foodItem->tags,
            $foodItem->price,
        ];
    }
}
