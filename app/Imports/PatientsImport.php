<?php

namespace App\Imports;

use App\Patient;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class PatientsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, ShouldQueue
{


    public function model(array $row)
    {

        if ($row['first_name'] && $row['second_name'] && $row['family_name'] && $row['uid'])
        {
            $valid = true;
        } else {
            $valid = false;
        }

        return  new Patient(
            [
                'first_name'    =>  $row['first_name'],
                'second_name'   =>  $row['second_name'],
                'family_name'   =>  $row['family_name'],
                'uid'  =>  $row['uid'],
                'valid'  =>  $valid
            ]
        );
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
