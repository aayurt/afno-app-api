<?php

namespace App\Imports;

use App\Models\MemberAttendance;
use App\Models\Member;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportMemberAttendance implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {
            // Process the row data here
            // Assuming the 'name', 'date', 'clock_in', and 'clock_out' columns exist in the Excel
            if (isset($row['name']) && !empty($row['name']) && isset($row['date']) && !empty($row['date'])) {
                $member = Member::where('name', ucwords($row['name']))->first();
                if (!$member) {

                    $member = Member::create([
                        'name' => $row['name'],
                        'title' => null,
                        'short_description' => null,
                        'description' => null,
                        'enabled' => true

                    ]);

                }
                $member_id = $member->id;



                $clock_in = Carbon::createFromFormat('H:i:s', isset($row['clock_in']) && !empty($row['clock_in']) ? $row['clock_in'] . ":00" : "00:00:00")->format('H:i:s');
                $clock_out = Carbon::createFromFormat('H:i:s', isset($row['clock_out']) && !empty($row['clock_out']) ? $row['clock_out'] . ":00" : "00:00:00")->format('H:i:s');
                $att_time = Carbon::createFromFormat('H:i:s', isset($row['att_time']) && !empty($row['att_time']) ? $row['att_time'] . ":00" : "00:00:00")->format('H:i:s');
                $early = Carbon::createFromFormat('H:i:s', isset($row['early']) && !empty($row['early']) ? $row['early'] . ":00" : "00:00:00")->format('H:i:s');



                $existingAttendance = MemberAttendance::where('member_id', $member_id)
                    ->whereDate('date', '=', Carbon::parse($row['date'])->toDateString())
                    ->first();


                if ($existingAttendance) {
                    // Update the existing attendance record
                    $existingAttendance->update([
                        'clock_in' => $clock_in,
                        'clock_out' => $clock_out,
                        'early' => $early,
                        'must_cin' => $row['must_cin'] === "True" ? true : false,
                        'must_cout' => $row['must_cout'] === "True" ? true : false,
                        'att_time' => $att_time,
                    ]);
                } else {
                    // Create a new attendance record



                    $member_attendance = MemberAttendance::create([
                        'member_id' => $member_id,
                        'date' => Carbon::parse($row['date'])->toDateString(),
                        'early' => $early,
                        'clock_in' => $clock_in,
                        'clock_out' => $clock_out,
                        'att_time' => $att_time,

                        'must_cin' => $row['must_cin'] === "True" ? true : false,
                        'must_cout' => $row['must_cout'] === "True" ? true : false,
                    ]);


                }
            }



        }

    }
}