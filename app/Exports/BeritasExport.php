<?php

namespace App\Exports;

use App\Berita;
use Maatwebsite\Excel\Concerns\FromCollection;

class BeritasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Berita::all();
    }
}
