<?php

namespace App\Imports;

use App\Models\Weight;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WeightImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Weight([
            'weight'  => $row['weight'],
            'zone_1'  => $row['zone_1'],
            'zone_2'  => $row['zone_2'],
            'zone_3'  => $row['zone_3'],
            'zone_4'  => $row['zone_4'],
            'zone_5'  => $row['zone_5'],
            'zone_6'  => $row['zone_6'],
            'zone_7'  => $row['zone_7'],
        ]);
    }
}
