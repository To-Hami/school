<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudantImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        $data = array_values($row);

        return new Student([
            'name' => $data[0],
            'address' => $data[1],
            'jop' => $data[2],
            'Id_Number' => $data[3],
            'blood_id' => $data[4],
            'Grade_id' => $data[5],
            'Classroom_id' => $data[6],
            'Date_Birth'=>$data[7],
            'level_id'=>$data[8],
            'section_id'=>$data[9],
            'academic_year'=>$data[10],
        ]);
    }
}
