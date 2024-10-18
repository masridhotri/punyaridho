<?php

namespace App\Exports;

use App\Models\DetailtransaksiModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class Detailexport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DetailtransaksiModel::all();
    }
}
