<?php

namespace App\Exports;

use App\Models\Detail_folder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

//class AmarExport implements FromCollection
//{
//    /**
//    * @return \Illuminate\Support\Collection
//    */
//    public function collection()
//    {
//        return Detail_folder::all();
//    }
//}

class AmarExport implements FromView
{
    public function view(): View
    {
        return view('zaher_excel',['Amars'=>Detail_folder::where('code_water', 'like', "%" . '20'. "%")->where('folder_name', 'like', "%" . 'ج'. "%")->get()]);
    }
}

