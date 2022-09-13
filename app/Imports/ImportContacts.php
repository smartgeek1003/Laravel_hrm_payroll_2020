<?php

namespace App\Imports;
use Maatwebsite\Excel\Concerns\WithStartRow; //First row skip inserted code
use App\Myattendance;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportContacts implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Myattendance([
            'user_id'     => $row[0],
            'accno'    => $row[1],
            'empidno'    => $row[2],
            'name'     => $row[3],
            'autosign'     => $row[4],
            'date'     => date("Y-m-d", strtotime($row[5])),
            'timetable'     => $row[6],
            'onduty'     => $row[7],
            'offduty'     => $row[8],
            'check_in'     => $row[9],
            'check_out'     => $row[10],
            'normal'     => $row[11],
            'realtime'     => $row[12],
            'late'     => $row[13],
            'early'     => $row[14],
            'absent'     => $row[15],
            'ottime'     => $row[16],
            'worktime'     => $row[17],
            'exception'     => $row[18],
            'mustcin'     => $row[19],
            'mustcout'     => $row[20],
            'department'     => $row[21],
            'ndays'     => $row[22],
            'weekend'     => $row[23],
            'holiday'     => $row[24],
            'atttime'     => $row[25],
            'ndaysot'     => $row[26],
            'weekendot'     => $row[27],
            'holidayot'     => $row[28],
        ]);
    }

//First row skip inserted code
public function startRow(): int
{
    return 2;
}
//First row skip inserted code end


}
