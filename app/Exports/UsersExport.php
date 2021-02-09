<?php

namespace App\Exports;

use App\absen;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel; 


class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

}
