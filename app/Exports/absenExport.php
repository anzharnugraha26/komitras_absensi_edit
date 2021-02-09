<?php

namespace App\Exports;

use App\absen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class absenExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return absen::all();
    }

    public function map($absen): array
    {
        return [
            $absen->date(),
            $absen->name(),
            $absen->divisi(),
            $absen->time_in(),
            Date::dateTimeToExcel($absen->created_at),
        ];
    }



}
