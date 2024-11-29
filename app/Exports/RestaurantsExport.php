<?php

namespace App\Exports;

use App\Models\Restaurant;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RestaurantsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return Restaurant::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'id',
            'title',
            'location',
            'sub_title',
            'enabled',
            'phone_number',
            'alternate_phone_number',
            'link',
            'email',
            'instagram',
            'facebook',
            'youtube',
            'latitude',
            'longitude',
            'monday_open_time',
            'monday_close_time',
            'tuesday_open_time',
            'tuesday_close_time',
            'wednesday_open_time',
            'wednesday_close_time',
            'thursday_open_time',
            'thursday_close_time',
            'friday_open_time',
            'friday_close_time',
            'saturday_open_time',
            'saturday_close_time',
            'sunday_open_time',
            'sunday_close_time',
        ];
    }

    /**
     * @param Restaurant $restaurant
     * @return array
     *
     */
    public function map($restaurant): array
    {
        return [
            $restaurant->id,
            $restaurant->title,
            $restaurant->location,
            $restaurant->sub_title,
            $restaurant->enabled,
            $restaurant->phone_number,
            $restaurant->alternate_phone_number,
            $restaurant->link,
            $restaurant->email,
            $restaurant->instagram,
            $restaurant->facebook,
            $restaurant->youtube,
            $restaurant->latitude,
            $restaurant->longitude,
            $restaurant->monday_open_time,
            $restaurant->monday_close_time,
            $restaurant->tuesday_open_time,
            $restaurant->tuesday_close_time,
            $restaurant->wednesday_open_time,
            $restaurant->wednesday_close_time,
            $restaurant->thursday_open_time,
            $restaurant->thursday_close_time,
            $restaurant->friday_open_time,
            $restaurant->friday_close_time,
            $restaurant->saturday_open_time,
            $restaurant->saturday_close_time,
            $restaurant->sunday_open_time,
            $restaurant->sunday_close_time,
        ];
    }
}
