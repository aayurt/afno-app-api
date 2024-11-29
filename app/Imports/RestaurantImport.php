<?php

namespace App\Imports;

use App\Models\Restaurant;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class RestaurantImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Restaurant::updateOrCreate(
                ['id' => $row['id']],
                [
                    'title' => $row['title'],
                    'location' => $row['location'],
                    'sub_title' => $row['sub_title'],
                    'enabled' => $row['enabled'] || false,
                    'phone_number' => $row['phone_number'],
                    'alternate_phone_number' => $row['alternate_phone_number'],
                    'link' => $row['link'],
                    'email' => $row['email'],
                    'instagram' => $row['instagram'],
                    'facebook' => $row['facebook'],
                    'youtube' => $row['youtube'],
                    'latitude' => $row['latitude'],
                    'longitude' => $row['longitude'],
                    'monday_open_time' => $row['monday_open_time'],
                    'monday_close_time' => $row['monday_close_time'],
                    'tuesday_open_time' => $row['tuesday_open_time'],
                    'tuesday_close_time' => $row['tuesday_close_time'],
                    'wednesday_open_time' => $row['wednesday_open_time'],
                    'wednesday_close_time' => $row['wednesday_close_time'],
                    'thursday_open_time' => $row['thursday_open_time'],
                    'thursday_close_time' => $row['thursday_close_time'],
                    'friday_open_time' => $row['friday_open_time'],
                    'friday_close_time' => $row['friday_close_time'],
                    'saturday_open_time' => $row['saturday_open_time'],
                    'saturday_close_time' => $row['saturday_close_time'],
                    'sunday_open_time' => $row['sunday_open_time'],
                    'sunday_close_time' => $row['sunday_close_time'],
                ]
            );
        }
    }
}
