<?php

namespace App\Imports;

use App\Models\Area;
use App\Models\Zone;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ZonesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Area([
            'area_en'  => $row['area_en'],
            'area_ar'  => $row['area_ar'],
        ]);
    }
}
