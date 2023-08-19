<?php

namespace App\Exports;

use App\Models\NameTransformation;
use Maatwebsite\Excel\Concerns\FromCollection;

class NameTransformationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return NameTransformation::all();
    }
}
